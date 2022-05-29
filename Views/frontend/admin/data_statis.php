<?php
if ($act_tt == 0) {
    // echo'<pre>';
    // print_r($datail_bills);
    // echo"</pre>";
    if (sizeof($all_bills) > 0) {


?>
        <div class="container">
            <div style="text-align: center;">
                <h3><b>Thống kê đơn hàng</b></h3>
            </div>
            <div style="margin-top: 50px;">
                <div class="row">
                    <div>
                        <span>Từ ngày : <b><?= date("d/m/Y", strtotime($date_s)) ?></b> đến ngày <b><?= date("d/m/Y", strtotime($date_e)) ?></b></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <span>Tổng số đơn hàng : <b><?= sizeof($all_bills) ?></b></span>
                    </div>
                    <div class="col-6">
                        <span>Tổng số tiền lãi : <b><?= $tienlai ?>đ</b></span>
                    </div>
                </div><br><br>
                <div class="row">
                    <div style="width:100px;background:#f8d7da;height:50px;text-align:center;line-height:50px ;"><span>Đã hủy</span></div>
                    <div style="width:100px;background:#d1e7dd;height:50px;text-align:center ;line-height:50px ;"><span>Đã trả</span></div>
                    <div style="width:100px;background:#fff3cd;height:50px;text-align:center ;line-height:50px ;"><span>Đơn cảnh báo</span></div>

                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">ID Đơn hàng</th>
                            <th scope="col">Số lượng SP</th>
                            <th scope="col">Ngày mượn</th>
                            <th scope="col">Ngày trả</th>
                            <th scope="col">Tổng tiền cọc</th>
                            <th scope="col">
                                <!-- <span>Trạng thái</span> -->
                                <select class="form-select status " id="table_status">
                                    <option value="-2" <?php if ($status == -2) {
                                                            echo "selected";
                                                        } ?>>Tất cả</option>
                                    <option value="0" <?php if ($status == 0) {
                                                            echo "selected";
                                                        } ?>>Chờ xác nhận</option>
                                    <option value="1" <?php if ($status == 1) {
                                                            echo "selected";
                                                        } ?>>Chờ lấy hàng</option>
                                    <option value="2" <?php if ($status == 2) {
                                                            echo "selected";
                                                        } ?>>Đang vận chuyển</option>
                                    <option value="3" <?php if ($status == 3) {
                                                            echo "selected";
                                                        } ?>>Đang mượn</option>
                                    <option value="4" <?php if ($status == 4) {
                                                            echo "selected";
                                                        } ?>>Chờ xác nhận trả</option>
                                    <option value="5" <?php if ($status == 5) {
                                                            echo "selected";
                                                        } ?>>Đã trả</option>
                                    <option value="-1" <?php if ($status == -1) {
                                                            echo "selected";
                                                        } ?>>Đã hủy</option>
                                </select>
                            </th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $dem = 0;
                        $check = 1;
                        foreach ($all_bills as $bill) {
                            $check_money = 0;
                            $sldon = sizeof($datail_bills[$dem++]);
                            $second_date = strtotime($bill['date_borr']);

                            if ($bill['status'] != "-1") {
                                if ($bill['date_back'] == "") {
                                    $first_date = strtotime(date("Y/m/d"));
                                } else {
                                    $first_date = strtotime($bill['date_back']);
                                }
                                $datediff = abs($first_date - $second_date);
                                $days = floor($datediff / (60 * 60 * 24));
                                $check_money = $sldon * 2000 * $days;
                            }

                        ?>
                            <tr <?php
                                if ($status == -2) {
                                } else {
                                    if ($status != $bill['status']) {
                                        echo 'hidden';
                                    }
                                }

                                ?> class="<?php
                                            if ($bill['status'] != -1) {
                                                if ($bill['status'] == 5) {
                                                    echo "table-success";
                                                } else if ($check_money > $bill['total']) {
                                                    echo "table-Warning";
                                                }
                                            } else {
                                                echo "table-danger";
                                            }

                                            ?>">
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $bill['id_bi'] ?></td>
                                <td><?= $sldon ?></td>
                                <th scope="row"><?= date("d/m/Y", strtotime($bill['date_borr'])); ?></th>
                                <td><?php
                                    if ($bill['date_back'] == "") {
                                        echo "Chưa trả";
                                    } else {
                                        echo date("d/m/Y", strtotime($bill['date_back']));
                                    }
                                    ?></td>
                                <td><?= $bill['total'] ?></td>
                                <td><?php
                                    switch ($bill['status']) {
                                        case -1:
                                            echo  "Đã hủy";
                                            break;
                                        case 0:
                                            echo  "Chờ xác nhận";
                                            break;
                                        case 1:
                                            echo  "Chờ lấy hàng";
                                            break;
                                        case 2:
                                            echo  "Đang giao hàng";
                                            break;
                                        case 3:
                                            echo  "Đang mượn";
                                            break;
                                        case 4:
                                            echo  "Chờ xác nhận trả";
                                            break;
                                        case 5:
                                            echo  "Đã trả";
                                            break;
                                    }
                                    ?></td>
                                <td><button id_bi=<?= $bill['id_bi'] ?> class="btn btn-info btn_detail">Chi tiết đơn hàng</button></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>


            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="noBill" id="status" value="0">
            Không có đơn hàng <span class="mualai"></span>
        </div>
<?php
    }
} else {
}
