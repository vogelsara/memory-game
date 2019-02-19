<?php

session_start();

function onClick($id) {
    $serializedCardList = $_SESSION["cardList"];
    $cardList = unserialize($serializedCardList);
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION["cardList"])) {
        $id = $_POST["id"];
        onClick($id);
    } else {
        echo json_encode("");
    }
} else {
    http_response_code(400);
}

?>