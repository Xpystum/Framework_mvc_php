<?php 

    require_once("app/Exception/ValidatorExceptionMyAccount.php");
    require_once("app/mvc/Security/SecurityRegister.php");
    $dataJSON = null;
    if(isset($_GET['valid'])){
        $dataJSON = json_decode($_GET['valid'], true);
        
        $ex = new ValidatorExceptionMyAccount();
        $ex = $ex->get_error();
        // GLOBAL Лучше не использовать =)
        $GLOBALS['errors'] = $ex;
        $GLOBALS['dataJSON'] = $dataJSON['status'];
    }


    // Проверка на правильность ввода поля (валидация)
    function checkdata($get_area, $get_name){
        if(isset($GLOBALS['dataJSON'][$get_area][$get_name]) && $GLOBALS['dataJSON'][$get_area]['status'] == 'true'){
            if($GLOBALS['dataJSON'][$get_area][$get_name] == 'false'){
                    ?> <div class="error_form_valid"> <?php echo $GLOBALS['errors'][$get_name]; ?> </div> <?php
            }
        }
    }


    // вернуть вводимое значение поле пользователем (кроме пароля)
    function viewData($name_info){

        if(isset($GLOBALS['dataINFO'][$name_info]))
        { 
            return SecurityRegister::special_char_html($GLOBALS['dataINFO'][$name_info]); 
        }   
        else{
            return "";
        }
    }


    function renderDataAddress($massDataAddress, $name){
        //$name массива адреса Payment или Shipping
        try{
            if(!empty($massDataAddress)){
                ?><?php 

                $str = str_replace(" ", "", $massDataAddress[$name]);
                echo $str;
                return;
                ?><?php
            }
            echo "";
            
        }
        catch(Exception $e){
            ?> <?php "" ?> <?php
        }
        
    }   


    function renderCount($data, $nameAdress){
        $flag = true;
        foreach($data['country'] as $key => $value){
            ?> <?php 
            if(!empty($data[$nameAdress]['country_id'])){
                if($value['id'] == $data[$nameAdress]['country_id']){
                    echo "<option selected value=".$value['id'].">".$value['country']."</option>" ;
                }else{
                    echo "<option value=".$value['id'].">".$value['country']."</option>";
                }
            }
            else{
                if($flag) { echo "<option value="."> --- Please Select --- </option>"; $flag = false; }
                echo "<option value=".$value['id'].">".$value['country']."</option>";
            }
            
            
            ?> <?php
        }
    }

    function renderRegion($data, $nameAdress){
        $flag = true;
        foreach($data['region'] as $key => $value){
        ?> <?php 
            if(!empty($data[$nameAdress]['region_id'])){

                if($value['id'] == $data[$nameAdress]['region_id']){
                    echo "<option selected value=".$value['id'].">".$value['region']."</option>" ;
                }else{
                    echo "<option value=".$value['id'].">".$value['region']."</option>";
                }

            }
            else{

                if($flag) { echo "<option value="."> --- Please Select --- </option>"; $flag = false; }
                echo "<option value=".$value['id'].">".$value['region']."</option>";
            }
        ?> <?php
        }
    }   

?>


<ul class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
    <li><a href="#">Account</a></li>
    <li><a href="#">My Account</a></li>
</ul>

