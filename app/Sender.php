<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{
    public $androidAuthKey = 'Android Auth Key Here'; 
    public $iosAuthKeyt = 'iOS Auth Key Here'; 
    public $winPhoneAuthKey = 'Windows Phone Auth Key Here';
    
     /** 
     * For Android GCM 
     * $params["msg"] : Expected Message For GCM 
     */ 
    private function sendMessageToAndroid($registration_id, $params) { 
       // Sending messages to Android Devices 
        
     } 
     
     
    /** 
     * For IOS APNS 
     * $params["msg"] : Expected Message For APNS 
     */ 
    private function sendMessageToIos($registration_id, $params) { 
        
       //Sending messages to iOS Devices 

    }//private function sendMessageIos($registration_id, $msg, $link, $type) { 
           
           
            
    /** 
     * For WP Service 
     * $params["msg"] : Expected Message For WPS
     */ 
    private function sendMessageToWindowsPhone($registration_id, $params) { 
        
       //Sending messages to windows Phone Devices 

    }//private function sendMessageIos($registration_id, $msg, $link, $type) { 
            
        
     /** 
     * Unique method to send message  
     * $params [pushtype, msg, registration_id] 
     */ 
	public function sendMessage($params){ 
           
		//$parm = array("msg"=>$params["msg"]); 
		if($params["registration_id"] && $params["msg"]){ 
		   switch($params["pushtype"]){ 
			   case "android": 
				$this->sendMessageToAndroid($params["registration_id"], $params); 
				break; 
			case "ios": 
				$this->sendMessageToIos($params["registration_id"], $params); 
				break; 
			case "windowsphone": 
				$this->sendMessageToWindowsPhone($params["registration_id"], $params); 
				break; 
		   } 
		} 
	} 
    
   
    /* 
     * Sample For database 
     * regist phone Id from Phone to Mysql via controllers 
     * Look a tableSchema at the bottom 
     * @ $params["appType"] : android or ios.. 
     * @ $params["appId"] : //APA91bGEGu5NSyYDYp5OMO4mZ0j1n2DznGARaNFVcCYfLHvHat..... or 6b1653ad818a89fc6937f5067a9b372aec79edeb9504d6ef.... 
     **/ 
    public function registration($params){ 
        $pushtype = $params["pushtype"]; 
        $idphone = $params["idphone"]; 
        
        print_r($params); 
        //{insert into database} 
        echo json_encode($rtn); 
    } 
     
     
    /** 
     * Step 2. 
     * Send message to each phone from web App. 
     * @params : Array() : messages () 
     */ 
    public function send($params){ 
        //$sql = "select pushtype, idphone from gcmapns "; 
       // $rows = $CI->db->get_rows($sql); 
       //get data from database and save to $rows 
        if(is_array($rows)){ 
            foreach($rows as $key => $val){ 
                switch($val["pushtype"]){ 
                    case "android": 
                        $rtn = $this->sendMessageToAndroid($val["idphone"], $params); 
                        break; 
                    case "ios": 
                        $rtn = $this->sendMessageToIos($val["idphone"], $params); 
                        break; 
					case "windowsPhone": 
                        $rtn = $this->sendMessageToWindowsPhone($val["idphone"], $params); 
                        break; 
                   
                }
            }
        }
    }
}
