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

                                        <button type="button" name_form="add_cate" class="btn btn-success btn_add_suces" style="width: 100px;">Thêm</button>
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
                        <!-- Modal -->
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
                                                    <input require type="number" id="year_b" class="form-control" name="year_b" aria-describedby="emailHelp">
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

        <!-- <script src="http://localhost:88/QLThuVien_PJ/Public/js/admin/category.js"></script> -->
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
                    // alert(name_form)


                })
                $(document).on("click", '.btn_delete', function() {
                    id = $(this).attr("id_get")
                    alert(table + id)
                })
                //delete data 
                function delete_dt(table,id) {
                    $.ajax({
                        url: url + "delete_all",
                        method: "POST",
                        data: {
                            table : table,
                            id_cate: id,
                            id_b :id
                        },
                        success: function(dt) {
                            load_data(action, table)
                            // console.log(dt);
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