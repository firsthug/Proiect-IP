
requirejs(['gameboardrenderer', 'treesearch', 'Board', 'action'],
function   (GmaeBoardRenderer, TreeSearch, Board, Action) {
	
	let player = 1;
	let board  = new Board();
	let ts     = new TreeSearch();
	let canvas = document.getElementById('board');
	let gbr    = new GmaeBoardRenderer(canvas, 500);
	
	//Render initial state (grid)
	gbr.render(board.boardState); 
	
	//Player clicked on one of cells
	canvas.addEventListener("cellClicked", function(e){
		
		//If its AI turn or the game is over
		if(player === 2 || (board.status !== board.IN_PROGRESS)) {
			return;
		}
		
		let action = new Action(player, e.detail.cell);

		//If cell is full
		if(board.applyAction(action) !== 0) {
			return;
		}
		
		gbr.render(board.boardState);
		
		if(board.status !== board.IN_PROGRESS) {
			setTimeout(printStatus, 0);
			return;
		}
		
		//AI player turn
		player = 3 - player;
		setTimeout(botTurn, 250);
		
	}, false);
	
	function botTurn() {
		
		action = ts.findNextAction(board, player, 200);
		board.applyAction(action);
		gbr.render(board.boardState);
		player = 3 - player;
		setTimeout(printStatus, 0);
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
	function printStatus() {
		
		if(board.status === board.IN_PROGRESS)
			return;
		
		switch(board.status) {
			case board.DRAW:
				alert('Game Result: Draw!');
				  createCookie("coinsT",100, "2");
            createCookie("scoreT", 50, "2");
				 setTimeout(function(){
           window.location = './TicTacToe.php'; 
            },500);  
             deleteCookie("coinsT");
        deleteCookie("scoreT"); 
				break;
			default:
				alert('Player ' + board.status + ' wins!');
				  createCookie("coinsT",200, "2");
            createCookie("scoreT", 100, "2");
				 setTimeout(function(){
           window.location = './TicTacToe.php'; 
            },500);
             deleteCookie("coinsT");
        deleteCookie("scoreT");   
		}

	}
});