<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Validator;

class ProductController extends Controller
{
    public $successStatus = 200;
	public $data = [
		"status" => 0,
		"data" => [],
	];
    public function all(Request $request){
    	$validator = Validator::make($request->all(), [ 
            'category_id' => ['required',"numeric"]
        ]);
        if ($validator->fails()) { 
            $this->data['error'] =$validator->errors();
            return response()->json($this->data, 401);
        }

        $this->data['data'] = Category::with([
        	"products" => function($query){
        		$query->with("images");
        	}
        ])->where("id",$request->category_id)->get();
    	$this->data['status'] = 1;
    	return response()->json($this->data, $this->successStatus); 	
    }

    public function search_product(Request $request){
        $validator = Validator::make($request->all(), [ 
            'product_name' => ['required']
        ]);
        if ($validator->fails()) { 
            $this->data['error'] =$validator->errors();
            return response()->json($this->data, 401);
        }

        $this->data['data'] = Product::with(["images","categories"])->where("name",'LIKE',"%".$request->product_name."%")->get();
        $this->data['status'] = 1;
        return response()->json($this->data, $this->successStatus);     
    }

    public function get_detail($id){
        if (isset($id)) {
            $product = Product::with(["images","categories"])->where("id",$id)->first();;
            $this->data['data'] = empty($product) ? [] : $product;
            $this->data['status'] = 1;    
        }        
        return response()->json($this->data, $this->successStatus);     
    }
}