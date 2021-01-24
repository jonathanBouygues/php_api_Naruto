<?php

try {
    $file = file_get_contents('http://localhost/php/tpApiNaruto/characters?idVillage=1/');
} catch(Exception $erreur) {
    exit('Problème de connexion à la DB.');
}

$data = json_decode($file);
$visualdatas = "";

foreach ($data as $datas) {

    $visualdatas .= '<div class="character">';
    $visualdatas .= '<div><span>Id :</span><span>'.$datas->id.'</span></div>';
    $visualdatas .= '<div><span>FirstName :</span><span>'.$datas->firstName.'</span></div>';
    $visualdatas .= '<div><span>LastName :</span><span>'.$datas->lastName.'</span></div>';
    $visualdatas .= '<div><span>IdVillage :</span><span>'.$datas->idVillage.'</span></div>';
    $visualdatas .= '<div><span>Skill :</span><span>'.$datas->skill.'</span></div>';
    $visualdatas .= '<div><button class="buttonUpdate" data-num="'.$datas->id.'">UPDATE</button></div>';
    $visualdatas .= '<div><button class="buttonDel" data-num="'.$datas->id.'">DELETE</button></div>';
    $visualdatas .= '</div>';
}

echo $visualdatas;

?>