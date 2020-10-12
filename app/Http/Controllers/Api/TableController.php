<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Validator,DB;

class TableController extends Controller
{
    public $successStatus = 200;
	public $data = [
		"status" => 0,
		"data" => [],
	];

    public $custom_field = [
        ["id"=>0, "type"=>"Int", "laravel_field"=>"integer", "compare_field"=>"int(10) unsigned"],
        ["id"=>1, "type"=>"Varchar", "laravel_field"=>"string", "compare_field"=>"varchar(255)"],
        ["id"=>2, "type"=>"Char", "laravel_field"=>"char", "compare_field"=>"char(255)"],
        ["id"=>3, "type"=>"Date", "laravel_field"=>"date", "compare_field"=>"date"],
    ];

    //create table 
    public function createTable(Request $request){
        $return_data['error'] = 1;
        $return_data['msg'] = "Something went wrong please try again later.";
        $return_data['redirect_url'] = '';
        $table_name = $request->table_name;

        if(!empty($table_name)){
            if(!Schema::hasTable($table_name)) {
                Schema::create($table_name, function (Blueprint $table) use ($table_name) {
                    $table->increments('id');
                });

                $return_data['error'] = 0;
                $return_data['msg'] = "Table has been created successfully.";
                $return_data['redirect_url'] = route('tables.index');
            }else{
                $return_data['msg'] = "Table already exist.";
            }    
        }else{
            $return_data['msg'] = "Table name should not be blank.";
        }        
        return $return_data;
    }

    //update table 
    public function updateTable(Request $request){
        $return_data['error'] = 1;
        $return_data['msg'] = "Something went wrong please try again later.";
        $return_data['redirect_url'] = '';
        $table_name = $request->table_name;
        $old_table_name = $request->old_table_name;

        if(!empty($table_name) && !empty($old_table_name)){

            if($table_name == $old_table_name){
                $return_data['error'] = 0;
                $return_data['msg'] = "Table has been updated successfully.";
                $return_data['redirect_url'] = route('tables.index');
            }

            if(!Schema::hasTable($table_name)) {
                Schema::rename($old_table_name, $table_name);
                $return_data['error'] = 0;
                $return_data['msg'] = "Table has been updated successfully.";
                $return_data['redirect_url'] = route('tables.index');    
            }else{
                $return_data['msg'] = "Table already exist.";
            }            
        }else{
            $return_data['msg'] = "Table name should not be blank.";
        }        
        return $return_data;
    }

    //delete table
    public function deleteTable(Request $request) {        
        $return_data['error'] = 1;
        $return_data['msg'] = "Something went wrong please try again later.";
        $return_data['html'] = '';
        $table_name = $request->table_name;
        
        if(!empty($table_name)){
            Schema::dropIfExists($table_name);
            $return_data['error'] = 0;
            $return_data['msg'] = "Table has been deleted successfully.";
            $return_data['redirect_url'] = route('tables.index');
        }        
        return $return_data;
    }

    //edit table columns
    public function editTableColumns(Request $request) {
        $return_data['error'] = 1;
        $return_data['msg'] = "Something went wrong please try again later.";
        $return_data['html'] = '';
        $table_name = $request->table_name;
        
        if(!empty($table_name)){
            $return_data['error'] = 0;
            $column_data = $this->getTableColumns($table_name);
            $return_data['html'] = $column_data['html'];
        }        
        return $return_data;
    }

    //get table columns
    public function getTableColumns($table_name){
        $return_data['error'] = 1;
        $return_data['msg'] = "Something went wrong please try again later.";
        $return_data['html'] = '';

        if(!empty($table_name)){
            $fields = DB::select('describe '.$table_name);

            if(!empty($fields) && !empty($fields)){

                $return_data['error'] = 0;
                $return_data['msg'] = "Success";

                $para = [];
                $para['data'] = $fields;
                $para['table_name'] = $table_name;
                $para['custom_field'] = $this->custom_field;
                $return_data['html'] = View('tables.edit_columns', $para)->render();

            }
        }
        return $return_data;
    }

    //update table columns
    public function updateTableColumns(Request $request) {

        $return_data['error'] = 1;
        $return_data['msg'] = "Something went wrong please try again later.";
        $return_data['html'] = '';
        $table_name = $request->edit_table_name;
        $column_name_arr = $request->column_name;
        $column_type_arr = $request->column_type;
        $original_column_name_arr = $request->original_column_name;

        if(!empty($table_name) && !empty($column_name_arr) && !empty($original_column_name_arr)){

            if(!empty($column_name_arr)){
                foreach($column_name_arr as $k=>$new_column){
                    $old_column = $original_column_name_arr[$k];
                    $new_column_type = $column_type_arr[$k];
                    $new_column_type = $this->custom_field[$new_column_type]['laravel_field'];

                    //change name
                    Schema::table($table_name, function(Blueprint $table) use($old_column, $new_column) {
                        $table->renameColumn($old_column, $new_column);
                    });

                    //change type
                    Schema::table($table_name, function (Blueprint $table) use($new_column_type, $new_column) {
                        $table->{$new_column_type}($new_column)->change();
                    });
                }

                $fields = DB::select('describe '.$table_name);
                $return_data['error'] = 0;
                $return_data['msg'] = "Column has been successfully updated";

                $para = [];
                $para['data'] = $fields;
                $para['table_name'] = $table_name;
                $para['custom_field'] = $this->custom_field;
                $return_data['html'] = View('tables.edit_columns', $para)->render();
            }
        }        
        return $return_data;
    }

    //store table columns
    public function storeTableColumns(Request $request){

        $return_data['error'] = 1;
        $return_data['msg'] = "Something went wrong please try again later.";
        $return_data['html'] = '';

        $new_column_type = $request->new_column_type;
        $new_column_name = $request->new_column_name;
        $table_name = $request->table_name; 
        $new_column_type = $this->custom_field[$new_column_type]['laravel_field'];

        if(!empty($new_column_type) && !empty($new_column_name) && !empty($table_name)){
            
            if(Schema::hasColumn($table_name, $new_column_name)){                
                $return_data['msg'] = "Column already exist.";
            }else{
                Schema::table($table_name, function($table) use($new_column_type, $new_column_name) {
                    $table->{$new_column_type}($new_column_name);
                });

                $fields = DB::select('describe '.$table_name);
                $return_data['error'] = 0;
                $return_data['msg'] = "Column has been successfully added";

                $para = [];
                $para['data'] = $fields;
                $para['table_name'] = $table_name;
                $para['custom_field'] = $this->custom_field;
                $return_data['html'] = View('tables.edit_columns', $para)->render();
            }            
        }
        return $return_data;
    }

    //delete table columns
    public function deleteTableColumns(Request $request){

        $return_data['error'] = 1;
        $return_data['msg'] = "Something went wrong please try again later.";
        $return_data['html'] = '';

        $table_name = $request->table_name;
        $column_name = $request->column_name;        

        if(!empty($table_name) && !empty($column_name)){
            
            Schema::table($table_name, function($table) use($column_name) {
                $table->dropColumn($column_name);
            });

            $fields = DB::select('describe '.$table_name);
            $return_data['error'] = 0;
            $return_data['msg'] = "Column has been successfully deleted";

            $para = [];
            $para['data'] = $fields;
            $para['table_name'] = $table_name;
            $para['custom_field'] = $this->custom_field;
            $return_data['html'] = View('tables.edit_columns', $para)->render();
        }
        return $return_data;
    }
}