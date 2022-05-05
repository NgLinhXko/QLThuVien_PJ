<?php
//tên file trong view nên giống tên method trong controller
//loadview bản chất là load file index trong CategoriesController vào

if ($check_act == "categories") {
?>
    <div class="container main-content">
        <div class="col-4" style="margin-top: 20px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-cate">
                Thêm
            </button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên thể loại</th>
                    <th scope="col">Số lượng sách</th>
                    <th scope="col">Thao tác</th>
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
                        <td><?= 5  ?></td>
                        <td>
                            <button id_get="<?= $cate['id_cate'] ?>" id="btn_update1" class="btn btn-secondary">Sửa</button>
                            <button id_get="<?= $cate['id_cate'] ?>" id="btn_delete" class="btn btn-danger btn_delete">Xóa</button>
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
        <div class="col-4" style="margin-top: 20px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddSP">
                Thêm sách
            </button>
        </div>
        <br><br>
        <table class="table">
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
                            <img width="100px" style="float: left;" src="./public/images/<?= $book['img_b']?>" class="img-fluid" alt="...">
                            <?= $book['name_b']  ?>
                        </td>
                        <td><?= $book['nxb_b']  ?></td>
                        <td><?= $book['year_b']  ?></td>
                        <td><?= $book['quantity_b']  ?></td>
                        <td><?= $book['numBorr']  ?></td>

                        <td>
                            <button id_get="<?= $book['id_cate'] ?>" id="btn_update1" class="btn btn-secondary">Sửa</button>
                            <button id_get="<?= $book['id_cate'] ?>" id="btn_delete" class="btn btn-danger btn_delete">Xóa</button>
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