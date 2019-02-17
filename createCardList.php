<?php

session_start();

require('card.php');

function nothidden($path) {
    $files = scandir($path);
    $nothidden = array();
    foreach ($files as $file) {
        if ($file[0] != ".") {
            array_push($nothidden, $file);
        }
    }
    return $nothidden;
}

function createCardList() {

    $imgDirectory = "img";
    $listOfImgs = nothidden($imgDirectory);
    
    $cards = array();
    
    foreach ($listOfImgs as $img) {
        array_push($cards, new Card($img));
        array_push($cards, new Card($img));
    }
    
    shuffle($cards);
    
    $_SESSION["cardList"] = serialize($cards);
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    createCardList();
} else {
    http_response_code(400);
}

?>