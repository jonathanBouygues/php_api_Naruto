<?php

function getVillages($id = 0) {

    global $conn;
    if ($id !== 0) {
        $query = "SELECT villages.id  AS idBeta, villages.name, villages.elementCountry, characters.id FROM villages LEFT JOIN characters ON villages.id = characters.idVillage WHERE villages.id = $id";
    } else {
        $query = "SELECT villages.id  AS idBeta, villages.name, villages.elementCountry, characters.id FROM villages LEFT JOIN characters ON villages.id = characters.idVillage"; 
    }

    $response = array();
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        // Act the village object
        if ((isset($ref)) && ($ref !== $row['idBeta'])) {
            $actionVillage = new Village($id,$name,$elementCountry,$listNinja);
            unset($listNinja);
            $response[] = $actionVillage; 
        }
        // Get datas
        $id = $row['idBeta'];
        $name = $row['name'];
        $elementCountry = $row['elementCountry'];
        $listNinja[] = 'http://localhost/tpApiNaruto/characters/'.$row['id'];
        // Control variable
        $ref = $row['idBeta'];
    }

    if (!empty($listNinja)) {
        $actionVillage = new Village($id,$name,$elementCountry,$listNinja);
        $response[] = $actionVillage; 
    }

    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function getCharacters($id = 0,$idVillage = 0) {

    global $conn;
    if ($idVillage !== 0) {
        $query = "SELECT * FROM characters WHERE idVillage = $idVillage";
    } elseif ($id !== 0) {
        $query = "SELECT * FROM characters WHERE id = $id";
    } else {
        $query = "SELECT * FROM characters";
    }

    $response = array();
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        // Get datas
        $id = $row['id'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $idVillage = 'http://localhost/tpApiNaruto/villages/'.$row['idVillage'];
        $skill = $row['skill'];

        $actionCharacters = new Character($id,$firstName,$lastName,$idVillage,$skill);
        $response[] = $actionCharacters; 

    }

    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($response, JSON_PRETTY_PRINT);
}