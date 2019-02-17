function loadPage() {
    initializeGame();
    showEntireBoard();
}

function initializeGame() {
    fetch("/createCardList.php", {method: 'POST'});
}

function showEntireBoard() {

}