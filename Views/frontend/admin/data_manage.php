<?php
if (isset($modal)) {
?>
    <div class="modal-content">

        <div class="modal-header">
            <!-- <h5 class="modal-title">Mã đơn hàng <?= $datas_bi_user['id_bi'] ?></h5> -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div style=" padding:0 5%">
                <br>
                <h3 style="text-align: center;">Mã đơn hàng <?= $datas_bi_user['id_bi'] ?> </h3>
                <br>

                <div>
                    <div>
                        <span style="width:150px">Khách hàng:<span><b><?= $datas_bi_user['name_u'] ?></b></span> </span>
                        <span style="margin-left:20%">Địa chỉ:<span><b><?= $datas_bi_user['address_u'] ?></b></span> </span> <br>
                    </div>
                    <div>
                        <span style="width:150px">Số điện thoại: <span><b><?= $datas_bi_user['phone_u'] ?></b></span> </span>
                        <span style="margin-left:20%">Email: <span><b><?= $datas_bi_user['email_u'] ?></b></span> </span> <br>
                    </div>
                    <div>
                        <span style="width:150px">Ngày mượn: <span><b><?= date("d/m/Y", strtotime($datas_bi_user['date_borr'])) ?></b></span></span>
                        <span style="margin-left:20%">Số lượng sách: <span><b><?= sizeof($datas_detail_book) . " quyển" ?> </b></span></span> <br>
                    </div>
                    <br>
                    <h4 class="text-danger center" style="text-align: center;"><b>Tổng thanh toán : <?= $datas_bi_user['total'] ?> VNĐ</b></h4>

                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:5%" scope="col-1">STT</th>
                                <th style="width:30%" scope="col-4">Tên sách</th>
                                <th style="width:10%" scope="col-4">Thể loại</th>
                                <th style="width:15%" scope="col-2">Số lượng mượn</th>
                                <th style="width:15%" scope="col-2">Số trong kho</th>
                                <th style="width:20%" scope="col-3">Giá cọc</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($datas_detail_book as $data_detail_book) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td>
                                        <img style="float:left ;" width="20%" src="./public/images/<?= $data_detail_book['img_b'] ?>" alt="">
                                        <span> <?= $data_detail_book['name_b'] ?></span>
                                    </td>
                                    <td><?= $data_detail_book['name_cate'] ?></td>
                                    <td>1</td>
                                    <td><?= $data_detail_book['quantity_b'] ?></td>
                                    <td><?= ((float)$data_detail_book['price_b'] * 80 / 100) ?>đ</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>

        </div>
    </div>
    <?php
} else {


    if (sizeof($datas) > 0) {
        if ($act == 0 || $act == 1 || $act == 2  || $act == 3 || $act == 4 || $act == 5) {
    ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Độc giả</th>
                        <th scope="col">SDT</th>
                        <th scope="col">Email</th>
                        <th scope="col">ID Đơn hàng</th>
                        <th scope="col">Ngày mượn</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($datas as $data) {
                    ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $data['name_u'] ?></td>
                            <td><?= $data['phone_u'] ?></td>
                            <td><?= $data['email_u'] ?></td>
                            <td><?= $data['id_bi'] ?></td>
                            <td><?= date("d/m/Y", strtotime($data['date_borr'])) ?></td>
                            <td><?= $data['total'] ?></td>
                            <td>

                                <?php
                                if ($act == 0) {
                                ?>
                                    <button style="width:100%" class="btn btn-secondary btn-sm btn_detail" id_bi=<?= $data['id_bi'] ?>>Chi tiết </button>
                                    <br>
                                    <br>
                                    <button style="width:100%" class="btn btn-outline-warning  btn-sm btn_cancel" id_bi=<?= $data['id_bi'] ?>>Hủy</button>
                                    <br><br>
                                    <button style="width:100%" class="btn btn-success btn-sm  btn_xacnhan" act=<?= $act ?> id_bi=<?= $data['id_bi'] ?>>Xác nhận</button>

                                <?php
                                } else if ($act == 1) {
                                ?>
                                    <button style="width:100%" class="btn btn-secondary btn-sm btn_detail" id_bi=<?= $data['id_bi'] ?>>Chi tiết </button>
                                    <br>
                                    <br>
                                    <button style="width:100%" class="btn btn-outline-warning  btn-sm btn_cancel" id_bi=<?= $data['id_bi'] ?>>Hủy</button>
                                    <br><br>
                                    <button style="width:100%" class="btn btn-primary btn-sm  btn_xacnhan" act=<?= $act ?> id_bi=<?= $data['id_bi'] ?>>Đã lấy hàng</button>

                                <?php
                                } else if ($act == 2) {
                                ?>
                                    <button style="width:100%" disabled class="btn btn-primary btn-sm  btn_xacnhan" act=<?= $act ?> id_bi=<?= $data['id_bi'] ?>>Đang vận chuyển</button>
                                <?php
                                } else if ($act == 3) { ?>
                                    <button style="width:100%" disabled class="btn btn-danger btn-sm " id_bi=<?= $data['id_bi'] ?>>Liên hệ khách hàng</button><br><br>
                                    <button style="width:100%" class="btn btn-secondary btn-sm btn_detail" id_bi=<?= $data['id_bi'] ?>>Chi tiết </button><br><br>
                                    <button style="width:100%" disabled class="btn btn-primary btn-sm  btn_xacnhan" act=<?= $act ?> id_bi=<?= $data['id_bi'] ?>>Đang Mượn</button><br><br>

                                <?php
                                } else if ($act == 4) {
                                ?>
                                    <button style="width:100%" class="btn btn-secondary btn-sm btn_detail" id_bi=<?= $data['id_bi'] ?>>Chi tiết </button><br><br>
                                    <button style="width:100%" class="btn btn-primary btn-sm  btn_xacnhan" act=<?= $act ?> id_bi=<?= $data['id_bi'] ?>>Xác nhận trả sách</button>
                                <?php
                                } else if ($act == 5) {
                                ?>
                                    <button style="width:100%" class="btn btn-secondary btn-sm btn_detail" id_bi=<?= $data['id_bi'] ?>>Chi tiết </button>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        }
    } else {
        ?>
        <div class="noBill" id="status" value="0">
            Chưa có đơn hàng <span class="mualai"></span>
        </div>
<?php
    }
}
?>