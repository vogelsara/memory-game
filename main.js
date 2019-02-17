function loadPage() {
    initializeGame();
    showEntireBoard();
}

function initializeGame() {
    fetch("/createCardList.php.php", {method: 'POST'});
}

function showEntireBoard() {

}