<?php
if (sizeof($detail_bills)) {
?>
    <br><br><br>
    <?php
    foreach ($detail_bills as  $detail_bill) {

        // -1 đã hủy
        // 0 chờ xác nhận
        // 1 chờ lây  hàng
        // 2  đang vận chuyển
        // 3 đang mượn
        // 4 xác nhận trả
        // 5 đã trả
    ?>
        <div style="border-bottom:solid 2px #ee4d2d;margin-top:50px">
            <div style="float: right;">
                <?php
                if ($act == 0) {
                ?>
                    <button status=-2 act=<?= $act ?> class="btn btn-danger  cancel_bill" id_bi=<?= $detail_bill[0]['id_bi'] ?>>Hủy đơn hàng</button>
                    <button class="btn btn-info" disabled>Chờ xác nhận</button><br><br>
                <?php
                }
                if ($act == 1) {
                ?>
                    <button status=-2 act=<?= $act ?> class="btn btn-danger  cancel_bill" id_bi=<?= $detail_bill[0]['id_bi'] ?>>Hủy đơn hàng</button>
                    <button class="btn btn-primary" disabled>Đang lấy hàng</button><br><br>
                <?php
                }
                if ($act == 2) {
                ?>
                    <button status=2 act=<?= $act ?> class="btn btn-danger btn_check_bill" id_bi=<?= $detail_bill[0]['id_bi'] ?>>Đã nhận hàng</button>
                    <button class="btn btn-primary" disabled>Đang vận chuyển</button><br><br>

                <?php
                }
                if ($act == 3) {
                ?>
                    <button status=3 act=<?= $act ?> class="btn btn-danger btn_check_bill" id_bi=<?= $detail_bill[0]['id_bi'] ?>>Trả sách</button>
                    <button class="btn btn-success" disabled>Đang mượn</button><br><br>
                <?php
                }
                if ($act == 5) {
                ?>
                    <button class="btn btn-primary borr_again" id_bi=<?= $detail_bill[0]['id_bi'] ?>>Mượn lại</button>
                    <button class="btn btn-secondary" disabled>Đã trả</button><br><br>
                <?php
                }
                if ($act == -1) {
                ?>
                    <button class="btn btn-primary borr_again" id_bi=<?= $detail_bill[0]['id_bi'] ?>>Mượn lại</button>
                    <button class="btn btn-warning" disabled>Đã hủy</button><br><br>
                <?php
                }
                ?>

            </div>
            <br><br>
            <br><br>
            <div style="text-align:center ">
                <h3><b>Mã đơn hàng : <?= $detail_bill[0]['id_bi'] ?></b></h3>
            </div>

            <table class="table table-borderless table-secondary">
                <thead>
                    <tr>
                        <th scope="col" style="width:40%">Tên sách</th>
                        <th scope="col" style="width:20%">Thể loại</th>
                        <th scope="col" style="width:20%">Số lượng</th>
                        <th scope="col" style="width:20%">Giá cọc</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($detail_bill as $detail) {
                    ?>
                        <tr>

                            <td scope="row" style="width:40%">
                                <img style="width:100px;float:left" class='container img-fluid' src="./public/images/<?= $detail['img_b'] ?>" alt="">
                                <span><?= $detail['name_b'] ?></span>
                            </td>
                            <td style="width:20%"><?= $detail['name_cate'] ?></td>
                            <td style="width:20%"><?= 1 ?></td>
                            <td style="width:20%"><?= ((float)$detail['price_b'] * 80 / 100) . "đ"; ?></td>
                        </tr>

                    <?php
                    }
                    ?>
                    <tr style="font-size:15px;">
                        <td></td>
                        <td></td>

                        <td colspan="1" class="table-active">Ngày mượn</td>
                        <td colspan="2" class="table-active"><span><b><?= date("d/m/Y", strtotime($detail['date_borr'])) ?></b></span></td>
                    </tr>
                    <?php
                    if ($act == 5) {
                    ?>
                        <tr style="font-size:15px;">
                            <td></td>
                            <td></td>

                            <td colspan="1" class="table-active">Ngày trả</td>
                            <td colspan="2" class="table-active"><span><b><?= date("d/m/Y", strtotime($detail['date_back'])) ?></b></span></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr style="font-size:20px;">
                        <td></td>
                        <td></td>

                        <td colspan="1" class="table-active">Tổng thanh toán</td>
                        <td colspan="2" class="table-active"><span style="color: red;"><b><?= $detail['total'] ?>đ</b></span></td>
                    </tr>

                </tbody>
            </table>
            <!-- <div style="margin:40px 0;margin-left:65%"><span>Tổng thanh toán:  </span><span style="color: red;"><b><?= $detail['total'] ?>đ</b></span></div> -->
        </div>

    <?php
    }
} else {
    ?>
    <div class="noBill" id="status" value="0">
        Không có đơn hàng <span class="mualai"></span>
    </div>
<?php
}
?>