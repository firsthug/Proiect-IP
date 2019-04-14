<?php

require_once 'Classes/User.php';
require_once 'Classes/UserTable.php';
require_once 'Classes/Connection.php';
require_once 'Classes/Functions.php';

session_start();

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
  	unset($_SESSION['user']);
  	unset($_SESSION['username']);
  	header("location: First_page.html");
  }
?>


<!DOCTYPE html>
<html lang="en">
    <head>	
		<title>Home</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="Interface/Main_css.css"/>
		<link rel="stylesheet" type="text/css" href="Games/Memory Game/WebContent/colorbox.css" />
		<link rel="stylesheet" type="text/css" href="CSS/UserBar.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="Games/Memory Game/jquery.colorbox.js"></script>

		<script>
			$(document).ready(function(){
				$(".iframe").colorbox({iframe:true, width:"55%", height:"80%"});

				$(".iframe2").click(function () { 

				    $.colorbox({iframe:true, width:"55%", height:"85%", href:"Games/Math Game/WebContent/Html/MathGame.php"});

				});

				$(".iframe3").click(function () { 

				    $.colorbox({iframe:true, width:"60%", height:"60%", href:"Ranking/rank.php"});

				});

				return false;
				});
			
		</script>

    </head>
	
    <body>
		<div id="outerWrapper">
