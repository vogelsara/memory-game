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
                cardDiv.id = "n" + i;
                cardDiv.setAttribute('onclick', 'onCardClick(this)')
                
                cardDiv.style.backgroundColor = '#bccce5';
        
                cardDiv.className = "memoryCardBack"
                container.appendChild(cardDiv)
            }
        }
    });

}

function onCardClick(card) {

    var formData = new FormData();

    var idNumber = card.id.substr(1);

    formData.append('id', idNumber);

    fetch("/onCardClick.php", {
        method: 'POST',
        credentials: 'include',
        body: formData
    }).then((response) => response.json())
    .then((changedCards) => {
        if (changedCards) {
            var changedCardIds = Object.keys(changedCards)
            for(var i = 0; i < changedCardIds.length; i++) {
                var changedCard = document.getElementById("n" + changedCardIds[i])
                if (changedCards[changedCardIds[i]] == "") {

                    changedCard.style.backgroundColor = '#bccce5';
                    changedCard.style.backgroundImage = "none";

                } else {

                    changedCard.style.transition = "all 2s ease"
                    changedCard.style.backgroundImage = "url('./img/" + changedCards[changedCardIds[i]] + "')";
                    changedCard.style.backgroundSize = "cover"

                }
            }
        }
    });
}