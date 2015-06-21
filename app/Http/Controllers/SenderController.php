<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RegIds;
use App\Messages;
use DB;

class SenderController extends Controller
{
	 private $androidSend = array();
	 private $androidReturn = true;
     private $iosSend = array();
     private $iosReturn = true;
     private $windowsPhoneSend = array();
     private $windowsPhoneReturn = true;
     private $message;
     
     
   /* 
     * regist phone Id from Phone to Mysql via controllers 
     * Look a tableSchema at the bottom 
     * @ $params["appType"] : android or ios.. 
     * @ $params["appId"] : //APA91bGEGu5NSyYDYp5OMO4mZ0j1n2DznGARaNFVcCYfLHvHat..... or 6b1653ad818a89fc6937f5067a9b372aec79edeb9504d6ef.... 
     **/ 
    public function register(Request $request){ 
             
       $registration = RegIds::create($request->all());
       
       return 1;
    }
    
     /** 
     * For Android GCM 
     * $params["msg"] : Expected Message For GCM 
     */ 
    private function sendMessageToAndroid($params) { 
		// Sending messages to Android Devices
		return true;
	} 
     
    /** 
     * For IOS APNS 
     * $params["msg"] : Expected Message For APNS 
     */ 
    private function sendMessageToIos($params) { 
		//Sending messages to iOS Devices 
		return true;
    }
             
    /** 
     * For WP Service 
     * $params["msg"] : Expected Message For WPS
     */ 
    private function sendMessageToWindowsPhone($params) { 
		//Sending messages to windows Phone Devices
		return true; 
    }
    
     /** 
     * Step 2. 
     * Send message to each phone from web App. 
     * @params : Array() : messages () 
     */ 
    
     
    public function sendPush(Request $request){
		
		$params = array();
		$sendTo = $request->input('sendTo');
		$this->message = $request->input('message');
		
		$this->saveMessage($this->message);
		
		switch ($sendTo){
			case 'allUsers':
				$androidUsersData = RegIds::select('phoneId')->whereSystem('android')->chunk(1000, function($users){
					foreach($users as $user){
						array_push($this->androidSend,$user->phoneId);
					}
					$params = array('phoneId' => $this->androidSend, 'msg' => $this->message, 'system' => 'android');
					$this->androidReturn = ($this->androidReturn && $this->sendMessageToAndroid($params));
					$this->androidSend = array();
				});
			
				$iosUsersData = RegIds::select('phoneId')->whereSystem('ios')->chunk(1000, function($users){
					foreach($users as $user){
						array_push($this->iosSend,$user->phoneId);
					}
					$params = array('phoneId' => $this->iosSend, 'msg' => $this->message, 'system' => 'ios');
					$this->iosReturn = ($this->iosReturn && $this->sendMessageToIos($params));
					$this->iosSend = array();
				});
				
				$windowsPhoneData = RegIds::select('phoneId')->whereSystem('winPhone')->chunk(1000, function($users){
					foreach($users as $user){
						array_push($this->windowsPhoneSend,$user->phoneId);
					}
					$params = array('phoneId' => $this->windowsPhoneSend, 'msg' => $this->message, 'system' => 'winPhone');
					$this->windowsPhoneReturn = ($this->windowsPhoneReturn && $this->sendMessageToWindowsPhone($params));
					$this->iosSend = array();
				});
				break;
			case 'random':
				$userData = RegIds::select('*')->orderBy(DB::raw('RAND()'))->first();
				$params = array('phoneId' => $userData->phoneId, 'msg' => $message, 'system' => $userData->system);
				$userCount = 1;
				break;
			case 'oneUser':
				$userId = $request->input('userId');
				$userData = RegIds::whereId($userId)->first();
				$params = array('phoneId' => $userData->phoneId, 'msg' => $message, 'system' => $userData->system);
				$userCount = 1;
				break;	
			case 'android':
				$androidUsersData = RegIds::select('phoneId')->whereSystem('android')->chunk(1000, function($users){
					foreach($users as $user){
						array_push($this->androidSend,$user->phoneId);
					}
					$params = array('phoneId' => $this->androidSend, 'msg' => $this->message, 'system' => 'android');
					$this->androidReturn = ($this->androidReturn && $this->sendMessageToAndroid($params));
					$this->androidSend = array();
				});
				break;
			case 'ios':
				$iosUsersData = RegIds::select('phoneId')->whereSystem('ios')->chunk(1000, function($users){
					foreach($users as $user){
						array_push($this->iosSend,$user->phoneId);
					}
					$params = array('phoneId' => $this->iosSend, 'msg' => $this->message, 'system' => 'ios');
					$this->iosReturn = ($this->iosReturn && $this->sendMessageToIos($params));
					$this->iosSend = array();
				});
				break;
			case 'winPhone':
				$windowsPhoneData = RegIds::select('phoneId')->whereSystem('winPhone')->chunk(1000, function($users){
					foreach($users as $user){
						array_push($this->windowsPhoneSend,$user->phoneId);
					}
					$params = array('phoneId' => $this->windowsPhoneSend, 'msg' => $this->message, 'system' => 'winPhone');
					$this->windowsPhoneReturn = ($this->windowsPhoneReturn && $this->sendMessageToWindowsPhone($params));
					$this->iosSend = array();
				});
				break;		
			default:
				break;
		}
		
		return redirect('/message-sent/ok');
    }
    
    public function saveMessage($message){
		return Messages::create(['message' => $message]); 
	}
}