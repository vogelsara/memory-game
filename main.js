function loadPage() {
    initializeGame();
    showEntireBoard();
}

function initializeGame() {
    fetch("/createCardList.php", {method: 'POST'});
}

function showEntireBoard() {

    fetch("/getCardList.php", {
        method: 'POST'
    }).then((response) => response.json())
    .then((cardListJson) => {
        if (cardListJson) {
            var container = document.getElementsByClassName("cardContainer")[0]

            var n = cardListJson.length;

            for(var i = 1; i <= n; i++) {
                
                var cardDiv = document.createElement("div")
                cardDiv.setAttribute('index', i)
                cardDiv.setAttribute('onclick', 'onCardClick(this)')
        
                cardDiv.className = "memoryCardBack"
                container.appendChild(cardDiv)
            }
        }
    });

}

function onCardClick(card) {
    
}