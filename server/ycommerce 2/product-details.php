
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- mobile metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<!-- site metas -->
	<title>Shop</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- style css -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive-->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- fevicon -->
	<link rel="icon" href="images/fevicon.png" type="image/gif" />
	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<!-- Tweaks for older IEs-->
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
	<!-- owl stylesheets -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
	<!-- header section start -->
	<div class="header_section header_main">
		<?php include("./includes/header.php"); 
		if (!isset($_SESSION['currentUser'])) {
			header("Location:signin.php?error=please try login first");
		}
		?>

	</div>
	<!-- New Arrivals section start -->
	<div class="collection_text">Details <br>
	</div>
	<div class="layout_padding gallery_section">
		<div class="container">
			<div class="row">
			<?php
                    $categoryId = isset($_GET['Category']) ? $_GET['Category'] : "all";
                    $productsList = [];
                    require_once './Models/Products.php'; //Non respect du Pattern MVC, vue qu'on fait appel au Model directement depuis la Vue
                    if (isset($_GET['Id'])) {
                        $productsList = Product::getProductsByID($_GET['Id']);
                    }


                    foreach ($productsList as $productData) {
                    ?>
                        <div class="col-sm-12">
                            <div class="best_shoes">
                                <p class="best_text"><?=  $productData[0]->Name?> </p>
                                <div class="shoes_icon"><img src="<?php echo $productData[0]->ProductImg ?>" style="max-height:200px;"></div>
                                <span><?= $productData[1]['CategoryName'] ?></span>
                                <div>
                                    <?= $productData[0]->Description ?>
                                </div>
                                <div class="star_text">
                                    <div class="left_part">
                                        <ul>
                                            <?php
                                            for ($i = 0; $i < $productData[0]->Rating; $i++) { ?>
                                                <li><a href="#"><img src="images/star-icon.png"></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="right_part">
                                        <div class="shoes_price">$ <span style="color: #ff4e5b;"><?= $productData[0]->Price ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <?php
                    }
                    ?>
			</div>
			<div class="buy_now_bt">
				<button class="buy_text">Buy Now</button>
			</div>
		</div>
	</div>
	<!-- New Arrivals section end -->

	<div class="copyright">2021 All Rights Reserved. </div>


	<!-- Javascript files-->
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/jquery-3.0.0.min.js"></script>
	<script src="js/plugin.js"></script>
	<!-- sidebar -->
	<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="js/custom.js"></script>
	<!-- javascript -->
	<script src="js/owl.carousel.js"></script>
	<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
	<script>
		$(document).ready(function() {
					$(".fancybox").fancybox({
						openEffect: "none",
						closeEffect: "none"
					});


					$('#myCarousel').carousel({
						interval: false
					});

					//scroll slides on swipe for touch enabled devices

					$("#myCarousel").on("touchstart", function(event) {

						var yClick = event.originalEvent.touches[0].pageY;
						$(this).one("touchmove", function(event) {

							var yMove = event.originalEvent.touches[0].pageY;
							if (Math.floor(yClick - yMove) > 1) {
								$(".carousel").carousel('next');
							} else if (Math.floor(yClick - yMove) < -1) {
								$(".carousel").carousel('prev');
							}
						});
						$(".carousel").on("touchend", function() {
							$(this).off("touchmove");
						});
					});
		});
	</script>
</body>

</html>