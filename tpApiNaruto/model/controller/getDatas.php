<?php

function getCharacters($id = 0,$idVillage = 0,$search = "") {

    // Get the connexion data
    global $conn;

    // Create the SQL query
    if ($idVillage !== 0) {
        // with idVillage
        $query = "SELECT * FROM characters WHERE idVillage = $idVillage";
    } elseif ($id !== 0) {
        // with id of the character
        $query = "SELECT * FROM characters WHERE id = $id";
    } else {
        // global
        $query = "SELECT * FROM characters";
    }

    // Initialisation of a array (encode in Json more later)
    $response = array();

    // Get the query's result and loop on it
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        // Get datas
        $id = $row['id'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $idVillage = 'http://localhost/tpApiNaruto/villages/'.$row['idVillage'];
        $skill = $row['skill'];
        // Instanciation of new object characters
        $actionCharacters = new Character($id,$firstName,$lastName,$idVillage,$skill);
        // Push the data on the response if search or not search
        if ($search === "") {
            $response[] = $actionCharacters; 
        } else {
            $resultSearch = $actionCharacters->searchCharacters($search);
            if ($resultSearch) {
                $response[] = $actionCharacters; 
            }
        }
    }

    // Formate the json response
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($response, JSON_PRETTY_PRINT);
}


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

