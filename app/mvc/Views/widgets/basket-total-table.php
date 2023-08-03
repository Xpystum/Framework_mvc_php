<table class="table table-bordered">
    <tbody>
        <tr>
            <td class="text-right">
                <strong>Итог:</strong>
            </td>
            <td class="text-right">
                <?php   
                    $sum = 0;
                    foreach ($data as $info):
                        $sum += $info['price'];
                    endforeach;
                    echo $sum.' Rub';
                ?>
            </td>
        </tr>
        <tr>
            <!-- Алгоритм подсчета налого и доставки -->
            <td class="text-right">
                <strong>Flat Shipping Rate:</strong>
            </td>
            <td class="text-right">$4.69</td>
        </tr>
        <tr>
            <td class="text-right">
                <strong>Eco Tax (-2.00):</strong>
            </td>
            <td class="text-right">$5.62</td>
        </tr>
        <tr>
            <td class="text-right">
                <strong>НДС (20%):</strong>
            </td>
            <td class="text-right">

                <?php  echo ($sum * 0.2)." Rub";   ?>
                
            </td>
        </tr>
        <tr>
            <td class="text-right">
                <strong>Total:</strong>
            </td>
            <td class="text-right">$213.70</td>
        </tr>
    </tbody>
</table>