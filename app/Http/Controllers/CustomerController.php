<?php
namespace App\Http\Controllers;
use Auth,DB;
use Illuminate\Http\Request;
use \App\Customer;
use Carbon\Carbon;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CustomerController extends Controller{
    
    public function __construct(){
    	$this->data['title'] = "Customers";
    }

    public function index(){
        // $table_name='abc';
        // $fields = [
        //             ['name' => 'field_1', 'type' => 'string'],
        //             ['name' => 'field_2', 'type' => 'text'],
        //             ['name' => 'field_3', 'type' => 'integer'],
        //             ['name' => 'field_4', 'type' => 'longText']
        //         ];


        // if (!Schema::hasTable($table_name)) {
        //     Schema::create($table_name, function (Blueprint $table) use ($fields, $table_name) {
        //         $table->increments('id');
        //         if (count($fields) > 0) {
        //             foreach ($fields as $field) {
        //                 $table->{$field['type']}($field['name']);
        //             }
        //         }
        //         $table->timestamps();
        //     });
 
        //     return response()->json(['message' => 'Given table has been successfully created!'], 200);
        // }

    	return view('customer.index', $this->data);
    }

    //customer listing
    public function getListing(Request $request) {
        $auth = Auth::user();
        $page_length = $request->length;
        $search_text = $request->search['value'];
        $offset = $request->start;

        $data = [];
        $list_data = '';
        $list_data_count = 0;
        $order_column = $request->order[0]['column'];
        $order_by = $request->order[0]['dir'];

        $prescription_query = Customer::where("id", "<>", 0);

        if (!empty($search_text)) {
            $split_array = explode(' ', $search_text);
            $prescription_query->where(function($q) use($split_array) {
                foreach ($split_array as $txt) {
                    $q->orWhere('first_name', 'like', $txt . '%');
                    $q->orWhere('last_name', 'like', $txt . '%');
                    $q->orWhere('unique_random_num', 'like', $txt . '%');
                    $q->orWhere('email', 'like', $txt . '%');
                    $q->orWhere('country_code', 'like', $txt . '%');
                    $q->orWhere('phone_number', 'like', $txt . '%');
                }
            });
        }
        if ($order_column == 0) {
            $prescription_query->orderBy('first_name', $order_by);
        } else if ($order_column == 1) {
            $prescription_query->orderBy('unique_random_num', $order_by);
        } else if ($order_column == 2) {
        	$prescription_query->orderBy('email', $order_by);
        } else if ($order_column == 3) {
        	$prescription_query->orderBy('country_code', $order_by);
        }

        $query = clone $prescription_query;
        $query->offset($offset)->limit($page_length);
        $list_data = $query->get();
        $list_data_count = $prescription_query->get()->count();

        foreach ($list_data as $key => $val) {
            $action = '';
            $action .= '<a href="javascript:void(0)" data-id="'.$val->id.'" title="Edit" class="btn btn-primary edit_customer">Edit</a>';
            $action .= '&nbsp;<a href="javascript:void(0)" data-id="'.$val->id.'" title="Delete" class="btn btn-danger delete_customer">Delete</a>';

            $data[$key][] = $val->first_name." ".$val->last_name; 
            $data[$key][] = $val->unique_random_num;
            $data[$key][] = $val->email;
            $data[$key][] = $val->country_code." ".$val->phone_number;
            $data[$key][] = $action;
        }
        $return_data['data'] = $data;
        $return_data['recordsTotal'] = $list_data_count;
        $return_data['recordsFiltered'] = $list_data_count;
        $return_data['data_array'] = $list_data;
        return $return_data;
    }

    //create new customer
    public function store(Request $request) {
        $return_data['error'] = 1;
        $return_data['msg'] = "Something went wrong please try again later.";
        $return_data['redirect_url'] = '';

        $auth = Auth::user();
        $table_name = $request->table_name;

        if(!Schema::hasTable($table_name)) {
            Schema::create($table_name, function (Blueprint $table) use ($fields, $table_name) {
                $table->increments('id');
                // if (count($fields) > 0) {
                //     foreach ($fields as $field) {
                //         $table->{$field['type']}($field['name']);
                //     }
                // }
                $table->timestamps();
            });
            
            $return_data['error'] = 0;
            $return_data['msg'] = "Customer has been successfully created.";
        }else{
            $return_data['msg'] = "Table already exist.";
        }
        return $return_data;
    }
	//editcustomer    
    public function edit(Request $request) {
        $return_data['error'] = 1;
        $return_data['msg'] = "Something went wrong please try again later.";
        $return_data['html'] = '';
        $auth = Auth::user();

        $data = Customer::where("id",$request->id)->first();
        if(!empty($data) && $data->count()){
        	$return_data['error'] = 0;
            $return_data['msg'] = "Customer has been successfully created.";
            $return_data['html'] = View('customer.edit', ["data"=>$data])->render();
        }
        return $return_data;
    }

	//update customer    
    public function update(Request $request) {
        $return_data['error'] = 1;
        $return_data['msg'] = "Something went wrong please try again later.";
        $return_data['redirect_url'] = '';

        $auth = Auth::user();

        $duplicate = Customer::where("email",$request->email)->where("id","<>",$request->id)->first();
        if(!empty($duplicate)){
            $return_data['msg'] = "Duplicate customer email address";
            return $return_data;
        }

        $query = Customer::find($request->id);
        if(!empty($query)){
        	$query->first_name = $request->first_name;
	        $query->last_name = $request->last_name;
	        $query->email = $request->email;
	        $query->country_code = $request->phone_code;
	        $query->phone_number = $request->phone_number;
	        $query->updated_at = Carbon::now()->toDateTimeString();

	        if ($query->save()) {
	            $return_data['error'] = 0;
	            $return_data['msg'] = "Customer has been successfully updated.";
	        }
        }
        return $return_data;
    }

    //delete customer
    public function delete(Request $request) {        
        $return_data['error'] = 1;
        $return_data['msg'] = "Something went wrong please try again later.";
        $return_data['html'] = '';
        $auth = Auth::user();

        $is_delete = Customer::where("id",$request->id)->delete();
        if($is_delete){
        	$return_data['error'] = 0;
            $return_data['msg'] = "Customer has been successfully deleted.";
        }
        return $return_data;
    }

    public static function random_strings($length_of_string){
	    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
	    return substr(str_shuffle($str_result), 0, $length_of_string); 
	} 
}
