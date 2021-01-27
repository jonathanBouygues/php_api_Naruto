<?php

// Gestion of the files
include('config/db_connect.php'); 
include('model/entity/characters.php');
include('model/entity/villages.php'); 
require('vendor/autoload.php');


// Instanciation of the object AltoRouter
$router = new AltoRouter();
$router->setBasePath('/tpApiNaruto');


// Route's definition 
// Definition default route
$router->map('GET','/', function() {
    include('model/controller/getDatas.php');
    getCharacters();
});
// Character's route
$router->map('GET|POST','/characters', function() {
    if ($_SERVER["REQUEST_METHOD"] === 'GET') {
        include('model/controller/getDatas.php');
        $idVillage = (int) ($_GET['idVillage'] ?? 0);
        $search = (string) strtolower((($_GET['search']) ?? ""));
        getCharacters(0,$idVillage,$search);
    } else {
        require('model/controller/addDatas.php');
        addDatas('characters');
    };
});
$router->map('GET|DELETE|PUT','/characters/[i:id]', function($id) {
    if ($_SERVER["REQUEST_METHOD"] === 'GET') {
        include('model/controller/getDatas.php');
        getCharacters($id);
    } else if ($_SERVER["REQUEST_METHOD"] === 'PUT') {
        require('model/controller/updateDatas.php');
        updateDatas($id,'characters');
    }else {
        require('model/controller/deleteDatas.php');
        deleteDatas($id,'characters');
    };
});
// Village's route
$router->map('GET|POST','/villages', function() {
    if ($_SERVER["REQUEST_METHOD"] === 'GET') {
        include('model/controller/getDatas.php');
        getVillages();
    } else {
        require('model/controller/addDatas.php');
        addDatas('villages');
    };
});
$router->map('GET|DELETE|PUT','/villages/[i:id]', function($id) {
    if ($_SERVER["REQUEST_METHOD"] === 'GET') {
        include('model/controller/getDatas.php');
        getVillages($id);
    } else if ($_SERVER["REQUEST_METHOD"] === 'PUT') {
        require('model/controller/updateDatas.php');
        updateDatas($id,'villages');
    }else {
        require('model/controller/deleteDatas.php');
        deleteDatas($id,'villages');
    };
});


// Match the route
$match = $router->match();


// Call the function
if ($match) {
    call_user_func_array($match['target'],$match['params']);
} else {
    echo '404';
}
