<?php
// namespace App\Controllers;
require_once "Router.php";
use App\Controllers\Controller;
return [

    '/user/profile'=>[ProfileController::class,"index"],
    '/users/add'=>["ProfileController","add"],
    
];

// Router::get('/user/profile',function(){

//     var_dump($_GET);

// });

Router::get('/user/profile',[App\Controllers\ProfileController::class,"index"]);
Router::get('/user/profiles',[App\Controllers\ProfileController::class,"indexs"]);