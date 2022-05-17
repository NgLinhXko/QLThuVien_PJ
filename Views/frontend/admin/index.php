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

                                <li class="nav-item "> <a class="nav-link" href="#"><i class="fas fa-hospital-alt"></i></i>Quản Lý</a> </li>

                                <li class="nav-item "> <a class="nav-link" href="#"> <i class="fas fa-chalkboard-teacher"></i></i>Quản Lý Mượn trả</a> </li>
                                <li class="nav-item "> <a class="nav-link" href="#"> <i class="fas fa-book"></i>Thống kê</a> </li>

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
                                                <label for="txtTLoai_a" class="col-sm-3 col-form-label">Tên Thể Loại</label>
                                                <p id="message_cate_err" class="text-danger"></p>
                                                <div class="col-sm-10">
                                                    <input required type="text" class="form-control" id="txtTLoai_a" name="name_cate">
                                                </div>
                                            </div>
                                            <input type="text" hidden name="table" value="categories">
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
                                                <label for="txtTL" class="col-sm-2 col-form-label">Tên Thể Loại</label>
                                                <div class="col-sm-10">
                                                    <input required type="text" class="form-control" id="txtTL" name="name_cate" value="">
                                                </div>
                                            </div>
                                            <input type="text" hidden name="table" value="categories">
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
                                                    <label for="exampleInputEmail1" class="form-label">Tên Sách</label>
                                                    <input required type="text" class="form-control" id="name_b" name="name_b" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Thể Loại</label>
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
                                                    <label for="exampleInputEmail1" class="form-label">Giá </label>
                                                    <input required type="number" min=10000 id="price_b" class="form-control" name="price_b" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Nhà xuất bản </label>
                                                    <input required type="text" id="nxb_b" class="form-control" name="nxb_b" aria-describedby="emailHelp">
                                                </div>

                                            </div>
                                            <div class="col-6" style="float: left;">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Năm xuất bản</label>
                                                    <input required type="year" min=1000 max=<?= date("Y") ?> id="year_b" class="form-control" name="year_b" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Số trang</label>
                                                    <input required type="number" min=50 id="page_b" class="form-control" name="page_b" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Số lượng còn</label>
                                                    <input required type="number" min=0 id="quantity_b" class="form-control" name="quantity_b" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-floating">
                                                        <textarea id="des_b" required class="form-control" placeholder="Leave a comment here" name="des_b" style="height: 100px"></textarea>
                                                        <label for="floatingTextarea2">Mô tả</label>
                                                    </div>
                                                </div>

                                                <br>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Ảnh</label>
                                                    <input required type="file" class="form-control" name="img_b" aria-describedby="emailHelp">
                                                </div>
                                                <input type="text" hidden name="table" value="books">
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
                                                        <label for="exampleInputEmail1" class="form-label">Tên Sách</label>
                                                        <input required type="text" class="form-control" id="name_b1" name="name_b" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Thể Loại</label>
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
                                                        <label for="exampleInputEmail1" class="form-label">Giá </label>
                                                        <input required type="number" id="price_b1" class="form-control" name="price_b" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Nhà xuất bản </label>
                                                        <input required type="text" id="nxb_b1" class="form-control" name="nxb_b" aria-describedby="emailHelp">
                                                    </div>

                                                </div>
                                                <div class="col-6" style="float: left;">
                                                    <!-- <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Năm xuất bản</label>
                                                        <input type="datetime-local" id="year_b1" class="form-control" name="year_b" aria-describedby="emailHelp">
                                                    </div> -->
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Số trang</label>
                                                        <input required type="number" id="page_b1" class="form-control" name="page_b" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Số lượng còn</label>
                                                        <input required type="number" id="quantity_b1" class="form-control" name="quantity_b" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="form-floating">
                                                            <textarea id="des_b1" required class="form-control" placeholder="Leave a comment here" name="des_b" style="height: 100px"></textarea>
                                                            <label for="floatingTextarea2">Mô tả</label>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Ảnh</label>
                                                        <input id="img_b1" required type="file" class="form-control" name="img_b" aria-describedby="emailHelp">
                                                    </div>
                                                </div>

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
                                                <label for="name_u" class="col-sm-3 col-form-label">Tên Người Dùng</label>
                                                <div class="col-sm-10">
                                                    <input required type="text" class="form-control" id="name_u" name="name_u">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Địa Chỉ</label>
                                                <input required type="text" class="form-control" id="address_u" name="address_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Số Điện Thoại</label>
                                                <input required type="text" class="form-control" id="phone_u" name="phone_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                                <input required type="email" class="form-control" id="email_u" name="email_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Số Dư</label>
                                                <input required type="text" class="form-control" id="money" name="money" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Ảnh</label>
                                                <input type="file" class="form-control" name="avatar_u" aria-describedby="emailHelp">
                                            </div>
                                            <input type="text" hidden name="table" value="users">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close" style="width: 100px;">Hủy</button>
                                                <button type="submit" name_form="add_users" class="btn btn-success btn_add_suces" id="update" style="width: 100px;">Thêm</button>
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
                                                <label for="name_u" class="col-sm-3 col-form-label">Tên Người Dùng</label>
                                                <div class="col-sm-10">
                                                    <input required type="text" class="form-control" id="name_u1" name="name_u">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Địa Chỉ</label>
                                                <input required type="text" class="form-control" id="address_u1" name="address_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Số Điện Thoại</label>
                                                <input required type="text" class="form-control" id="phone_u1" name="phone_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                                <input required readonly type="Email" class="form-control" id="email_u1" name="email_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Số Dư</label>
                                                <input required type="text" class="form-control" id="money1" name="money" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Ảnh</label>
                                                <input required type="file" id="avatar_u1" class="form-control" name="avatar_u" aria-describedby="emailHelp">
                                            </div>
                                            <input type="text" hidden name="table" value="users">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close" style="width: 100px;">Hủy</button>

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
        <script src="<?= URL?>/Public/js/admin/index.js"></script>
        <!-- <script src="http://localhost:8080/QLThuVien_PJ/Public/js/admin/category.js"></script> -->
  

</body>