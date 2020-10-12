<?php
namespace App\Http\Controllers;
use Auth,DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class TableController extends Controller{
    
    public function __construct(){
    	$this->data['title'] = "Table";
        $this->data['records'] = [];
    }

    public function index(){
        $tables = DB::select('SHOW TABLES');
        $this->data['records'] = $tables;
    	return view('tables.index', $this->data);
    }
}
