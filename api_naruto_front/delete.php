<?php

//Get datas
$dataId = $_POST['dataId'];

// Define the url
$url = "http://localhost/php/tpApiNaruto/characters/".$dataId; 

// Use Curl
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);
curl_close($ch);

// Redirection
header('Location:index.php');