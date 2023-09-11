<?php 

include_once ("app/Widgets/MenuWidget.php"); 

?>
<div class="sub-menu" data-subwidth="80"  >
    <div class="content" >
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 static-menu">
                        <div class="menu">
                        <?php foreach($data['children'] as $value): ?>
                            <?php 
                                MenuWidget::rendRecursion('department_recurs_UL', $value['children'], $value); 
                            ?>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-12 static-menu">
                        <div class="menu">
                            <div class="row banner">
                                <a href="#">
                                    <img src="<?php echo $data['parent']['img'] ?>" alt="banner1">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>