<!-- edit customer modal -->
<div id="modal_edit_column_customer" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Columns</h4>
            </div>
            <form method="POST" id="customer_edit_column_form" onsubmit="return false">
                @csrf
                <div id="append_edit_form"></div>
            </form>
        </div>
    </div>
</div>
<!-- /edit customer modal -->