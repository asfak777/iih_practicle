<!-- create customer modal -->
<div id="modal_add_table" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Table</h4>
            </div>
            <form method="POST" id="table_add_form" onsubmit="return false">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Table Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control alphanumeric" name="table_name" id="table_name">
                        </div>
                    </div>                
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Create Table</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- /create customer modal -->