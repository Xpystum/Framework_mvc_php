<?php


class Validator{

    #region Reg Email

    // /^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/ - регулярка email

     #endregion

    #region Reg Password
    // /(?=.*[0-9])(?=.*[!@#$%^&.\\\\*\/"])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/ - пароль 
    // (?=.*[0-9]) - строка содержит хотя бы одно число;
    // (?=.*[!@#$%^&*]) - строка содержит хотя бы один спецсимвол;
    // (?=.*[a-z]) - строка содержит хотя бы одну латинскую букву в нижнем регистре;
    // (?=.*[A-Z]) - строка содержит хотя бы одну латинскую букву в верхнем регистре;
    // [0-9a-zA-Z!@#$%^&*]{6,} - строка состоит не менее, чем из 6 вышеупомянутых символов.
    #endregion

    #region Reg Name/Surname
    // ^[а-яА-Я]{30}|[a-zA-Z]{2}$ - регулярка имени
    #endregion

    
    protected function filter_var_validator($value, $regX){
       
        $valid = filter_var($value, FILTER_VALIDATE_REGEXP,
        array("options"=>array("regexp"=>"$regX")));
        if($valid){
            return true;
        }
        else{
            return false; 
        }

    }

    

}