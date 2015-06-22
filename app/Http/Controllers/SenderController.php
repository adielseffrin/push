<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\RegIds;
use App\Messages;
use App\MessagesToPhones;
use App\Settings;
use DB;

use App\User;

class SenderController extends Controller
{
	/*
	 * We need this private variables to keep the data returned
	 * in anonimous functions inside the BD chuck and use in 
	 * sendPush method.
	 * */
	 private $androidKey;
	 private $androidSend = array();
	 private $androidReturn = true;
     
     private $iosKey;
     private $iosSend = array();
     private $iosReturn = true;
     
     private $windowsPhoneKey;
     private $windowsPhoneSend = array();
     private $windowsPhoneReturn = true;
     
     private $reachedUsers = array();
     private $message;
     
     
     /*
	 * 
	 * name: __construct
	 * @param User model
	 * @return SenderController object for authenticated users
	 * 
	 */
	public function __construct(User $user)
	{
		$this->middleware('auth');
	}
     
  
    
     /** 
     * Send push messages to Android devices via GCM 
     * name: sendMessageToAndroid
     * @param array $params
     * @ $params["msg"] : Expected Message 
     * @ $params["phoneId"] : the Id of device
     * 
     * return bool
     */ 
    private function sendMessageToAndroid($params) { 
		// Sending messages to Android Devices
		return true;
	} 
     
    /** 
     * Send push messages to IOS devices via APNS 
     *
     *  name: sendMessageToIos
     * @param array $params
     * @ $params["msg"] : Expected Message 
     * 
     * return bool
     */ 
    private function sendMessageToIos($params) { 
		//Sending messages to iOS Devices 
		return true;
    }
             
