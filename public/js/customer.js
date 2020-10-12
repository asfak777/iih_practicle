$(document).ready(function () {
    /********** datatable **********/
    var dt_table = $('#data_table').DataTable({
        'pageLength': 10,
        // 'processing': true,
        // 'serverSide': true,
        // "ajax": "tables/listing",
        "order": [[0, "desc"]],
        "sDom": '<"top"fp>t<"bottom"li><"clear">',
    });
    /********** datatable **********/

    /********** add validation **********/
    $('#customer_add_form').validate({
        rules: {
            table_name: {required: true}, 
        },
        messages: {
            table_name: {required: 'Please enter table name'},
        },
        showErrors: function (errorMap, errorList) {
            var error = [];
            $.each(errorMap, function (key, value) {
                error.push(value);
                if (error.length == 1) {
                    $('#' + key).focus();
                }
            });
            if (error.length != 0) {
                $.toast({
                    heading: "Errors",
                    text: error,
                    icon: 'error',
                    hideAfter: 5000,
                    position: 'toast-bottom-right'
                });
            }
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            insertUpdateCustomer("tables/create",formData)
        },
        onkeyup: false,
        focusInvalid: false,
        onfocusout: false,
        onclick: false
    });
    /********** /add validation **********/

    /********** edit validation **********/
    $('#customer_edit_form').validate({
        rules: {
            table_name: {required: true}, 
        },
        messages: {
            table_name: {required: 'Please enter table name'},
        },
        showErrors: function (errorMap, errorList) {
            var error = [];
            $.each(errorMap, function (key, value) {
                error.push(value);
                if (error.length == 1) {
                    $('#' + key).focus();
                }
            });
            if (error.length != 0) {
                $.toast({
                    heading: "Errors",
                    text: error,
                    icon: 'error',
                    hideAfter: 5000,
                    position: 'toast-bottom-right'
                });
            }
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            insertUpdateCustomer("tables/update",formData)
        },
        onkeyup: false,
        focusInvalid: false,
        onfocusout: false,
        onclick: false
    });
    /********** /edit validation **********/
});

//open add new customr popup
$(document).on('click', '#add_new_customer', function (e) {
    $('#customer_add_form')[0].reset();
    $('#modal_add_customer').modal('show');
});

//open edit customr popup
$(document).on('click', '.edit_table', function (e) {
    var table_name = $(this).data('table_name');
    if(table_name){
        $('.edit_table_name').val(table_name);
        $('#modal_edit_customer').modal('show');
    }
});

//delete table
$(document).on('click', '.delete_table', function (e) {
    var table_name = $(this).data('table_name');

    if(table_name){
        var confirm_popup = confirm("Are you sure you wants to delete this record?");
        if (confirm_popup == true) {        
            $.ajax({
                type:'GET',
                url: "api/tables/delete",
                data:{
                    table_name:table_name,
                },
                cache:false,
                dataType:'json',
                beforeSend: function () {
                    $('#LoadingImage').show();
                },
                success:function(result){
                    $('#LoadingImage').hide();
                    if (result.error == 1) {
                        $.toast({
                            heading: "Errors",
                            text: result.msg,
                            icon: 'error',
                            hideAfter: 5000,
                            position: 'toast-bottom-right'
                        });
                    } else {
                        $.toast({
                            heading: "Success",
                            text: result.msg,
                            icon: 'success',
                            hideAfter: 5000,
                            position: 'toast-bottom-right'
                        });

                        if(result.redirect_url) {
                            window.location.replace(result.redirect_url);
                        }
                    }
                }
            });
        }
    }
});

//insert update customer record
function insertUpdateCustomer(route,formData){
    if(formData && route){
        $.ajax({
            type:'POST',
            url: "api/"+route,
            data:formData,
            cache:false,
            dataType:'json',
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#LoadingImage').show();
            },
            success:function(result){
                $('#LoadingImage').hide();
                if (result.error == 1) {
                    $.toast({
                        heading: "Errors",
                        text: result.msg,
                        icon: 'error',
                        hideAfter: 5000,
                        position: 'toast-bottom-right'
                    });
                } else {
                    $.toast({
                        heading: "Success",
                        text: result.msg,
                        icon: 'success',
                        hideAfter: 5000,
                        position: 'toast-bottom-right'
                    });
                    $('#modal_add_customer').modal('hide');
                    $('#modal_edit_customer').modal('hide');

                    if(result.redirect_url) {
                        window.location.replace(result.redirect_url);
                    }
                }
            }
        });
    }
}

