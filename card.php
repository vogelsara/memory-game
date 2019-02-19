<?php
class Card {
    private $image;
    private $shown;

    function __construct($image) {
        $this->image = $image;
        $this->shown = false;
    }

    function getImage() {
        return $this->image;
    }

    function isHidden() {
        return (!$this->shown);
    }

    function turnUp() {
        $this->shown = true;
    }

    function turnDown() {
        $this->shown = false;
    }
}
?>