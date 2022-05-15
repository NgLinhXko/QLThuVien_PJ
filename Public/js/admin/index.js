
$(document).ready(function () {
    // alert('123')
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    url = "http://localhost:88/QLThuVien_PJ/index.php?controller=admin&action="
    let action = "",
        table = "";
    this_page = 1;
    // click quản lý
    $('.quanly').click(function () {
        table = $(this).attr("table");
        action = "get_data";

        load_data(action, table)
    })
    //click thêm thể loại , form hiện lân , nhấn save
    $('.btn_add_suces').click(function (dt) {
        if (table == "categories") {

            form = new FormData(form_add_cate)
            add(form)
        }

        if (table == "books") {
            form = new FormData(form_add_book)
            add(form)
        }
        if (table == "users") {
            form = new FormData(form_add_user)
            add(form)
        }

        // alert(name_form)
    })
    $(document).on("click", '.btn_delete', function () {
        action = "get_data";
        if (table == "categories") {
            $('#delete_cate').modal('show')
            id = $(this).attr("id_get")
            $('#btn_delete_cate').click(function (dt) {
                delete_dt(table, id)
            })
        }
        if (table == "books") {
            $('#delete_book').modal('show')
            id = $(this).attr("id_get")
            $('#btn_delete_book').click(function (dt) {
                delete_dt(table, id)
            })
        }
        if (table == "users") {
            $('#delete_user').modal('show')
            id = $(this).attr("id_get")
            $('#btn_delete_user').click(function (dt) {
                delete_dt(table, id)
            })
        }


    })
    //loadupdate
    $(document).on("click", '.btn_update1', function () {
        if (table == "categories") {
            $('#update_cate').modal('show')
            id = $(this).attr("id_get")
            load_update(table, id)
        }
        if (table == "books") {
            $('#update_book').modal('show')
            id = $(this).attr("id_get")
            load_update2(table, id)
        }
        if (table == "users") {
            $('#update_user').modal('show')
            id = $(this).attr("id_get")
            load_update3(table, id)
        }
    })
    //update
    $('.btn-updatee').click(function (dt) {
        if (table == "categories") {
            form = new FormData(form_update_cate)
            update(form)

        }
        if (table == "books") {
            form = new FormData(form_update_book)
            update(form)

        }
        if (table == "users") {
            form = new FormData(form_update_user)
            update(form)

        }
    })
    //search
    $(document).on("click", '.btn_search', function () {
        // alert("ok")
        this_page = 1;
        if ($('#txt_search').val() != "") {
            if (table == "categories") {
                var txt_search = $('#txt_search').val();
                search_fc(table, txt_search, this_page)
            }
            if (table == "books") {
                var txt_search = $('#txt_search').val();
                search_fc(table, txt_search, this_page)
            }
            if (table == "users") {
                var txt_search = $('#txt_search').val();
                search_fc(table, txt_search, this_page)
            }

        } else {
            alert("Mời nhập thông tin!")
        }

    })
    //click chuyển trang
    $(document).on("click", ".page-item", function () {
        this_page = $(this).attr("this_page");
        status = $('#check_all').attr("status");
        if ($(this).hasClass("disabled")) {

        } else {
            $('html, body').animate({
                scrollTop: $("thead").offset().top
            }, 500);
            if (status == "NoSearch") {
                load_data(action, table, this_page)
            } else {
                search_fc(table, status, this_page)
            }
        }


    })
    
    $(document).on("mouseover",'tr',function(){
        $('tr').removeClass("table-info")
        $(this).addClass("table-info")
    })
   
    //function loadupdate
    function load_update(table, id) {
        $.ajax({
            url: url + "load_update",
            method: 'post',
            data: {
                table: table,
                id: id,
            },
            dataType: 'json',
            success: function (data) {
                $('#txtIdTL').val(data[0]['id_cate']);
                $('#txtTL').val(data[0]['name_cate']);
            },
        })
    }
    $('#txtTLoai_a').keyup(function () {
        value_cate = $(this).val();
        check_cate_bl = check_cate(value_cate)
        if (check_cate_bl = true) {
            $("#add_cate").prop("disabled", false)
        }
        if (check_cate_bl == false) {
            $("#add_cate").attr("disabled", true)
        }


    })

    function check_cate(value_cate) {
        check_cate_bl = true;
        $.ajax({
            url: url + "check_name_cate",
            method: 'post',
            data: {
                table: table,
                name_cate: value_cate,
            },
            success: function (dt) {
                if (dt == 0) {
                    $('#message_cate_err').html("")
                    check_cate_bl = true;

                } else {
                    $('#message_cate_err').html("Thể loại này đã tồn tại !")
                    check_cate_bl = false;
                }

            }
        })
        return check_cate_bl;
    }
    //function loadupdate book
    function load_update2(table, id) {
        $.ajax({
            url: url + "load_update",
            method: 'post',
            data: {
                table: table,
                id: id,
            },
            dataType: 'json',
            success: function (data) {
                $('#id_b1').val(data[0]['id_b']);
                $('#name_b1').val(data[0]['name_b']);
                $('#id_cate').val(data[0]['id_cate']);
                $('#price_b1').val(data[0]['price_b']);
                $('#nxb_b1').val(data[0]['nxb_b']);
                $('#page_b1').val(data[0]['page_b']);
                $('#quantity_b1').val(data[0]['quantity_b']);
                $('#des_b1').val(data[0]['des_b']);
            },
        })
    }
    //function loadupdate user
    function load_update3(table, id) {
        $.ajax({
            url: url + "load_update",
            method: 'post',
            data: {
                table: table,
                id: id,
            },
            dataType: 'json',
            success: function (data) {
                $('#id_u1').val(data[0]['id_u']);
                $('#name_u1').val(data[0]['name_u']);
                $('#address_u1').val(data[0]['address_u']);
                $('#phone_u1').val(data[0]['phone_u']);
                $('#email_u1').val(data[0]['email_u']);
                $('#money1').val(data[0]['money']);
                $('#avatar_u1').val(data[0]['avatar_u']);
            },
        })
    }


    function update(form) {
        check_form = true;
        for (var value of form.values()) {
            console.log(value);
            if (value == "") {
                check_form = false;
            }
        }
        if (check_form == true) {
            $.ajax({
                url: url + "update_all",
                method: "POST",
                data: form,
                mimeType: "multipart/form-data",
                processData: false,
                contentType: false,
                success: function (dt) {
                    load_data(action, table)
                    $('#msg_modal').modal('show')
                    $('#text_msg').html(dt)
                    setTimeout(function () {
                        $('#msg_modal').modal('hide')
                    }, 3000)
                    $('.update').modal('hide')

                }
            })
        }

    }


    function search_fc(table, data, this_page) {
        $.ajax({
            url: url + "search_all",
            method: "POST",
            data: {
                table: table,
                this_page: this_page,
                data: data,
            },
            success: function (dt) {
                $('#data').html(dt)
            }
        })
    }
    //delete data 
    function delete_dt(table, id) {
        $.ajax({
            url: url + "delete_all",
            method: "POST",
            data: {
                table: table,
                id: id,
            },
            success: function (dt) {
                load_data(action, table)
                $('#msg_modal').modal('show')
                $('#text_msg').html(dt)
                setTimeout(function () {
                    $('#msg_modal').modal('hide')
                }, 3000)
                $('.delete').modal('hide');
            }
        })
    }
    //add data 
    function add(form) {
        check_form = true;
        for (var value of form.values()) {
            console.log(value);
            if (value == "") {
                check_form = false;
            }
        }
        if (check_form == true) {
            $.ajax({
                url: url + "add_all",
                method: "POST",
                data: form,
                mimeType: "multipart/form-data",
                processData: false,
                contentType: false,
                success: function (dt) {
                    load_data(action, table)
                    $('#msg_modal').modal('show')
                    $('#text_msg').html(dt)
                    setTimeout(function () {
                        $('#msg_modal').modal('hide')
                    }, 3000)
                    $('.add').modal('hide')
                    // console.log(dt)
                }
            })
        }


    }
    //load bảng data
    function load_data(action, table, this_page) {
        $.ajax({
            url: url + action,
            method: "POST",
            data: {
                table: table,
                this_page: this_page
            },
            success: function (dt) {
                $('#data').hide().html(dt).fadeIn("slow")

            }
        })


    }
})