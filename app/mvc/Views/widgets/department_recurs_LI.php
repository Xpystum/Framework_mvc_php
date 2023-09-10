<ul>
    <?php  foreach($data as $value): ?>
        <a href="#"><?php echo $value['name'] ?></a>
            <?php 
                if(count($value['children']) > 0) {
                    MenuWidget::rendRecursion('department_recurs_UL', $value['children']);
                    continue;
                }  
            ?>
    <?php endforeach; ?>
</ul>