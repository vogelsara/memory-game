<?php

class ActiveCards {
    private $activeCards;

    function __construct($image) {
        $this->activeCards = array();
    }

    function addCard($addedCard) {
        $addedCard->turnUp();

        if (count($this->activeCards) == 2) {
            foreach ($this->activeCards as $activeCard) {
                $activeCard->turnDown();
            }
            $this->activeCards = array();
            array_push($this->activeCards, $addedCard);
        } elseif ((count($this->activeCards) == 1) and
                  ($this->activeCards[0]->getImage() == $addedCard->getImage())) {
            $this->activeCards = array();
        } else {
            array_push($this->activeCards, $addedCard);
        }
    }
}

?>