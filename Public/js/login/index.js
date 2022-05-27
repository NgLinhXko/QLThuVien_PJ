$(document).ready(function () {
    // alert('123')
    url = "http://localhost:88/QLThuVien_PJ/index.php?"
    check_email = false;
    check_pass = false;
    check_pass_again = false;
    passwd = 1;
    passwd_again = 2;
    $('#btn_login').click(function () {
        $('#modalLogin').modal('show')

    })
    $('#Register').click(function () {
        $('#modalLogin').modal('hide')
        $('#modalResign').modal('show')
    })
    $('.closed').click(function () {
        $('#modal_signup_succes').modal('hide')
    })
    $('#gmail').mouseover(function () {
        $(this).css("color", "rgb(226 201 63)")
    })
    $('#gmail').mouseleave(function () {
        $(this).css("color", "red")
    })
    $('#btn_dangky').click(function () {

        name_u = $('#name_u').val();
        address_u = $('#address_u').val();
        phone_u = $('#phone_u').val();
        email_u = $('#email_u').val();
        // pass_u = $('#pass_u').val();
        // pass_u_again = $('#pass_u_again').val();
        // if (name_u != '' && address_u != "" && phone_u != "" && email_u != "" && pass_u != "" && pass_u_again != "") {
        // 	if (check_email == true && check_pass == true && check_pass_again == true) {
        if (name_u.length > 1 && address_u.length > 9 && phone_u.length > 9 && email_u.length > 14) {
            form = new FormData(formResign)
            // alert('123')
            check_form = true;
            for (var value of form.values()) {

                if (value == "") {
                    check_form = false;
                }

            }
            check_form = validateEmail(email);
            // console.log(check_form)
            if (check_form == true) {
                $.ajax({
                    url: url + "controller=Login&action=addUser",
                    method: "POST",
                    data: form,
                    mimeType: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    success: function (dt) {
                        $('#modalResign').modal('hide')
                        $('#modal_signup_succes').modal('show')
                        $('#formResign').trigger("reset")
                        $('#msgThongBao').html("")
                        $('#msgThongBao_pass').html("")
                        $('#msgThongBao_pass_again').html("")
                    }
                })
            }
        }
    })
    $('#tg-minicart').click(function () {
        view_cart()
        // dis_btn_cart()
    })

    function view_cart() {
        $.ajax({
            url: url + "controller=cart&action=view_cart",
            method: "POST",
            data: {
                actions: "total_cart"
            },
            success: function (dt) {
                $('.tg-minicartbody').html(dt)
                tong = $('#data_cart_get').attr("total");
                $('.tg-subtotal strong').html(tong)
                // console.log(dt)
            }
        })
    }
    //click xóa
    $('.tg-btnemptycart').click(function () {
        $.ajax({
            url: url + "controller=cart&action=delete_cart",
            method: "POST",
            data: {

            },
            success: function (dt) {
                view_cart()
                number_cart()
                load_msg(dt)
                dis_btn_cart()

            }
        })
    })

    function dis_btn_cart() {
        $.ajax({
            url: url + "controller=cart&action=check_cart",
            method: "POST",
            success: function (dt) {
                if (dt == 0) {

                    $('#btn_view_cart').prop("disabled", true)
                    $('#btn_checkout').prop("disabled", true)
                } else {
                    // alert('ko rỗng')
                    $('#btn_view_cart').prop("disabled", false)
                    $('#btn_checkout').prop("disabled", false)
                }
            }
        })
    }
    $('#btn_acc').click(function () {
        $('.acc').addClass('show')
    })
    $('#forgot_pass').click(function () {
        $('#modal_fg_pass').modal('show');
        $('#modalLogin').modal('hide')
    })

    // $('.tg-btnstyletwo').click(function() {
    //     id_b = $(this).attr("id_b");

    //     add_cart(id_b)
    // })
    $(document).on("click", ".tg-btnstyletwo", function () {
        id_b = $(this).attr("id_b");
        add_cart(id_b)
    })

    function add_cart(id_b) {
        $.ajax({
            url: url + "controller=cart&action=add_cart",
            method: "POST",
            data: {
                id_b: id_b
            },
         
            success: function (dt) {
                // myArray = JSON.Parse(dt);
                load_msg(dt)
                //  console.log(dt[0])
                number_cart()
            }

        })
    }
    number_cart()
    function number_cart() {
        $.ajax({
            url: url + "controller=cart&action=number_cart",
            method: "POST",
            success: function (dt) {
                console.log(dt)
                if(dt>0){
                    $('.number_cart').html(dt)
                }else{
                    $('.number_cart').html("")
                }
               
            }
        })
    }

    //check email
    $('#email_u').blur(function () {
        email = $(this).val();
        if (email != '') {
            $.ajax({
                url: url + "controller=login&action=check_mail_all",
                method: "POST",
                data: {
                    email_u: email
                },
                success: function (dt) {
                    // console.log(dt)
                    if (dt == 0) {
                        $('#msgThongBao').css("color", "green")
                        $('#msgThongBao').html("Tài khoản sẵn sàng")
                        check_email = true
                        disb_dky()
                    } else {
                        $('#msgThongBao').css("color", "red")
                        $('#msgThongBao').html("Tài khoản đã tồn tại!")
                        check_email = false
                        disb_dky()
                    }
                }
            })
        }
    })
    $('.btn-close').click(function () {
        $('.modal').modal('hide')
    })
    $('#email_fg_pass').keyup(function () {
        val = $(this).val();
        if (validateEmail(val) == true) {
            $.ajax({
                url: url + "controller=login&action=check_mail",
                method: "POST",
                data: {
                    email_u: val
                },
                success: function (dt) {
                    // console.log(dt)
                    if (dt == 0) {
                        $('#msg_fg_pass').css("color", "red")
                        $('#msg_fg_pass').html("Tài khoản không tồn tại")
                        $('#btn_fg_pas').prop("disabled", true);
                    } else {
                        $('#msg_fg_pass').html("")
                        $('#btn_fg_pas').prop("disabled", false);
                    }
                }
            })
        }

    })
    $('#btn_send_code').click(function () {
        code = $('#input_code').val();
        email = $('#datas_get').attr("email_u")
        if (code != "") {
            $.ajax({
                url: url + "controller=login&action=check_code",
                method: "POST",
                data: {
                    code: code,
                    email: email
                },
                success: function (dt) {
                    console.log(dt)
                    if (dt != 1) {
                        $('#msg_err_code').html("Mã xác nhận không chính xác.")
                    } else {
                        $('#msg_err_code').html("")
                        $('#input_code').val("")
                        $('#change_pass').modal('show')
                        $('#modal_code').modal('hide')
                    }

                }
            })
        }

    })
    $('#intput_pass_again').keyup(function () {
        pass_again = $(this).val();
        pass = $('#input_pass').val();
        if (pass != pass_again && pass != "") {
            $('#msg_change_pas').html("Mật khẩu không khớp!");
            $('#btn_change_pass').prop("disabled", true)
        } else {
            $('#msg_change_pas').html("");
            $('#btn_change_pass').prop("disabled", false)
        }

    })
    $('#input_pass').blur(function () {
        pass = $(this).val()
        strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
        if (pass != '') {
            if (!strongPassword.test(pass)) {
                $('#msg_check_pas').html("Mật khẩu dài ít nhất 8 ký tự , có chữ hoa , chữ thường ,số và ký tự đặc biệt!")
                $('#btn_change_pass').prop("disabled", true)

            } else {
                $('#msg_check_pas').html("")
                $('#btn_change_pass').prop("disabled", false)

            }
        }
    })

    $('#btn_change_pass').click(function () {
        email = $('#datas_get').attr("email_u")
        pass = $('#input_pass').val();
        pass_again = $('#intput_pass_again').val()
        if (pass == pass_again) {
            $.ajax({
                url: url + "controller=login&action=change_pass",
                method: "POST",
                data: {
                    email: email,
                    pass: pass_again
                },
                success: function (dt) {
                    console.log(dt)
                    $('#change_pass').modal("hide")
                    $('#msg_modal').modal('show')
                    $('#text_msg').html(dt)
                    setTimeout(function () {
                        $('#msg_modal').modal('hide')
                    }, 3000)
                }
            })
        } else {
            $('#msg_change_pas').html("Mật khẩu không khớp!");
            $('#btn_change_pass').prop("disabled", true)
        }

    })

    //modal quên mật khẩu , click gửi email để lấy lại mk
    $('#btn_fg_pas').click(function () {
        val = $('#email_fg_pass').val();
        if (val != "" && validateEmail(val) == true && val.length > 14) {
            $.ajax({
                url: url + "controller=login&action=forgot_pass",
                method: "POST",
                data: {
                    email_u: val
                },
                success: function (dt) {
                    $('#datas_get').attr("email_u", val)
                    $('#email_code').val("123");
                    $('#email_change').val("val")
                    $('#modal_code').modal('show');
                    // $('#modal_fg_pass').trigger("reset");
                    $('#email_fg_pass').val("")
                    $('#modal_fg_pass').modal('hide')

                }
            })
        }

    })
    $('#pass_u').blur(function () {
        passwd = $(this).val();
        strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
        if (passwd != '') {
            if (!strongPassword.test(passwd)) {
                $('#msgThongBao_pass').css("color", "red")
                $('#msgThongBao_pass').html("Mật khẩu dài ít nhất 8 ký tự , có chữ hoa , chữ thường ,số và ký tự đặc biệt!")
                check_pass = false
                disb_dky()
            } else {
                $('#msgThongBao_pass').html("")
                check_pass = true;
                disb_dky()
            }
        }
    })
    $('#pass_u_again').blur(function () {
        passwd_again = $(this).val();
        if (passwd == passwd_again) {
            $('#msgThongBao_pass_again').html("");
            check_pass_again = true
            disb_dky()
        } else {
            check_pass_again = false;
            $('#msgThongBao_pass_again').css("color", "red")
            $('#msgThongBao_pass_again').html("Mật khẩu xác nhận không chính xác!")
            disb_dky()
        }
    })
    $('#btnLogin').click(function () {
        email = $('#email_login').val();
        pass = $('#pass_login').val();
        if (validateEmail(email) == true && email != "" && pass != "") {
            $.ajax({
                url: url + "controller=login&action=login",
                method: "POST",
                data: {
                    email: email,
                    pass: pass
                },
                success: function (dt) {
                    console.log(dt)
                    if (dt == 0) {
                        $('#check_resign').html("Tài khoản mật khẩu không chính xác !")
                        $('#check_resign').css("color", "red")
                    } else if (dt == 2) {

                        window.location.href = url + "controller=admin"
                        //alert('bạn đã đăng nhập với tư cách admin thành công');
                    } else {
                        window.location.href = url
                    }
                }
            })
        }

    })

    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    function disb_dky() {
        if (check_email == true && check_pass == true && check_pass_again == true) {
            $('#btn_dangky').prop("disabled", false)
        } else {
            $('#btn_dangky').prop("disabled", true)
        }

    }


})