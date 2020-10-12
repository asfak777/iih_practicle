<?php
namespace App\Http\Controllers;
use Auth,DB;
use Illuminate\Http\Request;
use \App\Customer;
use Carbon\Carbon;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class TableController extends Controller{
    
    public function __construct(){
    	$this->data['title'] = "Table";
        $this->data['records'] = [];
    }

    public function index(){

        // $input_array=array(
        //     array(
        //       'id' => '1111',
        //       'task' => 'Taks 1',
        //       'date' => '10-08-2020',
        //     ),
        //     array(
        //       'id' => '1112',
        //       'task' => 'Taks 2',
        //       'date' => '10-08-2020',
        //     ),
        //     array(
        //       'id' => '1113',
        //       'task' => 'Taks 3',
        //       'date' => '11-08-2020',
        //     ),
        //     array(
        //       'id' => '1114',
        //       'task' => 'Taks 4',
        //       'date' => '12-08-2020',
        //     ),
        //     array(
        //       'id' => '1115',
        //       'task' => 'Taks 5',
        //       'date' => '12-08-2020',
        //     ),
        //     array(
        //       'id' => '1116',
        //       'task' => 'Taks 6',
        //       'date' => '12-08-2020',
        //     )
        // );

        // echo "<pre>"; print_r($input_array);

        // $final_data = [];
        // if(!empty($input_array)){
        //     foreach($input_array as $key => $value) {
        //         $temp_task = [];
        //         $temp_task["id"] = $value['id'];
        //         $temp_task["task"] = $value['task'];

        //         $final_data[$value['date']]['date'] = $value['date'];
        //         $final_data[$value['date']]['tasks'][] = $temp_task;
        //     }
        // }
        // echo "<pre>"; print_r(array_values($final_data));die;

        Schema::table('category', function(Blueprint $table) {
            $table->renameColumn('var', 'var1');
        });

        // $fields = DB::select('describe category');
        // echo "<pre>";
        // print_r($fields);die;

        $tables = DB::select('SHOW TABLES');
        $this->data['records'] = $tables;

        // print_r($this->data);die;

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
}
