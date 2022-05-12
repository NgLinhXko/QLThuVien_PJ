<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div style="margin: 40px;">

                <h4 style="text-align: center;">Đăng nhập</h4>
                <h5 id="check_resign">
                </h5>
                <form method="POST" onsubmit="return false;" action="#" id="formLogin" >
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
                <form method="POST" id="formResign">
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

                    <button type="button" id="btn_dangky" disabled class="btn btn-primary">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</div>
