<?php

function deleteDatas($id,$table) {

    global $conn;
    $query = "DELETE FROM $table WHERE `id` = '$id'";

    if (mysqli_query($conn, $query)) {
        $response = array(
            'status' => 1,
            'status_message' => 'Element supprimé avec succès.'
        );
    } else {
        $response = array(
            'status' => 0,
            'status_message' => 'Echec de la suppression de l\élement.'
        );
    }

    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($response, JSON_PRETTY_PRINT);
}