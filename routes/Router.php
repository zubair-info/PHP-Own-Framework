<?php

class Router {
    private static array $routes = [];

    public static function get(string $page,$controllerMethod) {
        static::$routes[] = [
            'page' => $page,
            'method' => 'GET',
            'logic' => $controllerMethod,
        ];
    }

    public static function post(string $page,$controllerMethod) {
        static::$routes[] = [
            'page' => $page,
            'method' => 'POST',
            'logic' => $controllerMethod,
        ];
    }

    public static function run() {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestMethod = trim($_SERVER['REQUEST_METHOD'],'/');

        foreach (static::$routes as $route) {
            if ($route['page'] === $requestUri && $route['method'] === $requestMethod) {
                $controller=$route['logic'][0]??null;
                $method=$route['logic'][1]??null;
                $newController = new $controller();
                $newController->$method();
                return;
            }
        }
        http_response_code(404);
        echo '404 Not Found';
    }
}








// class Router{

//     private static array $list=[];
//     // private static array $routes=[];
//     public static function get(string $page, $controllerMethod){
//         static::$list[]=[
//             'page'=>$page,
//             'method'=>"GET",
//             'logic'=>$controllerMethod,
//         ];
//     }
//     // public static function get($url, $controllerMethod) {
//     //     self::$routes[$url] = $controllerMethod;
//     // }
//     public static function post(string $page, Closure $closure){
//         static::$list[]=[
//             'page'=>$page,
//             'method'=>"POST",
//             'logic'=>$closure,
//         ];
//     }

//     public static function run(){
//         $page= $_SERVER['REQUEST_URI'];
//         $method=trim($_SERVER['REQUEST_METHOD'],'/');
       
//         foreach(self::$list as $item){
//             if($item['page']==$page && $item['method']==$method){
//                 $request= $_SERVER['REQUEST_URI'];

//                 $request= explode('?',$request)[0];

//                 if(isset($routes[$request])){
//                     $controller=$routes[$request][0]??null;
//                     $method=$routes[$request][1]??null;

//                     if($controller && $method){
//                         $new_controller= new $controller();
//                         $new_controller->$method();
//                     }
//                 }else{
//                     throw new Exception('404 not found');
//                 }
//                 return;
//             }
//         }
//         return die('404 not found');
//     }


// }
