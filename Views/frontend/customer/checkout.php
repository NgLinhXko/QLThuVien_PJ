<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Book Library</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    include('public/header/header.php')
    ?>
</head>

<body>

    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <!--************************************
				Header Start
		*************************************-->
        <header id="tg-header" class="tg-header tg-haslayout">
			<div class="tg-topbar">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<ul class="tg-addnav">
								<li>
									<a href="javascript:void(0);">
										<i class="icon-envelope"></i>
										<em>Contact</em>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);">
										<i class="icon-question-circle"></i>
										<em>Help</em>
									</a>
								</li>
							</ul>
							<div class="dropdown tg-themedropdown tg-currencydropdown">
								<a href="javascript:void(0);" id="tg-currenty" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="icon-earth"></i>
									<span>Currency</span>
								</a>
								<ul class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-currenty">
									<li>
										<a href="javascript:void(0);">
											<i>£</i>
											<span>British Pound</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">
											<i>$</i>
											<span>Us Dollar</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">
											<i>€</i>
											<span>Euro</span>
										</a>
									</li>
								</ul>
							</div>
							<!-- <div class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
									Dropdown button
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									<li><a class="dropdown-item" href="#">Action</a></li>
									<li><a class="dropdown-item" href="#">Another action</a></li>
									<li><a class="dropdown-item" href="#">Something else here</a></li>
								</ul>
							</div> -->
							<div class="tg-userlogin" style="float: right;">

								<?php
								if (!isset($_SESSION['email_u'])) {
									echo '<h5 id="btn_login" style="cursor: pointer;">Đăng nhập</h5>';
								} else {

									echo '<p id="btn_acc"aria-expanded="false" data-bs-toggle="dropdown" data-bs-auto-close="true" style="cursor: pointer;"><span>Tài khoản</span>

								</ul>
								</p>';
								}
								?>
								<ul class="dropdown-menu acc" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 36px);" data-popper-placement="bottom-start" aria-labelledby="dropdownMenuButton1">
									<li style="list-style: none;"><a class="dropdown-item" href="#">Thông tin tài khoản</a></li>
									<li style="list-style: none;"><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
									<li style="list-style: none;"><a class="dropdown-item" href="<?= URL ?>/index.php?controller=login&action=logout">Đăng xuất</a></li>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="tg-middlecontainer">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<strong style="width:20%" class="tg-logo"><a href="index.php"><img src="https://www.tlu.edu.vn/Portals/_default/skins/tluvie/images/logo.png" alt="company name here"></a></strong>
							<div class="tg-wishlistandcart">
								<div class="dropdown tg-themedropdown tg-wishlistdropdown">
									<a href="javascript:void(0);" id="tg-wishlisst" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="tg-themebadge">3</span>
										<i class="icon-heart"></i>
										<span>Wishlist</span>
									</a>
									<div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-wishlisst">
										<div class="tg-description">
											<p>No products were added to the wishlist!</p>
										</div>
									</div>
								</div>
								<div class="dropdown tg-themedropdown tg-minicartdropdown">
									<a href="javascript:void(0);" id="tg-minicart" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="tg-themebadge">3</span>
										<i class="icon-cart"></i>
										<span>$123.00</span>
									</a>
									<div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
										<div class="tg-minicartbody">


										</div>
										<div class="tg-minicartfoot">
											<a class="tg-btnemptycart" href="javascript:void(0);">
												<i class="fa fa-trash-o"></i>
												<span>Clear Your Cart</span>
											</a>
											<span class="tg-subtotal">Subtotal: <strong>35.78</strong></span>
											<div class="tg-btns">
												<a href="<?= URL ?>/index.php?&controller=cart" class="tg-btn tg-active" id="btn_view_cart">Xem giỏ hàng</a>
												<a href="#" class="tg-btn" id="btn_checkout">Thanh Toán</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tg-searchbox">
								<form class="tg-formtheme tg-formsearch">
									<fieldset>
										<input type="text" name="search" class="typeahead form-control" placeholder="Search by title, author, keyword, ISBN...">
										<button type="submit"><i class="icon-magnifier"></i></button>
									</fieldset>
									<a href="javascript:void(0);">+ Advanced Search</a>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-navigationarea">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<nav id="tg-nav" class="tg-nav">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
									<ul>
										<li class="menu-item-has-children current-menu-item">
											<a href="javascript:void(0);">Home</a>
											<!-- <ul class="sub-menu">
												<li class="current-menu-item"><a href="index-2.html">Home V one</a></li>
												<li><a href="indexv2.html">Home V two</a></li>
												<li><a href="indexv3.html">Home V three</a></li>
											</ul> -->
										</li>
										<li class="menu-item-has-children ">
											<a href="javascript:void(0);">Tất cả Thể loại</a>
											<div class="mega-menu">
												<ul class="tg-themetabnav" role="tablist">
													<?php
													foreach ($all_cates as $all_cate) {
													?>
														<li role="presentation">
															<a href="<?=URL?>/index.php?controller=cate&id_cate=<?=$all_cate['id_cate']?>"  role="tab" ><?= $all_cate['name_cate'] ?></a>
														</li>
													<?php
													}
													?>
												</ul>
											</div>
										</li>

										<li class="menu-item-has-children">
											<a href="javascript:void(0);">Nhà xuất bản</a>
											<ul class="sub-menu">
												<?php
												foreach ($all_nxbs as $all_nxb) {
												?>
													<li><a href="authors.html"><?= $all_nxb['nxb_b'] ?></a></li>
												<?php
												}
												?>


											</ul>
										</li>
										<li><a href="products.html">Best Selling</a></li>
										<li><a href="products.html">Weekly Sale</a></li>
										<li class="menu-item-has-children">
											<a href="javascript:void(0);">Latest News</a>
											<ul class="sub-menu">
												<li><a href="newslist.html">News List</a></li>
												<li><a href="newsgrid.html">News Grid</a></li>
												<li><a href="newsdetail.html">News Detail</a></li>
											</ul>
										</li>
										<li><a href="contactus.html">Contact</a></li>
										<li class="menu-item-has-children current-menu-item">
											<a href="javascript:void(0);"><i class="icon-menu"></i></a>
											<ul class="sub-menu">
												<li class="menu-item-has-children">
													<a href="aboutus.html">Products</a>
													<ul class="sub-menu">
														<li><a href="products.html">Products</a></li>
														<li><a href="productdetail.html">Product Detail</a></li>
													</ul>
												</li>
												<li><a href="aboutus.html">About Us</a></li>
												<li><a href="404error.html">404 Error</a></li>
												<li><a href="comingsoon.html">Coming Soon</a></li>
											</ul>
										</li>
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
        <!--************************************
				Header End
		*************************************-->
        <!--************************************
				Inner Banner Start
		*************************************-->
        <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-07.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-innerbannercontent">
                            <h1>Thanh Toán</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--************************************
				Inner Banner End
		*************************************-->
        <!--************************************
				Main Start
		*************************************-->
        <main id="tg-main" class="tg-main tg-haslayout">
            <div id="data" style="margin-left: 15%;margin-right:15%">

            </div>
        </main>

        <!--************************************
				Footer Start
		*************************************-->
        <footer id="tg-footer" class="tg-footer tg-haslayout">
            <div class="tg-footerarea">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <ul class="tg-clientservices">
                                <li class="tg-devlivery">
                                    <span class="tg-clientserviceicon"><i class="icon-rocket"></i></span>
                                    <div class="tg-titlesubtitle">
                                        <h3>Fast Delivery</h3>
                                        <p>Shipping Worldwide</p>
                                    </div>
                                </li>
                                <li class="tg-discount">
                                    <span class="tg-clientserviceicon"><i class="icon-tag"></i></span>
                                    <div class="tg-titlesubtitle">
                                        <h3>Open Discount</h3>
                                        <p>Offering Open Discount</p>
                                    </div>
                                </li>
                                <li class="tg-quality">
                                    <span class="tg-clientserviceicon"><i class="icon-leaf"></i></span>
                                    <div class="tg-titlesubtitle">
                                        <h3>Eyes On Quality</h3>
                                        <p>Publishing Quality Work</p>
                                    </div>
                                </li>
                                <li class="tg-support">
                                    <span class="tg-clientserviceicon"><i class="icon-heart"></i></span>
                                    <div class="tg-titlesubtitle">
                                        <h3>24/7 Support</h3>
                                        <p>Serving Every Moments</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tg-threecolumns">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="tg-footercol">
                                    <strong class="tg-logo"><a href="javascript:void(0);"><img src="images/flogo.png" alt="image description"></a></strong>
                                    <ul class="tg-contactinfo">
                                        <li>
                                            <i class="icon-apartment"></i>
                                            <address>Suit # 07, Rose world Building, Street # 02, AT246T Manchester</address>
                                        </li>
                                        <li>
                                            <i class="icon-phone-handset"></i>
                                            <span>
                                                <em>0800 12345 - 678 - 89</em>
                                                <em>+4 1234 - 4567 - 67</em>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="icon-clock"></i>
                                            <span>Serving 7 Days A Week From 9am - 5pm</span>
                                        </li>
                                        <li>
                                            <i class="icon-envelope"></i>
                                            <span>
                                                <em><a href="mailto:support@domain.com">support@domain.com</a></em>
                                                <em><a href="mailto:info@domain.com">info@domain.com</a></em>
                                            </span>
                                        </li>
                                    </ul>
                                    <ul class="tg-socialicons">
                                        <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                        <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                        <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                        <li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="tg-footercol tg-widget tg-widgetnavigation">
                                    <div class="tg-widgettitle">
                                        <h3>Shipping And Help Information</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>
                                            <li><a href="javascript:void(0);">Terms of Use</a></li>
                                            <li><a href="javascript:void(0);">Terms of Sale</a></li>
                                            <li><a href="javascript:void(0);">Returns</a></li>
                                            <li><a href="javascript:void(0);">Privacy</a></li>
                                            <li><a href="javascript:void(0);">Cookies</a></li>
                                            <li><a href="javascript:void(0);">Contact Us</a></li>
                                            <li><a href="javascript:void(0);">Our Affiliates</a></li>
                                            <li><a href="javascript:void(0);">Vision &amp; Aim</a></li>
                                        </ul>
                                        <ul>
                                            <li><a href="javascript:void(0);">Our Story</a></li>
                                            <li><a href="javascript:void(0);">Meet Our Team</a></li>
                                            <li><a href="javascript:void(0);">FAQ</a></li>
                                            <li><a href="javascript:void(0);">Testimonials</a></li>
                                            <li><a href="javascript:void(0);">Join Our Team</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="tg-footercol tg-widget tg-widgettopsellingauthors">
                                    <div class="tg-widgettitle">
                                        <h3>Top Selling Authors</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>
                                            <li>
                                                <figure><a href="javascript:void(0);"><img src="images/author/imag-09.jpg" alt="image description"></a></figure>
                                                <div class="tg-authornamebooks">
                                                    <h4><a href="javascript:void(0);">Jude Morphew</a></h4>
                                                    <p>21,658 Published Books</p>
                                                </div>
                                            </li>
                                            <li>
                                                <figure><a href="javascript:void(0);"><img src="images/author/imag-10.jpg" alt="image description"></a></figure>
                                                <div class="tg-authornamebooks">
                                                    <h4><a href="javascript:void(0);">Shaun Humes</a></h4>
                                                    <p>20,257 Published Books</p>
                                                </div>
                                            </li>
                                            <li>
                                                <figure><a href="javascript:void(0);"><img src="images/author/imag-11.jpg" alt="image description"></a></figure>
                                                <div class="tg-authornamebooks">
                                                    <h4><a href="javascript:void(0);">Kathrine Culbertson</a></h4>
                                                    <p>15,686 Published Books</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tg-newsletter">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <h4>Signup Newsletter!</h4>
                            <h5>Consectetur adipisicing elit sed do eiusmod tempor incididunt.</h5>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <form class="tg-formtheme tg-formnewsletter">
                                <fieldset>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email ID">
                                    <button type="button"><i class="icon-envelope"></i></button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tg-footerbar">
                <a id="tg-btnbacktotop" class="tg-btnbacktotop" href="javascript:void(0);"><i class="icon-chevron-up"></i></a>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <span class="tg-paymenttype"><img src="images/paymenticon.png" alt="image description"></span>
                            <span class="tg-copyright">2017 All Rights Reserved By &copy; Book Library</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--************************************
				Footer End
		*************************************-->
    </div>
    <!--************************************
			Wrapper End
	*************************************-->
    <?php
    include('login.php');
    include('Public/public/footer.php');
    include('public/header/footer.php');
    ?>
    <script src="<?= URL ?>/Public/js/login/index.js"></script>
    <script>
        url = "<?= URL ?>/index.php?"
        load_table_cart()


        function load_table_cart() {
            $.ajax({
                url: url + "controller=checkout&action=info",
                method: "POST",
                data: {
                    actions: "info"
                },
                success: function(dt) {
                    $('#data').html(dt)

                }
            })
        }
        $(document).on("click", "#btn_bank", function() {
            money = parseInt($(this).attr("money"))
            tong = parseInt($(this).attr("tong"))
            $('#modal_rule').modal('show')


        })
        $('#btn_modal_rule').click(function() {
            money = parseInt($("#btn_bank").attr("money"))
            tong = parseInt($("#btn_bank").attr("tong"))
            $('#modal_rule').modal('hide')
            if (money - tong >= 50000) {
                $.ajax({
                    url: url + "controller=checkout&action=banking",
                    method: "POSt",
                    data: {
                        money: money,
                        tong: tong
                    },
                    success: function(dt) {

                        $('#msg_modal').modal('show')
                        $('#text_msg').html(dt)
                        setTimeout(function() {
                            $('#msg_modal').modal('hide')
                            window.location.href = url
                        }, 3000)
                        // console.log(dt)
                    }
                })
            } else {
                $('#modal_banking').modal('show')
                $('#now_money').html(money)
                $('.choose').click(function() {
                    // $('.choose').each(function(){
                    //     // $('.choose').removeClass("btn-success")
                    //     if($(this))
                    // })
                    $('.choose').removeClass("btn-success")
                    $(this).removeClass("btn-secondary")
                    $(this).addClass("btn-success")
                    $('#input_money').prop("hidden", false)
                    $('#ck_banking').prop("disabled", false)
                })
            }
        })
        $('#ck_banking').click(function() {
            val_money = $('#input_money').val();
            money_now = $('#now_money').html()
            if (val_money >= 10000) {
                $.ajax({
                    url: url + "controller=checkout&action=ck_banking",
                    method: "POST",
                    data: {
                        val_money: val_money,
                        money_now: money_now
                    },
                    success: function(dt) {
                        load_table_cart()
                        $('#modal_banking').modal('hide')
                        $('#input_money').val("");
                        $('#msg_modal').modal('show')
                        $('#text_msg').html(dt)
                        setTimeout(function() {
                            $('#msg_modal').modal('hide')

                        }, 3000)
                    }
                })
            }
        })
    </script>
</body>

</html>