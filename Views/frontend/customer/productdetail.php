<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Book Library</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script> -->
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
										<span class="tg-themebadge number_cart"></span>
										<i class="icon-cart"></i>
										<!-- <span>$123.00</span> -->
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
															<a href="<?= URL ?>/index.php?controller=cate&id_cate=<?= $all_cate['id_cate'] ?>" role="tab"><?= $all_cate['name_cate'] ?></a>
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
							<h1>Tất cả sản phẩm</h1>
							<ol class="tg-breadcrumb">
								<li><a href="<?= URL ?>">Trang chủ</a></li>
								<li>Thể loại</li>
								<li class="tg-active"><a href="<?= URL ?>/index.php?controller=cate&id_cate=<?=$datas_book['id_cate']?>"><?= $datas_book['name_cate'] ?></a></li>
							</ol>
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
			<!--************************************
					News Grid Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div id="tg-twocolumns" class="tg-twocolumns">
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
								<div id="tg-content" class="tg-content">
									<div class="tg-featurebook alert" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<?php
										foreach ($randomBooks as $randomBook) {
										?>
											<div class="tg-featureditm">
												<div class="row">
													<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
														<figure><img style="width:100%" class="img-fluid" src="./public/images/<?= $randomBook['img_b'] ?>" alt="image description"></figure>
													</div>
													<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
														<div class="tg-featureditmcontent">
															<div class="tg-themetagbox"><span class="tg-themetag"><?= $randomBook['name_cate'] ?></span></div>
															<div class="tg-booktitle">
																<h3><a href="<?=URL?>/index.php?controller=product&id_b=<?=$randomBook['id_b']?>"><?= $randomBook['name_b'] ?></a></h3>
															</div>
															<span class="tg-bookwriter">NXB: <a href="javascript:void(0);"><?= $randomBook['nxb_b'] ?></a></span>
															<span class="tg-stars"><span></span></span>
															<div class="tg-priceandbtn">
																<span class="tg-bookprice">
																	<ins><?= ((float)$randomBook['price_b'] * 80 / 100) . "đ"; ?></ins>
																	<del><?= $randomBook['price_b'] ?></del>
																</span>
																<a class="tg-btn tg-btnstyletwo tg-active" id_b=<?= $randomBook['id_b'] ?> href="javascript:void(0);">
																	<i class="fa fa-shopping-basket"></i>
																	<em>Thêm giỏ hàng</em>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php
										}

										?>

									</div>
									<div class="tg-productdetail">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
												<div class="tg-postbook">
													<figure class="tg-featureimg"><img src="./public/images/<?= $datas_book['img_b'] ?>" alt="image description"></figure>
													<div class="tg-postbookcontent">
														<span class="tg-bookprice">
															<ins><?= ((float)$datas_book['price_b'] * 80 / 100) . "đ"; ?></ins>
															<del><?= $datas_book['price_b'] ?></del>
														</span>
														<!-- <span class="tg-bookwriter">You save $4.02</span> -->
														<ul class="tg-delevrystock">
															<li><i class="icon-rocket"></i><span>Miễn phí vận chuyển.</span></li>
															<li><i class="icon-checkmark-circle"></i><span>Giao hàng nhanh chóng</span></li>
															<li><i class="icon-store"></i><span>Trạng thái: <em><?php
																												if ((int)$datas_book['quantity_b'] > 0) {
																													echo 'Còn';
																												} else {
																													echo 'Hết';
																												}

																												?></em></span></li>
														</ul>
														<div class="tg-quantityholder">
															<em class="minus">-</em>
															<input type="number" min=1 max=1 class="result" value="1" readonly id="quantity1" name="quantity">
															<em class="plus">+</em>
														</div>
														<a class="tg-btn tg-active tg-btnstyletwo tg-btn-lg" id="add_cart" id_b=<?= $datas_book['id_b'] ?> href="javascript:void(0);">Thêm vào giỏ hàng</a>
														<a class="tg-btnaddtowishlist" href="javascript:void(0);">
															<span>Thêm vào yêu thích</span>
														</a>
													</div>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
												<div class="tg-productcontent">
													<ul class="tg-bookscategories">
														<li><a href="<?=URL?>/index.php?controller=cate&id_cate=<?=$datas_book['id_cate']?>"><?= $datas_book['name_cate'] ?></a></li>
													</ul>
													<div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
													<div class="tg-booktitle">
														<h3><?= $datas_book['name_b'] ?></h3>
													</div>
													<span class="tg-bookwriter">NXB:<a href="javascript:void(0);"><?= $datas_book['nxb_b'] ?></a></span>
													<span class="tg-stars"><span></span></span>
													<span class="tg-addreviews"><a href="javascript:void(0);">Thêm đánh giá</a></span>
													<div class="tg-share">
														<span>Share:</span>
														<ul class="tg-socialicons">
															<li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
															<li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
															<li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
															<li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
															<li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
														</ul>
													</div>
													<div class="tg-description">
														<p><?= $datas_book['des_b'] ?></p>
													</div>
													<div class="tg-sectionhead">
														<h2>Chi tiêt Sách</h2>
													</div>
													<ul class="tg-productinfo">
														<li><span>Tên sách:</span><span><?= $datas_book['name_b'] ?></span></li>
														<li><span>Giá cọc:</span><span><?php
																						echo ((float)$datas_book['price_b'] * 80 / 100) . "  Đ";
																						?></span></li>
														<li><span>Kích cỡ:</span><span>153 x 234 x 43mm | 758g</span></li>
														<li><span>Nhà xuất bản:</span><span><?= $datas_book['nxb_b'] ?></span></li>
														<li><span>Năm xuất bản:</span><span><?= $datas_book['year_b'] ?></span></li>
														<li><span>Số trang:</span><span><?= $datas_book['page_b'] ?></span></li>
														<li><span>Ngôn ngữ:</span><span>Tiếng Việt</span></li>
														<li><span>Số lượng còn:</span><span><?= $datas_book['quantity_b'] ?></span></li>
														<li><span>Số lượng mượn:</span><span><?= $datas_book['numBorr'] ?></span></li>
														<li><span>Thuộc thể loại:</span><a href="<?=URL?>/index.php?controller=cate&id_cate=<?=$datas_book['id_cate']?>"><span><?= $datas_book['name_cate'] ?></a></span></li>
														<!-- <li><span>Other Fomate:</span><span>CD-Audio, Paperback, E-Book</span></li> -->
													</ul>

												</div>
											</div>

											<div class="tg-aboutauthor">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<div class="tg-sectionhead">
														<h2>Thông tin về nhà xuất bản</h2>
													</div>
													<div class="tg-authorbox">
														<figure class="tg-authorimg">
															<img src="https://mcdn.nhanh.vn/store3/94460/brand/image_1624095775_153.jpg" alt="image description">
														</figure>
														<div class="tg-authorinfo">
															<div class="tg-authorhead">
																<div class="tg-leftarea">

																	<div class="tg-authorname">
																		<h2><?= $datas_book['nxb_b'] ?></h2>
																		<div class="tg-rightarea">
																			<ul class="tg-socialicons">
																				<li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
																				<li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
																				<li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
																				<li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
																				<li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
																			</ul>
																		</div>
																		<span>Số lượng sách: <?php
																								$tong = 0;
																								foreach ($datas_nxb as $data_nxb) {
																									$tong = $tong + (int)$data_nxb['SL'];
																								}
																								echo $tong;
																								?></span>
																		<br>
																		<span>Các thể loại: <?php
																							foreach ($datas_nxb as $data_nxb) {
																								echo $data_nxb['name_cate'] . ", ";
																							}

																							?></span>
																		<br>
																	</div>
																</div>

															</div>
															<div class="tg-description">
																<p>"Một cuốn sách thực sự hay nên đọc trong tuổi trẻ, rồi đọc lại khi đã trưởng thành, và một nửa lúc tuổi già, giống như một tòa nhà đẹp nên được chiêm ngưỡng trong ánh bình minh, nắng trưa và ánh trăng.”</p>
															</div>
															<a class="tg-btn tg-active" href="javascript:void(0);">Xem tất cả</a>
														</div>
													</div>
												</div>
											</div>
											<div class="tg-relatedproducts">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<div class="tg-sectionhead">
														<h2><span>Những sản phẩm tương tự</span>Có thể bạn sẽ thích</h2>
														<a class="tg-btn" href="javascript:void(0);">View All</a>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<div id="tg-relatedproductslider" class="tg-relatedproductslider tg-relatedbooks owl-carousel">
														<?php
														foreach ($books_by_cate as $book_by_cate) {
														?>
															<div class="item">
																<div class="tg-postbook">
																	<figure class="tg-featureimg">
																		<div class="tg-bookimg">
																			<div class="tg-frontcover"><img src="./public/images/<?= $book_by_cate['img_b'] ?>" alt="image description"></div>
																			<div class="tg-backcover"><img src="./public/images/<?= $book_by_cate['img_b'] ?>" alt="image description"></div>
																		</div>
																		<a class="tg-btnaddtowishlist" href="javascript:void(0);">
																			<i class="icon-heart"></i>
																			<span>Thêm vào yêu thích</span>
																		</a>
																	</figure>
																	<div class="tg-postbookcontent">
																		<ul class="tg-bookscategories">
																			<li><a href="<?=URL?>/index.php?controller=cate&id_cate=<?=$book_by_cate['id_cate']?>"><?= $book_by_cate['name_cate'] ?></a></li>

																		</ul>
																		<div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
																		<div class="tg-booktitle" style="height:70px ;">
																			<h3><a href="<?= URL ?>/index.php?controller=product&id_b=<?= $book_by_cate['id_b'] ?>"><?= $book_by_cate['name_b'] ?></a></h3>
																		</div>
																		<span class="tg-bookwriter">NXB: <a href="javascript:void(0);"><?= $book_by_cate['nxb_b'] ?></a></span>
																		<span class="tg-stars"><span></span></span>
																		<span class="tg-bookprice">
																			<ins><?= ((float)$book_by_cate['price_b'] * 80 / 100) . "đ"; ?></ins>
																			<del><?= $book_by_cate['price_b'] ?></del>
																		</span>
																		<a class="tg-btn tg-btnstyletwo" id_b=<?= $book_by_cate['id_b'] ?> href="javascript:void(0);">
																			<i class="fa fa-shopping-basket"></i>
																			<em>Thêm giỏ hàng</em>
																		</a>
																	</div>
																</div>
															</div>
														<?php
														}

														?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
								<aside id="tg-sidebar" class="tg-sidebar">
									<div class="tg-widget tg-widgetsearch">
										<form class="tg-formtheme tg-formsearch">
											<div class="form-group">
												<button type="submit"><i class="icon-magnifier"></i></button>
												<input type="search" name="search" class="form-group" placeholder="Search by title, author, key...">
											</div>
										</form>
									</div>
									<div class="tg-widget tg-catagories">
										<div class="tg-widgettitle">
											<h3>Thể loại</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<?php
												foreach ($cates_book as $cate_book) {
												?>
													<li><a href="<?=URL?>/index.php?controller=cate&id_cate=<?=$cate_book['id_cate']?>"><span><?= $cate_book['name_cate'] ?></span><em><?= $cate_book['SLuong'] ?></em></a></li>
												<?php
												}
												?>

											</ul>
										</div>
									</div>
									<div class="tg-widget tg-widgettrending">
										<div class="tg-widgettitle">
											<h3>Top sách mượn nhiều nhất</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<?php
												foreach ($topnumBorrs as $topnumBorr) {
												?>
													<li>
														<article class="tg-post">
															<figure><a href="javascript:void(0);"><img style="width:100%" src="./public/images/<?= $topnumBorr['img_b'] ?>" alt="image description"></a></figure>
															<div class="tg-postcontent" style="width:80%">
																<div class="tg-posttitle">
																	<h3><a href="<?= URL ?>/index.php?controller=product&id_b=<?= $topnumBorr['id_b'] ?>"><?= $topnumBorr['name_b'] ?></a></h3>
																</div>
																<span class="tg-bookwriter">NXB: <a href="javascript:void(0);"><?= $topnumBorr['nxb_b'] ?></a></span>
															</div>
														</article>
													</li>
												<?php
												}
												?>


											</ul>
										</div>
									</div>
									<div class="tg-widget tg-widgetinstagram">
										<div class="tg-widgettitle">
											<h3>Instagram</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<li>
													<figure>
														<img src="./public/images/instagram/img-01.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="./public/images/instagram/img-02.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="./public/images/instagram/img-03.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="./public/images/instagram/img-04.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="./public/images/instagram/img-05.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="./public/images/instagram/img-06.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="./public/images/instagram/img-07.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="./public/images/instagram/img-08.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="./public/images/instagram/img-09.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
											</ul>
										</div>
									</div>
									<div class="tg-widget tg-widgettrending">
										<div class="tg-widgettitle">
											<h3>Top sách mới về</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<?php
												foreach ($newBooks as $newBook) {
												?>
													<li>
														<article class="tg-post">
															<figure><a href="javascript:void(0);"><img style="width:100%" src="./public/images/<?= $newBook['img_b'] ?>" alt="image description"></a></figure>
															<div class="tg-postcontent" style="width:80%">
																<div class="tg-posttitle">
																	<h3><a href="<?= URL ?>/index.php?controller=product&id_b=<?= $newBook['id_b'] ?>"><?= $newBook['name_b'] ?></a></h3>
																</div>
																<span class="tg-bookwriter">NXB: <a href="javascript:void(0);"><?= $newBook['nxb_b'] ?></a></span>
															</div>
														</article>
													</li>
												<?php
												}
												?>


											</ul>
										</div>
									</div>
								</aside>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					News Grid End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
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
		// $('#add_cart').click(function() {
		// 	id_b = $(this).attr("id_b")
		// 	add_cart(id_b)
		// })
		$('.tg-quantityholder em').click(function(){
			load_msg("Tối đa một sản phẩm");
		})

		// function add_cart(id_b) {
		// 	$.ajax({
		// 		url: url + "controller=cart&action=add_cart",
		// 		method: "POST",
		// 		data: {
		// 			id_b: id_b
		// 		},
		// 		success: function(dt) {
		// 			$('#msg_modal').modal('show')
		// 			$('#text_msg').html(dt)
		// 			setTimeout(function() {
		// 				$('#msg_modal').modal('hide')
		// 			}, 6000)
		// 			// console.log(dt)
		// 		}

		// 	})
		// }
	</script>
</body>

</html>