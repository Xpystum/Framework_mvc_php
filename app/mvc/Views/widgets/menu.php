
<?php 
	foreach ($data as $item) {
		echo "<a href='http://localhost/framework/".$item['href']."'>".$item['name']."</a>";
	}
?>

<div class="vertical-wrapper">
    <span id="remove-verticalmenu" class="fa fa-times"></span>
    <div class="megamenu-pattern">
        <div class="container-mega">
            <ul class="megamenu">
                <!-- START MENU -->
                
                <?php foreach($menuMain as $menu_main): ?>
                    <?php foreach($menuParrentNew as $key => $menu_parrent): ?>
                            <?php if( ($menu_main['name'] == $key) && $menu_main['name'] == $constMenu['Fashion'] ):   ?>
                                <li class="item-vertical  with-sub-menu hover"> 
                                    <p class="close-menu"></p>
                                    <a href="#" class="clearfix">
                                        <span>
                                            <img src="<?php echo $menu_main['icon'] ?>" alt="icon">
                                            <strong> <?php echo $menu_main['name']?> </strong>
                                        </span>
                                        <b class="fa fa-angle-right"></b>
                                    </a>
                                    <div class="sub-menu" data-subwidth="80"  >
                                        <div class="content" >
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                    <?php foreach($menu_parrent as $value): ?>
                                                        <div class="col-md-4 static-menu">
                                                            <div class="menu">
                                                                <ul>
                                                                    <li>
                                                                        <?php 
                                                                        // var_dump($menu_parrent);
                                                                        if($value['title'] == 1):
                                                                            echo '<a href="#"  class="main-menu">Outwear & Jackets</a>';
                                                                        
                                                                        ?>
                                                                        <?php else: ?>
                                                                        <ul>
                                                                            <li>
                                                                                <a href=""><?php echo $value['name'] ?> </a>
                                                                            </li>
                                                                        </ul>
                                                                        <?php endif; ?>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>

                                                        <!-- <div class="col-md-4 static-menu">
                                                            <div class="menu">
                                                                <ul>
                                                                    <li>
                                                                        <a href="#"  class="main-menu">Under Gewear</a>
                                                                        <ul>
                                                                            <li><a href="#" >Long Johns</a></li>
                                                                            <li><a href="#" >Men's & Lounge</a></li>
                                                                            <li><a href="#" >Pajama Sets</a></li>
                                                                            <li><a href="#" >Pajama Sets</a></li>
                                                                            <li><a href="#" >Accessories Sets</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="main-menu">Accessories</a>
                                                                        <ul>
                                                                            <li><a href="#" >Scarves Pren</a></li>
                                                                            <li><a href="#" >Skullies & Beanies</a></li>
                                                                            <li><a href="#" >cription Glasses</a></li>
                                                                            <li><a href="#" >Bomber Hats</a></li>
                                                                            <li><a href="#" >Baseball Caps</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 static-menu">
                                                            <div class="menu">
                                                                <ul>
                                                                    <li>
                                                                        <a href="#"  class="main-menu">Bottoms Supplies</a>
                                                                        <ul>
                                                                            <li><a href="#" >Casual Pants</a></li>
                                                                            <li><a href="#" >Cargo Pants</a></li>
                                                                            <li><a href="#" >Jeanses</a></li>
                                                                            <li><a href="#" >Sweatpants</a></li>
                                                                            <li><a href="#" >Harem Pants</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 static-menu">
                                                            <div class="menu">
                                                                <ul>
                                                                    <li>
                                                                        <a href="#"  class="main-menu">Outer Jackets</a>
                                                                        <ul>
                                                                            <li><a href="#" >Parkas Pants</a></li>
                                                                            <li><a href="#" >Down Jackets</a></li>
                                                                            <li><a href="#" >Suits & Blazer</a></li>
                                                                            <li><a href="#" >Wool & Blends</a></li>
                                                                            <li><a href="#" >Loungewear</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>  -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>

                            <!-- <li class="item-vertical">
                                <p class="close-menu"></p>
                                <a href="#" class="clearfix">
                                    <span>
                                        <img src="image/catalog/menu/icons/icon-1.png" alt="icon">
                                        <strong>Computer</strong>
                                    </span>
                                        
                                    
                                </a>
                            </li>
                            <li class="item-vertical  style1 with-sub-menu hover">
                                <p class="close-menu"></p>
                                <a href="#" class="clearfix">
                                    <span>
                                        <img src="image/catalog/menu/icons/icon-2.png" alt="icon">
                                        <strong>Flower & Gift</strong>
                                    </span>
                                        
                                    <b class="fa fa-angle-right"></b>
                                </a>
                                <div class="sub-menu" data-subwidth="60" >
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12 static-menu">
                                                        <div class="menu">
                                                            <ul>
                                                                <li><a href="#" class="main-menu">Anniversary Flowers</a>
                                                                    <ul>
                                                                        <li><a href="#">Apology Flowers</a>
                                                                        </li>
                                                                        <li><a href="#">Baby Flowers</a>
                                                                        </li>
                                                                        <li><a href="#">Birthday Flowers</a>
                                                                        </li>
                                                                        <li><a href="#">Congratulations Flowers</a>
                                                                        </li>
                                                                        <li><a href="#">Get Well Flowers</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li><a href="#" class="main-menu">Good Luck Flowers</a>
                                                                    <ul>
                                                                        <li><a href="#">New Home Flowers</a>
                                                                        </li>
                                                                        <li><a href="#">Romance Flowers</a>
                                                                        </li>
                                                                        <li><a href="#">Surprise Flowers</a>
                                                                        </li>
                                                                        <li><a href="#">Sympathy Flowers</a>
                                                                        </li>
                                                                        <li><a href="#">Thank You Flowers</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row banner">
                                                    <a href="#">
                                                        <img src="image/catalog/menu/megabanner/vbanner1.jpg" alt="banner1">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-vertical with-sub-menu hover">
                                <p class="close-menu"></p>
                                <a href="#" class="clearfix">
                                    <span>
                                        <img src="image/catalog/menu/icons/icon-3.png" alt="icon">
                                        <strong>Smartphone</strong>
                                    </span>
                                        
                                    <b class="fa fa-angle-right"></b>
                                </a>
                                <div class="sub-menu" data-subwidth="70" >
                                    <div class="content" >
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4 static-menu">
                                                        <div class="menu">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" class="main-menu">Mobile Phones</a>
                                                                    <ul>
                                                                        <li><a href="#" >Octa Core</a></li>
                                                                        <li><a href="#" >Deca Core</a></li>
                                                                        <li><a href="#" >Dual SIM Card</a></li>
                                                                        <li><a href="#" >Single SIM Card</a></li>
                                                                        <li>
                                                                            <a href="#" >Home Audio</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" >4GB RAM</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" >5.5-inch Display</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">Memory 32,64G</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 static-menu">
                                                        <div class="menu">
                                                            <ul>
                                                                <li>
                                                                    <a href="#"  class="main-menu">Cases & Covers</a>
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#">Patterned Cases</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" >Wallet Cases</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" >Waterptoof Cases</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">Leather Cases</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" >Silicone Cases</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" >Flip Cases</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" >Galaxy S8 Cases</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" >Xiaomi Cases</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 static-menu">
                                                        <div class="menu">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" class="main-menu">Phone Accessories</a>
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#" >Power Bank</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" >Screen Protectors</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" >Mobile Phone Cables</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" >Holders & Stands</a>
                                                                        </li>
                                                                            <li>
                                                                            <a href="#" >Phone Lenses</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" >Phone Cables</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" >Phone Display</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" >Phone Memory</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row banner">
                                                        <a href="#">
                                                            <img src="image/catalog/menu/megabanner/menu_bg2.jpg" alt="banner1">
                                                        </a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-vertical css-menu with-sub-menu hover">
                                <p class="close-menu"></p>
                                <a href="#" class="clearfix">
                                    <span>
                                        <img src="image/catalog/menu/icons/icon-4.png" alt="icon">
                                        <strong>Health & Beauty</strong>
                                    </span>
                                        
                                    <b class="fa fa-angle-right"></b>
                                </a>
                                <div class="sub-menu" data-subwidth="25">
                                    <div class="content" >
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-12 hover-menu">
                                                        <div class="menu">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" class="main-menu">Human Hair Weaves</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="main-menu">Beauty Tools <b class="fa fa-angle-right"></b></a>
                                                                    <ul style="display: none;">
                                                                        <li>
                                                                            <a href="#" class="main-menu">Makeup Set</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="main-menu">False Eyelashes</a>
                                                                        </li> 
                                                                            <li>
                                                                            <a href="#" class="main-menu">Eyeshadow</a>
                                                                        </li>
                                                                            <li>
                                                                            <a href="#" class="main-menu">Beauty Essentials</a>
                                                                        </li>  
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="main-menu">Wigs & Salon Supply</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="main-menu">Nail Art & Tools</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="main-menu">Makeup Brushes</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-vertical">
                                <p class="close-menu"></p>
                                <a href="#" class="clearfix">
                                    <span>
                                        <img src="image/catalog/menu/icons/icon-5.png" alt="icon">
                                        <strong>Sport Clothing</strong>
                                    </span>
                                        
                                    
                                </a>
                            </li>
                            <li class="item-vertical">
                                <p class="close-menu"></p>
                                <a href="#" class="clearfix">
                                    <span>
                                        <img src="image/catalog/menu/icons/icon-7.png" alt="icon">
                                        <strong>Watch & Jewelry</strong>
                                    </span>
                                        
                                    
                                </a>
                            </li>
                            <li class="item-vertical">
                                <p class="close-menu"></p>
                                <a href="#" class="clearfix">
                                    <span>
                                        <img src="image/catalog/menu/icons/icon-8.png" alt="icon">
                                        <strong>Kitchen</strong>
                                    </span>
                                        
                                    
                                </a>
                            </li>
                            <li class="item-vertical" >
                                <p class="close-menu"></p>
                                <a href="#" class="clearfix">
                                    <span>
                                        <img src="image/catalog/menu/icons/icon-9.png" alt="icon">
                                        <strong>Accessories</strong>
                                    </span>
                                        
                                    
                                </a>
                            </li> -->
                    <?php endforeach; ?>
                <?php endforeach; ?>
                <!-- END MENU -->
                <li class="loadmore">
                    <i class="fa fa-plus-square-o"></i>
                    <span class="more-view">More Categories</span>
                </li>
            </ul>
        </div>
    </div>
</div>