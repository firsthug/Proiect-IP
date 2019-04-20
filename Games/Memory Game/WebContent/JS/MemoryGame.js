// cards array holds all cards
var card = document.getElementsByClassName("card");
var cards = [...card];
console.log(cards);

// deck of all cards in game
var deck = document.getElementById("card-deck");

// declaring start variable
var start = 0;


// declaring variable of matchedCards
var matchedCard = document.getElementsByClassName("match");



 // declare modal
 var modal = document.getElementById("popup1");

 // array for opened cards
var openedCards = [];

//score
 var score=300;
 
//number of stars
 var stars=0;

// @description shuffles cards
// @param {array}
// @returns shuffledarray
function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;

    while (currentIndex !== 0) {
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}


// @description shuffles cards when page is refreshed / loads
document.body.onload = startGame();


// @description function to start a new play 
function startGame(){
    // shuffle deck
    cards = shuffle(cards);
    // remove all exisiting classes from each card
    for (var i = 0; i < cards.length; i++){
        deck.innerHTML = "";
        [].forEach.call(cards, function(item) {
            deck.appendChild(item);
        });
        cards[i].classList.remove("show", "open", "match", "disabled");
    }
    // reset start
    start = 0;
    // reset rating
    //reset timer
    second = 40;
    minute = 1;
    var timer = document.querySelector(".timer");
    timer.innerHTML = "1 mins 40 secs";

    var pairs = document.querySelector(".pairs");
    pairs.innerHTML = "0 pairs";
    clearInterval(interval);
}


// @description toggles open and show class to display cards
var displayCard = function (){
    this.classList.toggle("open");
    this.classList.toggle("show");
    this.classList.toggle("disabled");
};


// @description add opened cards to OpenedCards list and check if cards are match or not
function cardOpen() {
    openedCards.push(this);
    var len = openedCards.length;
    if(len === 2){
        startCounter();
        if(openedCards[0].className === openedCards[1].className){
            matched();
        } else {
            unmatched();
        }
    }
}


// @description when cards match
function matched(){
	score+=20;
    openedCards[0].classList.add("match", "disabled");
    openedCards[1].classList.add("match", "disabled");
    openedCards[0].classList.remove("show", "open", "no-event");
    openedCards[1].classList.remove("show", "open", "no-event");
    openedCards = [];
	var pairs = document.querySelector(".pairs");
    pairs.innerHTML = matchedCard.length/2 +" pairs";
}


// description when cards don't match
function unmatched(){
    openedCards[0].classList.add("unmatched");
    openedCards[1].classList.add("unmatched");
    disable();
    setTimeout(function(){
        openedCards[0].classList.remove("show", "open", "no-event","unmatched");
        openedCards[1].classList.remove("show", "open", "no-event","unmatched");
        enable();
        openedCards = [];
    },1100);
}


// @description disable cards temporarily
function disable(){
    Array.prototype.filter.call(cards, function(card){
        card.classList.add('disabled');
    });
}


// @description enable cards and disable matched cards
function enable(){
    Array.prototype.filter.call(cards, function(card){
        card.classList.remove('disabled');
        for(var i = 0; i < matchedCard.length; i++){
            matchedCard[i].classList.add("disabled");
        }
    });
}


// vedem daca am inceput
function startCounter(){
    //start timer on first click
    if(start === 0){
        second = 40;
        minute = 1;
        startTimer();
        start++;
    }
   
}

//@description end of the game
function endgame(){
    if (matchedCard.length == 16 || (minute===0 && second===0) ){
        clearInterval(interval);
        var finalTime = timer.innerHTML;

        // show congratulations modal
        modal.classList.add("show");


        //showing pairs, score , time on modal
        document.getElementById("pairs").innerHTML = matchedCard.length/2;
        document.getElementById("score").innerHTML = score;					//final score, updates step by step, can be modified easily
        document.getElementById("timeLeft").innerHTML = finalTime;
        stars=score*1.5;  //final number of stars
        createCookie("coinsF", stars, "2");
        createCookie("scoreF", score, "2");
            setTimeout(function(){
            location.reload();
            },5000);	
        deleteCookie("coinsF");
        deleteCookie("scoreF");
        
    }
}

// @description game timer
var second = 40, minute = 1;
var timer = document.querySelector(".timer");
var interval;
function startTimer(){
    interval = setInterval(function(){
        second--;
        score-=10;
        timer.innerHTML = minute+" mins "+second+" secs";
        if(second === 0){ 
            if(minute === 0){
            	endgame();
            }
            else{
            	minute--;
            	second=60;
        	}
        }
    },1000);
}

// loop to add event listeners to each card
for (var i = 0; i < cards.length; i++){
    card = cards[i];
    card.addEventListener("click", displayCard);
    card.addEventListener("click", cardOpen);
    card.addEventListener("click",endgame);
}

function createCookie(name, value, days) {
  var expires;
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toGMTString();
  } else {
   expires = "";
  }
  document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
  
}

function deleteCookie(name)
{
 document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}