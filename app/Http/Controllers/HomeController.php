<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\RegIds;
use App\MessagesToPhones;
use App\Messages;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
		$totalDevices = RegIds::select('id')->count();
		
		$lastMessageId = MessagesToPhones::select('idMessage')
								->orderBy('sent_at', 'desc')
								->first();
		$lastMessageId = $lastMessageId->idMessage;
		$lastMessage = Messages::select('message')->whereId($lastMessageId)->first();
		$lastMessage = $lastMessage->message;
		
		$totalMessages = Messages::select('id')->count(); 
		
		return view('home', compact('totalDevices','lastMessage','totalMessages'));
    }

    /**
     * Show the form for creating a new messages.
     *
     * @return Response
     */
    public function sendMessage()
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
        
        
        return view('sendMessage', compact('deviceNames', 'users'));
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
    
    /**
     * Send de push message received by the post form
     *
     * @return Response
     */
    public function sendPush(){
			return 'it\'s Time!';
	}


	public function sentMessages(){
			return view('sentMessages');
	}
	
	public function configs(){
			return 'it\'s Time!';
	}
	
}
