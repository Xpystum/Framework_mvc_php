
<?php 

// var_dump(2123);


?>
<ul>
    <li>
    <?php foreach($data as $value): ?>
        <?php 
            if($data['title'] == 1): ?>
            <a href="#" class="main-menu"><?php echo  $value['name'] ?></a>
            <li>
                <?php 
             
                    if(count($value['children']) > 0) {
                        MenuWidget::rendRecursion('department_recurs_LI', $value['children']);
                        continue;
                    }
                ?>
            </li>
        <?php endif; ?>
    <?php endforeach ?>
    </li>
</ul>
