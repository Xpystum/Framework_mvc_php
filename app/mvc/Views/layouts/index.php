<?php 
	require_once("app/Helpers/Session.php");
	$session = new Session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Basic page needs
    ============================================ -->
    <title><?php echo $data['title'];?></title>
    <meta charset="utf-8">
    <meta name="keywords" content="html5 template, best html5 template, best html template, html5 basic template, multipurpose html5 template, multipurpose html template, creative html templates, creative html5 templates" />
    <meta name="description" content="Revo is a powerful Multi-purpose HTML5 Template with clean and user friendly design. It is definite a great starter for any eCommerce web project." />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />
   
    <!-- Mobile specific metas
    ============================================ -->

    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/png" href="app/resources/ico/favicon-16x16.png"/>
  
   
    <!-- Libs CSS
    ============================================ -->
    <link rel="stylesheet" href="app/resources/css/bootstrap/css/bootstrap.min.css">
    <link href="app/resources/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="app/resources/js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="app/resources/js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="app/resources/css/themecss/lib.css" rel="stylesheet">
    <link href="app/resources/js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="app/resources/js/minicolors/miniColors.css" rel="stylesheet">
    
    <!-- Theme CSS
    ============================================ -->
    <link href="app/resources/css/themecss/so_searchpro.css" rel="stylesheet">
    <link href="app/resources/css/themecss/so_megamenu.css" rel="stylesheet">
    <link href="app/resources/css/themecss/so-categories.css" rel="stylesheet">
    <link href="app/resources/css/themecss/so-listing-tabs.css" rel="stylesheet">
    <link href="app/resources/css/themecss/so-newletter-popup.css" rel="stylesheet">
    <link href="app/resources/css/themecss/slick.css" rel="stylesheet">

    <link href="app/resources/css/footer/footer1.css" rel="stylesheet">
    <link href="app/resources/css/header/header1.css" rel="stylesheet">
    <link id="color_scheme" href="app/resources/css/theme.css" rel="stylesheet"> 
    <link href="app/resources/css/responsive.css" rel="stylesheet">

     <!-- Google web fonts
    ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel='stylesheet' type='text/css'>
    <style>
        body{font-family:'Open Sans', sans-serif}
        .font-ct, h1, h2, h3, 
        .des_deal,
        .item-time-w,
        .item-time-w .name-time,
        .static-menu a.main-menu, 
        .container-megamenu.vertical .vertical-wrapper ul li > a strong, 
        .container-megamenu.vertical .vertical-wrapper ul.megamenu li .sub-menu .content .static-menu .menu ul li a.main-menu, 
        .horizontal ul.megamenu > li > a, .footertitle, 
        .module h3.modtitle span, .breadcrumb li a, .item-title a, 
        .best-seller-custom .item-info, .product-box-desc, .product_page_price .price-new, 
        .list-group-item a, #menu ul.nav > li > a, .megamenuToogle-pattern, 
        .right-block .caption h4, .price, .box-price {
            font-family: Raleway, sans-serif;
        }
    </style>

</head>

