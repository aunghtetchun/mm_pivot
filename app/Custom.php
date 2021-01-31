<?php


namespace App;


class Custom
{
    public static $info =  [

        "name" => "Sample",
        "short_name" => "Sample",
        "type" => "POS",
        "phone" => "",
        "address" =>"",
        "meta-img" => "f/img/meta.jpg",
        "mms-logo" => "dashboard/images/mms-logo.jpg",
        "c-logo" => "dashboard/images/logo.jpg",
        "main_css" => "dashboard/css/bootstrap.min.css",
    ];
    public static function toShort($text,$max=10){
        $text = strip_tags($text);
        $text=preg_replace("/\r|\n/", "", $text);
        $text=stripslashes($text);

        if(strlen($text) >= $max){
            return mb_substr($text,0,$max,'UTF-8')."...";
        }else{
            return strip_tags($text);
        }
    }
    public static function create_slug($string){
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        $slug=trim($slug,'-');
        return $slug;
    }
}
