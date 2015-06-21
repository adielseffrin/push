<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
/*
 * Models related to DB Tables
 * */
use App\RegIds;
use App\MessagesToPhones;
use App\Messages;
use App\Settings;

use App\User;
/*
 * Gbrock class to speedup table (sorted or not) creation and populate
 * */
use Table;

class HomeController extends Controller
{
	/*
	 * 
	 * name: __construct
	 * @param User model
	 * @return HomeController object for authenticated users
	 * 
	 */
	public function __construct(User $user)
	{
		$this->middleware('auth');
	}
   
	
	/*
	 * Retrieve from DB Tables data to fill the dashboard/initial
	 * page for legged users
	 * name: index
	 * @param
	 * @return View home.blade.php
	 * 
	 */
	public function index()
	{
		$totalDevices = RegIds::select('id')->count();
		$androidDevices = RegIds::select('id')->whereSystem('android')->count();
		$iosDevices = RegIds::select('id')->whereSystem('ios')->count();
		$winPhoneDevices = RegIds::select('id')->whereSystem('winPhone')->count();
		
		$lastMessage = Messages::select('*')->orderBy('id', 'desc')->first();
		//$lastMessage = $lastMessage->message;
		
		$totalMessages = Messages::select('id')->count(); 
		
		return view('home', compact('totalDevices','androidDevices','iosDevices','winPhoneDevices','lastMessage','totalMessages'));
	}

    /**
     * Show the form for creating a new messages.
     * If slug was defined as not empty, display the previsou sent
     * message status
     * name: sendMessage
	 * @param [slug]
     * @return View sendMessage.blade.php
     */
    public function sendMessage($slug = '')
    {
				
        $deviceNames = array();
        $users = array();
        
        $regSystem = RegIds::select('system')->distinct()->get();
        /*
         * Only show systems of registered devices
         * Include the word "User" for stetic reason
         */
        foreach($regSystem as $rs){
			$deviceNames[$rs['system']] = $rs['system'].' Users';
		}
		//These option will always be displayed
		$hardSendData = array('allUsers' => 'All Users', 'random' => 'Random User', 'oneUser'=>'One User');
		$deviceNames = array_merge($hardSendData, $deviceNames);
        
        /*
         * When sending a message for a specific user, display the registered
         * email to identify the user
        */
        $regUsers = RegIds::select('id', 'email', 'system')->get();
        foreach($regUsers as $ru){
				$users[$ru['id']] = $ru['email']." (".$ru['system'].")";
		}
        
        
        switch($slug){
			case "ok":
				$status = "Message Sucessfully Sent!";
				break;
			case "error":
				$status = "Error to Send Message!";
				break;
			default:
				$status = '';
				break;
		}
        
        return view('sendMessage', compact('deviceNames', 'users', 'status'));
    }

	/*
	* Load the area responsible to see the sent messages
	* name: sentMessages
	* @param
	* @return View sentMessages.blade.php
	* 
	*/
	public function sentMessages(){
		
		$sentMessages = Messages::sorted()->orderBy('id','desc')->paginate();
		$table = Table::create($sentMessages, ['id', 'message']);
		$table->addColumn('created_at', 'Added', function($model) {
			return $model->created_at->diffForHumans();
		});
		
		$totalMessages = Messages::select('id')->count(); 
		
		return view('sentMessages', compact('table','totalMessages'));
	}
	
	/*
	 * Load the area responsible to see the settings list
	 * name: settings
	 * @param
	 * @return View settings.blade.php
	 * 
	 */
	public function settings(){
		$settings = Settings::get();
		$table = Table::create($settings);
		$table->setColumns(['id','config','value']);
		$table->addColumn('', 'Edit', function($model) {
			return "<a href='".action('HomeController@editSetting',['slug' => $model->slug])."'><img src='/img/edit.svg' /></a>";
		});
		
		return view('settings',compact('settings','table'));
	}
	
	/*
	 * Load the view with the update form for a specific setting
	 * name: editSetting
	 * @param string $slug
	 * @return View editSettings.blade.php
	 * 
	 */
	public function editSetting($slug){
		$setting = Settings::get()->where('slug',$slug)->first();
		return view('editSettings',compact('setting'));
	}
	
	/*
	 * Save the changes made in a setting
	 * name: updateSetting
	 * @param string $slug, Request $request
	 * @return Responde redirect to /settings
	 * 
	 */
	public function updateSetting($slug, Request $request){
		$setting = Settings::whereSlug($slug)->first();
		
		$setting->value = $request->get('value');
		$setting->save();
		
		return redirect('settings');
	}
	
}
