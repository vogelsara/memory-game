<?php

session_start();

require("card.php");

function onClick($id) {
    $serializedCardList = $_SESSION["cardList"];
    $cardList = unserialize($serializedCardList);
    $changedCards = array();

    if ($cardList[$id]->isHidden()) {
        $changedCards = addCard($id, $cardList);
    }

    return $changedCards;
}

function addCard($addedCardNumber, &$cardList) {
    $activeCardNumbers = unserialize($_SESSION["activeCardNumbers"]);
    $addedCard = $cardList[$addedCardNumber];
    $changedCards = array();

    $addedCard->turnUp();
    $changedCards[$addedCardNumber] = $addedCard->getImage();

    if (count($activeCardNumbers) == 2) {

        foreach ($activeCardNumbers as $activeCardNumber) {
            $cardList[$activeCardNumber]->turnDown();
            $changedCards[$activeCardNumber] = "";
        }
        $activeCardNumbers = array();
        array_push($activeCardNumbers, $addedCardNumber);

    } elseif (count($activeCardNumbers) == 1) {

        $onlyActiveCardNumber = $activeCardNumbers[0];
        $onlyActiveCard = $cardList[$onlyActiveCardNumber];

        if ($onlyActiveCard->getImage() == $addedCard->getImage()) {
            $activeCardNumbers = array();
        } else {
            array_push($activeCardNumbers, $addedCardNumber);
        }

    } else {

        array_push($activeCardNumbers, $addedCardNumber);

    }
    $_SESSION["activeCardNumbers"] = serialize($activeCardNumbers);
    return $changedCards;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["id"];
    $changedCards = onClick($id);
    echo json_encode($changedCards);
} else {
    http_response_code(400);
}

?>