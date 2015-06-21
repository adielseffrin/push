<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\RegIds;
use App\MessagesToPhones;
use App\Messages;
use App\Settings;

use App\User;

use Table;

class HomeController extends Controller
{
	
	public function __construct(User $user)
	{
		$this->middleware('auth');
		
	}
    /**
     * Display a listing of the resource.
     *
     * @return Response
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
     *
     * @return Response
     */
    public function sendMessage($slug = '')
    {
				
        $deviceNames = array();
        $users = array();
        
        $regSystem = RegIds::select('system')->distinct()->get();
        foreach($regSystem as $rs){
			$deviceNames[$rs['system']] = $rs['system'].' Users';
		}
		$hardSendData = array('allUsers' => 'All Users', 'random' => 'Random User', 'oneUser'=>'One User');
		$deviceNames = array_merge($hardSendData, $deviceNames);
        
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

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function sent()
    {
        return view('sent');
    }


	public function sentMessages(){
		
		$sentMessages = Messages::sorted()->orderBy('id','desc')->paginate();
		$table = Table::create($sentMessages, ['id', 'message']);
		$table->addColumn('created_at', 'Added', function($model) {
			return $model->created_at->diffForHumans();
		});
		
		$totalMessages = Messages::select('id')->count(); 
		
		return view('sentMessages', compact('table','totalMessages'));
	}
	
	public function settings(){
		$settings = Settings::get();
		$table = Table::create($settings);
		$table->setColumns(['id','config','value']);
		$table->addColumn('', 'Edit', function($model) {
			return "<a href='".action('HomeController@editSetting',['slug' => $model->slug])."'><img src='/img/edit.svg' /></a>";
		});
		
		return view('settings',compact('settings','table'));
	}
	
	public function editSetting($slug){
		$setting = Settings::get()->where('slug',$slug)->first();
		return view('editSettings',compact('setting'));
	}
	
	public function updateSetting($slug, Request $request){
		$setting = Settings::whereSlug($slug)->first();
		
		$setting->value = $request->get('value');
		$setting->save();
		
		return redirect('settings');
	}
	
}