<div id="door">

					<!--<img id="Image-Maps-Com-image-maps-2018-04-24-132947" src="https://i.imgur.com/fovef6m.png" border="0" width="1193" height="800" orgWidth="1193" orgHeight="800" usemap="#image-maps-2018-04-24-132947" alt="" />
					<map name="image-maps-2018-04-24-132947" id="ImageMapsCom-image-maps-2018-04-24-132947">
					<area shape="rect" coords="1191,798,1193,800" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_96180" />
					<area  alt="" title="" href="http://www.image-maps.com/" shape="poly" coords="28,373,29,641,173,626,176,367,170,347,166,337,164,331,161,326,158,322,154,318,151,315,148,312,145,310,142,307,138,305,134,302,130,301,127,298,121,297,116,296,112,294,106,294,100,294,96,294,90,293,86,294,82,296,76,297,68,300,60,306,55,311,50,315,45,321,41,326,37,333,34,342,30,352" style="outline:none;" target="_self" onmouseover="document.getElementById('Image-Maps-Com-image-maps-2018-04-24-132947').style.width='1250px';" onmouseout="document.getElementById('Image-Maps-Com-image-maps-2018-04-24-132947').style.width='1193px';"  />
				</map>-->

				<!--<img src="https://i.imgur.com/xlhxa2F.png">-->

				<img id="Image-Maps-Com-image-maps-2018-04-24-150307" src="https://i.imgur.com/xlhxa2F.png" border="0" width="194" height="800" orgWidth="194" orgHeight="800" usemap="#image-maps-2018-04-24-150307" alt="" />
				<map name="image-maps-2018-04-24-150307" id="ImageMapsCom-image-maps-2018-04-24-150307">
					<area shape="rect" coords="192,798,194,800" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_96180" />
					<area alt="" title="" shape="poly" coords="174,625,27,639,28,364,33,346,36,339,39,333,42,327,46,322,50,318,52,314,57,310,62,306,68,303,74,300,80,298,88,296,96,295,104,294,111,294,119,295,126,297,133,301,140,305,147,312,154,319,159,326,164,335,170,343,172,352,167,362" style="outline:none;" target="_self"  onmouseover="document.getElementById('Image-Maps-Com-image-maps-2018-04-24-150307').style.width= '205px';" onmouseout= "document.getElementById('Image-Maps-Com-image-maps-2018-04-24-150307').style.width= '194px';"  onclick="myFunction1()"/>
				</map>
			</div>
			<div id="homework">

					<!--<img id="Image-Maps-Com-image-maps-2018-04-24-135726" src="http://www.image-maps.com/m/private/96180/106233-hG9Qzer.png" border="0" width="1193" height="800" orgWidth="1193" orgHeight="800" usemap="#image-maps-2018-04-24-135726" alt="" />
					<map name="image-maps-2018-04-24-135726" id="ImageMapsCom-image-maps-2018-04-24-135726">
					<area shape="rect" coords="1191,798,1193,800" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_96180" />
					<area  alt="" title="" href="http://www.image-maps.com/" shape="poly" coords="805,496,818,490,836,488,852,497,848,499,844,503,826,502" style="outline:none;" target="_self"     />
					<area  alt="" title="" href="http://www.image-maps.com/" shape="poly" coords="858,498.9999694824219,836,488.9999694824219,836,482.9999694824219,876,480.9999694824219,898,488.9999694824219,899,494.9999694824219" style="outline:none;" target="_self"     />
					<area  alt="" title="" href="http://www.image-maps.com/" shape="poly" coords="877,480.9999694824219,877,459.9999694824219,885,461.9999694824219,895,460.9999694824219,894,485.9999694824219" style="outline:none;" target="_self"     />
					<area  alt="" title="" href="http://www.image-maps.com/" shape="poly" coords="894,459.9999694824219,901,444.9999694824219,891,460.9999694824219,894,457.9999694824219" style="outline:none;" target="_self"     />
					<area  alt="" title="" href="http://www.image-maps.com/" shape="poly" coords="885,460.9999694824219,884,451.9999694824219,880,451.9999694824219,880,459.9999694824219" style="outline:none;" target="_self"     />
					<area  alt="" title="" href="http://www.image-maps.com/" shape="poly" coords="880,459.9999694824219,872,438.9999694824219,877,459.9999694824219" style="outline:none;" target="_self"     />
				</map>-->

				<!--<img src="https://i.imgur.com/a5qNJI2.png">-->
				<img  id="hw" src="https://i.imgur.com/a5qNJI2.png" border="0" width="478" height="800" orgWidth="478" orgHeight="800" usemap="#image-maps-2018-04-24-145012" alt=""/>
				<map name="image-maps-2018-04-24-145012" id="ImageMapsCom-image-maps-2018-04-24-145012">
					<area class="iframe2" shape="rect" coords="476,798,478,800" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_96180" />
					<area class="iframe2" alt="" title="" shape="poly" coords="184,490,185,495,144,498,138,497,129,503,117,499,110,502,91,496,120,489,122,483,165,481" style="outline:none;" target="_self"  onmouseover="document.getElementById('hw').style.width='483px'; document.getElementById('hw').style.height='805px';"  onmouseout="document.getElementById('hw').style.width='478px'; document.getElementById('hw').style.height='800px';" />
					<area class="iframe2" alt="" title="" shape="poly" coords="163,481,162,461,169,462,175,462,180,461,179,486" style="outline:none;" target="_self"  onmouseover="document.getElementById('hw').style.width='483px'; document.getElementById('hw').style.height='805px';"  onmouseout="document.getElementById('hw').style.width='478px'; document.getElementById('hw').style.height='800px';"   />
					<area class="iframe2" alt="" title="" shape="poly" coords="179,460,186,446,176,461" style="outline:none;" target="_self"   onmouseover="document.getElementById('hw').style.width='483px'; document.getElementById('hw').style.height='805px';"  onmouseout="document.getElementById('hw').style.width='478px'; document.getElementById('hw').style.height='800px';"  />
					<area class="iframe2" alt="" title="" shape="poly" coords="170,461,169,452,166,452,166,460" style="outline:none;" target="_self"   onmouseover="document.getElementById('hw').style.width='483px'; document.getElementById('hw').style.height='805px';" onmouseout="document.getElementById('hw').style.width='478px'; document.getElementById('hw').style.height='800px';"  />
					<area class="iframe2" title="" shape="poly" coords="165,461,157,439,162,460" style="outline:none;" target="_self"   onmouseover="document.getElementById('hw').style.width='483px'; document.getElementById('hw').style.height='805px';"  onmouseout="document.getElementById('hw').style.width='478px'; document.getElementById('hw').style.height='800px';" />

				</map>


			</div>

			<div id="board">

				<a class='iframe' href="Games/Memory Game/WebContent/Html/MemoryGame.php">
					<img id="bd"  src="https://i.imgur.com/oPE4QId.png" target="_self" style="outline:none;" onmouseover="document.getElementById('bd').style.width='195px';" onmouseout="document.getElementById('bd').style.width='185px';" /> </a>
					
				</div>
				

			<div id="topbarouter">
		<div id="topbar">
			<img src="https://i.imgur.com/ockgUee.png">
		</div>


		<div id="usercontainer" class="iframe3"  onmouseover="document.getElementById('username').style.fontSize='21px'; " onmouseout="document.getElementById('username').style.fontSize='20px';"  >


			<p id="username">
				<?php
				$username= $_SESSION['username'];

				$connection = Connection::getInstance();
       			 $userTable = new UserTable($connection);
       			 $user = $userTable->getUserByUsername($username);
			
				if ($user != null) {
					
					$ign=$user->GetIGN();
					echo $ign;}
					
					?>
			</p>

		</div>

		<div id="cointainer">

			<p id="score">
				<?php
				$username= $_SESSION['username'];
				$connection = Connection::getInstance();
       			 $userTable = new UserTable($connection);
       			 $user = $userTable->getUserByUsername($username);
			
				if ($user != null) {
					
					$coins=$user->GetCoins();
					echo $coins;}
					
					?>
				</p>

				<img id="coin" src="https://i.imgur.com/gtMp2Q7.png">
			</div>

			<div id="logout">

				<p class="btn"> <a href="room.php?logout='1'" >Log out</a> </p>
			</div>

		</div>			
		<canvas id="pet" >
				</canvas>
				
		</div>	

		<script src="Interface/Main_js.js"></script>
		<?php
				$username= $_SESSION['username'];
				$connection = Connection::getInstance();
       			 $userTable = new UserTable($connection);
       			 $user = $userTable->getUserByUsername($username);
			
				if ($user != null) {
					
					$pet=$user->GetPet();					
					echo "<input type='hidden' id='myPhpValue' value='".$pet." '/>";
				}
					
					?>
 			<canvas id="pet"></canvas> 
</div>

		<script src="Interface/Main_js.js"></script>
    </body>	
</html>

