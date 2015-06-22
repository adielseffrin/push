<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
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
		
		$totalDevices = RegIds::all()->count();
		$androidDevices = RegIds::select('id')->whereSystem('android')->count();
		$iosDevices = RegIds::select('id')->whereSystem('ios')->count();
		$winPhoneDevices = RegIds::select('id')->whereSystem('winPhone')->count();
		
		return view('phone.index', compact('systems','phoneId','totalDevices','androidDevices','iosDevices','winPhoneDevices'));
	}
	
 /* 
     * register a new phoneId from a Phone request in DB
     * name: register
     * @param array $params
     * @ $params["system"] : android, ios or winPhone 
     * @ $params["appId"] 
     * @ $params['email'] : the email provided by user 
     * 
     * @return response json
     **/ 
    public function register(RegisterPhoneRequest $request){ 
       
		try{      
			$registration = RegIds::create($request->all());
			$statusCode = 200;
			$response = ['registration' => [
						'id' => (int)$registration->id,
						'phoneId' => $registration->phoneId,
						'email' => $registration->email,
						'system' => $registration->system
						]];
		}catch(Exception $e){
			$statusCode = 404;
			$response = [
				'error' => 'device not registered',
				'exception' => $e
				];
		}finally{
			//return to visualize
			//$systems = ['android' => 'Android', 'ios' => 'iOS', 'winPhone' => 'Windows Phone'];
            //return view('phone.index',compact('systems'))->with('response',Response::json($response,$statusCode));
            
            //rest return method
            //return Response::json($response,$statusCode);
			
			//simple return
			return redirect('/simulator')->with('response',Response::json($response,$statusCode));
		}
		
		
    }
    
    public function fetchDevice($system = 'all'){

		try{ 
			if($system == 'all')
				$devices = RegIds::get();
			else
				$devices = RegIds::select('*')->whereSystem($system)->get();
			
			$statusCode = 200;
			$response = [
				'devices' => [],
			];
			
			foreach($devices as $device){
				$response['devices'][] = [
					'id' => $device->id,
					'phoneId' => $device->phoneId,
					'system' => $device->system,
					'email' => $device->email,
					'created_at' => $device->created_at
				];
				
			}
			
		}catch(Exception $e){
			$statusCode = 404;
			$response = [
				'error' => 'Erro fetching registered devices',
				'exception' => $e
				];
		}finally{
			return redirect('/simulator')->with('response',Response::json($response,$statusCode));
			
			//rest return method
            //return Response::json($response,$statusCode);
			
		}
		
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
