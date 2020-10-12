<div class="modal-body">
    <input type="hidden" name="id" value="{{$data->id}}">
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">First Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="first_name" value="{{$data->first_name}}" id="first_name">
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Last Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="last_name" value="{{$data->last_name}}" id="last_name">
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Email</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="email" value="{{$data->email}}" id="email">
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Country Phone Code</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="phone_code" value="{{$data->country_code}}" id="phone_code">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Phone Number</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="phone_number" value="{{$data->phone_number}}" id="phone_number">
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-success">Update</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>