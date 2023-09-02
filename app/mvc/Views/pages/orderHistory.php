<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Order History</a></li>
    </ul>
    
    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">

        <!--START WIDGET CONTENT -->
        <?php  ?>
    
        <?php 
        
        include_once("app/Widgets/OrderHistoryWidget.php");
        OrderHistoryWidget::render($data);
        
        ?>
        <!-- END WIDGET CONTENT  -->
            
        </div>
        <!--Middle Part End-->

        <!--Right Part Start -->
        
        <?php 
            include_once("app/Widgets/AccountWidget.php");
            AccountWidget::render();
        ?>
          
        <!--Right Part End -->
    </div>
</div>