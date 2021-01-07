<?php

session_start();

require_once '../src/Controller/UserController.php';
require_once '../src/Repository/UserRepository.php';

define('PROJECT_DIR', dirname(__DIR__)); 

$url = '';
 
if(isset($_GET['url'])){
    $url = explode('/',$_GET['url']);
}if($url === ''){
 
    require_once '../templates/home.php';
}elseif($url[0] === 'http://stephaniefortis.fr/home') {
    
    require_once '../templates/' . $url[0] . '.php';
}elseif($url[0] === 'home'){
 
    require_once '../templates/' . $url[0] . '.php';
}elseif($url[0] === 'service'){
 
    require_once '../templates/' . $url[0] . '.php';
}
 
elseif($url[0] === 'blog'){
 
    require_once '../templates/' . $url[0] . '.php';
}
elseif($url[0] === 'enfant'){
 
    require_once '../templates/' . $url[0] . '.php';
}
elseif($url[0] === 'adulte'){
 
    require_once '../templates/' . $url[0] . '.php';
}
elseif($url[0] === 'tests'){
 
    require_once '../templates/' . $url[0] . '.php';
}
 
elseif($url[0] === 'register'){
 
    $Controller = new Santana\Controller\UserController();
        
    $userRepository = new Santana\Repository\UserRepository();
    
    $Controller->register($userRepository);
 
}elseif($url[0] === 'login'){
    $Controller = new Santana\Controller\UserController();

    $userRepository = new Santana\Repository\UserRepository();

    $Controller->login($userRepository);

}elseif($url[0] === 'logout'){
 
   require_once '../templates/' . $url[0] . '.php';
}elseif($url[0] === 'contact'){
 
   require_once '../templates/' . $url[0] . '.php';
}


