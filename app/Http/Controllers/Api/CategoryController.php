<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category; 

class CategoryController extends Controller
{
    //
    public $successStatus = 200;
	public $data = [
		"status" => 0,
		"data" => [],
	];

    public function all()
    {
    	$this->data['data'] = Category::where("status","1")->get();
    	$this->data['status'] = 1;
    	return response()->json($this->data, $this->successStatus); 	
    }
}
