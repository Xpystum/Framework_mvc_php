
<?php 
	require_once("app/Helpers/ArrayPreparation.php");
    include_once("app/Widgets/MenuWidget.php");
   
    function selectClassMenu($dataName){

        $constMenu = [
            'Fashion' => 'Fashion',
            'Computer' => 'Computer',
            'Flower & Gift' => 'Flower & Gift',
            'Smartphone' => 'Smartphone',
            'Health & Beauty' => 'Health & Beauty',
            'Sport Clothing' => 'Sport Clothing',
            'Watch & Jewelry' => 'Watch & Jewelry',
            'Kitchen' => 'Kitchen',
            'Accessories' => 'Accessories',
        ];

        switch($dataName){
            case $constMenu['Fashion']:{
                return "item-vertical  with-sub-menu hover";
                break;
            }

            case $constMenu['Computer']:{
                return "item-vertical";
                break;
            }

            case $constMenu['Flower & Gift']:{
                return "item-vertical  style1 with-sub-menu hover";
                break;
            }

            case $constMenu['Smartphone']:{
                return "item-vertical with-sub-menu hover";
                break;
            }

            case $constMenu['Health & Beauty']:{
                return "item-vertical css-menu with-sub-menu hover";
                break;
            }

            case $constMenu['Sport Clothing']:{
                return "item-vertical";
                break;
            }

            case $constMenu['Watch & Jewelry']:{
                return "item-vertical";
                break;
            }

            case $constMenu['Kitchen']:{
                return "item-vertical";
                break;
            }

            case $constMenu['Accessories']:{
                return "item-vertical";
                break;
            }

            default:{
                return "";
                break;
            }
        }
                
    }

    function selectClassMenuTag($dataName){

        $constMenu = [
            'Fashion' => 'Fashion',
            'Computer' => 'Computer',
            'Flower & Gift' => 'Flower & Gift',
            'Smartphone' => 'Smartphone',
            'Health & Beauty' => 'Health & Beauty',
            'Sport Clothing' => 'Sport Clothing',
            'Watch & Jewelry' => 'Fashion',
            'Kitchen' => 'Kitchen',
            'Accessories' => 'Accessories',
        ];

        switch($dataName){
            case $constMenu['Fashion']:{
                return '<b class="fa fa-angle-right"></b>';
                break;
            }

            case $constMenu['Computer']:{
                return "";
                break;
            }

            case $constMenu['Flower & Gift']:{
                return '<b class="fa fa-angle-right"></b>';
                break;
            }

            case $constMenu['Smartphone']:{
                return '<b class="fa fa-angle-right"></b>';
                break;
            }
            

            case $constMenu['Health & Beauty']:{
                return '<b class="fa fa-angle-right"></b>';
                break;
            }

            case $constMenu['Sport Clothing']:{
                return '';
                break;
            }

            case $constMenu['Watch & Jewelry']:{
                return '';
                break;
            }

            case $constMenu['Kitchen']:{
                return '';
                break;
            }

            case $constMenu['Accessories']:{
                return '';
                break;
            }

            default:{
                return "";
                break;
            }
        }
                
    }

    
    $data = ArrayPreparation::array_preparation($data);

?>



<div class="container-megamenu vertical">

    <div id="menuHeading">
        <div class="megamenuToogle-wrapper">
            <div class="megamenuToogle-pattern">
                <div class="container">
                    <div>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <span class="title-mega">All Departments</span>              
                </div>
            </div>
        </div>
    </div>

    <div class="navbar-header">
        <button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <div class="vertical-wrapper">
        <span id="remove-verticalmenu" class="fa fa-times"></span>
        <div class="megamenu-pattern">
            <div class="container-mega">
                <ul class="megamenu">

                <?php  foreach($data as $value): ?>
                    <li class="<?php echo selectClassMenu($value['name']); ?>">
                        <p class="close-menu"></p>
                        <a href="#" class="clearfix">
                            <span>
                                <img src="<?php echo $value['icon'] ?>" alt="icon">
                                <strong><?php echo $value['name'] ?></strong>
                            </span>

                            <?php 
                                echo selectClassMenuTag($value['name']);
                            ?>
                        </a>
                        <?php 
                            
                            if(count($value['children']) > 0){
                                MenuWidget::switchMenu($value['name'], $value['children'], $value); 
                            }
                        ?>
                    </li>
                <?php  endforeach; ?>             

                    <li class="loadmore">
                        <i class="fa fa-plus-square-o"></i>
                        <span class="more-view">More Categories</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
                                                
</div>






