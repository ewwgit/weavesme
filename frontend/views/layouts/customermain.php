<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

use frontend\assets\AppAssetCustomer;


AppAssetCustomer::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

 <div class="top-header">
  <div class="container">

   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   
      <ul class="nav navbar-nav navbar-right">
       <li class="active"><a href="#">My Account    </a></li>
        <li><a href="#">My Wishlist  </a></li>
        <li><a href="#"> Login / Register </a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="fa fa-shopping-cart"></span> 7 - Items<span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-cart" role="menu">
              <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="images/img-1.jpg" class="img-responsive" alt="" />
                        <span class="item-info">
                            <span>Item name</span>
                            <span>23$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right">x</button>
                    </span>
                </span>
              </li>
              <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="images/img-1.jpg" alt="" />
                        <span class="item-info">
                            <span>Item name</span>
                            <span>23$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right">x</button>
                    </span>
                </span>
              </li>
              <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="images/img-1.jpg" alt="" />
                        <span class="item-info">
                            <span>Item name</span>
                            <span>23$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right">x</button>
                    </span>
                </span>
              </li>
              <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="images/img-1.jpg" alt="" />
                        <span class="item-info">
                            <span>Item name</span>
                            <span>23$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right">x</button>
                    </span>
                </span>
              </li>
              <li class="divider"></li>
              <li><a class="text-center" href="">View Cart</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->

     
    </div>

   
    


</div>
 
  <!-- Navigation -->
  <nav class="navbar">
    <div class="sticky">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-2"> 
            <!-- LOGO -->
            <div class="logo"> <a href="index.html"><img  class="img-responsive" src="images/logo.png" alt="" ></a> </div>
          </div>
          <!-- Nav -->
          <div class="col-md-8 col-sm-10 ">
            <ul class="nav ownmenu">
              <li class="active"> <a href="#">Sarees </a> </li>
              <li> <a href="#">Dress Materials </a> </li>
              <li> <a href="#">Stoles </a> </li>
              <li> <a href="#">Dupattas </a> </li>
              <li> <a href="#">Kurtas </a> </li>
              <li> <a href="#">Kurtis </a> </li>
              <li> <a href="#">Home Linen </a></li>
            </ul>
          </div>
          <!-- Search -->
          <div class="search-icon"> <a href="#"><i class="fa fa-search"></i></a>
            <form>
              <input class="form-control" type="search" placeholder="Type Here">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>

<!---------------mobile menus------------------>
<div id="menus">
  <div class="container">
    <header class="cf">
      <div class="navigation">
        <nav> <a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span>Menu</span></a>
          <ul class="mobimenu">
            <li> <a href="#">Sarees </a> </li>
            <li> <a href="#">Dress Materials </a> </li>
            <li> <a href="#">Stoles </a> </li>
            <li> <a href="#">Dupattas </a> </li>
            <li> <a href="#">Kurtas </a> </li>
            <li> <a href="#">Kurtis </a> </li>
            <li> <a href="#">Home Linen </a></li>
          </ul>
        </nav>
      </div>
    </header>
  </div>
</div>
<div id="mobile_logo">
  <div class="container">
    <div class="logo_mobile"> <a href="#"><img src="images/logo.png" class="img-responsive"></a> </div>
  </div>
</div>

<!---------------mobile menus------------------>
<div id="themeSlider" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#themeSlider" data-slide-to="0" class="active"></li>
    <li data-target="#themeSlider" data-slide-to="1"></li>
    <li data-target="#themeSlider" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active">
      <div class="imgOverlay"></div>
      <img src="images/banner.jpg" alt="First slide">
      <div class="carousel-caption hidden">
        <h3>First slide</h3>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    <div class="item">
      <div class="imgOverlay"></div>
      <img src="images/banner1.jpg" alt="Second slide">
      <div class="carousel-caption hidden">
        <h3>Second slide</h3>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    <div class="item">
      <div class="imgOverlay"></div>
      <img src="images/banner2.jpg" alt="Third slide">
      <div class="carousel-caption hidden">
        <h3>Third slide</h3>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
  </div>
  
  <a class="left carousel-control hidden-xs hidden-sm hidden-md" href="#themeSlider" data-slide="prev">
   
  <span class="fa fa-chevron-left"> </span>
  
    </a>
   <a class="right carousel-control hidden-xs hidden-sm hidden-md"href="#themeSlider" data-slide="next">
    <span class="fa fa-chevron-right"> </span>
   
     </a>
     
  
        <?= $content ?>
    </div>
