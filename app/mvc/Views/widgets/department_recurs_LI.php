<?php 


?>
<ul>
    <?php  foreach($data as $value):  ?>
    <li>
        <a href="#"><?php echo trim($value['name'])?></a>
            <?php 

                if( trim($value['name']) == 'Beauty Tools' ){
                    echo '<b class="fa fa-angle-right"></b>';
                }
                
                if(count($value['children']) > 0) {
                    MenuWidget::rendRecursion('department_recurs_LI', $value['children']);
                    continue;
                }  
            ?>
    </li>
    <?php endforeach; ?>
</ul>