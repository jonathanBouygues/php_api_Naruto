<?php

// Gestion of the files
include('config/db_connect.php'); 
include('model/controller/paramRedirection.php');
include('model/entity/characters.php');
include('model/entity/villages.php'); 
require('vendor/autoload.php');


// Instanciation of the object AltoRouter
$router = new AltoRouter();
$router->setBasePath('/tpApiNaruto/');


// Definition character's route
$router->map('GET','characters', function() {
    include('model/controller/getDatas.php');
    $idVillage = (int) ($_GET['idVillage'] ?? 0);
    getCharacters(0,$idVillage);
});
$router->map('GET','characters/[i:id]', function($id) {
    include('model/controller/getDatas.php');
    getCharacters($id);
});
$router->map('DELETE','characters/[i:id]', function($id) {
    require('model/controller/deleteDatas.php');
    $response = deleteDatas($id,'characters');
});
$router->map('POST','characters', function() {
    require('model/controller/addDatas.php');
    $response = addDatas('characters');
});
$router->map('PUT','characters/[i:id]', function($id) {
    require('model/controller/updateDatas.php');
    $response = updateDatas($id,'characters');
});
// Definition village's route
$router->map('GET','villages/[i:id]', function($id) {
    include('model/controller/getDatas.php');
    getVillages($id);
});
$router->map('GET','villages', function() {
    include('model/controller/getDatas.php');
    getVillages();
});
$router->map('DELETE','villages/[i:id]', function($id) {
    require('model/controller/deleteDatas.php');
    $response = deleteDatas($id,'villages');
});
$router->map('POST','villages', function() {
    require('model/controller/addDatas.php');
    $response = addDatas('villages');
});
$router->map('PUT','villages/[i:id]', function($id) {
    require('model/controller/updateDatas.php');
    $response = updateDatas($id,'villages');
});


// Match the route
$match = $router->match();


// Call the function
if ($match) {
    call_user_func_array($match['target'],$match['params']);
} else {
    echo '404';
}




////// OLD VERSION

// Main controller for the redirection
// class MainController {

//     public function routeListing($table,$idVillage = "",$id = 0) {

//         include('model/controller/getDatas.php');
//         if ($table === "villages") {
//             $response = getVillages($id);
//         } else {
//             $response = getCharacters($id,$idVillage);
//         }
//         return $response;
    
//     }

//     public function routeDelete($id,$table) {

//         require('model/controller/deleteDatas.php');
//         $response = deleteDatas($id,$table);
//         return $response;
    
//     }

//     public function routeAdd($table) {

//         require('model/controller/addDatas.php');
//         $response = addDatas($table);
//         return $response;
    
//     }

//     public function routeUpdate($id,$table) {

//         require('model/controller/updateDatas.php');
//         $response = updateDatas($id,$table);
//         return $response;
    
//     }
// }

// // Instanciation of the object
// $action = new MainController();

// switch($request_method) {
//     case "GET" :
//         // Listing datas
//         if (!empty($_GET["id"])) {
//             $id = intval($_GET["id"]);
//             $action->routeListing($table,"",$id);
//         } elseif (!empty($_GET["idVillage"])) {
//             $idVillage = intval($_GET["idVillage"]);
//             $action->routeListing($table,$idVillage);
//         } else {
//             $action->routeListing($table);
//         }
//         break;
//     case "POST" :
//         $action->routeAdd($table);
//         break;
//     case "PUT" :
//         // Modify a caracter
//         $id = intval($_GET["id"]);
//         $action->routeUpdate($id,$table);
//         break;
//     case "DELETE" :
//         // Delete a character
//         $id = intval($_GET["id"]);
//         $action->routeDelete($id,$table);
//         break;
//     default : 
//         header("HTTP/1.0 405 Method not allowed");
//         break;
// }