</div>
  <!----> 
  
</div>
<div class="clearfix"></div>
<div id="adds">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="carousel carousel-showmanymoveone slide" id="itemslider">
            <div class="carousel-inner">
              <div class="item active">
                <div class="col-xs-4 col-sm-4 col-md-4"> <a href="#"><img src="images/bottom_add1.jpg" class="img-responsive center-block"></a> </div>
              </div>
              <div class="item">
                <div class="col-xs-4 col-sm-4 col-md-4"> <a href="#"><img src="images/bottom_add2.jpg" class="img-responsive center-block"></a> </div>
              </div>
              <div class="item">
                <div class="col-xs-4 col-sm-4 col-md-4"> <a href="#"><img src="images/bottom_add3.jpg" class="img-responsive center-block"></a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<div id="news_letter">
  <div id="newsletter-container">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 clearfix">
          <h3>News letter</h3>
          <form id="register-newsletter">
            <input type="text" name="newsletter" required placeholder="Email address">
            <input type="submit" class="btn btn-custom-3" value="Subscribe">
          </form>
        </div>
      </div>
    </div

  >
  </div>
</div>
<div class="clearfix"></div>
<div id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-sm-6">
        <div class="footer_logo"> <a href="#"><img src="images/footer_logo.png"></a></div>
        <div class="pera">
          <p>You can change this text from Control Panel > Footer > About text</p>
        </div>
      </div>
      <div class="col-md-2 col-sm-3">
        <div class="footer_logo">
          <h2>Information</h2>
        </div>
        <div class="pera">
          <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Delivery information</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms & Conditions</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-2 col-sm-3">
        <div class="footer_logo">
          <h2>Extras</h2>
        </div>
        <div class="pera">
          <ul>
            <li><a href="#">Brands</a></li>
            <li><a href="#">Gift Vouchers</a></li>
            <li><a href="#">Affiliates</a></li>
            <li><a href="#">Specials</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-2 col-sm-4">
        <div class="footer_logo">
          <h2>Customer Services</h2>
        </div>
        <div class="pera">
          <ul>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Returns</a></li>
            <li><a href="#">Site Map</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-2 col-sm-4">
        <div class="footer_logo">
          <h2>My Account</h2>
        </div>
        <div class="pera">
          <ul>
            <li><a href="#">My Account</a></li>
            <li><a href="#">Order History</a></li>
            <li><a href="#">Wish List</a></li>
            <li><a href="#">Newsletter</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-2 col-sm-4 ">
        <div class="footer_logo">
          <h2>Follow Us</h2>
        </div>
        <div class="pera">
          <ul class="social">
            <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
            <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
            <li> <a href="#"> <i class="fa fa-google-plus">   </i> </a> </li>
            <li> <a href="#"> <i class="fa fa-pinterest">   </i> </a> </li>
            <li> <a href="#"> <i class="fa fa-youtube">   </i> </a> </li>
          </ul>
          <div class="cards">
            <ul>
              <li><a href="#"><img src="images/paypal.jpg"></a></li>
              <li><a href="#"><img src="images/visa.jpg"></a></li>
              <li><a href="#"><img src="images/amercan.jpg"></a></li>
              <li><a href="#"><img src="images/mastercard.jpg"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <p> Copyright © weaves 2017. All right reserved. </p>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<div class="top"> <a href="#" class="scrollToTop"></a> </div>
 
<script>$(".sticky").sticky({topSpacing:0});</script> 




<script type="text/javascript">

		jQuery(document).ready(function($) {
			$('.smobitrigger').smplmnu();
		});

	</script> 
<script>$(document).ready(function(){
	

	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	

	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});


</script>
<script>
$(document).ready(function(){
	console.log('ehllo');
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
