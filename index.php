<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Memory game</title>
</head>
<body>

<h1>Memory game</h1>
<div class="calendarContainer">

<?php

require('cards.php');

foreach ($cards as $card) {
    $card->echoHtml();
}

?>

</div>

</body>
</html>