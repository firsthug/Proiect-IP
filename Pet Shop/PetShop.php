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

if (isset($_POST['buy'])) {
	$type = $_POST['pet'];
	$username= $_SESSION['username'];

	$connection = Connection::getInstance();
    $userTable = new UserTable($connection);
    $user = $userTable->getUserByUsername($username);
    $coins=$user->getCoins();

					if($type==='cat')
					{
						if($coins>2000)
							{
	
								 $userTable->updateCoins($user,$coins-2000);
								 $userTable->updatePet($user,1);
                			}

                			else

                			echo "<script type='text/javascript'>alert('Not enough coins!');</script>";
					}
					else
					{

							if($type==='lizard')
					{
						if($coins>1000)
							{

								 $userTable->updateCoins($user,$coins-1000);
								  $userTable->updatePet($user,3);
                			}
                			else

                			echo "<script type='text/javascript'>alert('Not enough coins!');</script>";
					}
					else
					{

							if($type==='onion')
					{
						if($coins>500)
							{
								 $userTable->updateCoins($user,$coins-500);
								  $userTable->updatePet($user,4);
                			}
                			else

                			echo "<script type='text/javascript'>alert('Not enough coins!');</script>";
					}

					}

					}


					}

?>

<!DOCTYPE html>
<html>
	<head>
	  
	  <title>Pet Shop</title>
	  <link rel="stylesheet" type="text/css" href="../CSS/PetShop.css">
	  <link rel="stylesheet" type="text/css" href="../CSS/UserBar.css"/>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="../Memory Game/WebContent/colorbox.css" />
	  <script src="../Memory Game/jquery.colorbox.js"></script>
	  <script>
		$(document).ready(function(){

			$(".iframe3").click(function () { 

				$.colorbox({iframe:true, width:"60%", height:"60%", href:"../ranking/rank.php"});

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

				<p class="btn"> <a href="PetShop.php?logout='1'" >Log out</a> </p>
			</div>

		</div>
						 
			<div id="title">
			
				<img src="https://i.imgur.com/FkhY5qo.png">
			</div>
			
			<div id="form">	
			
				<form method="post" action="#">
						   
							<div id="options">
								
								<div id="petspic">
									<img src="https://i.imgur.com/MxF8kwn.png">
								</div>
								
								<div id="price1">
									<p>2000</p>
								</div>
								
								<div id="price2">
									<p>1000</p>
								</div>
								
								<div id="price3">
									<p>500</p>
								</div>
								
							</div>
							
							<div id="pet1">
							
								<label class="container">
									 <input type="radio" name="pet" value="cat" > Fluffy the All-Knowing<br>
									 <span class="checkmark"></span>
								</label>
							  
							</div>
							
							<div id="pet2">
							
							   <label class="container">
									 <input type="radio" name="pet" value="lizard" > Blinky Bill<br>
									 <span class="checkmark"></span>
							   </label>
							   
							</div>
							
							<div id="pet3">
							
							   <label class="container">
									 <input type="radio" name="pet" value="onion" > Onion Boy<br>
									 <span class="checkmark"></span>
							   </label>
							   
							</div>
							  

							<div class="input-group">
								<button type="submit" class="btn" name="buy">Buy</button>
							</div>
				</form>
			</div>

		</div>		
			

				
	</body>

</html>