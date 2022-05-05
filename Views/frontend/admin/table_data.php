<?php
//tên file trong view nên giống tên method trong controller
//loadview bản chất là load file index trong CategoriesController vào

if ($check_act == "cate") {
?>
    <div class="container main-content">
        <div class="col-4" style="margin-top: 20px;">
            <button style="width : 100px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-cate">
                Thêm
            </button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên thể loại</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($categories as $cate) {
                    $i++;
                ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $cate['name_cate']  ?></td>
                        <td>
                            <button id_get="<?= $cate['id_cate'] ?>" id="btn_update1" class="btn btn-secondary">Sửa</button>
                            <button id_get="<?= $cate['id_cate'] ?>" id="btn_delete" class="btn btn-danger">Xóa</button>
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
if ($check_act == "book") {
?>
    <div class="container main-content">
        <div class="col-4" style="margin-top: 20px;">
            <button style="width : 100px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-cate">
                Thêm
            </button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Sách</th>
                    <th scope="col">Giá Sách</th>
                    <th scope="col">Nhà Xuất Bản Sách</th>
                    <th scope="col">Năm Sản Xuất</th>
                    <th scope="col">Số Trang</th>
                    <th scope="col">Mô Tả</th>
                    <th scope="col">Số Lượng Đầu Sách</th>
                    <th scope="col">Số Sách Cho Mượn</th>
                    <th scope="col">Link ảnh mặt trước</th>
                    <th scope="col">Link ảnh mặt sau</th>
                    <th scope="col">Thuộc Thể Loại</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($books as $book) {
                    $i++;
                ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $book['name_b']  ?></td>
                        <td><?= $book['price_b']  ?></td>
                        <td><?= $book['nxb_b']  ?></td>
                        <td><?= $book['year_b']  ?></td>
                        <td><?= $book['page_b']  ?></td>
                        <td><?= $book['des_b']  ?></td>
                        <td><?= $book['quantity_b']  ?></td>
                        <td><?= $book['numBorr']  ?></td>
                        <td><?= $book['img_b']  ?></td>
                        <td><?= $book['img1_b']  ?></td>
                        <td><?= $book['id_cate']  ?></td>
                        <td>
                            <button id_get="<?= $cate['id_cate'] ?>" id="btn_update1" class="btn btn-secondary">Sửa</button>
                            <button id_get="<?= $cate['id_cate'] ?>" id="btn_delete" class="btn btn-danger">Xóa</button>
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