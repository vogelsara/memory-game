<?php

session_start();

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

class Card {
    private $image;
    private $shown;

    function __construct($image) {
        $this->image = $image;
        $this->shown = false;
    }
}

$imgDirectory = "img";
$listOfImgs = nothidden($imgDirectory);

$cards = array();

foreach ($listOfImgs as $img) {
    array_push($cards, new Card($img));
    array_push($cards, new Card($img));
}

shuffle($cards);

?>