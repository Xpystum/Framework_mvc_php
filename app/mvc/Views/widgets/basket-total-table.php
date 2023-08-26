<!-- для правильного расположение -->
<?php 
    if(isset($data['info']['flag'])){
        $class = ($data['info']['flag'] == true) ? 'text-left': 'text-right';
    }
?>

<!-- Делать логику для дисконта в рублях* -->
<table class="table table-bordered">
    <tbody>
        <tr>
            <td class="<?php echo $class?>">
                <strong>Итог:</strong>
            </td>
            <td class="text-right">
                <?php   
                    
                    if(isset($data['info']['flag'])){
                        $sum = 0;
                        foreach ($data['basket'] as $info):
                            $sum += $info['price'];
                        endforeach;
                        echo $sum.' Rub';
                    }
                    else{
                        
                        $sum = 0;
                        foreach ($data as $info):
                            $sum += $info['price'];
                        endforeach;
                        echo $sum.' Rub';
                    }
                   
                ?>
            </td>
        </tr>
        <tr>
            <!-- Алгоритм подсчета налого и доставки -->
            <td class="<?php echo $class?>">
                <strong>Flat Shipping Rate:</strong>
            </td>
            <td class="text-right">$4.69</td>
        </tr>
        <tr>
            <td class="<?php echo $class?>">
                <strong>Eco Tax (-2.00):</strong>
            </td>
            <td class="text-right">$5.62</td>
        </tr>
        <tr>
            <td class="<?php echo $class?>">
                <strong>НДС (20%):</strong>
            </td>
            <td class="text-right">

            
                <?php  
                    echo ($sum * 0.2)." Rub";   
                ?>

            </td>
        </tr>
        <tr>
            <td class="<?php echo $class?>">
                <strong>Total:</strong>
            </td>
            <td class="text-right">$213.70</td>
        </tr>
    </tbody>
</table>