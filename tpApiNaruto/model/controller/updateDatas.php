<?php

function updateDatas($id,$table) {

    global $conn;
    $_PUT = array(); //tableau qui va contenir les données reçues
    parse_str(file_get_contents('php://input'), $_PUT);

    if ($table === "characters") {

        $firstName = htmlspecialchars(strip_tags($_PUT["firstName"]));
        $lastName = htmlspecialchars(strip_tags($_PUT["lastName"]));
        $idVillage = htmlspecialchars(strip_tags($_PUT["idVillage"]));
        $skill = htmlspecialchars(strip_tags($_PUT["skill"]));
        
        $query="UPDATE $table SET firstName='".$firstName."', lastName='".$lastName."', idVillage='".$idVillage."', skill='".$skill."' WHERE id=".$id;
    } else {
        $name = htmlspecialchars(strip_tags($_PUT["name"]));
        $elementCountry = htmlspecialchars(strip_tags($_PUT["elementCountry"]));
        
        $query="UPDATE $table SET name='".$name."', elementCountry='".$elementCountry."' WHERE id=".$id;
    }

    if (mysqli_query($conn, $query)) {
        $response = array(
            'status' => 1,
            'status_message' => 'Elément mis à jour avec succès.'
        );
    } else {
        $response = array(
            'status' => 0,
            'status_message' => 'Echec de la mise à jour de l\'élément.'
        );
    }

    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($response, JSON_PRETTY_PRINT);
}
