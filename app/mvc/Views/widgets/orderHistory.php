<?php 

function renderName($name, $data){
    echo $data[$name];
}

?>
<style>
    tr{
        border: 1px solid black;
    }
    td{
        border: 1px solid black;
    }

    thead > tr{
        padding-top: 40px;
    }
</style>


<h2 class="title">Order History</h2>
    <div class="table-responsive">
    
    <?php foreach($data as $key => $value):  ?>
        <table  style="border:1px solid red; " class="table table-hover">
            <caption style="font-size: 18px; font-weight: bold; color: #222;">Order # <?php echo $key ?></caption>
            <thead>
                    <tr>
                        <td class="text-center">Image</td>
                        <td class="text-center">Product Name</td>
                        <td class="text-center">Quantity</td>
                        <td class="text-center">Status</td>
                        <td class="text-right">Price for one</td>
                        <td class="text-right">Total</td>
                        <td class="text-right">date payment</td>
                        <td></td>
                    </tr>
            </thead>

            <?php foreach($value as $value): 
                    $img = $value['img'];
                    $name = $value['name'];
                    $qua = $value['count'];
                    //  Статус нужно весить на весь Заказ.
                    $status = $value['status'];
                    $price_for_one = $value['product_price'];
                    $total = $value['total_product'];
                    $date = $value['date'];
                    $order_id = $value['id_orders'];
                ?>
               

                <tbody style="border: none;">
                    <tr>
                        <td class="text-center">
                            <a href="product.html"><img width="85" class="img-thumbnail" title="Aspire Ultrabook Laptop" alt="Aspire Ultrabook Laptop" src="<?php echo $img ?>">
                            </a>
                        </td>
                        <td class="text-left"><a href="product.html"><?php echo $name ?></a>
                        </td>
                        <td class="text-center"><?php echo $qua ?></td>
                        <td class="text-center"><?php echo $status ?></td>
                        <td class="text-center"><?php echo $price_for_one ?></td>
                        <td class="text-center"><?php echo $total ?></td>
                        <td class="text-right"><?php echo $date ?></td>
                        <td class="text-center"><a class="btn btn-info" title="" data-toggle="tooltip" href="order-information.html" data-original-title="View"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach;?>
        </table>
    <?php endforeach;?>
</div>