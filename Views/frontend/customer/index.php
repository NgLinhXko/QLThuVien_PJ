<!doctype html>
<html class="no-js" lang="">

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

<body class="tg-home tg-homeone">


	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
		<header id="tg-header" class="tg-header tg-haslayout">
			<?php
			if (!isset($_SESSION['cart'])) {
				$_SESSION['cart']  = [];
			}
			?>
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
									<li style="list-style: none;"><a class="dropdown-item" href="<?= URL ?>/index.php?controller=bill">Đơn hàng</a></li>
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
								<form class="tg-formtheme tg-formsearch" method="POST" action="<?= URL ?>/index.php?controller=cate&action=search">
									<fieldset>
										<input type="text" name="search" class="typeahead form-control" placeholder="Nhập tên sách">
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
					Best Selling Start
			*************************************-->
		<section class="tg-sectionspace tg-haslayout">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-sectionhead">
							<h2><span>Người dùng</span>Top 10 sách được mượn nhiều nhất</h2>
							<a class="tg-btn" href="javascript:void(0);">View All</a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">

							<?php
							foreach ($topnumBorrs as $topnumBorr) {
							?>


								<div class="item">
									<div class="tg-postbook tg-notag">
										<figure class="tg-featureimg">
											<div class="tg-bookimg">
												<div class="tg-frontcover"><img src="./public/images/<?= $topnumBorr['img_b'] ?>" alt="image description"></div>
												<div class="tg-backcover"><img src="./public/images/avatar.jpg" alt="image description"></div>
											</div>
											<a class="tg-btnaddtowishlist" href="javascript:void(0);">
												<i class="icon-heart"></i>
												<span>add to wishlist</span>
											</a>
										</figure>
										<div class="tg-postbookcontent">
											<ul class="tg-bookscategories">
												<li><a href="<?= URL ?>/index.php?controller=cate&id_cate=<?= $topnumBorr['id_cate'] ?>"><?= $topnumBorr['name_cate'] ?></a></li>

											</ul>
											<div class="tg-booktitle" style="height: 80px;">
												<h3><a href="<?= URL ?>/index.php?controller=product&id_b=<?= $topnumBorr['id_b'] ?>"><?= $topnumBorr['name_b'] ?></a></h3>
											</div>
											<span class="tg-bookwriter">NXB: <a href="javascript:void(0);"><?= $topnumBorr['nxb_b'] ?></a></span>
											<span class="tg-stars"><span></span></span>
											<span class="tg-bookprice">
												<!-- <ins><?= $topnumBorr['price_b'] ?>VNĐ</ins> -->
												<!-- <del>$27.20</del> -->
											</span>
											<a class="tg-btn tg-btnstyletwo" id_b=<?= $topnumBorr['id_b'] ?> href="javascript:void(0);">
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
	</section>
	<!--************************************
					Best Selling End
			*************************************-->

	<!--************************************
					Featured Item Start
			*************************************-->
	<section class="tg-bglight tg-haslayout">
		<div class="container">
			<div class="row">
				<?php
				foreach ($randomBooks as $randomBook) {
				?>
					<div class="tg-featureditm">
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
							<figure><img src="./public/images/<?= $randomBook['img_b'] ?>" alt="image description"></figure>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
							<div class="tg-featureditmcontent">
								<div class="tg-themetagbox"><span class="tg-themetag"><?= $randomBook['name_cate'] ?></span></div>
								<div class="tg-booktitle">
									<h3><a href="<?= URL ?>/index.php?controller=product&id_b=<?= $randomBook['id_b'] ?>"><?= $randomBook['name_b'] ?></a></h3>
								</div>
								<span class="tg-bookwriter">NXB: <a href="javascript:void(0);"><?= $randomBook['nxb_b'] ?></a></span>
								<span class="tg-stars"><span></span></span>
								<div class="tg-priceandbtn">
									<span class="tg-bookprice">
										<!-- <ins>$23.18</ins>
										<del>$30.20</del> -->
									</span>
									<a class="tg-btn tg-btnstyletwo tg-active" id_b=<?= $randomBook['id_b'] ?> href="javascript:void(0);">
										<i class="fa fa-shopping-basket"></i>
										<em>Thêm giỏ hàng</em>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php
				}
				?>

			</div>
		</div>
	</section>
	<!--************************************
					Featured Item End
			*************************************-->
	<!--************************************
					New Release Start
			*************************************-->
	<section class="tg-sectionspace tg-haslayout">
		<div class="container">
			<div class="row">
				<div class="tg-newrelease">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="tg-sectionhead">
							<h2><span>Độc giả chờ đón</span>Sách mới phát hành</h2>
						</div>
						<div class="tg-description">
							<p>Đọc sách nhiều sẽ giúp cho gương mặt trở nên thanh tú và sáng trưng, dù xấu nhìn vẫn sáng. (Cafe cùng Tony - Tony Buổi Sáng)</p>
						</div>
						<div class="tg-btns">
							<a class="tg-btn tg-active" href="javascript:void(0);">View All</a>
							<a class="tg-btn" href="javascript:void(0);">Read More</a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="row">
							<div class="tg-newreleasebooks">
								<?php
								foreach ($newBooks as $newBook) {
								?>

									<div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
										<div class="tg-postbook">
											<figure class="tg-featureimg">
												<div class="tg-bookimg">
													<div class="tg-frontcover"><img src="./public/images/<?= $newBook['img_b'] ?>" alt="image description"></div>
													<div class="tg-backcover"><img src="./public/images/<?= $newBook['img1_b'] ?>" alt="image description"></div>
												</div>
												<a class="tg-btnaddtowishlist" href="javascript:void(0);">
													<i class="icon-heart"></i>
													<span>add to wishlist</span>
												</a>
											</figure>
											<div class="tg-postbookcontent">
												<ul class="tg-bookscategories">
													<li><a href="<?= URL ?>/index.php?controller=cate&id_cate=<?= $newBook['id_cate'] ?>"><?= $newBook['name_cate'] ?></a></li>
													<!-- <li><a href="javascript:void(0);">Fun</a></li> -->
												</ul>
												<div class="tg-booktitle" style="height: 80px;">
													<h3><a href="<?= URL ?>/index.php?controller=product&id_b=<?= $newBook['id_b'] ?>"><?= $newBook['name_b'] ?></a></h3>
												</div>
												<span class="tg-bookwriter">NXB: <a href="javascript:void(0);"><?= $newBook['name_cate'] ?></a></span>
												<span class="tg-stars"><span></span></span>
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
	</section>
	<!--************************************
					New Release End
			*************************************-->
	<!--************************************
					Collection Count Start
			*************************************-->
	<section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="./public/images/bgparallax-04.jpg">
		<div class="tg-sectionspace tg-collectioncount tg-haslayout">
			<div class="container">
				<div class="row">
					<div id="tg-collectioncounters" class="tg-collectioncounters">
						<div class="tg-collectioncounter tg-drama">
							<div class="tg-collectioncountericon">
								<i class="icon-bubble"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Người dùng</h2>
								<h3 data-from="0" data-to="13212" data-speed="5000" data-refresh-interval="50">13,212</h3>
							</div>
						</div>
						<div class="tg-collectioncounter tg-horror">
							<div class="tg-collectioncountericon">
								<i class="icon-heart-pulse"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Đơn hàng</h2>
								<h3 data-from="0" data-to="17200" data-speed="5000" data-refresh-interval="50">17,200</h3>
							</div>
						</div>
						<div class="tg-collectioncounter tg-romance">
							<div class="tg-collectioncountericon">
								<i class="icon-heart"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Đầu sách</h2>
								<h3 data-from="0" data-to="1106" data-speed="8000" data-refresh-interval="50">1,106</h3>
							</div>
						</div>
						<div class="tg-collectioncounter tg-fashion">
							<div class="tg-collectioncountericon">
								<i class="icon-star"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Thể loại</h2>
								<h3 data-from="0" data-to="20" data-speed="8000" data-refresh-interval="50">20</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--************************************
					Collection Count End
			*************************************-->
	<!--************************************
					Picked By Author Start
			*************************************-->
	<section class="tg-sectionspace tg-haslayout">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="tg-sectionhead">
						<h2><span>Một số sách hay</span>Của nhà xuất bản</h2>
						<a class="tg-btn" href="javascript:void(0);">View All</a>
					</div>
				</div>
				<div id="tg-pickedbyauthorslider" class="tg-pickedbyauthor tg-pickedbyauthorslider owl-carousel">

					<?php
					foreach ($randomBook_byNXBs as $randomBook_byNXB) {
					?>
						<div class="item">
							<div class="tg-postbook">
								<figure class="tg-featureimg">
									<div class="tg-bookimg">
										<div class="tg-frontcover"><img src="./public/images/<?= $randomBook_byNXB['img_b'] ?>" alt="image description"></div>
									</div>
									<div class="tg-hovercontent">
										<div class="tg-description">
											<p><?= $randomBook_byNXB['des_b'] ?></p>
										</div>
										<strong class="tg-bookpage">Số trang:<?= $randomBook_byNXB['page_b'] ?></strong>
										<strong class="tg-bookcategory">Thể loại: <?= $randomBook_byNXB['name_cate'] ?></strong>
										<!-- <strong class="tg-bookprice">Price: $23.18</strong> -->
										<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
									</div>
								</figure>
								<div class="tg-postbookcontent">
									<div class="tg-booktitle" style="height: 70px;">
										<h3><a href="<?= URL ?>/index.php?controller=product&id_b=<?= $randomBook_byNXB['id_b'] ?>"><?= $randomBook_byNXB['name_b'] ?></a></h3>
									</div>
									<span class="tg-bookwriter">NXB: <a href="javascript:void(0);"><?= $randomBook_byNXB['nxb_b'] ?></a></span>
									<a class="tg-btn tg-btnstyletwo" id_b=<?= $randomBook_byNXB['id_b'] ?> href="javascript:void(0);">
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
	</section>
	<!--************************************
					Picked By Author End
			*************************************-->
	<!--************************************
					Testimonials Start
			*************************************-->
	<section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="./public/images/bgparallax-05.jpg">
		<div class="tg-sectionspace tg-haslayout">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
						<div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel">
							<div class="item tg-testimonial">
								<figure><img src="https://scontent.fhan4-1.fna.fbcdn.net/v/t1.6435-9/127057114_104124128207193_6837197788378222147_n.jpg?_nc_cat=105&ccb=1-6&_nc_sid=09cbfe&_nc_ohc=e7ZDq_PT8yoAX-cuphf&_nc_ht=scontent.fhan4-1.fna&oh=00_AT8Z06xVTWfzj3fypeKjDMYv1YH9cIMQAs_Jh2OPhyVNcg&oe=62A709E7" alt="image description"></figure>
								<blockquote><q>Tất cả những gì con người làm, nghĩ hoặc trở thành được bảo tồn một cách kỳ diệu trên những trang sách.</q></blockquote>
								<div class="tg-testimonialauthor">
									<h3>Đặng Linh</h3>
									<span>Manager @ CIFP</span>
								</div>
							</div>
							<div class="item tg-testimonial">
								<figure><img src="https://scontent.fhan3-5.fna.fbcdn.net/v/t1.6435-9/75604006_546537412849907_5972465875528187904_n.jpg?_nc_cat=109&ccb=1-6&_nc_sid=09cbfe&_nc_ohc=jgkrhxveq3gAX-BEpKh&_nc_ht=scontent.fhan3-5.fna&oh=00_AT8WdWKc4xva_p-2nfMAICWyQU6A3ONPNyPYOA3CurUccg&oe=62A6F14E" alt="image description"></figure>
								<blockquote><q>Cuốn sách tốt nhất cho bạn là cuốn sách nói nhiều nhất với bạn vào lúc bạn đọc nó. Tôi không nói tới cuốn sách cho bạn nhiều bài học nhất mà là cuốn sách nuôi dưỡng tâm hồn bạn. Và điều đó phụ thuộc vào tuổi tác, trải nghiệm, nhu cầu về tâm lý và tinh thần.</q></blockquote>
								<div class="tg-testimonialauthor">
									<h3>Đặng Linh</h3>
									<span>Manager @ CIFP</span>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--************************************
					Testimonials End
			*************************************-->

	<!--************************************
					Call to Action Start
			*************************************-->
	<section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="./public/images/bgparallax-06.jpg">
		<div class="tg-sectionspace tg-haslayout">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-calltoaction">
							<h2>Open Discount For All</h2>
							<h3>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore.</h3>
							<a class="tg-btn tg-active" href="javascript:void(0);">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--************************************
					Call to Action End
			*************************************-->
	<!--************************************
					Latest News Start
			*************************************-->
	<section class="tg-bglight tg-haslayout">
		<div class="container">
			<div class="row">
				<?php
				foreach ($randomBooks1 as $randomBook) {
				?>
					<div class="tg-featureditm">
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
							<figure><img src="./public/images/<?= $randomBook['img_b'] ?>" alt="image description"></figure>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
							<div class="tg-featureditmcontent">
								<div class="tg-themetagbox"><span class="tg-themetag"><?= $randomBook['name_cate'] ?></span></div>
								<div class="tg-booktitle">
									<h3><a href="<?= URL ?>/index.php?controller=product&id_b=<?= $randomBook['id_b'] ?>"><?= $randomBook['name_b'] ?></a></h3>
								</div>
								<span class="tg-bookwriter">NXB: <a href="javascript:void(0);"><?= $randomBook['nxb_b'] ?></a></span>
								<span class="tg-stars"><span></span></span>
								<div class="tg-priceandbtn">
									<span class="tg-bookprice">
										<!-- <ins>$23.18</ins>
										<del>$30.20</del> -->
									</span>
									<a class="tg-btn tg-btnstyletwo tg-active" id_b=<?= $randomBook['id_b'] ?> href="javascript:void(0);">
										<i class="fa fa-shopping-basket"></i>
										<em>Thêm giỏ hàng</em>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php
				}
				?>

			</div>
		</div>
	</section>
	<section class="tg-sectionspace tg-haslayout">
		<div class="container">
			<div class="row">
				<div class="tg-newrelease">

					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="row">
							<div class="tg-newreleasebooks">
								<?php
								foreach ($randomBooks2 as $newBook) {
								?>

									<div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
										<div class="tg-postbook">
											<figure class="tg-featureimg">
												<div class="tg-bookimg">
													<div class="tg-frontcover"><img src="./public/images/<?= $newBook['img_b'] ?>" alt="image description"></div>
													<div class="tg-backcover"><img src="./public/images/<?= $newBook['img1_b'] ?>" alt="image description"></div>
												</div>
												<a class="tg-btnaddtowishlist" href="javascript:void(0);">
													<i class="icon-heart"></i>
													<span>add to wishlist</span>
												</a>
											</figure>
											<div class="tg-postbookcontent">
												<ul class="tg-bookscategories">
													<li><a href="<?= URL ?>/index.php?controller=cate&id_cate=<?= $newBook['id_cate'] ?>"><?= $newBook['name_cate'] ?></a></li>
													<!-- <li><a href="javascript:void(0);">Fun</a></li> -->
												</ul>
												<div class="tg-booktitle" style="height: 80px;">
													<h3><a href="<?= URL ?>/index.php?controller=product&id_b=<?= $newBook['id_b'] ?>"><?= $newBook['name_b'] ?></a></h3>
												</div>
												<span class="tg-bookwriter">NXB: <a href="javascript:void(0);"><?= $newBook['name_cate'] ?></a></span>
												<span class="tg-stars"><span></span></span>
											</div>
										</div>
									</div>
								<?php
								}
								?>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="tg-sectionhead">
							<h2><span>Sách hay mỗi tuần</span>Có thể bạn thích </h2>
						</div>
						<div class="tg-description">
							<p>Những gì sách dạy chúng ta cũng giống như lửa. Chúng ta lấy nó từ nhà hàng xóm, thắp nó trong nhà ta, đem nó truyền cho người khác và nó trở thành tài sản của tất cả mọi người. (Voltaire)</p>
						</div>
						<div class="tg-btns">
							<a class="tg-btn tg-active" href="javascript:void(0);">View All</a>
							<a class="tg-btn" href="javascript:void(0);">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--************************************
					Latest News End
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
								<strong class="tg-logo"><a href="javascript:void(0);"><img src="./public/images/flogo.png" alt="image description"></a></strong>
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
											<figure><a href="javascript:void(0);"><img style="height: 50px;" src="https://dvdn247.net/wp-content/uploads/2020/07/avatar-mac-dinh-1.png" alt="image description"></a></figure>
											<div class="tg-authornamebooks">
												<h4><a href="javascript:void(0);">Jude Morphew</a></h4>
												<p>21,658 Published Books</p>
											</div>
										</li>
										<li>
											<figure><a href="javascript:void(0);"><img style="height: 50px;" src="https://dvdn247.net/wp-content/uploads/2020/07/avatar-mac-dinh-1.png" alt="image description"></a></figure>
											<div class="tg-authornamebooks">
												<h4><a href="javascript:void(0);">Shaun Humes</a></h4>
												<p>20,257 Published Books</p>
											</div>
										</li>
										<li>
											<figure><a href="javascript:void(0);"><img style="height: 50px;" src="https://dvdn247.net/wp-content/uploads/2020/07/avatar-mac-dinh-1.png" alt="image description"></a></figure>
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
						<span class="tg-paymenttype"><img style="width:40%" src="https://www.tlu.edu.vn/Portals/_default/skins/tluvie/images/logo.png" alt="image description"></span>
						<span class="tg-copyright"><?php echo date("Y") ?> All Rights Reserved By &copy;<a href="https://www.facebook.com/profile.php?id=100028971874945">Long Nguyễn</a></span>
					</div>
				</div>
			</div>
		</div>
		<div hidden id="datas_get" email_u></div>
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

	include('public/header/footer.php');
	include('Public/public/footer.php');
	?>
	<script src="<?= URL ?>/Public/js/login/index.js"></script>
	<script>
		$(document).on("click", '#btn_checkout', function() {
			email_u = $("#check_login").attr("email");
			if (email_u == "none") {
				$('#modalLogin').modal('show')
			} else {
				window.location.href = url + "controller=checkout"
			}
		})
		// $('#btn_search').click(function(){
		// 	val = $('#input_search').val();

		// })
		// function get_data_search(val){
		// 	$.ajax({
		// 		url:url+"controller=cate&action=search",
		// 		method:"POST",
		// 		data:{
		// 			val_search:val
		// 		},
		// 		success:function(dt){

		// 		}
		// 	})
		// }
	</script>

</body>

</html>