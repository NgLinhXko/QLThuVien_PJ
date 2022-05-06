<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div style="margin: 40px;">
                <h4 style="text-align: center;">Đăng nhập</h4>
                <form method="POST" action="http://localhost:88/QlBanHang/index.php?controller=Login&action=checkLogin" id="formLogin">
                    <span id="msgThongBaoLG"></span>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
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
                        <input required type="text" name="name_u" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Ngày sinh</label>
                        <input required type="date" name="date_u"  id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                        <input required type="text" name="address_u" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Số Điện Thoại</label>
                        <input required type="text" name="phone_u" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <span style="font-size: 12px;" id="msgThongBao"></span>

                        <input required type="email" id="email_u" name="email_u" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <span style="font-size: 12px;" id="msgThongBao_pass"></span>
                        <input required type="password" name="pass_u" class="form-control" id="pass_u">
                    </div>
                    
                    <button type="submit" id="btn_dangky" disabled  class="btn btn-primary">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</div>