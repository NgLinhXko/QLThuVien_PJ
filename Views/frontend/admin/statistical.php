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
                                <li class="nav-item "> <a class="nav-link" href="<?= URL ?>/index.php?controller=statisti"> <i class="fas fa-book"></i>Thống kê</a> </li>

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
                            <br><br>
                            <div class="input-group mb-3">
                                <div class="form-floating mb-3">
                                    <!-- 0 : thống kê đơn hàng
                                    1: thống kê sách -->
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option value="0" selected>Thống kê đơn hàng</option>
                                        <option value="1">Thống kê sách</option>

                                    </select>
                                </div>
                                <div class="form-floating mb-3" style="margin-left: 10%;">
                                    <input type="date" class="form-control" id="date_start" placeholder="name@example.com">
                                    <label for="floatingInput">Ngày bắt đầu</label>
                                </div>
                                <div class="form-floating mb-3" style="margin-left: 10%;">
                                    <input readonly type="date" class="form-control" id="date_end" placeholder="Password">
                                    <label for="floatingPassword">Ngày kết thúc</label>
                                </div>
                                <div class="form-floating mb-3" style="margin-left: 10%;">
                                    <button class="btn btn-success" id="btn_statis">Thống kê</button>
                                </div>

                            </div>
                            <div id="data_stisti">

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
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script> -->
<script>
    $(document).ready(function() {
        url1 = "http://localhost:8080/QLThuVien_PJ/index.php?";
        now = new Date().toLocaleDateString()
        today = Date.parse(now);
        date_s = ""
        date_e = ""
        date_start = ""
        date_end = ""
        status = -2;
        $('#btn_statis').click(function() {

            date_s = $('#date_start').val()
            date_start = Date.parse(date_s)
            date_e = $('#date_end').val()
            date_end = Date.parse(date_e)
            if (date_s == "" || date_e == "") {
                load_msg("Vui lòng chọn ngày")
            } else {
                act_tt = $(".form-select").val()
                load_data_static(date_s, date_e, act_tt, status)
            }
        })
        $(document).on("change", "#table_status", function() {
            status = $(this).val();
            load_data_static(date_s, date_e, act_tt, status)

        })


        $('#date_start').change(function() {
            date_s = $('#date_start').val()
            date_start = Date.parse(date_s)
            if (date_start > today) {
                load_msg("Ngày bắt đầu phải nhỏ hơn ngày hiện tại");
                date_s = $('#date_start').val("")
                $('#date_end').prop("readonly", true)
            } else {
                $('#date_end').prop("readonly", false)
            }

        })
        $('#date_end').change(function() {
            date_e = $('#date_end').val()
            date_end = Date.parse(date_e)
            // date_s = $('#date_start').val()
            // date_start = Date.parse(date_s)
            if (date_end >= today) {
                load_msg("Ngày kết thúc phải nhỏ hơn ngày hiện tại");
                date_e = $('#date_end').val("")
            }
            if (date_end < date_start) {
                load_msg("Ngày kết thúc phải lớn hơn ngày bắt đầu");
                date_e = $('#date_end').val("")
            }
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

        function load_data_static(date_s, date_e, act_tt, status) {
            $.ajax({
                url: url1 + "controller=statisti&action=get_data",
                method: "POSt",
                data: {
                    date_s: date_s,
                    date_e: date_e,
                    act_tt: act_tt,
                    status: status
                },
                success: function(dt) {
                    $('#data_stisti').html(dt)
                }
            })
        }
    })
</script>