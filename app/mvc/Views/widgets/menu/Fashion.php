<?php  

include_once ("app/Widgets/MenuWidget.php"); 

?>
<div class="sub-menu" data-subwidth="80"  style="width: 720px; display: none; right: 0px;">
    <div class="content" >
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <?php foreach($data as $value): ?>
                        <div class="col-md-4 static-menu">
                            <div class="menu">
                                <?php 
                                    MenuWidget::rendRecursion('department_recurs_UL', $value['children'], $value); 
                                    // var_dump($data);
                                ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>



