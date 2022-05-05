$(document).ready(function() {

    url = "";
    load_update();
    update();
    delete_cate();
    Insert_cate();
    
    $(document).on('click', '#qlTheLoai', function() {
        url = "http://localhost:88/QLTV/index.php?controller=categories";
        action = "get_cate";
        load_data(action);
    })
})
    function load_data(action) {
        $.ajax({
            url: url + "&action=" + action,
            method: "POST",
            data: {

            },
            success: function(dt) {
                $('#data').html(dt)
            }
        })
    }
    function Insert_cate()
    {
        $(document).on('click', '#btn_save1', function()  {
             action = "store";
        var name_cate = $('#txtTLoai_a').val();
      
            $.ajax({
                url: url + "&action=" + action,
                method: 'post',
                data: {
                    name_cate: name_cate
                },
                success: function(data) {
                    $('#message').html(data);
                    $('#add-cate').modal('show');
                    $('form').trigger('reset');
                }
            })
        
    })
    $(document).on('click', '#btn_close', function() {
        $('form').trigger('reset');
        $('#message').html('');
    })
}
//xóa
function delete_cate()
{
    $(document).on('click','#btn_delete',function()
    {
        var id_cate = $(this).attr("id_get");
        $('#delete_cate').modal('show');

        $(document).on('click','#btn_delete_cate',function()
        {
            action = "delete";
            $.ajax(
                {
                    url: url + "&action=" + action + "&id=" + id_cate,
                    method: 'post',
                    data:{
                        id_cate: id_cate
                    },
                    success: function(data)
                    {
                        $('#delete-message1').html(data);
                        $('#delete_cate').modal('show');
                    }
                })
        })
    })
}
//update
function load_update(){
    $(document).on('click', '#btn_update1', function() {
        var id_cate = $(this).attr("id_get");
        $('#update_cate').modal('show');
        action = "load_update";
        $.ajax({
            url: url + "&action=" + action + "&id=" + id_cate,
            method: 'post',
            data: {
                id_cate: id_cate
            },
            dataType: 'json',
            success: function(data) {
                $('#txtIdTL').val(data[0]['id_cate']);
                $('#txtTL').val(data[0]['name_cate']);
    
            },

    
        })
    })
}
function update(){
    $(document).on('click', '#btn_update', function() {
        var id_cate = $('#txtIdTL').val();
        var name_cate = $('#txtTL').val();
        if (name_cate == "") {
            $('#up-message').html('please Fill in the Blanks');
            $('#update_cate').modal('show');
        } else {
            $.ajax({
                url: + "&action=" + action + "&id=" + id_cate,
                method: 'post',
                data: {
                    id_cate: id_cate,
                    name_cate: name_cate
                },
                success: function(data) {
                    $('#up-message').html(data);
                    $('#update_cate').modal('show');
    
                }
            })
        }
    })
}
