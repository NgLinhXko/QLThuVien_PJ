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