<body class="common-home res layout-1" style="padding-right: 5px;">
    <?php 
        MenuWidget::render("departament_menu", "departament"); 
    ?>
    <div id="wrapper" class="wrapper-fluid banners-effect-7">
    <!-- Header Container  -->
    <header id="header" class=" typeheader-1">
        <!-- Header Top -->
        <div class="header-top hidden-compact">
            <div class="container">
                <div class="row">
                    <div class="header-top-left  col-lg-6 col-sm-5 col-md-6 hidden-xs">
                        <ul class="list-inlines">
                            <li class="hidden-xs">
                            <span class="hidden-sm">
                            Free 3 day delirery and free returns within the US
                            </span>
                            <a class="link-lg" href="register.html">Register </a> or 
                            <a class="link-lg" href="login.html">Login </a>
                            </li>
                        </ul>
                    </div>
                    <div class="header-top-right collapsed-block col-lg-6 col-md-6 col-sm-7 col-xs-12">
                        <ul class="top-link list-inline">
                            <li class="log login"><a class="link-lg" href="?route=auth/login">Login </a></li>
                            <li class="account" id="my_account">
                            <a href="my-account.html" title="My Account " class="btn-xs dropdown-toggle" data-toggle="dropdown"> <span class="hidden-xs">My Account </span> <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu ">
                                    <li><a href="?route=auth/myaccount">My Account </a></li>
                                    <li><a href="order-history.html">Order History </a></li>
                                    <li><a href="horder-history.html">Transactions </a></li>
                                    <li><a href="order-information.html">Order Information </a></li>
                                    <li class="checkout"><a href="checkout.html" class="btn-link" title="Checkout "><span>Checkout </span></a></li>
                                     
                                </ul>
                            </li>
                              
                            <li class="language">
                                <div class="btn-group languages-block ">
                                    <form action="index.html" method="post" enctype="multipart/form-data" id="bt-language">
                                        <a class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                            <img src="app/resources/image/catalog/flags/gb.png" alt="English" title="English">
                                            <span class="">English</span>
                                            <span class="fa fa-angle-down"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="index.html"><img class="image_flag" src="app/resources/image/catalog/flags/gb.png" alt="English" title="English" /> English </a></li>
                                            <li> <a href="index.html"> <img class="image_flag" src="app/resources/image/catalog/flags/ar.png" alt="Arabic" title="Arabic" /> Arabic </a> </li>
                                        </ul>
                                    </form>
                                </div>
                                
                            </li>
                            <li class="currency">
                                <div class="btn-group currencies-block">
                                    <form action="index.html" method="post" enctype="multipart/form-data" id="currency">
                                        <a class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                            <span class="icon icon-credit "></span> $ US Dollar  <span class="fa fa-angle-down"></span>
                                        </a>
                                        <ul class="dropdown-menu btn-xs">
                                            <li> <a href="#">(€)&nbsp;Euro</a></li>
                                            <li> <a href="#">(£)&nbsp;Pounds    </a></li>
                                            <li> <a href="#">($)&nbsp;US Dollar </a></li>
                                        </ul>
                                    </form>
                                </div>
                            </li> 
                        </ul>
                        

                        
                    </div>
                </div>
            </div>
        </div>
        <!-- //Header Top -->

        <!-- Header center -->
        <div class="header-center">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="navbar-logo col-md-2 col-sm-3 col-xs-10">
                        <div class="logo"><a href="?route=index/index   "><img src="app/resources/image/catalog/logo.png" title="Your Store" alt="Your Store" /></a></div>
                    </div>
                    <!-- //end Logo -->

                    <!-- Main menu -->
                    <div class="header-center-right main-menu  col-md-10 col-sm-9 col-xs-2">
                       <div class="megamenu-style-dev megamenu-dev">
                            <div class="responsive so-megamenu megamenu-style-dev">
                                <nav class="navbar-default">
                                    <div class=" container-megamenu  horizontal open ">
                                        <div class="navbar-header">
                                            <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                        </div>
                                        
                                        <div class="megamenu-wrapper">
                                            <span id="remove-megamenu" class="fa fa-times"></span>
                                            <div class="megamenu-pattern">
                                                <div class="container-mega">
                                                    <ul class="megamenu" data-transition="slide" data-animationtime="250">
                                                        <li class="menu-home with-sub-menu hover">
                                                            <a href="index.html">Home <b class="caret"></b></a>
                                                            <div class="sub-menu" style="width:100%;" >
                                                                <div class="content" >
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <a href="index.html" class="image-link"> 
                                                                                <span class="thumbnail">
                                                                                    <img class="img-responsive img-border" src="app/resources/image/catalog/menu/home-1.jpg" alt="">
                                                                                    
                                                                                </span> 
                                                                                <h3 class="figcaption">Home page - (Default)</h3> 
                                                                            </a> 
                                                                            
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <a href="home2.html" class="image-link"> 
                                                                                <span class="thumbnail">
                                                                                    <img class="img-responsive img-border" src="app/resources/image/catalog/menu/home-2.jpg" alt="">
                                                                                   
                                                                                </span> 
                                                                                <h3 class="figcaption">Home page 2</h3> 
                                                                            </a> 
                                                                            
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <a href="home3.html" class="image-link"> 
                                                                                <span class="thumbnail">
                                                                                    <img class="img-responsive img-border" src="app/resources/image/catalog/menu/home-3.jpg" alt="">
                                                                                   
                                                                                </span> 
                                                                                <h3 class="figcaption">Home page 3</h3> 
                                                                            </a> 
                                                                            
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <a href="home4.html" class="image-link"> 
                                                                                <span class="thumbnail">
                                                                                    <img class="img-responsive img-border" src="app/resources/image/catalog/menu/home-4.jpg" alt="">
                                                                                    
                                                                                </span> 
                                                                                <h3 class="figcaption">Home page 4</h3> 
                                                                            </a> 
                                                                            
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <a href="home5.html" class="image-link"> 
                                                                                <span class="thumbnail">
                                                                                    <img class="img-responsive img-border" src="app/resources/image/catalog/menu/home-5.jpg" alt="">
                                                                                    
                                                                                </span> 
                                                                                <h3 class="figcaption">Home page 5</h3> 
                                                                            </a> 
                                                                            
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <a href="home6.html" class="image-link"> 
                                                                                <span class="thumbnail">
                                                                                    <img class="img-responsive img-border" src="app/resources/image/catalog/menu/home-6.jpg" alt="">
                                                                                    
                                                                                </span> 
                                                                                <h3 class="figcaption">Home page 6</h3> 
                                                                            </a> 
                                                                            
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <a href="#" class="image-link"> 
                                                                                <span class="thumbnail">
                                                                                    <img class="img-responsive img-border" src="app/resources/image/catalog/menu/home-7.jpg" alt="">
                                                                                    
                                                                                </span> 
                                                                                <h3 class="figcaption">Coming Soon</h3> 
                                                                            </a> 
                                                                            
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <a href="#" class="image-link"> 
                                                                                <span class="thumbnail">
                                                                                    <img class="img-responsive img-border" src="app/resources/image/catalog/menu/home-8.jpg" alt="">
                                                                                    
                                                                                </span> 
                                                                                <h3 class="figcaption">Coming Soon</h3> 
                                                                            </a> 
                                                                            
                                                                        </div>
                                                                        
                                                                        <!-- <div class="col-md-15">
                                                                            <a href="#" class="image-link"> 
                                                                                <span class="thumbnail">
                                                                                    <img class="img-responsive img-border" src="app/resources/image/demo/feature/comming-soon.png" alt="">
                                                                                    
                                                                                </span> 
                                                                                <h3 class="figcaption">Comming soon</h3> 
                                                                            </a> 
                                                                            
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="with-sub-menu hover">
                                                            <p class="close-menu"></p>
                                                            <a href="#" class="clearfix">
                                                                <strong>Features</strong>
                                                                <img class="label-hot" src="app/resources/image/catalog/menu/new-icon.png" alt="icon items">
                                                                <b class="caret"></b>
                                                            </a>
                                                            <div class="sub-menu" style="width: 100%; right: auto;">
                                                                <div class="content" >
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="column">
                                                                                <a href="#" class="title-submenu">Listing pages</a>
                                                                                <div>
                                                                                    <ul class="row-list">
                                                                                        <li><a href="category.html">Category Page 1 </a></li>
                                                                                        <li><a href="category-v2.html">Category Page 2</a></li>
                                                                                        <li><a href="category-v3.html">Category Page 3</a></li>
                                                                                    </ul>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="column">
                                                                                <a href="#" class="title-submenu">Product pages</a>
                                                                                <div>
                                                                                    <ul class="row-list">
                                                                                        <li><a href="product.html">Product page 1</a></li>
                                                                                        <li><a href="product-v2.html">Product page 2</a></li>
                                                                                        <li><a href="product-v3.html">Product page 3</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="column">
                                                                                <a href="#" class="title-submenu">Shopping pages</a>
                                                                                <div>
                                                                                    <ul class="row-list">
                                                                                        <li><a href="cart.html">Shopping Cart Page</a></li>
                                                                                        <li><a href="checkout.html">Checkout Page</a></li>
                                                                                        <li><a href="compare.html">Compare Page</a></li>
                                                                                        <li><a href="wishlist.html">Wishlist Page</a></li>
                                                                                    
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="column">
                                                                                <a href="#" class="title-submenu">My Account pages</a>
                                                                                <div>
                                                                                    <ul class="row-list">
                                                                                        <li><a href="login.html">Login Page</a></li>
                                                                                        <li><a href="register.html">Register Page</a></li>
                                                                                        <li><a href="my-account.html">My Account</a></li>
                                                                                        <li><a href="order-history.html">Order History</a></li>
                                                                                        <li><a href="order-information.html">Order Information</a></li>
                                                                                        <li><a href="return.html">Product Returns</a></li>
                                                                                        <li><a href="gift-voucher.html">Gift Voucher</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="with-sub-menu hover">
                                                            <p class="close-menu"></p>
                                                            <a href="#" class="clearfix">
                                                                <strong>Pages</strong>
                                                                <b class="caret"></b>
                                                            </a>
                                                            <div class="sub-menu" style="width: 40%; ">
                                                                <div class="content" >
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <ul class="row-list">
                                                                                <li><a class="subcategory_item" href="faq.html">FAQ</a></li>
                                                                                
                                                                                <li><a class="subcategory_item" href="sitemap.html">Site Map</a></li>
                                                                                <li><a class="subcategory_item" href="contact.html">Contact us</a></li>
                                                                                <li><a class="subcategory_item" href="banner-effect.html">Banner Effect</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <ul class="row-list">
                                                                                <li><a class="subcategory_item" href="about-us.html">About Us 1</a></li>
                                                                                <li><a class="subcategory_item" href="about-us-2.html">About Us 2</a></li>
                                                                                <li><a class="subcategory_item" href="about-us-3.html">About Us 3</a></li>
                                                                                <li><a class="subcategory_item" href="about-us-4.html">About Us 4</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="with-sub-menu hover">
                                                            <p class="close-menu"></p>
                                                            <a href="#" class="clearfix">
                                                                <strong>Categories</strong>
                                                                <img class="label-hot" src="app/resources/image/catalog/menu/hot-icon.png" alt="icon items">
                                                      
                                                                <b class="caret"></b>
                                                            </a>
                                                            <div class="sub-menu" style="width: 100%; display: none;">
                                                                <div class="content">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="row">
                                                                                <div class="col-md-3 img img1">
                                                                                    <a href="#"><img src="app/resources/image/catalog/menu/megabanner/image-1.jpg" alt="banner1"></a>
                                                                                </div>
                                                                                <div class="col-md-3 img img2">
                                                                                    <a href="#"><img src="app/resources/image/catalog/menu/megabanner/image-2.jpg" alt="banner2"></a>
                                                                                </div>
                                                                                <div class="col-md-3 img img3">
                                                                                    <a href="#"><img src="app/resources/image/catalog/menu/megabanner/image-3.jpg" alt="banner3"></a>
                                                                                </div>
                                                                                <div class="col-md-3 img img4">
                                                                                    <a href="#"><img src="app/resources/image/catalog/menu/megabanner/image-4.jpg" alt="banner4"></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <a href="#" class="title-submenu">Automotive</a>
                                                                            <div class="row">
                                                                                <div class="col-md-12 hover-menu">
                                                                                    <div class="menu">
                                                                                        <ul>
                                                                                            <li><a href="#"  class="main-menu">Car Alarms and Security</a></li>
                                                                                            <li><a href="#"  class="main-menu">Car Audio &amp; Speakers</a></li>
                                                                                            <li><a href="#"  class="main-menu">Gadgets &amp; Auto Parts</a></li>
                                                                                            <li><a href="#"  class="main-menu">More Car Accessories</a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <a href="#" class="title-submenu">Funitures</a>
                                                                            <div class="row">
                                                                                <div class="col-md-12 hover-menu">
                                                                                    <div class="menu">
                                                                                        <ul>
                                                                                            <li><a href="#"  class="main-menu">Bathroom</a></li>
                                                                                            <li><a href="#"  class="main-menu">Bedroom</a></li>
                                                                                            <li><a href="#"  class="main-menu">Decor</a></li>
                                                                                            <li><a href="#"  class="main-menu">Living room</a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <a href="#" class="title-submenu">Jewelry &amp; Watches</a>
                                                                            <div class="row">
                                                                                <div class="col-md-12 hover-menu">
                                                                                    <div class="menu">
                                                                                        <ul>
                                                                                            <li><a href="#"  class="main-menu">Earings</a></li>
                                                                                            <li><a href="#"  class="main-menu">Wedding Rings</a></li>
                                                                                             <li><a href="#"  class="main-menu">Women Watches</a></li>
                                                                                            <li><a href="#"  class="main-menu">Men Watches</a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <a href="#" class="title-submenu">Electronics</a>
                                                                            <div class="row">
                                                                                <div class="col-md-12 hover-menu">
                                                                                    <div class="menu">
                                                                                        <ul>
                                                                                            <li><a href="#"  class="main-menu">Computer</a></li>
                                                                                            <li><a href="#"  class="main-menu">Smartphone</a></li>
                                                                                            <li><a href="#"  class="main-menu">Tablets</a></li>
                                                                                            <li><a href="#"  class="main-menu">Monitors</a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        
                                                        <li class="">
                                                            <p class="close-menu"></p>
                                                            <a href="#" class="clearfix">
                                                                <strong>Accessories</strong>
                                             
                                                            </a>
                                                
                                                        </li>
                                                        <li class="">
                                                            <p class="close-menu"></p>
                                                            <a href="blog-page.html" class="clearfix">
                                                                <strong>Blog</strong>
                                                                <span class="label"></span>
                                                            </a>
                                                        </li>
                                                        
                                                        
                                                    </ul>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                       </div>  
                       <div class="phone-header pull-right">
                            <div class="telephone hidden-xs">
                            <div class="contact-us">    
                                <span class="text">call us now:</span> 
                                <span class="phone">0123-444-666</span><br>  Email:<a href="mailto:contact@revo.com"> contact@revo.com</a> 
                            </div>
                            </div>
                        </div>   
                    </div>
                    <!-- //end Main menu -->
                </div>
            </div>
        </div>
        <!-- //Header center -->

        <!-- Header Bottom -->
        <div class="header-bottom hidden-compact">
            <div class="container">
                <div class="header-bottom-inner">
                    <div class="row">
                        <div class="header-bottom-left menu-vertical col-md-3 col-sm-2 col-xs-2">
                            <div class="responsive so-megamenu megamenu-style-dev ">
                                <div class="so-vertical-menu ">
                                    <nav class="navbar-default">    
                                        

                                        <?php MenuWidget::render("departament_menu", "departament"); ?>

                                    </nav>
                                </div>
                            </div>

                        </div>
                        <div class="header-bottom-right col-md-9 col-sm-10 col-xs-10">
                            <!-- Search -->
                            <div class="header_search col-lg-6 col-md-8 col-sm-9 col-xs-4">
                               
                                <button id="dropdownSearch" class="dropdown-toggle bt-search hidden"><i class="fa fa-search" aria-hidden="true"></i></button>                         
                                <div class="dropdown-menu dropdown-menu-search"> 
                                    <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
                                        <form method="GET" action="index.html">
                                            <div id="search0" class="search input-group form-group">
                                                <div class="select_category filter_type  icon-select hidden-xs">
                                                    <select class="no-border" name="category_id">
                                                        <option value="0">All Categories</option>
                                                        <option value="78">Apparel</option>
                                                        <option value="77">Cables &amp; Connectors</option>
                                                        <option value="82">Cameras &amp; Photo</option>
                                                        <option value="80">Flashlights &amp; Lamps</option>
                                                        <option value="81">Mobile Accessories</option>
                                                        <option value="79">Video Games</option>
                                                        <option value="20">Jewelry &amp; Watches</option>
                                                        <option value="76">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Earings</option>
                                                        <option value="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wedding Rings</option>
                                                        <option value="27">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Men Watches</option>
                                                    </select>
                                                </div>

                                                <input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Keyword here..." name="search">
                                                <span class="input-group-btn">
                                                <button type="submit" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                            <input type="hidden" name="route" value="product/search" />
                                        </form>
                                    </div>
                                </div>
                                 
                            </div>
                            <!-- //end Search -->
                            <!-- Secondary menu -->
                            <div class="header-right col-lg-3 col-md-3 col-sm-3 col-xs-8 pull-right">
                                
                                <!--cart-->
                                <div class="block-cart">
                                    <div class="shopping_cart">
                                        <div id="cart" class="btn-shopping-cart">
                                            
                                            <!-- START Widget Basket -->
                                            
                                            <?php  

                                                if($session->my_session_get('user') !== null ){
                                                    include_once("app/Widgets/BasketContentWidget.php");
                                                    echo BasketContentWidget::render_basket_header_info(); 
                                                }
                                               
                                                
                                            ?>

                                            <!-- END Widget Basket -->
                                    </div>
                                    </div>
                                </div>
                                <!--//cart-->
                                <div class="header_custom_link">
                                    <ul class="">
                                        <li class="wishlist"><a href="wishlist.html" id="wishlist-total" class="top-link-wishlist" title="Wish List (0) "><i class="fa fa-heart"></i></a>
                                        </li>
                                        <li class="compare"><a href="compare.html" class="top-link-compare" title="Compare "><i class="fa fa-refresh"></i></a>
                                        </li>
                                    </ul>  
                                </div>   
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- //Header Container  -->




    <!-- Main Container  -->
    <div class="main-container">
        <?php include_once($page)?>
    </div>
    <!-- //Main Container -->
       
   

    <!-- Footer Container -->
    <footer class="footer-container typefooter-1">
        <!-- Footer Top Container -->
        <div class="footer-top">
            <div class="container ftop">
                <div class="module footer-services ">
                    <div class="block-infos">
                        <div class="info info1">
                            <div class="inner">
                                <i class="fa fa-truck"></i>
                                <div class="info-cont">
                                    <span class="font-ct">free delivery</span>
                                    <p>From 275 AED</p>
                                </div>
                            </div>
                        </div>
                        <div class="info info2">
                            <div class="inner">
                                <i class="fa fa-money"></i>
                                <div class="info-cont">
                                    <span class="font-ct">cash delivery</span>
                                    <p>From 275 AED</p>
                                </div>
                            </div>
                        </div>
                        <div class="info info3">
                            <div class="inner">
                                <i class="fa fa-gift"></i>
                                <div class="info-cont">
                                    <span class="font-ct">free gift box</span>
                                    <p>&amp; gift note</p>
                                </div>
                            </div>
                        </div>
                        <div class="info info4">
                            <div class="inner">
                                <i class="fa fa-phone-square"></i>
                                <div class="info-cont">
                                    <span class="font-ct">contact us</span>
                                    <p>123 456 789</p>
                                </div>
                            </div>
                        </div>
                        <div class="info info5">
                            <div class="inner">
                                <i class="fa fa-diamond"></i>
                                <div class="info-cont">
                                    <span class="font-ct">Loyalty</span>
                                    <p>Rewarded</p>
                                </div>
                            </div>
                        </div>
                    </div>                                            
                </div>
            </div>
        </div>
        <!-- /Footer Top Container -->
        
        <div class="footer-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xxs-6 col-xs-12 col-style">
                        <div class="module custom_link ">
                            <div class="module clearfix">
                                <h3 class="footertitle">Our Shops</h3>
                                <ul id="menu-our-shops" class="menu">
                                    <li class="menu-product-support"><a class="item-link" href="#"><span class="menu-title">Product Support</span></a></li>
                                    <li class="menu-pc-setup-support"><a class="item-link" href="#"><span class="menu-title">Setup &amp; Support</span></a></li>
                                    <li class="menu-services"><a class="item-link" href="#"><span class="menu-title">Services</span></a></li>
                                    <li class="menu-extended-service-plans"><a class="item-link" href="#"><span class="menu-title">Extended Plans</span></a></li>
                                    <li class="menu-community"><a class="item-link" href="#"><span class="menu-title">Community</span></a></li>
                                </ul>
                            </div>                                        
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xxs-6 col-xs-12 col_q1wn  col-style">
                        <div class="module  ">
                            <div class="footer-block">
                                <div class="footer-block-title">
                                    <h3 class="footertitle">My Account</h3>
                                </div>
                                <div class="footer-block-content">
                                    <ul class="links-footer">
                                        <li><a title="Account" href="my-account.html">My Account</a></li>
                                        <li><a title="Checkout" href="checkout.html">Checkout</a></li>
                                        <li><a title="History" href="order-history.html">Order History</a></li>
                                        <li><a title="Help Center" href="#">Help Center</a></li>
                                        <li><a title="Privacy Policy" href="#">Privacy Policy</a></li>      
                                    </ul>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xxs-6 col-xs-12 col-style">
                        <div class="box-information box-footer">
                            <div class="module clearfix">
                                <h3 class="footertitle">Support</h3>
                                <div class="modcontent">
                                    <ul class="menu">
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="#">Forums</a></li>
                                        <li><a href="#">Faqs Center</a></li>
                                        <li><a href="#">24/7 support</a></li>
                                        <li><a href="#">Free tools</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xxs-6 col-xs-12 col-style">
                        <div class="box-service box-footer">
                            <div class="module clearfix">
                                <h3 class="footertitle">Services</h3>
                                <div class="modcontent">
                                    <ul class="menu">
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="gift-voucher.html">Gift Voucher</a></li>
                                        <li><a href="order-history.html">Order History</a></li>
                                        <li><a href="sitemap.html">Sitemap</a></li>
                                        <li><a href="return.html">Return</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-style footer-contact">
                        <div class="module">
                            <div class="module footer-contact clearfix">
                                <h3 class="footertitle">Contact Us</h3>
                                <ul>
                                    <li><i class="fa fa-map-marker"></i><span>Address : No 40 Baria Sreet 133/2 NewYork City,NY, United States</span></li>
                                    <li class="email"><i class="fa fa-envelope-o"></i>Email : contact@revo.com</li>
                                    <li><i class="fa fa-mobile"></i><span>Phone 1 : (+0123456789)</span><span>Phone 2 : (+0123456789)</span></li>
                                </ul>
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-style">
                        <div class="module custom_categories ">
                            <div class="categories-footer">
                                <div class="footer-cates-w">
                                    <nav>
                                        <a href="#">Home</a>
                                        <a href="#">Categories</a>
                                        <a href="#">Mobiles</a>
                                        <a href="#">Electronics</a>
                                        <a href="#">Accessories</a>
                                        <a href="#">Laptop</a>
                                        <a href="#">About us</a>
                                        <a href="#">Help</a>
                                    </nav>
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                </div>      
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-center-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12 col-style footer-newsletter">
                        <div class="module news-letter">
                            <div class="so-custom-default newsletter">
                                <div class="btn-group title-block">
                                    <div class="popup-title page-heading">
                                    SIGN UP FOR NEWSLETTER
                                    </div>
                                    <div class="newsletter_promo">Duis at ante non massa consectetur iaculis id non tellus</div>
                                </div>
                                <div class="modcontent block_content">
                                    <form method="post" id="signup" name="signup" class="form-group form-inline signup send-mail">
                                        <div class="input-group ">
                                            <div class="input-box">
                                            <input type="email" placeholder="Your email address..." value="" class="form-control" id="txtemail2" name="txtemail2" size="55">
                                            </div>
                                            <div class="input-group-btn subcribe">
                                            <button class="btn btn-primary" type="submit" onclick="return subscribe_newsletter();" name="submit">
                                            Subscribe
                                            </button>
                                            </div>
                                        </div>
                                    </form>
                                </div> <!--/.modcontent-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12 col-style footer-socials-wrap">
                        <div class="module">
                            <div class="socials-wrap">
                                <h3 class="title-follow footertitle">Follow Us</h3>
                                <ul>
                                    <li class="li-social facebook-social">
                                    <a title="Facebook" href="http://www.facebook.com/MagenTech" target="_blank"> 
                                    <span class="fa fa-facebook icon-social"></span><span class="name-social">Facebook</span> 
                                    </a>
                                    </li>

                                    <li class="li-social twitter-social">
                                    <a title="Twitter" href="https://twitter.com/magentech" target="_blank"> 
                                    <span class="fa fa-twitter icon-social"></span> <span class="name-social">Twitter</span> 
                                    </a>
                                    </li>

                                    <li class="li-social google-social">
                                    <a title="Google+" href="https://plus.google.com/u/0/+Smartaddons" target="_blank"> 
                                    <span class="fa fa-google-plus icon-social"></span> <span class="name-social">Google+</span> 
                                    </a>
                                    </li>

                                    <li class="li-social linkedin-social">
                                    <a title="Linkedin" href="#" target="_blank"> 
                                    <span class="fa fa-linkedin icon-social"></span> <span class="name-social">Linkedin</span> 
                                    </a>
                                    </li>

                                    <li class="li-social pinterest-social">
                                    <a title="Pinterest" href="#" target="_blank"> 
                                    <span class="fa fa-pinterest icon-social"></span> <span class="name-social">Pinterest</span> 
                                    </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- Footer Bottom Container -->
        <div class="footer-bottom ">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 copyright">
                        HTML Revo © 2017 - 2018. All Rights Reserved. Designed by <a href="http://www.opencartworks.com/" target="_blank">OpenCartWorks.Com  </a>
                    </div>
                    <div class="col-sm-12 payment">
                        <img src="app/resources/image/catalog/demo/payment/payment.png" alt="imgpayment">
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Bottom Container -->
        <!--Back To Top-->
        <div class="back-to-top"><i class="fa fa-angle-up"></i></div>
    </footer>
    <!-- //end Footer Container -->

    </div>
    
    <!-- <div class="model-popup">
        <div id="container-module-newletter" class="hidden-md hidden-sm hidden-xs">
            <div class="so_newletter_custom_popup_bg popup_bg"></div> 
            <div class="module main-newsleter-popup so_newletter_custom_popup so_newletter_oca_popup" id="so_newletter_custom_popup"> <div class="so-custom-popup so-custom-oca-popup" style="width: 850px; background: url('image/catalog/banners/newletter-bg.jpg') no-repeat white;  "> 
                <div class="modcontent"> 
                    <div class="oca_popup" id="test-popup"> <div class="popup-content"> <p class="newsletter_promo">Daily Promotion</p> 
                        <div class="popup-title">SIGN UP FOR NEWSLETTER                 </div>
                        <form method="post" name="signup" class="form-group signup"> 
                            <div class="input-control"> <div class="email"> <input type="email" placeholder="Your email address..." value="" class="form-control" id="txtemail" name="txtemail"> </div> <button class="btn btn-default" type="submit" onclick="return subscribe_newsletter();" name="submit">Subscribe  </button> </div> 
                        </form> 
                        <label class="hidden-popup"> <input type="checkbox" value="1" name="hidden-popup"> <span class="inline">&nbsp;&nbsp;Don't show this popup again</span> </label> </div> 
                    </div> 
                </div> 
                <button title="Close" type="button" class="popup-close">×</button> </div> 
            </div> 
        </div>
    </div>    -->

  

    <!-- Modal Status register or login -->
    <?php 
        if($_GET['succesacc'] == 'true' || array_key_exists('_flash', $_SESSION) && $_SESSION['_flash'] != null){
           echo 1;
            include_once("app/Widgets/AlertStatusWidget.php");
            if(array_key_exists('_flash', $_SESSION)){
                if(array_key_exists('warning', $_SESSION['_flash'])) {
                    echo AlertStatusWidget::renderStatusWarningModal($session->my_session_flash_get('warning'));
                }
            }

            if(array_key_exists('_flash', $_SESSION)){
                if(array_key_exists('succes', $_SESSION['_flash']) || $_GET['succes'] == true){
                    echo AlertStatusWidget::renderStatusSuccesModal($session->my_session_flash_get('succes'));
                }
             
            }

            if($_GET['succesacc'] == 'true'){
                
                $session->my_session_flash_set('succes','Вы успешно вышли из своего Аккаунта');
                echo AlertStatusWidget::renderStatusSuccesModal($session->my_session_flash_get('succes'));
            }
        }
    ?>
   
    <!-- Modal alert Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function(e){ // ждем окончание загрузки
            var myElement = document.querySelector('.modal_okno_active  ') // ищем нужный элемент
            myElement.click()})
    </script>


