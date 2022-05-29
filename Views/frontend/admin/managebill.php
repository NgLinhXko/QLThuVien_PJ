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

                                <li class="nav-item "> <a class="nav-link" href="<?= URL ?>/index.php?controller=admin"><i class="fas fa-hospital-alt"></i></i>Quản Lý</a> </li>

                                <li class="nav-item "> <a class="nav-link" href="<?= URL ?>/index.php?controller=managebill"> <i class="fas fa-chalkboard-teacher"></i></i>Quản Lý Mượn trả</a> </li>
                                <li class="nav-item "> <a class="nav-link" href="#"> <i class="fas fa-book"></i>Thống kê</a> </li>

                            </ul>
                        </div>
                        <nav class="navbar navbar-light">
                            <div class="container-fluid">
                                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fas fa-bars"></i></a>
                                <form class="d-flex">
                                    <a id="profile_tch" href="#" class="navbar-brand">Tài khoản</a>
                                    <a href="<?= URL ?>/index.php?controller=login&action=logout" class="navbar-brand">Đăng xuất</a>
                                </form>
                            </div>
                        </nav>
                        <div class="container main-content">
                            <br>
                            <div class="row" style="text-align: center;">
                                <span class="col-2 choose choose_border" act="0">Chờ xác nhận<span class="text-danger sl_bill0"></span></span>
                                <span class="col-2 choose" act="1">Chờ lấy hàng<span class="text-danger sl_bill1"></span></span>
                                <span class="col-2 choose" act="2">Đang vận chuyển<span class="text-danger sl_bill2"></span></span>
                                <span class="col-2 choose" act="3">Đang mượn<span class="text-danger sl_bill3"></span></span>
                                <span class="col-2 choose" act="4">Xác nhận trả sách<span class="text-danger sl_bill4"></span></span>
                                <span class="col-2 choose" act="5">Đã trả<span class="text-danger sl_bill5"></span></span>
                            </div>
                            <div id="data">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="modal_detail_bill" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg" id="dialog_detail">

        </div>
    </div>
</body>
<?php
include('Public/public/footer.php')
?>
<script>
    $(document).ready(function() {
        url1 = "http://localhost:8080/QLThuVien_PJ/index.php?"
        load_act(0)
        $('.choose').mouseover(function() {
            $('.choose').removeClass("text-danger")
            $(this).addClass("text-danger")
        })
        $('.choose').mouseleave(function() {
            $('.choose').removeClass("text-danger")
        })
        $('.choose').click(function() {
            $(".choose").removeClass("choose_border")
            $(this).addClass("choose_border")
            act = $(this).attr("act")
            //  alert(act)
            load_act(act)
        })


        $(document).on("click", ".btn_xacnhan", function() {
            id_bi = $(this).attr("id_bi");
            status = $(this).attr("act");
            update_bill(status)
            // alert(status)
        })
        $(document).on("click", ".btn_cancel", function() {
            id_bi = $(this).attr("id_bi");
            $.ajax({
                url: url1 + "controller=managebill&action=update_bill",
                method: "POST",
                data: {
                    id_bi: id_bi,
                    status: -2
                },
                success: function(dt) {

                    load_act(act)
                    load_msg(dt)

                }
            })
        })
        $(document).on("click", ".btn_detail", function() {
            id_bi = $(this).attr("id_bi");
            data_detail(id_bi)
        })

        function data_detail(id_bi) {
            $.ajax({
                url: url1 + "controller=managebill&action=data_detail",
                method: "POST",
                data: {
                    id_bi: id_bi,
                },
                success: function(dt) {
                    $('#modal_detail_bill').modal('show')
                    $('#dialog_detail').html(dt)
                }
            })
        }

        function update_bill(status) {
            $.ajax({
                url: url1 + "controller=managebill&action=update_bill",
                method: "POST",
                data: {
                    id_bi: id_bi,
                    status: status
                },
                success: function(dt) {
                    console.log(dt)
                    load_act(status)
                    load_msg(dt)

                }
            })
        }

        function load_act(act) {
            $.ajax({
                url: url1 + "controller=managebill&action=get_dtmanage",
                method: "POST",
                data: {
                    act: act
                },
                success: function(dt) {
                    $('#data').html(dt)
                    count_bill()
                    // console.log(dt)
                }
            })
        }

        function count_bill() {
            $.ajax({
                url: url1 + "controller=managebill&action=count_bill",
                method: "POST",
                data: {

                },
                dataType: 'json',
                success: function(dt) {

                    for (i = 0; i <= 5; i++) {
                        if (dt[i] > 0) {
                            $('.sl_bill' + i).html("(" + dt[i] + ")")
                        } else {
                            $('.sl_bill' + i).html("")
                        }

                    }
                }
            })
        }
    })
</script>