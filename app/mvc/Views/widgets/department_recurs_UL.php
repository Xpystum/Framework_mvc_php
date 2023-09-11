
<?php 



?>
<ul>
    <li>
    <?php //foreach($data['children'] as $value): ?>
        <?php 
            if($data['parent']['title'] == 1 && $data['parent'] != null): ?>
                <a href="#" class="main-menu"><?php echo $data['parent']['name']; $data['parent']['title'] = ""; ?></a>
            <li>
                <?php 
                    if($data['children'] != null) {
                        MenuWidget::rendRecursion('department_recurs_LI', $data['children']);
                        // continue;
                    }
                ?>
            </li>
        <?php endif; ?>
    <?php //endforeach ?>
    </li>
</ul>
