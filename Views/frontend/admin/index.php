<body>
    <title>Trang chủ</title>
    <?php
    // include("C:/xampp/htdocs/QLTV/Public/public/header.php");
    include('public/public/header.php');

    ?>
    <div id="wrapper">

        <!-- Sidebar -->

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="sidebar-wrapper">
                            <ul class="sidebar-nav">
                                <li class="sidebar-brand">
                                    <h2>ADMIN</h2>
                                </li>

                                <li class="nav-item "> <a class="nav-link" href="<?= URL ?>/index.php?controller=admin"><i class="fas fa-hospital-alt"></i></i>Quản Lý</a> </li>
                                <li class="nav-item "> <a class="nav-link" href="<?= URL ?>/index.php?controller=managebill"> <i class="fas fa-chalkboard-teacher"></i></i>Quản Lý Mượn trả</a> </li>
                                <li class="nav-item "> <a class="nav-link" href="<?= URL ?>/index.php?controller=statisti"> <i class="fas fa-book"></i>Thống kê</a> </li>

                            </ul>
                        </div>
                        <nav class="navbar navbar-light">
                            <div class="container-fluid">
                                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fas fa-bars"></i></a>
                                <form class="d-flex">
                                    <a id="profile_tch" href="#" class="navbar-brand">Tài khoản</a>
                                    <a href="<?= URL ?>/index.php?controller=login&action=logout" class="navbar-brand">Đăng xuất</a>
                                </form>
                            </div>
                        </nav>
                        <div class="container main-content">
                            <br>
                            <div class="row">
                                <button type="button" class="btn btn-warning quanly col-3" table="books" id="qlSach">Quản lý Sách</button>
                                <button type="button" style="margin-left: 10%" table="categories" class="btn btn-success quanly  col-3" id="qlTheLoai">Quản lý thể loại</button>
                                <button type="button" style="margin-left: 10%" table="users" class="btn btn-info quanly  col-3" id="qlUser">Quản lý Users</button>

                            </div>

                            <div id="data">

                            </div>
                        </div>

                        <!--Add Modal -->
                        <div class="modal add" id="add-cate">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-info">Thêm Thể Loại</h3>
                                    </div>
                                    <div class="modal-body">

                                        <form onsubmit="return false;" action="" class="mt-4" method="POST" id="form_add_cate">
                                            <div class="col-mb-3">
                                                <label for="txtTLoai_a" class="col-sm-3 col-form-label">Tên Thể Loại <span class="text-danger">(*)</span></label>
                                                <p id="message_cate_err" class="text-danger"></p>
                                                <div class="col-sm-10">
                                                    <input required minlength="4" type="text" class="form-control" id="txtTLoai_a" name="name_cate">
                                                </div>
                                            </div>
                                            <input type="text" hidden name="table" value="categories">
                                            <br>
                                            <div class="mv-3" style="font-size: 12px;">
                                                <span class="text-danger">Ghi chú</span>: <span class="text-danger">(*)</span> là những trường bắt buộc.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close" style="width: 100px;">Hủy</button>
                                                <button type="submit" disabled name_form="add_cate" class="btn btn-success btn_add_suces" id="add_cate" style="width: 100px;">Thêm</button>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Delete Modal-->
                        <div class="modal delete" id="delete_cate">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-success">Xóa Thể Loại</h3>
                                    </div>
                                    <div class="modal-body">

                                        <p> Bạn có chắc chắn muốn xóa thể loại này không ?</p>
                                        <button type="button" class="btn btn-success" style="width: 100px;" id="btn_delete_cate">Delete</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_save1" style="width: 100px;">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Update subject modal -->
                        <div class="modal update" id="update_cate">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-info">Cập Nhật Thể Loại</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p id="up-message" class="text-success"></p>
                                        <form onsubmit="return false;" class="mt-4" action="" enctype="multipart/form-data" method="POST" id="form_update_cate">
                                            <input type="hidden" class="form-control" id="txtIdTL" name="id_cate" value="">
                                            <div class="col-mb-3">
                                                <label for="txtTL" class="col-sm-2 col-form-label">Tên Thể Loại <span class="text-danger">(*)</span></label>
                                                <div class="col-sm-10">
                                                    <input minlength="4" required type="text" class="form-control" id="txtTL" name="name_cate" value="">
                                                </div>
                                            </div>
                                            <input type="text" hidden name="table" value="categories">
                                            <br>
                                            <div class="mv-3" style="font-size: 12px;">
                                                <span class="text-danger">Ghi chú</span>: <span class="text-danger">(*)</span> là những trường bắt buộc.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="sumit" class="btn btn-success btn-updatee" style="width: 100px;" id="btn_update">Update</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close" style="width: 100px;">Close</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Modal add book-->
                        <div class="modal fade add" id="modalAddSP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="" method="POST" onsubmit="return false;" enctype="multipart/form-data" id="form_add_book" name="myform_adds">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitle">Thêm sản phẩm</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                        </div>
                                        <div class="modal-body">
                                            <div class="col-6" style="float: left;">

                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Tên Sách <span class="text-danger">(*)</span></label>
                                                    <input required type="text" class="form-control" minlength="2" id="name_b" name="name_b" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Thể Loại <span class="text-danger">(*)</span></label>
                                                    <br>
                                                    <select name="id_cate" id="id_cate">
                                                        <?php
                                                        foreach ($categories as $cate) {
                                                        ?>
                                                            <option value="<?= $cate['id_cate'] ?>"><?= $cate['name_cate'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Giá <span class="text-danger">(*)</span></label>
                                                    <input required type="number" min=10000 id="price_b" class="form-control" name="price_b" aria-describedby="emailHelp">
                                                </div>
                                                <!-- <input type="text" required hidden name="" id="" value=""> -->
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Nhà xuất bản <span class="text-danger">(*)</span></label>
                                                    <input required type="text" id="nxb_b" minlength="2" class="form-control" name="nxb_b" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <div class="col-6" style="float: left;">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Năm xuất bản <span class="text-danger">(*)</span></label>
                                                    <input required type="number" id="year_b" maxlength="4" min=1000 max=<?= date("Y") ?> class="form-control" name="year_b" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Số trang <span class="text-danger">(*)</span></label>
                                                    <input required type="number" min=50 id="page_b" class="form-control" name="page_b" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Số lượng còn <span class="text-danger">(*)</span></label>
                                                    <input required type="number" min=0 id="quantity_b" class="form-control" name="quantity_b" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-floating">
                                                        <textarea id="des_b" required class="form-control" placeholder="Leave a comment here" name="des_b" style="height: 100px"></textarea>
                                                        <label for="floatingTextarea2">Mô tả <span class="text-danger">(*)</span></label>
                                                    </div>
                                                </div>

                                                <br>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Ảnh <span class="text-danger">(*)</span></label>
                                                    <input required type="file" class="form-control" name="img_b" aria-describedby="emailHelp">
                                                </div>
                                                <input type="text" hidden name="table" value="books">
                                                <br>

                                            </div>
                                            <div class="mv-3" style="font-size: 12px;">
                                                <span class="text-danger">Ghi chú</span>: <span class="text-danger">(*)</span> là những trường bắt buộc.
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name_form="add_book" class="btn btn-primary btn_add_suces">Thêm Sản Phẩm</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!--Delete Modal book-->
                        <div class="modal delete" id="delete_book">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-success">Xóa sách</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p id="delete-message1" class="text-danger"></p>
                                        <p> Bạn có chắc chắn muốn xóa sách này không ?</p>
                                        <button type="button" class="btn btn-success" style="width: 100px;" id="btn_delete_book">Delete</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_save2" style="width: 100px;">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Update book modal -->
                        <div class="modal update" id="update_book">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-info">Cập Nhật Sách</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p id="up-message" class="text-success"></p>
                                        <form onsubmit="return false;" class="mt-4" action="" enctype="multipart/form-data" method="POST" id="form_update_book">
                                            <input type="hidden" class="form-control" id="id_b1" name="id_b" value="">
                                            <div class="modal-body">
                                                <div class="col-6" style="float: left;">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Tên Sách <span class="text-danger">(*)</span></label>
                                                        <input required type="text" minlength="2" class="form-control" id="name_b1" name="name_b" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Thể Loại <span class="text-danger">(*)</span></label>
                                                        <br>
                                                        <select name="id_cate" id="id_cate">
                                                            <?php
                                                            foreach ($categories as $cate) {
                                                            ?>
                                                                <option value="<?= $cate['id_cate'] ?>"><?= $cate['name_cate'] ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Giá <span class="text-danger">(*)</span></label>
                                                        <input required type="number" min=10000 id="price_b1" class="form-control" name="price_b" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Nhà xuất bản <span class="text-danger">(*)</span></label>
                                                        <input required type="text" minlength="2" id="nxb_b1" class="form-control" name="nxb_b" aria-describedby="emailHelp">
                                                    </div>

                                                </div>
                                                <div class="col-6" style="float: left;">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Năm xuất bản <span class="text-danger">(*)</span></label>
                                                        <input require type="number" id="year_b1" min=1000 max=<?= date("Y") ?> class="form-control" name="year_b" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Số trang <span class="text-danger">(*)</span></label>
                                                        <input required type="number" min=50 id="page_b1" class="form-control" name="page_b" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Số lượng còn <span class="text-danger">(*)</span></label>
                                                        <input required type="number" min=0 id="quantity_b1" class="form-control" name="quantity_b" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="form-floating">
                                                            <textarea id="des_b1" required class="form-control" placeholder="Leave a comment here" name="des_b" style="height: 100px"></textarea>
                                                            <label for="floatingTextarea2">Mô tả <span class="text-danger">(*)</span></label>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Ảnh</label>
                                                        <input id="img_b1" type="file" class="form-control" name="img_b" aria-describedby="emailHelp">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="mv-3" style="font-size: 12px;">
                                                <span class="text-danger">Ghi chú</span>: <span class="text-danger">(*)</span> là những trường bắt buộc.
                                            </div>
                                            <input type="text" hidden name="table" value="books">
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success btn-updatee" style="width: 100px;" id="btn_update">Update</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close" style="width: 100px;">Close</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--Add Modal user -->
                        <div class="modal add" id="modalAddUS">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-info">Thêm Người Dùng</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p id="message" class="text-success"></p>
                                        <form onsubmit="return false;" class="mt-4" action="" method="POST" id="form_add_user">
                                            <div class="col-mb-3">
                                                <label for="name_u" class="col-sm-3 col-form-label">Tên Người Dùng <span class="text-danger">(*)</span></label>
                                                <div class="col-sm-10">
                                                    <input required type="text" minlength="2" class="form-control" id="name_u" name="name_u">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Địa Chỉ <span class="text-danger">(*)</span></label>
                                                <input required type="text" minlength="10" class="form-control" id="address_u" name="address_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Số Điện Thoại(0 XXX XXX XXX) <span class="text-danger">(*)</span></label>
                                                <input required type="tel" pattern="0[0-9]{9}" minlength="10" maxlength="10" class="form-control" id="phone_u" name="phone_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email <span class="text-danger">(*)</span></label>
                                                <p id="message_users_err" class="text-danger"></p>
                                                <input required type="email" class="form-control" minlength="15" id="email_u" name="email_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Số Dư <span class="text-danger">(*)</span></label>
                                                <input required type="number" min="0" class="form-control" id="money" name="money" value="0" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Ảnh</label>
                                                <input type="file" class="form-control" name="avatar_u" aria-describedby="emailHelp">
                                            </div>
                                            <input type="text" hidden name="status" value="1">
                                            <input type="text" hidden name="table" value="users">
                                            <div class="mv-3" style="font-size: 12px;">
                                                <span class="text-danger">Ghi chú</span>: <span class="text-danger">(*)</span> là những trường bắt buộc.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close" style="width: 100px;">Hủy</button>
                                                <button type="submit" disabled name_form="add_users" class="btn btn-success btn_add_suces" id="update_add_users" style="width: 100px;">Thêm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Delete Modal-->
                        <div class="modal delete" id="delete_user">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-success">Xóa Người Dùng</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p id="delete-message1" class="text-danger"></p>
                                        <p> Bạn có chắc chắn muốn xóa người dùng này không ?</p>
                                        <button type="button" class="btn btn-success" style="width: 100px;" id="btn_delete_user">Delete</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_save2" style="width: 100px;">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Update Modal user -->
                        <div class="modal update" id="update_user">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-info">Cập Nhật Người Dùng</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p id="message" class="text-success"></p>
                                        <form onsubmit="return false;" class="mt-4" action="" method="POST" id="form_update_user">
                                            <input type="hidden" class="form-control" id="id_u1" name="id_u" value="">
                                            <div class="col-mb-3">
                                                <label for="name_u" class="col-sm-3 col-form-label">Tên Người Dùng <span class="text-danger">(*)</span></label>
                                                <div class="col-sm-10">
                                                    <input required type="text" class="form-control" id="name_u1" name="name_u">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Địa Chỉ <span class="text-danger">(*)</span></label>
                                                <input required type="text" class="form-control" id="address_u1" name="address_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Số Điện Thoại <span class="text-danger">(*)</span></label>
                                                <input required readonly type="text" class="form-control" id="phone_u1" name="phone_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email <span class="text-danger">(*)</span></label>
                                                <input required readonly type="Email" class="form-control" id="email_u1" name="email_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Số Dư <span class="text-danger">(*)</span></label>
                                                <input required type="text" class="form-control" id="money1" name="money" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Ảnh <span class="text-danger">(*)</span></label>
                                                <input required type="file" id="avatar_u1" class="form-control" name="avatar_u" aria-describedby="emailHelp">
                                            </div>
                                            <input type="text" hidden name="table" value="users">
                                            <div class="mv-3" style="font-size: 12px;">
                                                <span class="text-danger">Ghi chú</span>: <span class="text-danger">(*)</span> là những trường bắt buộc.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close" style="width: 100px;">Close</button>

                                                <button type="submit" name_form="add_users" class="btn btn-success btn-updatee" id="btn_update" style="width: 100px;">Update</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php
        include('Public/public/footer.php')
        ?>
        <script src="<?= URL ?>/Public/js/admin/index.js"></script>
        <!-- <script src="http://localhost:8080/QLThuVien_PJ/Public/js/admin/category.js"></script> -->

        <script>
            $(document).ready(function() {
                // alert('123')
                $("#menu-toggle").click(function(e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });
                url = "http://localhost:88/QLThuVien_PJ/index.php?controller=admin&action="
                let action = "",
                    table = "";
                this_page = 1;
                // click quản lý
                $('.quanly').click(function() {
                    table = $(this).attr("table");
                    action = "get_data";

                    load_data(action, table)
                })
                //click thêm thể loại , form hiện lân , nhấn save
                $('.btn_add_suces').click(function(dt) {
                    // alert(table)
                    if (table == "categories") {

                        name_cate = $('#txtTLoai_a').val()

                        if (name_cate.length > 3) {
                            form = new FormData(form_add_cate)
                            add(form)

                        }

                    }
                    if (table == "books") {
                        name_b = $('#name_b').val().length
                        nxb_b = $('#nxb_b').val().length
                        val_book = parseInt($('#year_b').val())
                        price_b = parseInt($('#price_b').val())
                        page_b = parseInt($('#page_b').val())
                        quantity_b = parseInt($('#quantity_b').val())
                        if (nxb_b >= 2 && name_b >= 2 && val_book > 1000 && val_book < 2023 && price_b > 10000 && page_b > 50 && quantity_b > 0) {
                            form = new FormData(form_add_book)
                            add(form)
                        }
                    }
                    if (table == "users") {
                        name_u = $('#name_u').val()
                        address_u = $('#address_u').val()
                        phone_u = $('#phone_u').val()
                        email_u = $('#email_u').val()
                        money = $('#money').val()
                        if (name_u.length > 1 && address_u.length > 9 && phone_u.length == 10 && email_u.length > 14)
                            form = new FormData(form_add_user)
                        add(form)
                    }

                    // alert(name_form)
                })
                $(document).on("click", '.btn_delete', function() {
                    action = "get_data";
                    if (table == "categories") {
                        $('#delete_cate').modal('show')
                        id = $(this).attr("id_get")
                        $('#btn_delete_cate').click(function(dt) {
                            delete_dt(table, id)
                        })
                    }
                    if (table == "books") {
                        $('#delete_book').modal('show')
                        id = $(this).attr("id_get")
                        $('#btn_delete_book').click(function(dt) {
                            delete_dt(table, id)
                        })
                    }
                    if (table == "users") {
                        $('#delete_user').modal('show')
                        id = $(this).attr("id_get")
                        $('#btn_delete_user').click(function(dt) {
                            delete_dt(table, id)
                        })
                    }


                })
                $('#email_u').keyup(function() {
                    val = $(this).val();
                    if (val != "") {
                        $.ajax({
                            url: "http://localhost:88/QLThuVien_PJ/index.php?controller=login&action=check_mail_all",
                            method: "POST",
                            data: {
                                email_u: val
                            },
                            success: function(dt) {
                                // console.log(dt)
                                if (dt == 0) {
                                    $('#message_users_err').html("")
                                    $('#update_add_users').prop("disabled", false);
                                } else {
                                    $('#message_users_err').html("Tài  khoản đã tồn tại")
                                    $('#update_add_users').prop("disabled", true);
                                }

                            }
                        })
                    }
                })

                function validateEmail(email) {
                    var re = /\S+@\S+\.\S+/;
                    return re.test(email);
                }
                //loadupdate
                $(document).on("click", '.btn_update1', function() {
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
                $('.btn-updatee').click(function(dt) {
                    if (table == "categories") {
                        name_cate = $('#txtTL').val()
                        if (name_cate.length > 3) {
                            form = new FormData(form_update_cate)
                            update(form)
                        }
                    }
                    if (table == "books") {
                        name_b = $('#name_b1').val().length
                        nxb_b = $('#nxb_b1').val().length
                        val_book = parseInt($('#year_b1').val())
                        price_b = parseInt($('#price_b1').val())
                        page_b = parseInt($('#page_b1').val())
                        quantity_b = parseInt($('#quantity_b1').val())
                        if (nxb_b >= 2 && name_b >= 2 && val_book >= 1000 && val_book < 2023 && price_b >= 10000 && page_b >= 50 && quantity_b >= 0) {
                            form = new FormData(form_update_book)
                            update(form)
                        }
                    }
                    if (table == "users") {
                        form = new FormData(form_update_user)
                        update(form)

                    }
                })
                //search
                $(document).on("click", '.btn_search', function() {
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
                $(document).on("click", ".page-item", function() {
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

                $(document).on("mouseover", 'tr', function() {
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
                        success: function(data) {
                            $('#txtIdTL').val(data[0]['id_cate']);
                            $('#txtTL').val(data[0]['name_cate']);
                        },
                    })
                }
                $('#txtTLoai_a').keyup(function() {
                    value_cate = $(this).val();
                    // value_cate1 = value_cate.replace(/\s+/g, '');
                    // value_cate= value_cate.split(' ').join('')
                    check_cate(value_cate)
                })

                function check_cate(value_cate) {
                    // strongName_cate = new RegExp('(?!=.*[a-z])(?!=.*[A-Z])');
                    // console.log( strongName_cate.test(value_cate))
                    // if (!strongName_cate.test(value_cate)) {
                    //     $('#message_cate_err').html("Tên  thể loại không có số hoặc ký tự đặc biệt!")
                    //     $("#add_cate").attr("disabled", true)
                    // } else {
                    //     $('#message_cate_err').html("")
                    //     $("#add_cate").attr("disabled", false)
                    $.ajax({
                        url: url + "check_name_cate",
                        method: 'post',
                        data: {
                            table: table,
                            name_cate: value_cate,
                        },
                        success: function(dt) {
                            console.log(dt)
                            if (dt == 0) {
                                $('#message_cate_err').html("")
                                $("#add_cate").attr("disabled", false)

                            } else {
                                $('#message_cate_err').html("Thể loại này đã tồn tại !")
                                $("#add_cate").attr("disabled", true)
                            }

                        }
                    })
                    // }


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
                        success: function(data) {
                            $('#id_b1').val(data[0]['id_b']);
                            $('#name_b1').val(data[0]['name_b']);
                            $('#id_cate').val(data[0]['id_cate']);
                            $('#price_b1').val(data[0]['price_b']);
                            $('#nxb_b1').val(data[0]['nxb_b']);
                            $('#year_b1').val(data[0]['year_b'])
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
                        success: function(data) {
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
                        // console.log(value);
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
                            success: function(dt) {
                                load_data(action, table)
                                load_msg(dt)
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
                        success: function(dt) {
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
                        success: function(dt) {
                            load_data(action, table)
                            load_msg(dt)
                            $('.delete').modal('hide');
                        }
                    })
                }
                //add data 
                function add(form) {
                    check_form = true;
                    for (var value of form.values()) {
                        // console.log(value);
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
                            success: function(dt) {
                                load_data(action, table)
                                load_msg(dt)
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
                        success: function(dt) {
                            $('#data').hide().html(dt).fadeIn("slow")

                        }
                    })


                }
            })
        </script>
</body>