<?php
namespace App;

spl_autoload_register(function($className){

    $dirname = __DIR__;
    $file = str_replace('App', $dirname, $className);
    $file = str_replace('\\', '/', $file);

    require_once $file . '.php';

});