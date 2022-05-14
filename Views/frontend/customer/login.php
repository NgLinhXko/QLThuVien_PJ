<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div style="margin: 40px;">

                <h4 style="text-align: center;">Đăng nhập</h4>
                <h5 id="check_resign">
                </h5>
                <form method="POST" onsubmit="return false;" action="#" id="formLogin">
                    <span id="msgThongBaoLG"></span>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input required type="email" name="Email" class="form-control" id="email_login" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input required type="password" name="password" class="form-control" id="pass_login">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button style="width:100%" type="submit" id="btnLogin" class="btn btn-primary">Đăng nhập</button>
                </form>
                <br>
                <br>
                <span style="color: blue;">Bạn chưa có tài khoản ?</span>
                <span style="color: red;cursor:pointer" id="Register">Đăng ký</span>
            </div>
        </div>
    </div>
</div>


<!-- Đăng ký -->
<div class="modal fade" id="modalResign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div style="margin: 40px;">
                <h4 style="text-align: center;">Đăng Ký</h4>
                <form onsubmit="return false;" method="POST" id="formResign">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Họ Tên</label>
                        <input required type="text" name="name_u" class="form-control" id="name_u" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                        <input required type="text" name="address_u" class="form-control" id="address_u" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Số Điện Thoại</label>
                        <input required type="text" name="phone_u" class="form-control" id="phone_u" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <span style="font-size: 12px;" id="msgThongBao"></span>

                        <input required type="email" id="email_u" name="email_u" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                        <span style="font-size: 12px;" id="msgThongBao_pass"></span>
                        <input required type="password" name="pass_u" class="form-control" id="pass_u">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Xác nhận Mật khẩu</label>
                        <span style="font-size: 12px;" id="msgThongBao_pass_again"></span>
                        <input required type="password" name="pass_u_again" class="form-control" id="pass_u_again">
                    </div>

                    <button type="submit" id="btn_dangky" disabled class="btn btn-primary">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_signup_succes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="staticBackdropLabel">Thông báo</h3>
                <button type="button" class="btn-close closed" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 style="color:green">Bạn đã đăng ký thành công !</h4>
                <h5>Vui lòng đăng nhập <a id="gmail" style="color:red ;" href="https://accounts.google.com/signin/v2/identifier?service=mail&flowName=GlifWebSignIn&flowEntry=ServiceLogin">Gmail</a> để kích hoạt tài khoản.</h5>
                <h5>Hà Nội, <?php echo date("d/m/Y") ?> ... một ngày nắng đẹp <svg style="color: #c84636;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z" />
                    </svg></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary closed " data-bs-dismiss="modal">OKE =))</button>
            </div>
        </div>
    </div>
</div>