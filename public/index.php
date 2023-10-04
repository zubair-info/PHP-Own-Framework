<?php

require_once __DIR__."/../vendor/autoload.php";

$routes=require_once __DIR__."/../routes/web.php";
$router=require_once __DIR__."/../routes/Router.php";


Router::run();




// $request= $_SERVER['REQUEST_URI'];

// $request= explode('?',$request)[0];
// print_r($routes);

// if(isset($routes[$request])){
    // $controller=$routes[$request][0]??null;
    // $method=$routes[$request][1]??null;

//     if($controller && $method){
//         $new_controller= new $controller();
//         $new_controller->$method();
//     }
// }else{
//     throw new Exception('404 not found');
// }

// print_r($request);
?>