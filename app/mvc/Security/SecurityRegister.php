<?php

    class SecurityRegister{
        //здесь можно сделать логику на безопасность
        public static function special_char_html($value){
            $html = htmlspecialchars($value);
            return $html;
        }

        public static function strip_tags_html($value){
            $html = strip_tags($value);
            return $html;
        }

    }