<?php

function addDatas($table) {

    global $conn;

    if ($table === 'characters') {
        $firstName = htmlspecialchars(strip_tags($_POST["firstName"]));
        $lastName = htmlspecialchars(strip_tags($_POST["lastName"]));
        $idVillage = htmlspecialchars(strip_tags($_POST["idVillage"]));
        $skill = htmlspecialchars(strip_tags($_POST["skill"]));
    
        $query = "INSERT INTO $table(`firstName`, `lastName`, `idVillage`, `skill`) VALUES ('$firstName', '$lastName', '$idVillage', '$skill')";
    } else {
        $name = htmlspecialchars(strip_tags($_POST["name"]));
        $elementCountry = htmlspecialchars(strip_tags($_POST["elementCountry"]));
    
        $query = "INSERT INTO $table(`name`, `elementCountry`) VALUES ('$name', '$elementCountry')";
    }

    if (mysqli_query($conn, $query)) {
        $response = array(
            'status' => 1,
            'status_message' => 'Element ajouté avec succès.'
        );
    } else {
        $response = array(
            'status' => 0,
            'status_message' => 'Echec de l\'ajout de l\'élément.'
        );
    }

    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($response, JSON_PRETTY_PRINT);
}
