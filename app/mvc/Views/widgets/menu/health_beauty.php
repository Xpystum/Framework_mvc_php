<?php  



// foreach($data as $value){
    
//     dd::arrp($value);
//     die();
//     // if($value['children'] != null){
//     //     foreach($value['children'] as $name){
//     //         var_dump($name['name']);
//     //     }
//     // }
// }

// dd::arrp($data);

// die();


include_once ("app/Widgets/MenuWidget.php"); 




?>
<div class="sub-menu" style="width: 720px; display: none; right: 0px;" data-subwidth="25">
    <div class="content" >
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12 hover-menu">
                        <div class="menu">
                            <?php 
                                MenuWidget::rendRecursion('department_recurs_LI', $data);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>