<!-- Include Libs & Plugins
============================================ -->
<!-- Placed at the end of the document so the pages load faster -->
<script  src="app/resources/js/jquery-2.2.4.min.js"></script>
<script  src="app/resources/js/bootstrap.min.js"></script>
<script  src="app/resources/js/owl-carousel/owl.carousel.js"></script>
<script  src="app/resources/js/themejs/libs.js"></script>
<script  src="app/resources/js/unveil/jquery.unveil.js"></script>
<script  src="app/resources/js/countdown/jquery.countdown.min.js"></script>
<script  src="app/resources/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
<script  src="app/resources/js/datetimepicker/moment.js"></script>
<script  src="app/resources/js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script  src="app/resources/js/jquery-ui/jquery-ui.min.js"></script>
<script  src="app/resources/js/modernizr/modernizr-2.6.2.min.js"></script>
<script  src="app/resources/js/minicolors/jquery.miniColors.min.js"></script>

<!-- Theme files
============================================ -->

<script  src="app/resources/js/themejs/application.js"></script>

<script  src="app/resources/js/themejs/homepage.js"></script>


<script  src="app/resources/js/themejs/so_megamenu.js"></script>
<script  src="app/resources/js/themejs/addtocart.js"></script>  
<script  src="app/resources/js/themejs/cpanel.js"></script>



</body>
</html>