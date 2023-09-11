<?php 
include_once ("app/Widgets/MenuWidget.php"); 

?>
<div class="sub-menu" data-subwidth="70" style="width: 630px; display: none; right: 0px;" >
    <div class="content" >
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                <?php foreach($data['children'] as $value): ?>
                    <div class="col-md-4 static-menu">
                        <div class="menu">
                        <?php 
                            MenuWidget::rendRecursion('department_recurs_UL', $value['children'], $value); 
                        ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
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