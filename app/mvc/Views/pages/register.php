<?php 
    require_once("app/Exception/ValidatorExceptionRegister.php");
    require_once("app/mvc/Security/SecurityRegister.php");
    $dataJSON = null;
    if(isset($_GET['valid'])){
        $dataJSON = json_decode($_GET['valid'], true);
        $ex = new ValidatorExceptionRegister();
        $ex = $ex->get_error();
        // GLOBAL Лучше не использовать =)
        $GLOBALS['errors'] = $ex;
        $GLOBALS['dataJSON'] = $dataJSON['status'];
        $GLOBALS['dataINFO'] = $dataJSON['info'];
    }

    // Проверка на правильность ввода поля (валидация)
    function checkdata($get_name){
            if(isset($GLOBALS['dataJSON'][$get_name])){
                if($GLOBALS['dataJSON'][$get_name] == 'false'){
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
?>

<div class="row">
    <div id="content" class="col-sm-12">
        <h2 class="title">Register Account</h2>
        <p>If you already have an account with us, please login at the <a href="#">login page</a>.</p>
        <form action="?route=auth/register" method="POST" class="form-horizontal account-register clearfix">
            <fieldset id="account">
                <legend>Your Personal Details</legend>
                <div class="form-group required" style="display: none;">
                    <label class="col-sm-2 control-label">Customer Group</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="customer_group_id" value="1" checked="checked">Default
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                    <div class="col-sm-10">
                        <input placeholder="First Name" type="text" name="firstname" value="<?php echo viewData('firstname'); ?>"  id="input-firstname" class="form-control">
                        
                        <?php checkdata('firstname'); ?>

                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="lastname" value="<?php echo viewData('lastname');?>" placeholder="Last Name" id="input-lastname" class="form-control">

                        <?php checkdata('lastname') ?>

                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="<?php echo viewData('email');?>" placeholder="E-Mail" id="input-email" class="form-control">
                        
                        <?php checkdata('email') ?>

                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
                    <div class="col-sm-10">
                        <input type="tel" name="telephone" value="<?php echo viewData('telephone');?>" placeholder="Telephone" id="input-telephone" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-fax">Fax</label>
                    <div class="col-sm-10">
                        <input type="text" name="fax" value="<?php echo viewData('fax');?>" placeholder="Fax" id="input-fax" class="form-control">
                    </div>
                </div>
            </fieldset>
            <fieldset id="address">
                <legend>Your Address</legend>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-company">Company</label>
                    <div class="col-sm-10">
                        <input type="text" name="company" value="<?php echo viewData('company');?>" placeholder="Company" id="input-company" class="form-control">
                        <?php checkdata('company'); ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-address-1">Address 1</label>
                    <div class="col-sm-10">
                        <input type="text" name="address_1" value="<?php echo viewData('address_1');?>" placeholder="Address 1" id="input-address-1" class="form-control">
                        <?php checkdata('address_1'); ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-city">City</label>
                    <div class="col-sm-10">
                        <input type="text" name="city" value="<?php echo viewData('city');?>" placeholder="City" id="input-city" class="form-control">
                        <?php checkdata('city'); ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-postcode">Post Code</label>
                    <div class="col-sm-10">
                        <input type="text" name="postcode" value="<?php echo viewData('postcode');?>" placeholder="Post Code" id="input-postcode" class="form-control">
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-country">Country</label>
                    <div class="col-sm-10">
                        <select name="country_id" id="input-country" class="form-control">
                            <option value=""> --- Please Select --- </option>
                            <option value="1">Aaland Islands</option>
                            <option value="2">Afghanistan</option>
                            <option value="3"   >Albania</option>
                            <option value="4">Algeria</option>
                            <option value="5">American Samoa</option>
                            <option value="6">Andorra</option>
                            <option value="7">Angola</option>
                        </select>

                        <?php checkdata('country_id'); ?>

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
                            
                        </select>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Your Password</legend>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-password">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">

                        
                        <?php checkdata('password') ?>

                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
                    <div class="col-sm-10">
                        <input type="password" name="confirm" value="" placeholder="Password Confirm" id="input-confirm" class="form-control">
                        
                        <?php checkdata('confirm') ?>

                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Newsletter</legend>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Subscribe</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" name="newsletter" value="1"> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="newsletter" value="0" checked="checked"> No
                        </label>
                    </div>
                </div>
            </fieldset>
            <div class="buttons">
                <div class="pull-right">I have read and agree to the <a href="#" class="agree"><b>Pricing Tables</b></a>
                    <input class="box-checkbox" type="checkbox" name="agree" value="1"> &nbsp;
                    <?php checkdata('agree') ?>
                    <input type="submit" value="Continue" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>
