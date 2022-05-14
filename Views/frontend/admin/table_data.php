<?php
//tên file trong view nên giống tên method trong controller
//loadview bản chất là load file index trong CategoriesController vào

if ($check_act == "categories") {
?>

    <div class="container main-content">
        <div class="col-4" style="margin-top: 20px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-cate">
                Thêm Thể Loại
            </button>
        </div>
        <div class="col-4" style="margin-top: 20px;width:100%">
            <div class="mb-4">
                <form action="" class="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg" id="txt_search" placeholder="Nhập tên thể loại">
                        <button type="button" class="input-group-text btn-success btn_search"><i class="bi bi-search me-4"></i> Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-1">STT</th>
                    <th class="col-5">Tên thể loại</th>
                    <th class="col-3">Số lượng sách</th>
                    <th class="col-3">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($datas as $cate) {
                    $i++;
                ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $cate['name_cate']  ?></td>
                        <td><?= $cate['SLuong'] ?></td>
                        <td>
                            <div class="d-grid">
                                <button id_get="<?= $cate['id_cate'] ?>" id="btn_detail" class="btn btn-sm btn-warning btn_detail">Chi Tiết</button><br>
                                <button id_get="<?= $cate['id_cate'] ?>" id="btn_update1" class="btn btn-sm btn-secondary btn_update1">Sửa</button><br>
                                <button id_get="<?= $cate['id_cate'] ?>" id="btn_delete" class="btn btn-sm btn-danger btn_delete">Xóa</button><br>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
}
?>
<?php
if ($check_act == "books") {
?>
    <div class="container main-content">
        <div class="col-4" style="margin-top: 20px;" style="float: left;">
            <div class="mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddSP">
                    Thêm Sách
                </button>

            </div>
        </div>
        <div class="col-4" style="margin-top: 20px;width:100%" style="float:right;">
            <div class="mb-4">

                <form action="" class="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg" id="txt_search" placeholder="Nhập tên sách">
                        <button type="button" class="input-group-text btn-success btn_search"><i class="bi bi-search me-4"></i> Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>

        <br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Sách</th>
                    <th scope="col">Nhà Xuất Bản Sách</th>
                    <th scope="col">Năm Sản Xuất</th>
                    <th scope="col">Số Lượng Đầu Sách</th>
                    <th scope="col">Số Sách Cho Mượn</th>
                    <!-- <th scope="col">Thuộc Thể Loại</th> -->
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($datas as $book) {
                    $i++;
                ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td>
                            <img width="100px" style="float: left;" src="./public/images/<?= $book['img_b'] ?>" class="img-fluid" alt="...">
                            <?= $book['name_b']  ?>
                        </td>
                        <td><?= $book['nxb_b']  ?></td>
                        <td><?= $book['year_b']  ?></td>
                        <td><?= $book['quantity_b']  ?></td>
                        <td><?= $book['numBorr']  ?></td>

                        <td>
                            <div class="d-grid">
                                <button id_get="<?= $book['id_b'] ?>" id="btn_detail" class="btn btn-sm btn-warning btn_detail">Chi Tiết</button><br>
                                <button id_get="<?= $book['id_b'] ?>" id="btn_update1" class="btn btn-sm btn-secondary btn_update1">Sửa</button><br>
                                <button id_get="<?= $book['id_b'] ?>" id="btn_delete" class="btn btn-sm btn-danger btn_delete">Xóa</button><br>
                            </div>
                        </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
}
?>
<?php
if ($check_act == "users") {
?>
    <div class="container main-content">
        <div class="col-4" style="margin-top: 20px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddUS">
                Thêm Người Dùng
            </button>
        </div>
        <div class="col-4" style="margin-top: 20px;width:100%" style="float:right;">
            <div class="mb-4">

                <form action="" class="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg" id="txt_search" placeholder="Nhập tên người dùng">
                        <button type="button" class="input-group-text btn-success btn_search"><i class="bi bi-search me-4"></i> Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>
        <br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Người Dùng</th>
                    <th scope="col">Ngày Sinh</th>
                    <th scope="col">Địa Chỉ</th>
                    <th scope="col">Số Điện Thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số Tiền</th>
                    <!-- <th scope="col">Thuộc Thể Loại</th> -->
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($datas as $user) {
                    $i++;
                ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td>
                            <img width="100px" style="float: left;" src="./public/images/<?= $user['avatar_u'] ?>" class="img-fluid" alt="...">
                            <?= $user['name_u']  ?>
                        </td>

                        <td><?= $user['date_u']  ?></td>
                        <td><?= $user['address_u']  ?></td>
                        <td><?= $user['phone_u']  ?></td>
                        <td><?= $user['email_u']  ?></td>
                        <td><?= $user['money']  ?></td>
                        <td>
                            <div class="d-grid">
                                <button id_get="<?= $user['id_u'] ?>" id="btn_detail" class="btn btn-sm btn-warning btn_detail">Chi Tiết</button><br>
                                <button id_get="<?= $user['id_u'] ?>" id="btn_update1" class="btn btn-sm btn-secondary btn_update1">Sửa</button><br>
                                <button id_get="<?= $user['id_u'] ?>" id="btn_delete" class="btn btn-sm btn-danger btn_delete">Xóa</button><br>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
}
?>