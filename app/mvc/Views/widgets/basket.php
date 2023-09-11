<?php 
require_once("app/Helpers/Session.php");
require_once("app/Helpers/Cupon.php");
//Api
require_once("app/API/ApiСurrency.php");
$usd_relatively_ruble = ApiСurrency::returnСurrencyFromRuble();

$session = new Session();
$sessionCupon = $session->my_session_flash_get('cupon');
if(isset($sessionCupon)) {  $sessionCupon = array_shift($sessionCupon); };

//загвоздка в проектировки БД (Нужно брать данные из order - а не из product и при скидочном купоне записывать сумму товара в order) <- придётся переделывать.
foreach ($data as $info):
    if(isset($sessionCupon)){

        $cupon = new Cupon();
        if($cupon->true_discont($sessionCupon, $info)){
            if($cupon->calculate_discount($info['price'], $sessionCupon['precent_copun']) != '?'){
                $info['price'] = $cupon->calculate_discount($info['price'], $sessionCupon['precent_copun']);
            }
        }   
    }
?>
   
    <tr>
    <td class="text-center">
        <a href="product.html"> 
            <img width="70px" src="<?php echo $info['img']?>" alt="<?php echo $info['name']?>" title="<?php echo $info['name']?>" class="img-thumbnail">
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
    <td class="text-right">$<?php echo (int)($info['price']/$usd_relatively_ruble) ?></td>
    <td class="text-right">
        <?php 
            try{
                echo "$".(int)($info['total_product']/$usd_relatively_ruble);
            }
            catch(Exception $e){
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        ?>
    </td>
    </tr>
<?php endforeach;?>