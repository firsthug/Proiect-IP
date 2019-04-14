<?php 

require_once '../Classes/Functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>New User</title>
  <link rel="stylesheet" type="text/css" href="../Interface/Sign_up_css.css">
 
</head>


<body>

  
	<div id="outerWrapper">
	
			<div id="title">
					
				<img src="https://i.imgur.com/q9IV7V6.png" height="200px">
					
			</div>
		
		<div id="container">
		
			<div id="rectangle">
			
				<div id="form">
			
					  <form method="post"  action="../Classes/Register.php">
					  
							<?php include('../Classes/Errors.php'); ?>
						
						<div class="input-group">
						  <label>Username</label>
						  <input type="text" name="username">
						</div>
						
						<div class="input-group">
						  <label>Email</label>
						  <input type="email" name="email" >
						</div>
						
						<div class="input-group">
						  <label>Password</label>
						  <input type="password" name="password_1">
						</div>
						
						<div class="input-group">
						  <label>Confirm password</label>
						  <input type="password" name="password_2">
						</div>
						
						<div class="buton">
						  <button type="submit" class="btn" name="reg_user"><span>REGISTER</span></button>
						</div>
						
						<div id="sign">
							<p>
								Already have an account? <a href="login.php">SIGN IN</a>
							</p>
						</div>
					  </form>
					  
				</div>
				
			</div>
		</div>
	</div> 
	  
</body>
</html>