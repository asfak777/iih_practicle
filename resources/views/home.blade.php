@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} </div>

                <div class="card-body">
                    <a href="{{ route('tables.index') }}" data-table_name="aa" title="Edit" class="btn btn-primary edit_table"> Click here to list tables</a>
                    <br/>
                    Practical By : Asfak Malek <br/>
                    Phone : 9723792786 <br/>
                    Phone : asfakmalek58@gmail.com
                </div>
            </div>
        </div>
    </div>
</div>
@endsection