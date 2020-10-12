<input type="hidden" name="edit_table_name" id="edit_table_name" value="{{$table_name}}">
<table class="table">
    <thead>
        <tr>
            <th>Data Type</th>
            <th>Field Name</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($data))
        @foreach($data as $key=>$value)
        <tr class="tr_{{$key}}">
            <td>
                <select class="form-control column_type_{{$key}}" name="column_type[]">
                    @if(!empty($custom_field))
                    @foreach($custom_field as $a)
                    <option value="{{$a['id']}}" @if($a['compare_field'] == $value->Type) selected @endif>{{$a['type']}}</option>
                    @endforeach
                    @endif
                </select>
            </td>
            <td>
                <input type="text" class="form-control column_name_{{$key}}" name="column_name[]" value="{{$value->Field}}">
            </td>
            <td>
                <button type="button" class="btn btn-danger delete_column delete_column_{{$key}}" data-table_name="{{$table_name}}" data-column_name="{{$value->Field}}">X</button>
                <input type="hidden" class="original_column_name_{{$key}}" name="original_column_name[]" value="{{$value->Field}}">
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

<table class="table">
    <tbody>
        <tr>
            <td>
                <select class="form-control new_column_type" name="new_column_type" id="new_column_type">
                    @if(!empty($custom_field))
                    @foreach($custom_field as $a)
                    <option value="{{$a['id']}}">{{$a['type']}}</option>
                    @endforeach
                    @endif
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="new_column_name" id="new_column_name">
            </td>
            <td>
                <button type="button" class="btn btn-success add_new_column" data-table_name="{{$table_name}}">Add New</button>
            </td>
        </tr>
    </tbody>
</table>

<div class="modal-footer">
    <button type="button" class="btn btn-success update_column">Update</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>