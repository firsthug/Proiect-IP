<?php
require_once '../Classes/User.php';
require_once '../Classes/UserTable.php';
require_once '../Classes/Connection.php';
require_once '../Classes/Functions.php';

start_session();

if (isset($_GET['logout'])) {
	
	if (isset($_SERVER['HTTP_COOKIE'])) {
		$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
		foreach($cookies as $cookie) {
			$parts = explode('=', $cookie);
			$name = trim($parts[0]);
			setcookie($name, '', time()-1000);
			setcookie($name, '', time()-1000, '/');
		}
	}
	session_destroy();
	unset($_SESSION['username']);
	header("location:../First_page.html");
}

if (isset($_POST['play'])) {
	$type = $_POST['selgame'];

		if ($type === 'Tic')
			{	?>
				<script type="text/javascript">
				window.open("TicTacToe/TicTacToe.php","_self");
				</script>
				<?php
			}
			
		else{
			?>
				<script type="text/javascript">
				window.open("Connect Four/ConnectFour.php","_self");
				</script>
				<?php
	}

	}

?>

<!DOCTYPE html>
<html>
	<head>
	  
	  <title>Select the game</title>
	  <link rel="stylesheet" type="text/css" href="../CSS/SelectGame.css">
	  <link rel="stylesheet" type="text/css" href="../CSS/UserBar.css"/>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="../Memory Game/WebContent/colorbox.css" />
	  <script src="../Memory Game/jquery.colorbox.js"></script>
	  <script>
		$(document).ready(function(){

			$(".iframe3").click(function () { 

				$.colorbox({iframe:true, width:"60%", height:"60%", href:"../Ranking/rank.php"});

			});

			return false;
		});

	</script>

	</head>



	<body>

		<div id="outerWrapper">
			<div id="topbarouter">
		<div id="topbar">
			<img src="https://i.imgur.com/ockgUee.png">
		</div>


		<div id="usercontainer" class="iframe3"  onmouseover="document.getElementById('username').style.fontSize='21px'; " onmouseout="document.getElementById('username').style.fontSize='20px';"  >


			<p id="username">
				<?php
				$connection = Connection::getInstance();
    			$userTable = new UserTable($connection);
				$username= $_SESSION['username'];
				 $user = $userTable->getUserByUsername($username);
					$ign=$user->getIGN();
					echo $ign;
					?>
			</p>

		</div>

		<div id="cointainer">

			<p id="score">
				<?php
				$connection = Connection::getInstance();
    			$userTable = new UserTable($connection);
				$username= $_SESSION['username'];
				 $user = $userTable->getUserByUsername($username);
					$coins=$user->getCoins();
					echo $coins;
					?>
				</p>

				<img id="coin" src="https://i.imgur.com/gtMp2Q7.png">
			</div>

			<div id="logout">

				<p class="btn"> <a href="SelectGame.php?logout='1'" >Log out</a> </p>
			</div>

		</div>
						 
			<div id="title">
			
				<img src="https://i.imgur.com/nsE06iC.png">
			</div>
			
			<div id="form">	
			
				<form method="post" action="#">
						   
							<div id="options">
								
								<div id="gamespic">
									<img src="https://i.imgur.com/mrANTZV.png">
								</div>
								
							</div>
							
							<div id="game1">
							
								<label class="container">
									 <input type="radio" name="selgame" value="Tic" > Tic Tac Toe<br>
									 <span class="checkmark"></span>
								</label>
							  
							</div>
							
							<div id="game2">
							
							   <label class="container">
									 <input type="radio" name="selgame" value="Connect" > Connect Four<br>
									 <span class="checkmark"></span>
							   </label>
							   
							</div>
							

							<div class="input-group">
								<button type="submit" class="btn" name="play">Play</button>
							</div>
				</form>
			</div>

		</div>		
			

				
	</body>

</html>