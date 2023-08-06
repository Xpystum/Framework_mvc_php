<?php foreach ($data as $info):?>
    <tr>
    <td class="text-center">
        <a href="product.html"> 
            <img width="70px" src="<?php echo $info['img']?>" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-thumbnail">
        </a>
    </td>
    <td class="text-left"><a href="product.html"><?php echo $info['name']?></a><br>
        </td>
    <td class="text-left">Pt 001</td>
    <td class="text-left" width="200px"><div class="input-group btn-block quantity">
        <input type="text" name="quantity" value="<?php echo $info['count']?>" size="<?php $info['count']?>" class="form-control">
        <span class="input-group-btn">
        <button type="submit" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Update"><i class="fa fa-clone"></i></button>
        <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="" data-original-title="Remove"><i class="fa fa-times-circle"></i></button>
        </span></div></td>
    <td class="text-right">₽<?php echo $info['price']?></td>
    <td class="text-right">
        <?php 
            try{
                $count_price = (int)$info['count'] * $info['price'];
                echo $count_price;
            }
            catch(Exception $e){
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        ?>
    </td>
    </tr>
<?php endforeach;?>