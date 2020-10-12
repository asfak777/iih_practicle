@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('/public/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $title }} - <a href="javascript:void(0)" style="color: red" id="add_new_customer">Create New Table</a></div>

                <div class="card-body">
                    <table class="table col-md-12" id="data_table">
                        <thead>
                            <tr>    
                                <th width="20%">Table Name</th>
                                <th width="400%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($records))
                            @foreach($records as $key=>$table)

                            <?php
                            $database = "Tables_in_project2"; 
                            $table_name = $table->$database;
                            $system_tables = ['users','password_resets','oauth_refresh_tokens','oauth_personal_access_clients','oauth_clients','oauth_auth_codes','oauth_access_tokens','migrations','failed_jobs'];
                            if(!in_array($table_name, $system_tables)){
                            ?>
                                <tr>
                                    <td>
                                        {{$table_name}}
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" data-table_name="{{$table_name}}" title="Edit" class="btn btn-primary edit_table">Edit</a>
                                        <a href="javascript:void(0)" data-table_name="{{$table_name}}" title="Edit Columns" class="btn btn-success edit_columns">Edit Columns</a>
                                        <a href="javascript:void(0)" data-table_name="{{$table_name}}" title="Delete" class="btn btn-danger delete_table">Delete</a>
                                    </td>
                                </tr>                                
                            <?php } ?>
                            @endforeach                            
                            @endif                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- create customer modal -->
@include('customer/modal/add_modal')

<!-- edit customer modal -->
@include('customer/modal/edit_modal')

<!-- edit columns modal -->
@include('customer/modal/edit_columns_modal')

<script src="{{ asset('/public/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/public/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/public/js/customer.js') }}"></script>
@endsection