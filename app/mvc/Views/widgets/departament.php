
<?php 
	require_once("app/Helpers/ArrayPreparation.php");
    include_once("app/Widgets/MenuWidget.php");
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
    


    //групировка массива
    // function createThree($datas){
    //     $parent_arr = array();

    //     //[$item['parent_id']] - будет ссылкой (или индификатором родителя)
    //     //[[$item['id']] - номер элемента
    //     foreach($datas as $key => $item){
    //         $parent_arr[$item['parrent_id']][$item['id']] = $item;
    //     }
    //     // работаем от главных родителей (0 уровень вложенности)
    //     $threeElem = $parent_arr[0];

    //     //передача параметра по ссылке 
    //     generateElemThree($threeElem, $parent_arr);

    //     //возваращем сгрупированный массив
    //     return $threeElem;
    // }
    
    // //рекурсивная функция
    // function generateElemThree(&$threeElem, $parent_arr){

    //     foreach($threeElem as $key => $item){
    //         //создаем ветку ['children']
    //         if(!isset($item['children'])){
    //             $threeElem[$key]['children'] = array();
    //         }

    //         //записываем производный массив от родителя в ['children'] - если такой есть и запускаем рекурсию по этому children
    //         if(array_key_exists($key, $parent_arr)){
    //             $threeElem[$key]['children'] = $parent_arr[$key];
    //             generateElemThree($threeElem[$key]['children'], $parent_arr);
    //         }
    //     }

    // }

    
    
    $data = ArrayPreparation::array_preparation($data);
    // dd::arrp($data[4]);

    // dd::arrp(createThree($data)); 
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
                    <li class="item-vertical  with-sub-menu hover">
                        <p class="close-menu"></p>
                        <a href="#" class="clearfix">
                            <span>
                                <img src="<?php echo $value['icon'] ?>" alt="icon">
                                <strong><?php echo $value['name'] ?></strong>
                            </span>
                                
                            <b class="fa fa-angle-right"></b>
                        </a>
                        <?php 
                            
                            if(count($value['children']) > 0){
                                MenuWidget::switchMenu($value['name'], $value['children']); 
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






