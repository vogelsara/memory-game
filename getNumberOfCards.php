<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION["cardList"])) {
        $serializedCardList = $_SESSION["cardList"];
        $cardList = unserialize($serializedCardList);
        echo json_encode(count($cardList));
    } else {
        echo json_encode("");
    }
} else {
    http_response_code(400);
}

?>