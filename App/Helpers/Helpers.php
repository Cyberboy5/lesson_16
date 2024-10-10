<?php

use App\Helpers\View;

if(!function_exists('dd')){
    function dd(... $data){
        echo '<pre>';
        print_r($data);
        echo '<pre>';
        exit;
    }
}

if(!function_exists('view')){
    function view($view,$title,$models=[]){
        return View::make($view,$title,$models);
    }
}
?>