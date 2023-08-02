
    <h2 class="title">Shopping Cart</h2>
    <div class="table-responsive form-group">
        <table class="table table-bordered">
        <thead>
            <tr>
            <td class="text-center">Image</td>
            <td class="text-left">Product Name</td>
            <td class="text-left">Model</td>
            <td class="text-left">Quantity</td>
            <td class="text-right">Unit Price</td>
            <td class="text-right">Total</td>
            </tr>
        </thead>
        <tbody>

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
        </tbody>
        </table>
    </div>
    <h3 class="subtitle no-margin">What would you like to do next?</h3>
    <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="#collapse-coupon" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" aria-expanded="true">Use Coupon Code 
                        
                        <i class="fa fa-caret-down"></i>
                    </a>
                </h4>
            </div>
            <div id="collapse-coupon" class="panel-collapse collapse in" aria-expanded="true">
                <div class="panel-body">
                    <label class="col-sm-2 control-label" for="input-coupon">Enter your coupon here</label>
                    <div class="input-group">
                        <input type="text" name="coupon" value="" placeholder="Enter your coupon here" id="input-coupon" class="form-control">
                        <span class="input-group-btn"><input type="button" value="Apply Coupon" id="button-coupon" data-loading-text="Loading..." class="btn btn-primary"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="#collapse-shipping" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">Estimate Shipping &amp; Taxes 
                        
                        <i class="fa fa-caret-down"></i>
                    </a>
                </h4>
            </div>
            <div id="collapse-shipping" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="panel-body">
                    <p>Enter your destination to get a shipping estimate.</p>
                    <div class="form-horizontal">
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-country">Country</label>
                            <div class="col-sm-10">
                                <select name="country_id" id="input-country" class="form-control">
                                    <option value=""> --- Please Select --- </option>
                                    <option value="244">Aaland Islands</option>
                                    <option value="1">Afghanistan</option>
                                    <option value="2">Albania</option>
                                    <option value="3">Algeria</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-zone">Region / State</label>
                            <div class="col-sm-10">
                                <select name="zone_id" id="input-zone" class="form-control">
                                    <option value=""> --- Please Select --- </option>
                                    <option value="3513">Aberdeen</option>
                                    <option value="3514">Aberdeenshire</option>
                                    <option value="3515">Anglesey</option>
                                    <option value="3516">Angus</option>
                                    <option value="3517">Argyll and Bute</option>
                                    <option value="3518">Bedfordshire</option>
                                    <option value="3519">Berkshire</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-postcode">Post Code</label>
                            <div class="col-sm-10"><input type="text" name="postcode" value="" placeholder="Post Code" id="input-postcode" class="form-control"></div>
                        </div>
                            <button type="button" id="button-quote" data-loading-text="Loading..." class="btn btn-primary">Get Quotes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="#collapse-voucher" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle collapsed" aria-expanded="false">Use Gift Certificate 
                        
                        <i class="fa fa-caret-down"></i>
                    </a>
                </h4>
            </div>
            <div id="collapse-voucher" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="panel-body">
                    <label class="col-sm-2 control-label" for="input-voucher">Enter your gift certificate code here</label>
                    <div class="input-group">
                        <input type="text" name="voucher" value="" placeholder="Enter your gift certificate code here" id="input-voucher" class="form-control">
                        <span class="input-group-btn"><input type="submit" value="Apply Gift Certificate" id="button-voucher" data-loading-text="Loading..." class="btn btn-primary"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
    <div class="row">
        <div class="col-sm-4 col-sm-offset-8">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td class="text-right">
                            <strong>Sub-Total:</strong>
                        </td>
                        <td class="text-right">$168.71</td>
                    </tr>
                    <tr>
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
                            <strong>VAT (20%):</strong>
                        </td>
                        <td class="text-right">$34.68</td>
                    </tr>
                    <tr>
                        <td class="text-right">
                            <strong>Total:</strong>
                        </td>
                        <td class="text-right">$213.70</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="buttons">
            <div class="pull-left"><a href="index.html" class="btn btn-primary">Continue Shopping</a></div>
            <div class="pull-right"><a href="checkout.html" class="btn btn-primary">Checkout</a></div>
            </div>