<div class="row">
    <!--Middle Part Start-->
    <div class="col-sm-9" id="content">
        <h2 class="title">My Account</h2>
        <p class="lead">Привет, <strong><?php renderDataAddress($data['user'], 'name').renderDataAddress($data['user'], 'surname') ?></strong> - To update your account information.</p>
        <form action="?route=auth/updateAccount" method="POST">
            <div class="row">
                <div class="col-sm-6">
                    <fieldset id="personal-details">
                        <legend>Personal Details</legend>
                        <div class="form-group required">
                            <label for="input-firstname" class="control-label">First Name</label>
                            <input type="text" class="form-control" id="input-firstname" placeholder="First Name" value="<?php renderDataAddress($data['user'], 'name'); ?>" name="firstname">
                            <?php checkdata('user','firstname') ?>
                        </div>
                        <div class="form-group required">
                            <label for="input-lastname" class="control-label">Last Name</label>
                            <input type="text" class="form-control" id="input-lastname" placeholder="Last Name" value="<?php renderDataAddress($data['user'], 'surname') ?>" name="lastname">
                            <?php checkdata('user','lastname') ?>
                        </div>
                        <div class="form-group required">
                            <label for="input-email" class="control-label">E-Mail</label>
                            <input type="email" class="form-control" id="input-email" placeholder="E-Mail" value="<?php renderDataAddress($data['user'], 'email') ?>" name="email">
                            <?php checkdata('user','email') ?>
                        </div>
                        <div class="form-group required">
                            <label for="input-telephone" class="control-label">Telephone</label>
                            <input type="tel" class="form-control" id="input-telephone" placeholder="Telephone" value="<?php renderDataAddress($data['user'], 'telephone') ?>" name="telephone">
                            <?php checkdata('user','telephone') ?>
                        </div>
                        <div class="form-group">
                            <label for="input-fax" class="control-label">Fax</label>
                            <input type="text" class="form-control" id="input-fax" placeholder="Fax" value="<?php renderDataAddress($data['user'], 'fax') ?>" name="fax">
                            <?php checkdata('user','fax') ?>
                        </div>
                    </fieldset>
                    <br>
                </div>
                <div class="col-sm-6">
                    <fieldset>
                        <legend>Change Password</legend>
                        <div class="form-group required">
                            <label for="input-password" class="control-label">Old Password</label>
                            <input type="password" class="form-control"  placeholder="Old Password" value="" name="password">
                            <?php checkdata('user','password') ?>
                        </div>
                        <div class="form-group required">
                            <label for="input-password" class="control-label">New Password</label>
                            <input type="password" class="form-control"  placeholder="New Password" value="" name="new_password">
                            <?php checkdata('user','new_password') ?>
                        </div>
                        <div class="form-group required">
                            <label for="input-confirm" class="control-label">New Password Confirm</label>
                            <input type="password" class="form-control" id="input-confirm" placeholder="New Password Confirm" value="" name="confirm_password">
                            <?php checkdata('user','confirm_password') ?>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Newsletter</legend>
                        <div class="form-group">
                            <label class="col-md-2 col-sm-3 col-xs-3 control-label">Subscribe</label>
                            <div class="col-md-10 col-sm-9 col-xs-9">
                                <label class="radio-inline">
                                    <input type="radio" value="1" name="newsletter"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" checked="checked" value="0" name="newsletter"> No
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <fieldset id="address">
                        <legend>Payment Address</legend>
                        <div class="form-group">
                            <label for="input-company" class="control-label">Company</label>

                            <input type="text" class="form-control"  placeholder="Company" value="<?php renderDataAddress($data['address_payment'], 'company') ?>" name="company">
                            <?php checkdata('address_payment','company') ?>
                        </div>
                        <div class="form-group required">
                            <label for="input-address-1" class="control-label">Address 1</label>
                            <input type="text" class="form-control"  placeholder="Address 1" value="<?php renderDataAddress($data['address_payment'], 'address') ?>" name="address_1">
                            <?php checkdata('address_payment','address_1') ?>
                        </div>
                        <div class="form-group required">
                            <label for="input-city" class="control-label">City</label>
                            <input type="text" class="form-control" placeholder="City" value="<?php renderDataAddress($data['address_payment'], 'city') ?>" name="city">
                            <?php checkdata('address_payment','city') ?>
                        </div>
                        <div class="form-group required">
                            <label for="input-postcode" class="control-label">Post Code</label>
                            <input type="text" class="form-control"  placeholder="Post Code" value="<?php renderDataAddress($data['address_payment'], 'post_code') ?>" name="postcode">
                            <?php checkdata('address_payment','postcode') ?>
                        </div>
                        <div class="form-group required">
                            <label for="input-country" class="control-label">Country</label>
                            <select class="form-control" name="country_id">
                                <?php renderCount($data, 'address_payment'); ?>
                                <!-- <option value="1">Aaland Islands</option>
                                <option value="2">Afghanistan</option>
                                <option value="3">Albania</option>
                                <option value="4">Algeria</option>
                                <option value="5">American Samoa</option>
                                <option value="6">Andorra</option>
                                <option value="7">Angola</option>
                                <option value="8">Anguilla</option>
                                <option value="9">Antarctica</option>
                                <option value="10">Antigua and Barbuda</option>
                                <option value="11">Argentina</option>
                                <option value="12">Armenia</option>
                                <option value="13">Aruba</option> -->

                            </select>
                            <?php checkdata('address_payment','country_id') ?>
                        </div>
                        <div class="form-group required">
                            <label for="input-zone" class="control-label">Region / State</label>
                            <select class="form-control" name="zone_id">
                                <?php renderRegion($data, 'address_payment'); ?>
                                <!-- <option value="3513">Aberdeen</option>
                                <option value="3514">Aberdeenshire</option>
                                <option value="3515">Anglesey</option>
                                <option value="3516">Angus</option>
                                <option value="3517">Argyll and Bute</option>
                                <option value="3518">Bedfordshire</option>
                                <option value="3519">Berkshire</option> -->
                            </select>
                        </div>
                    </fieldset>
                </div>
                <div class="col-sm-6">
                    <fieldset id="shipping-address">
                        <legend>Shipping Address</legend>
                        <div class="form-group">
                            <label for="input-company" class="control-label">Company</label>
                            <input type="text" class="form-control" id="input-company" placeholder="Company" value="<?php renderDataAddress($data['address_shipping'], 'company') ?>" name="company_2">
                            <?php checkdata('address_shipping','company_2') ?>
                        </div>
                        <div class="form-group required">
                            <label for="input-address-1" class="control-label">Address 1</label>
                            <input type="text" class="form-control" id="input-address-1" placeholder="Address 1" value="<?php renderDataAddress($data['address_shipping'], 'address') ?>" name="address_2">
                            <?php checkdata('address_shipping','address_2') ?>
                        </div>
                        
                        <div class="form-group required">
                            <label for="input-city" class="control-label">City</label>
                            <input type="text" class="form-control" id="input-city" placeholder="City" value="<?php renderDataAddress($data['address_shipping'], 'city') ?>" name="city_2">
                            <?php checkdata('address_shipping','city_2') ?>
                        </div>
                        <div class="form-group required">
                            <label for="input-postcode" class="control-label">Post Code</label>
                            <input type="text" class="form-control" id="input-postcode" placeholder="Post Code" value="<?php renderDataAddress($data['address_shipping'], 'postcode') ?>" name="postcode_2">
                            <?php checkdata('address_shipping','postcode_2') ?>
                        </div>
                        <div class="form-group required">
                            <label for="input-country" class="control-label">Country</label>
                            <select class="form-control" id="input-country" name="country_id_2">
                                <?php renderCount($data, 'address_shipping'); ?>
                                <!-- <option value="244">Aaland Islands</option>
                                <option value="1">Afghanistan</option>
                                <option value="2">Albania</option>
                                <option value="3">Algeria</option>
                                <option value="4">American Samoa</option>
                                <option value="5">Andorra</option>
                                <option value="6">Angola</option>
                                <option value="7">Anguilla</option>
                                <option value="8">Antarctica</option>
                                <option value="9">Antigua and Barbuda</option>
                                <option value="10">Argentina</option>
                                <option value="11">Armenia</option>
                                <option value="12">Aruba</option> -->
                            
                            </select>
                            <?php checkdata('address_shipping','country_id_2') ?>
                        </div>
                        <div class="form-group required">
                            <label for="input-zone" class="control-label">Region / State</label>
                            <select class="form-control" id="input-zone" name="zone_id_2">
                                <?php renderRegion($data, 'address_shipping'); ?>
                                <!-- <option value="3513">Aberdeen</option>
                                <option value="3514">Aberdeenshire</option>
                                <option value="3515">Anglesey</option>
                                <option value="3516">Angus</option>
                                <option value="3517">Argyll and Bute</option>
                                <option value="3518">Bedfordshire</option>
                                <option value="3519">Berkshire</option> -->
                                
                            </select>
                        </div>
                    </fieldset>
                </div>
            </div>



            <div class="buttons clearfix">
                <div class="pull-right">
                    <input type="submit" class="btn btn-md btn-primary" value="Save Changes">
                </div>
            </div>
        </form>
    </div>
    <!--Middle Part End-->
    <!--Right Part Start -->
    <aside class="col-sm-3 hidden-xs" id="column-right">
        <h2 class="subtitle">Account</h2>
        <div class="list-group">
            <ul class="list-item">
                <li><a href="login.html">Login</a>
                </li>
                <li><a href="register.html">Register</a>
                </li>
                <li><a href="#">Forgotten Password</a>
                </li>
                <li><a href="#">My Account</a>
                </li>
                <li><a href="#">Address Books</a>
                </li>
                <li><a href="wishlist.html">Wish List</a>
                </li>
                <li><a href="#">Order History</a>
                </li>
                <li><a href="#">Downloads</a>
                </li>
                <li><a href="#">Reward Points</a>
                </li>
                <li><a href="#">Returns</a>
                </li>
                <li><a href="#">Transactions</a>
                </li>
                <li><a href="#">Newsletter</a>
                </li>
                <li><a href="#">Recurring payments</a>
                </li>
            </ul>
        </div>
    </aside>
    <!--Right Part End -->
</div>