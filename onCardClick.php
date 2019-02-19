<?php

session_start();

function onClick($id) {
    $serializedCardList = $_SESSION["cardList"];
    $cardList = unserialize($serializedCardList);

    if ($cardList[$id]->isHidden()) {
        
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["id"];
    onClick($id);
} else {
    http_response_code(400);
}

?>