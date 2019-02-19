<?php
class Card {
    private $image;
    private $shown;

    function __construct($image) {
        $this->image = $image;
        $this->shown = false;
    }

    function isHidden() {
        return (!$this->shown);
    }
}
?>