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

    $n = count($listOfImgs);
    
    $numbers = range(1, 2*$n);

    shuffle($numbers);

    $cards = array();
    
    for ($i = 0; $i < $n; $i++) {
        $cards[$numbers[$i]] = new Card($listOfImgs[$i]);
        $cards[$numbers[$i+$n]] = new Card($listOfImgs[$i]);
    }
    
    sort($cards);
    
    $_SESSION["cardList"] = serialize($cards);
    $_SESSION["activeCardNumbers"] = serialize(array());
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    createCardList();
    echo json_encode(true);
} else {
    http_response_code(400);
}

?>