<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\RegisterPhoneRequest;

use App\RegIds;
use App\User;

class RegisterController extends Controller
{
     /*
	 * 
	 * name: __construct
	 * @param User model
	 * @return RegisterController object for authenticated users
	 * 
	 */
	public function __construct(User $user)
	{
		$this->middleware('auth');
	}
	
	/*
	 * load thefront of phone simulator
	 * name: index
	 * 
	 * @return view phone/index.blade.php
	 * */
	public function index(){
		$systems = ['android' => 'Android', 'ios' => 'iOS', 'winPhone' => 'Windows Phone'];
		//create an unique phoneId
		$phoneId = $this->generateRandomString().time().$this->generateRandomString();
		
		$androidDevices = RegIds::select('id')->whereSystem('android')->count();
		$iosDevices = RegIds::select('id')->whereSystem('ios')->count();
		$winPhoneDevices = RegIds::select('id')->whereSystem('winPhone')->count();
		
		return view('phone.index', compact('systems','phoneId','androidDevices','iosDevices','winPhoneDevices'));
	}
	
 /* 
     * register a new phoneId from a Phone request in DB
     * name: register
     * @param array $params
     * @ $params["system"] : android, ios or winPhone 
     * @ $params["appId"] 
     * @ $params['email'] : the email provided by user 
     * 
     * @return response redirect /simulator
     **/ 
    public function register(RegisterPhoneRequest $request){ 
             
       $registration = RegIds::create($request->all());
       
       return redirect('/simulator');
    }
	
	
	/*
	 * Generate a random alphanumeric String
	 * name: generateRandomString
	 * @param int $length
	 * 
	 * @return string 
	 */
	private function generateRandomString($length = 10){
		return	$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	}
}
