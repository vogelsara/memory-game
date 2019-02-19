function loadPage() {
    initializeGame();
    showEntireBoard();
}

function initializeGame() {
    fetch("/createCardList.php", {method: 'POST'});
}

function showEntireBoard() {

    fetch("/getNumberOfCards.php", {
        method: 'POST'
    }).then((response) => response.json())
    .then((numberOfCards) => {
        if (numberOfCards) {

            var container = document.getElementsByClassName("cardContainer")[0]

            for(var i = 1; i <= numberOfCards; i++) {
                
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

    var formData = new FormData();

    formData.append('id', 24);

    fetch("/onCardClick.php", {
        method: 'POST',
        credentials: 'include',
        body: formData
    });
}