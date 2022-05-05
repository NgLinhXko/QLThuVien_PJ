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
                                    <a href="../login/logout.php" class="navbar-brand">Đăng xuất</a>
                                </form>
                            </div>
                        </nav>
                        <div class="container main-content">
                            <br>
                            <button type="button" style="margin-right: 30%" class="btn btn-success" id="qlTheLoai">Quản lý thể loại</button>
                            <button type="button" class="btn btn-success" id="qlSach">Quản lý Sách</button>
                            <div id="data">

                            </div>

                        </div>
                        <!--Add Modal -->
                        <div class="modal" id="add-cate">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-info">Thêm Thể Loại</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p id="message" class="text-success"></p>
                                        <form class="mt-4" action="" method="POST">
                                            <div class="col-mb-3">
                                                <label for="txtTLoai_a" class="col-sm-3 col-form-label">Tên Thể Loại</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="txtTLoai_a" name="txtTLoai_a">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" style="width: 100px;" id="btn_save1">Save</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close" style="width: 100px;">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Delete Modal-->
                        <div class="modal" id="delete_cate">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-success">Xóa Thể Loại</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p id="delete-message1" class="text-danger"></p>
                                        <p> Bạn có chắc chắn muốn xóa thể loại này không ?</p>
                                        <button type="button" class="btn btn-success" style="width: 100px;" id="btn_delete_cate">Delete</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close" style="width: 100px;">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Update subject modal -->
                        <div class="modal" id="update_cate">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-info">Cập Nhật Thể Loại</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p id="up-message" class="text-success"></p>
                                        <form class="mt-4" action="" method="POST">
                                            <input type="hidden" class="form-control" id="txtIdTL" name="txtIdTL" value="">
                                            <div class="col-mb-3">
                                                <label for="txtTL" class="col-sm-2 col-form-label">Tên Thể Loại</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="txtTL" name="txtTL" value="">
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" style="width: 100px;" id="btn_update">Update</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close" style="width: 100px;">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
        <script src="http://localhost:88/QLThuVien_PJ/Public/js/admin/book.js"></script>

        <script src="http://localhost:88/QLThuVien_PJ/Public/js/admin/category.js"></script>

</body>