//open edit customr popup
$(document).on('click', '.edit_columns', function (e) {
    var table_name = $(this).data('table_name');
    if(table_name){
        $.ajax({
            type:'GET',
            url: "api/tables-columns/edit",
            data:{
                table_name:table_name,
            },
            cache:false,
            dataType:'json',
            beforeSend: function () {
                $('#LoadingImage').show();
            },
            success:function(result){
                $('#LoadingImage').hide();
                if (result.error == 1) {
                    $.toast({
                        heading: "Errors",
                        text: result.msg,
                        icon: 'error',
                        hideAfter: 5000,
                        position: 'toast-bottom-right'
                    });
                } else {
                    $('#modal_edit_column_customer').modal('show');
                    $('#append_edit_form').html(result.html);
                }
            }
        });
    }
});


//update column
$(document).on('click', '.update_column', function (e) {

    var form = $('#customer_edit_column_form')[0];
    var formData = new FormData(form);

    if(formData){
        $.ajax({
            type:'POST',
            url: "api/tables-columns/update",
            data:formData,
            cache:false,
            dataType:'json',
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#LoadingImage').show();
            },
            success:function(result){
                $('#LoadingImage').hide();
                if (result.error == 1) {
                    $.toast({
                        heading: "Errors",
                        text: result.msg,
                        icon: 'error',
                        hideAfter: 5000,
                        position: 'toast-bottom-right'
                    });
                } else {
                    $.toast({
                        heading: "Success",
                        text: result.msg,
                        icon: 'success',
                        hideAfter: 5000,
                        position: 'toast-bottom-right'
                    });
                    $('#modal_add_customer').modal('hide');
                    $('#modal_edit_customer').modal('hide');

                    if(result.redirect_url) {
                        window.location.replace(result.redirect_url);
                    }
                }
            }
        });
    }
});

//add new column
$(document).on('click', '.add_new_column', function (e) {

    var new_column_type = $('#new_column_type').val();
    var new_column_name = $('#new_column_name').val();
    var table_name = $('#edit_table_name').val();

    if(new_column_type && new_column_name && table_name){
        $.ajax({
            type:'POST',
            url: "api/tables-columns/store",
            data:{
                new_column_type:new_column_type,
                new_column_name:new_column_name,
                table_name:table_name
            },
            cache:false,
            dataType:'json',
            beforeSend: function () {
                $('#LoadingImage').show();
            },
            success:function(result){
                $('#LoadingImage').hide();
                if (result.error == 1) {
                    $.toast({
                        heading: "Errors",
                        text: result.msg,
                        icon: 'error',
                        hideAfter: 5000,
                        position: 'toast-bottom-right'
                    });
                } else {
                    $.toast({
                        heading: "Success",
                        text: result.msg,
                        icon: 'success',
                        hideAfter: 5000,
                        position: 'toast-bottom-right'
                    });

                    if(result.html){
                        $('#append_edit_form').html(result.html);    
                    }                    

                    // if(result.redirect_url) {
                    //     window.location.replace(result.redirect_url);
                    // }
                }
            }
        });
    }
});

//delete column
$(document).on('click', '.delete_column', function (e) {
    var table_name = $(this).data('table_name');
    var column_name = $(this).data('column_name');

    if(table_name && column_name){
        var confirm_popup = confirm("Are you sure you wants to delete this record?");
        if (confirm_popup == true) {        
            $.ajax({
                type:'POST',
                url: "api/tables-columns/delete",
                data:{
                    table_name:table_name,
                    column_name:column_name,
                },
                cache:false,
                dataType:'json',
                beforeSend: function () {
                    $('#LoadingImage').show();
                },
                success:function(result){
                    $('#LoadingImage').hide();
                    if (result.error == 1) {
                        $.toast({
                            heading: "Errors",
                            text: result.msg,
                            icon: 'error',
                            hideAfter: 5000,
                            position: 'toast-bottom-right'
                        });
                    } else {
                        $.toast({
                            heading: "Success",
                            text: result.msg,
                            icon: 'success',
                            hideAfter: 5000,
                            position: 'toast-bottom-right'
                        });

                        if(result.html){
                            $('#append_edit_form').html(result.html);    
                        }
                    }
                }
            });
        }
    }
});
