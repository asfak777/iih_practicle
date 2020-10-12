<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;


class UserController extends Controller
{
	public $successStatus = 200;
	public $data = [
		"status" => 0,
		"data" => [],
	];
	public function login(Request $request){ 
        $validator = Validator::make($request->all(), [ 
            // 'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if ($validator->fails()) { 
            $this->data['error'] =$validator->errors();
            return response()->json($this->data, 401);
        }
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')]) || Auth::attempt(['phone' => request('phone'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $this->data['token'] =  $user->createToken('MyApp')->accessToken; 
            $this->data['data'] = $user;
            $this->data['status'] = 1;
            return response()->json($this->data, $this->successStatus); 
        }else{ 
        	$this->data['error'] ="Please enter correct email address or password.";
            return response()->json($this->data, 401); 
        }
    }

    public function register(Request $request){ 
    	$validator = Validator::make($request->all(), [ 
    		'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'phone' => ['required', 'digits:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) { 
            $this->data['error'] =$validator->errors();
        	return response()->json($this->data, 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $success['token'] =  $user->createToken('MyApp')->accessToken; 
        $success['first_name'] =  $user->first_name;
        $success['last_name'] =  $user->last_name;
        $success['email'] =  $user->email;
        $success['phone'] =  $user->phone;
        return response()->json(['success'=>$success], $this->successStatus); 
    }

    public function details(){ 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 
}
