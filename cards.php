<?php

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

    function __construct($image) {
        $this->image = $image;
    }

    function echoHtml() {
        echo "<div></div>";
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