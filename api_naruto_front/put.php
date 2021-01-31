<?php

// Get datas
$dataIdPut = $_POST['dataIdPut'];
$dataFirstNamePut = $_POST['dataFirstNamePut'];
$dataLastNamePut = $_POST['dataLastNamePut'];
$dataIdVillagePut = $_POST['dataIdVillagePut'];
$dataSkillPut = $_POST['dataSkillPut'];

// Define the url et the datas to send
$url = "http://localhost/php/tpApiNaruto/characters/".$dataIdPut;  
$data = array('firstName' => $dataFirstNamePut, 'lastName' => $dataLastNamePut, 'idVillage' => $dataIdVillagePut, 'skill' => $dataSkillPut);

// Use Curl
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

$response = curl_exec($ch);

if (!$response) {
    return false;
}

// Redirection
header('Location:index.php');