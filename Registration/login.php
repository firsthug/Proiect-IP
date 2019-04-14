<?php

require_once '../Classes/Functions.php';

?>
<!DOCTYPE html>
<html>
<head>
  <title>New User</title>
<link rel="stylesheet" type="text/css" href="../Interface/Log_in_css.css">
</head>


<body> 
	<div id="outerWrapper">
	
			<div id="title">
					
				<img src="https://i.imgur.com/q9IV7V6.png" height="200px">
					
			</div>
		
		<div id="container">
		
			<div id="rectangle">
			
				<div id="form">
			
					  <form method="post" action="../Classes/Login.php">
					  	<?php include('../Classes/Errors.php'); ?>
							<div class="input-group">
							<label>Username</label>
							<input type="text" name="username" >
						</div>
						<div class="input-group">
							<label>Password</label>
							<input type="password" name="password">
						</div>
						<div class="buton">
							<button type="submit" class="btn" name="login_user"><span>Login</span></button>
						</div>
						<div id="sign">
							<p>
								Not yet a player? <a href="register.php">Sign up</a>
							</p>
						</div>
				</div>
				
			</div>
		</div>
	</div> 
	  
</body>
</html>