     /** 
     * Send push messages to windows phone devices
     * name: sendMessageToWindowsPhone
     * @param array $params
     * @ $params["msg"] : Expected Message 
     * 
     * return bool
     */ 
    private function sendMessageToWindowsPhone($params) { 
		//Sending messages to windows Phone Devices
		return true; 
    }
           
     
	/*
	 * Choose the proper method to send push messages for
	 * each selected devices
	 * Call methods to save the message in DB as well as to save
	 * the users that received the message
	 * 
	 * name: sendPush
	 * @param Request $request
	 * 
	 * @return Response redirect message-sent/<status>
	 * @ <status> ok
	 * @ <status> error
	 */
    public function sendPush(Request $request){
		
		$params = array();
		//get the target users and message from $request
		$sendTo = $request->input('sendTo');
		$this->message = $request->input('message');
		
		//Save message in DB and store its id
		$savedMessage = $this->saveMessage($this->message);
		
		//retrieve the system keys
		$androidKeyObj = Settings::select('value')->whereSlug('android-key')->first();
		$this->androidKey = $androidKeyObj->value;
		$iosKeyObj = Settings::select('value')->whereSlug('ios-key')->first();
		$this->iosKey = $iosKey->value;
		$winPhoneKeyObj = Settings::select('value')->whereSlug('winPhone-key')->first();
		$this->winPhoneKey = $winPhoneKey->value;
		
		/* 
		 * Using the target user(s), prepare the array of users and send
		 * the message. It is necessary once the GCM and APNS can handle
		 * only 1000 messages at time.
		*/
		switch ($sendTo){
			case 'allUsers':
				$androidUsersData = RegIds::select('phoneId')->whereSystem('android')->chunk(1000, function($users){
					foreach($users as $user){
						array_push($this->androidSend,$user->phoneId);
					}
					$params = array('phoneId' => $this->androidSend, 'msg' => $this->message, 'key' => $this->androidKey);
					$this->androidReturn = ($this->androidReturn && $this->sendMessageToAndroid($params));
					$this->reachedUsers=array_merge($this->reachedUsers, $this->androidSend);
					$this->androidSend = array();
				});
			
				$iosUsersData = RegIds::select('phoneId')->whereSystem('ios')->chunk(1000, function($users){
					foreach($users as $user){
						array_push($this->iosSend,$user->phoneId);
					}
					$params = array('phoneId' => $this->iosSend, 'msg' => $this->message, 'key' => $this->iosKey);
					$this->iosReturn = ($this->iosReturn && $this->sendMessageToIos($params));
					$this->reachedUsers=array_merge($this->reachedUsers, $this->iosSend);
					$this->iosSend = array();
				});
							
				$windowsPhoneData = RegIds::select('phoneId')->whereSystem('winPhone')->chunk(1000, function($users){
					foreach($users as $user){
						array_push($this->windowsPhoneSend,$user->phoneId);
					}
					$params = array('phoneId' => $this->windowsPhoneSend, 'msg' => $this->message,'key' => $this->winPhoneKey);
					$this->windowsPhoneReturn = ($this->windowsPhoneReturn && $this->sendMessageToWindowsPhone($params));
					$this->reachedUsers=array_merge($this->reachedUsers, $this->windowsPhoneSend);
					$this->iosSend = array();
				});
				break;
			case 'random':
				$userData = RegIds::select('*')->orderBy(DB::raw('RAND()'))->first();
				$params = array('phoneId' => array($userData->phoneId), 'msg' => $message);
				array_push($this->reachedUsers, $userData->phoneId);
				break;
			case 'oneUser':
				$userId = $request->input('userId');
				$userData = RegIds::whereId($userId)->first();
				$params = array('phoneId' => array($userData->phoneId), 'msg' => $message);
				array_push($this->reachedUsers, $userData->phoneId);
				break;	
			case 'android':
				$androidUsersData = RegIds::select('phoneId')->whereSystem('android')->chunk(1000, function($users){
					foreach($users as $user){
						array_push($this->androidSend,$user->phoneId);
					}
					$params = array('phoneId' => $this->androidSend, 'msg' => $this->message, 'key' => $this->androidKey);
					$this->androidReturn = ($this->androidReturn && $this->sendMessageToAndroid($params));
					$this->reachedUsers=array_merge($this->reachedUsers, $this->androidSend);
					$this->androidSend = array();
				});
				break;
			case 'ios':
				$iosUsersData = RegIds::select('phoneId')->whereSystem('ios')->chunk(1000, function($users){
					foreach($users as $user){
						array_push($this->iosSend,$user->phoneId);
					}
					$params = array('phoneId' => $this->iosSend, 'msg' => $this->message, 'key' => $this->iosKey);
					$this->iosReturn = ($this->iosReturn && $this->sendMessageToIos($params));
					$this->reachedUsers=array_merge($this->reachedUsers, $this->iosSend);
					$this->iosSend = array();
				});
				break;
			case 'winPhone':
				$windowsPhoneData = RegIds::select('phoneId')->whereSystem('winPhone')->chunk(1000, function($users){
					foreach($users as $user){
						array_push($this->windowsPhoneSend,$user->phoneId);
					}
					$params = array('phoneId' => $this->windowsPhoneSend, 'msg' => $this->message,'key' => $this->winPhoneKey);
					$this->windowsPhoneReturn = ($this->windowsPhoneReturn && $this->sendMessageToWindowsPhone($params));
					$this->reachedUsers=array_merge($this->reachedUser, $this->windowsPhoneSend);
					$this->windowsPhoneSend = array();
				});
				break;		
			default:
				break;
		}
		
		/*
		 * Save the message id and the users id into a relational
		 * table
		 * */
		if($this->relateUsersToMessages($this->reachedUsers,$savedMessage->id))
			return redirect('/message-sent/ok');
		else
			return redirect('/message-sent/erro');
    }
    
    
	/*
	 * Save the $message into DB Table
	 * 
	 * name: saveMessage
	 * @param text $message
	 * 
	 * @return Response DB return
	 */
    public function saveMessage($message){
		return Messages::create(['message' => $message]); 
	}
	
	
	/*
	 * name: relateUsersToMessages
	 * @param string $user
	 * @param int $messageID
	 * 
	 * @return bool
	 */
	public function relateUsersToMessages($users, $messageID){
		foreach($users as $user){
			$registerData = RegIds::select('id')->where('phoneId',$user)->first();
			MessagesToPhones::create(['idRegister' => (int)$registerData->id, 'idMessage' => $messageID]);
		}
		return true;
	}
}
