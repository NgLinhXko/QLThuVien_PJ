<?php
const URL1 = "http://localhost:8080/QLthuVien_PJ/index.php?";
$index = sizeof($_SESSION['cart']);
$tong = 0;
for ($i = 0; $i < $index; $i++) {
    $tong = $tong +  ((float)$_SESSION['cart'][$i][0]['price_b'] * 80 / 100);
}
if ($actions == "total_cart") {
    if ($index > 0) {
        if ($index >= 4) {
            $limit = 4;
        } else {
            $limit = $index;
        }

        for ($i = $index - 1; $i >= $index - $limit; $i--) {
?>
            <div class="tg-minicarproduct">
                <figure style="width:20%">
                    <img src="./public/images/<?= $_SESSION['cart'][$i][0]['img_b'] ?>" alt="image description">

                </figure>
                <div class="tg-minicarproductdata" style="width:60%">
                    <h5><a href="<?= URL1 ?>&controller=product&id_b=<?= $_SESSION['cart'][$i][0]['id_b'] ?>"><?= $_SESSION['cart'][$i][0]['name_b'] ?></a></h5>
                    <h6><a href="<?= URL1 ?>&controller=product&id_b=<?= $_SESSION['cart'][$i][0]['id_b'] ?>"><?= ((float)$_SESSION['cart'][$i][0]['price_b'] * 80 / 100) . "đ"; ?></a></h6>
                </div>
            </div>
        <?php
        }

        if ($index > 4) {
        ?>
            <div id="data_cart_get" total=<?= $tong ?> style="text-align:center ;">
                <a href="<?= URL1 ?>&controller=cart" style="color:red;font-size:13px">Còn <?= $index - 4 ?> sản phẩm nữa</a>
            </div>
        <?php
        } else {
        ?>
            <div id="data_cart_get" total=<?= $tong ?> style="text-align:center ;">
            </div>
        <?php
        }
    } else {
        ?>
        <div id="data_cart_get" total=<?= $tong ?> style="text-align:center ;">
            <a href="" style="color:red;font-size:13px">Không có sản phẩm nào</a>
        </div>
    <?php

    }
} else if ($actions == "table_cart") {
    if ($index > 0) {


    ?>

        <table class="table">
            <thead>
                <tr>
                    <th style="width:10%" scope="col-1">STT</th>
                    <th style="width:50%" scope="col-4">Tên sách</th>
                    <th style="width:10%" scope="col-2">Số Lượng</th>
                    <th style="width:20%" scope="col-3">Giá cọc</th>
                    <th style="width:10%" scope="col-2">Thao tác</th>

                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < $index; $i++) {
                ?>
                    <tr>
                        <th scope="row"><?= $i + 1 ?></th>
                        <td>
                            <img style="float:left ;" width="20%" src="./public/images/<?= $_SESSION['cart'][$i][0]['img_b'] ?>" alt="">
                            <span> <?= $_SESSION['cart'][$i][0]['name_b'] ?></span>
                        </td>
                        <td>1</td>
                        <td><?= ((float)$_SESSION['cart'][$i][0]['price_b'] * 80 / 100) ?>đ</td>
                        <td><i style="cursor: pointer;font-size:20px" class="fa fa-trash-o delete_cart_id text-danger" id_b=<?= $i ?>></i></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="bg-warning" id="checkout" style="width: 70%;height: 50px;font-size: 24px;position: fixed;z-index: 5;bottom: 0;">
            <span style="line-height: 50px;margin-left:20%">Tổng thanh toán: <?= $tong ?>đ (<?= $index ?> quyển)</span>
            <!-- <a id="btn_checkout" href="&controller=checkout"> -->
            <button id="btn_checkout" style="float: right;line-height: 50px;" class="btn btn-success">Thanh toán</button>
            <!-- </a> -->
        </div>
        <!-- <button style="float: right ;" class="btn btn-success">Thanh toán</button> -->
    <?php
    } else {
    ?>
        <div style="text-align:center ;">

            <div class="noBook" id="status" value="0">
                Chưa có quyển sách nào <span class="mualai"></span>
                <br>
                <a href="<?= URL1 ?>">
                    <button class="btn btn-success btn-lg">Tiếp tục chọn</button>
                </a>
            </div>

            <br>

        </div>
        <br>
        <br>;
    <?php
    }
} else if ($actions == "info") {
    ?>
    <div style=" border-style: solid; margin-left:20%; margin-right:20%;padding:0 5%">
        <br><br>
        <h3 style="text-align: center;">Hoá Đơn</h3>
        <br>
        <br>
        <div>
            <span>Khách hàng: </span> <span><b><?= $datas_user[0]['name_u'] ?></b></span><br><br>
            <span>Địa chỉ: </span> <span><b><?= $datas_user[0]['address_u'] ?></b></span><br><br>
            <span>Số điện thoại: </span> <span><b><?= $datas_user[0]['phone_u'] ?></b></span><br><br>
            <span>Email: </span> <span><b><?= $datas_user[0]['email_u'] ?></b></span><br><br>
            <span>Ngày mượn: </span> <span><b><?= date("d/m/Y") ?></b></span><br><br>
            Chi tiết hóa đơn :
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:10%" scope="col-1">STT</th>
                        <th style="width:50%" scope="col-4">Tên sách</th>
                        <th style="width:10%" scope="col-2">Số Lượng</th>
                        <th style="width:20%" scope="col-3">Giá cọc</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < $index; $i++) {
                    ?>
                        <tr>
                            <th scope="row"><?= $i + 1 ?></th>
                            <td>
                                <img style="float:left ;" width="20%" src="./public/images/<?= $_SESSION['cart'][$i][0]['img_b'] ?>" alt="">
                                <span> <?= $_SESSION['cart'][$i][0]['name_b'] ?></span>
                            </td>
                            <td>1</td>
                            <td><?= ((float)$_SESSION['cart'][$i][0]['price_b'] * 80 / 100) ?>đ</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <br>
            <br>

            <h4 class="text-danger center" style="text-align: center;"><b>Tổng thanh toán : <?= $tong ?> VNĐ</b></h4>
            <br>
            <br>
        </div>

    </div>
    <br>
    <br>
    <div class="row">
        <span class="col-6">
            <a href="<?=URL1?>controller=cart"> <button class="btn btn-primary btn-lg">Quay lại giỏ hàng</button></a>
        </span>
        <span  class="col-6">

            <button style="float:right ;" id="btn_bank" tong=<?= $tong ?> money=<?= $datas_user[0]['money'] ?> class="btn btn-success btn-lg">Xác nhận thanh toán</button>
        </span>
    </div>

    <br><br><br>
<?php
}

?>