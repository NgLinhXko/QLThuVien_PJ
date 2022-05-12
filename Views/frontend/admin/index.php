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
                            <button type="button" class="btn btn-success quanly" table="books" id="qlSach">Quản lý Sách</button>
                            <button type="button" style="margin-left: 20%" table="categories" class="btn btn-success quanly" id="qlTheLoai">Quản lý thể loại</button>
                            <button type="button" style="margin-left: 20%" table="users" class="btn btn-success quanly" id="qlUser">Quản lý Users</button>
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
                                        <form class="mt-4" action="" method="POST" id="form_add_cate">
                                            <div class="col-mb-3">
                                                <label for="txtTLoai_a" class="col-sm-3 col-form-label">Tên Thể Loại</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="txtTLoai_a" name="name_cate">
                                                </div>
                                            </div>
                                            <input type="text" hidden name="table" value="categories">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close" style="width: 100px;">Hủy</button>

                                        <button type="button" name_form="add_cate" class="btn btn-success btn_add_suces" id="update" style="width: 100px;">Thêm</button>
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
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_save1" style="width: 100px;">Close</button>
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
                                        <form class="mt-4" action="" enctype="multipart/form-data" method="POST" id="form_update_cate">
                                            <input type="hidden" class="form-control" id="txtIdTL" name="id_cate" value="">
                                            <div class="col-mb-3">
                                                <label for="txtTL" class="col-sm-2 col-form-label">Tên Thể Loại</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="txtTL" name="name_cate" value="">
                                                </div>
                                            </div>
                                            <input type="text" hidden name="table" value="categories">

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success btn-updatee" style="width: 100px;" id="btn_update">Update</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close" style="width: 100px;">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal add book-->
                        <div class="modal fade" id="modalAddSP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="" method="POST" enctype="multipart/form-data" id="form_add_book" name="myform_adds">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitle">Thêm sản phẩm</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                        </div>
                                        <div class="modal-body">
                                            <div class="col-6" style="float: left;">
                                                <input type="text" value="" hidden name="id_b" id="id_b">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Tên Sách</label>
                                                    <input require type="text" class="form-control" id="name_b" name="name_b" aria-describedby="emailHelp">
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
                                                    <input require type="number" id="price_b" class="form-control" name="price_b" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Nhà xuất bản </label>
                                                    <input require type="text" id="nxb_b" class="form-control" name="nxb_b" aria-describedby="emailHelp">
                                                </div>

                                            </div>
                                            <div class="col-6" style="float: left;">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Năm xuất bản</label>
                                                    <input type="datetime-local" id="year_b" class="form-control" name="year_b" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Số trang</label>
                                                    <input require type="number" id="page_b" class="form-control" name="page_b" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Số lượng còn</label>
                                                    <input require type="number" id="quantity_b" class="form-control" name="quantity_b" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-floating">
                                                        <textarea id="des_b" require class="form-control" placeholder="Leave a comment here" name="des_b" style="height: 100px"></textarea>
                                                        <label for="floatingTextarea2">Mô tả</label>
                                                    </div>
                                                </div>

                                                <br>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Ảnh</label>
                                                    <input require type="file" class="form-control" name="img_b" aria-describedby="emailHelp">
                                                </div>

                                                <input type="text" hidden name="table" value="books">
                                            </div>

                                        </div>


                                    </form>
                                    <div class="modal-footer">
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" name_form="add_book" class="btn btn-primary btn_add_suces">Thêm Sản Phẩm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Delete Modal book-->
                        <div class="modal" id="delete_book">
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
                        <div class="modal" id="update_book">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-info">Cập Nhật Sách</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p id="up-message" class="text-success"></p>
                                        <form class="mt-4" action="" enctype="multipart/form-data" method="POST" id="form_update_book">
                                            <input type="hidden" class="form-control" id="id_b1" name="id_b" value="">
                                            <div class="modal-body">
                                                <div class="col-6" style="float: left;">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Tên Sách</label>
                                                        <input require type="text" class="form-control" id="name_b1" name="name_b" aria-describedby="emailHelp">
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
                                                        <input require type="number" id="price_b1" class="form-control" name="price_b" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Nhà xuất bản </label>
                                                        <input require type="text" id="nxb_b1" class="form-control" name="nxb_b" aria-describedby="emailHelp">
                                                    </div>

                                                </div>
                                                <div class="col-6" style="float: left;">
                                                    <!-- <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Năm xuất bản</label>
                                                        <input type="datetime-local" id="year_b1" class="form-control" name="year_b" aria-describedby="emailHelp">
                                                    </div> -->
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Số trang</label>
                                                        <input require type="number" id="page_b1" class="form-control" name="page_b" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Số lượng còn</label>
                                                        <input require type="number" id="quantity_b1" class="form-control" name="quantity_b" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="form-floating">
                                                            <textarea id="des_b1" require class="form-control" placeholder="Leave a comment here" name="des_b" style="height: 100px"></textarea>
                                                            <label for="floatingTextarea2">Mô tả</label>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Ảnh</label>
                                                        <input id="img_b1" require type="file" class="form-control" name="img_b" aria-describedby="emailHelp">
                                                    </div>


                                                </div>

                                            </div>
                                            <input type="text" hidden name="table" value="books">

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success btn-updatee" style="width: 100px;" id="btn_update">Update</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close" style="width: 100px;">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Add Modal user -->
                        <div class="modal" id="modalAddUS">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-info">Thêm Người Dùng</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p id="message" class="text-success"></p>
                                        <form class="mt-4" action="" method="POST" id="form_add_user">
                                            <div class="col-mb-3">
                                                <label for="name_u" class="col-sm-3 col-form-label">Tên Người Dùng</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="name_u" name="name_u">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Ngày Sinh</label>
                                                <input type="datetime-local" class="form-control" id="date_u" name="date_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Địa Chỉ</label>
                                                <input require type="text" class="form-control" id="address_u" name="address_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Số Điện Thoại</label>
                                                <input require type="text" class="form-control" id="phone_u" name="phone_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                                <input require type="text" class="form-control" id="email_u" name="email_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Số Dư</label>
                                                <input require type="text" class="form-control" id="money" name="money" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Ảnh</label>
                                                <input require type="file" class="form-control" name="avatar_u" aria-describedby="emailHelp">
                                            </div>
                                            <input type="text" hidden name="table" value="users">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close" style="width: 100px;">Hủy</button>

                                        <button type="button" name_form="add_users" class="btn btn-success btn_add_suces" id="update" style="width: 100px;">Thêm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Delete Modal-->
                        <div class="modal" id="delete_user">
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
                        <div class="modal" id="update_user">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-info">Cập Nhật Người Dùng</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p id="message" class="text-success"></p>
                                        <form class="mt-4" action="" method="POST" id="form_update_user">
                                            <input type="hidden" class="form-control" id="id_u1" name="id_u" value="">
                                            <div class="col-mb-3">
                                                <label for="name_u" class="col-sm-3 col-form-label">Tên Người Dùng</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="name_u1" name="name_u">
                                                </div>
                                            </div>
                                            <!-- <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Ngày Sinh</label>
                                                <input type="datetime-local" class="form-control" id="date_u1" name="date_u" aria-describedby="emailHelp">
                                            </div> -->
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Địa Chỉ</label>
                                                <input require type="text" class="form-control" id="address_u1" name="address_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Số Điện Thoại</label>
                                                <input require type="text" class="form-control" id="phone_u1" name="phone_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                                <input require type="text" class="form-control" id="email_u1" name="email_u" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Số Dư</label>
                                                <input require type="text" class="form-control" id="money1" name="money" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Ảnh</label>
                                                <input require type="file" id="avatar_u1" class="form-control" name="avatar_u" aria-describedby="emailHelp">
                                            </div>
                                            <input type="text" hidden name="table" value="users">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close" style="width: 100px;">Hủy</button>

                                        <button type="button" name_form="add_users" class="btn btn-success btn-updatee" id="btn_update" style="width: 100px;">Update</button>
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
        <script src="http://localhost:88/QLThuVien_PJ/Public/js/admin/index.js"></script>

        <!-- <script src="http://localhost:8080/QLThuVien_PJ/Public/js/admin/category.js"></script> -->
        <script>
            $(document).ready(function() {
                url = "http://localhost:88/QLThuVien_Pj/index.php?controller=admin&action="
                let action = "",
                    table = "";
                // click quản lý
                $('.quanly').click(function() {
                    table = $(this).attr("table");
                    action = "get_data";
                    load_data(action, table)
                })
                //click thêm thể loại , form hiện lân , nhấn save
                $('.btn_add_suces').click(function(dt) {
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
                //update
                $('.btn-updatee').click(function(dt) {

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

                function update(form) {
                    $.ajax({
                        url: url + "update_all",
                        method: "POST",
                        data: form,

                        mimeType: "multipart/form-data",
                        processData: false,
                        contentType: false,
                        success: function(dt) {
                            load_data(action, table)
                            console.log(dt);
                            $('#message').html(dt)
                        }
                    })
                }
                //search
                $(document).on("click", '.btn_search', function() {
                    // alert("ok")
                    if ($('#txt_search').val() != "") {
                        if (table == "categories") {
                            var txt_search = $('#txt_search').val();
                            search_fc(table, txt_search)
                        }
                        if (table == "books") {
                            var txt_search = $('#txt_search').val();
                            search_fc(table, txt_search)
                        }
                        if (table == "users") {
                            var txt_search = $('#txt_search').val();
                            search_fc(table, txt_search)
                        }

                    } else {
                        alert("Mời nhập thông tin!")
                    }

                })

                function search_fc(table, data) {
                    $.ajax({
                        url: url + "search_all",
                        method: "POST",
                        data: {
                            table: table,
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
                            console.log(dt);
                            $('#message').html(dt)
                        }
                    })
                }
                //add data 
                function add(form) {
                    $.ajax({
                        url: url + "add_all",
                        method: "POST",
                        data: form,
                        mimeType: "multipart/form-data",
                        processData: false,
                        contentType: false,
                        success: function(dt) {
                            load_data(action, table)
                            console.log(dt);
                            $('#message').html(dt)
                        }
                    })
                }
                //load bảng data
                function load_data(action, table) {
                    $.ajax({
                        url: url + action,
                        method: "POST",
                        data: {
                            table: table
                        },
                        success: function(dt) {
                            $('#data').html(dt)
                        }
                    })


                }
            })
        </script>

</body>