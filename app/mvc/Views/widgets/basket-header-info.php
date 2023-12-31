<a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
    <div class="shopcart">
        <span class="icon-c hidden">
        <i class="fa fa-shopping-bag"></i>
        </span>
        <div class="shopcart-inner">
            <p class="text-shopping-cart hidden">
                My cart
            </p>

            <span class="total-shopping-cart cart-total-full">
                    <span class="items_cart"><?php echo $data['info']['count'];  ?></span><span class="items_cart2 hidden"> item(s)</span><span class="items_carts hidden"> - $162.00 </span>
            </span>
        </div>
    </div>
</a>

<ul class="dropdown-menu pull-right shoppingcart-box" role="menu">
    <li>
        <table class="table table-striped">
            <tbody>
                
                <?php 
                    // $sum = 0;
                    // foreach ($data['basket'] as $info):
                    //     // print_r($info);
                    //     $sum += $info['total_product'];
                    // endforeach;
                    // print_r($sum);
                    // die();
                
                    foreach ($data['basket'] as $info): 
                ?>
                <tr>
                    <td class="text-center" style="width:70px">
                        <a href="product.html">
                            <img src="<?php echo $info['img'];?>" style="width:70px" alt="<?php echo $info['name'];?>" title="<?php echo $info['name'];?>" class="preview">
                        </a>
                    </td>
                    <td class="text-left"> <a class="cart_product_name" href="product.html"><?php echo $info['name'];?></a> 
                    </td>
                    <td class="text-center">x<?php echo $info['count'];?></td>
                    <td class="text-center"><?php  echo ($info['total_product'] * $info['count']);?></td>
                    <td class="text-right">
                        <a href="product.html" class="fa fa-edit"></a>
                    </td>
                    <td class="text-right">
                        <a onclick="cart.remove('2');" class="fa fa-times fa-delete"></a>
                    </td>
                </tr>

                <?php endforeach; ?>

            </tbody>
        </table>
    </li>
    <li>    
        <div>
            <?php  echo BasketContentWidget::render_table_total($data) ?>
            <?php 
                  require_once("app/Helpers/Session.php");
                  $session = new session();
                  $select = '';
                  if(!empty($data['basket'])){
                      $select = $session->my_session_get('user');
                  }
            ?>
            <p class="text-center total-carts"> <a class="btn view-cart" href="http://localhost/diplom_framework_mvc_php/?route=index/cart"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart" href="checkout.html"><i class="fa fa-share"></i>Checkout</a> 
            </p>
        </div>
    </li>
</ul>