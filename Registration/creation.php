 <?php 

 require_once '../Classes/Functions.php';

?> 

<!DOCTYPE html>
<html>
	<head>
	  
	  <title>Character Creation</title>
	  <link rel="stylesheet" type="text/css" href="../CSS/Creation.css">
	</head>



	<body>

		<div id="outerWrapper">
			
						 
				
			<div id="form">	
				<form method="post" action="../Classes/Creation.php">
					<?php include('../Classes/Errors.php'); ?>
							<div id="name" class="input-group">
								<label>Name</label>
								<input type="text" name="gamename" >
							</div>
							
							<div id="options">
								
								<div id="male">
									<img src="https://i.imgur.com/kZMjoLt.png">
								</div>
								
								<div id="female">
									<img src="https://i.imgur.com/cZZCR6f.png">
								</div>
								
							</div>
							
							<div id="gender1">
							
								<label class="container">
									 <input type="radio" name="gender" value="male" > Male<br>
									 <span class="checkmark"></span>
								</label>
							  
							</div>
							
							<div id="gender2">
							
							   <label class="container">
									 <input type="radio" name="gender" value="female" > Female<br>
									 <span class="checkmark"></span>
							   </label>
							   
							</div>
							  
							<div class="header">
								<h3>Choose 2 fields you would like to know more about! </h3>
							</div>

							<div id="customSelect1">
							   <select name="field1">
								  <option value="history">History</option>
								  <option value="theater">Theater</option>
								  <option value="literature">Literature</option>
								  <option value="geography">Geography</option>
								  <option value="nobel">Nobel Prize</option>
								  <option value="biology">Biology</option>
								  <option value="physics">Physics</option>
								</select>
							</div>
							
							<div id="customSelect2">
								<select name="field2">
								  <option value="history">History</option>
								  <option value="theater">Theater</option>
								  <option value="literature">Literature</option>
								  <option value="geography">Geography</option>
								  <option value="nobel">Nobel Prize</option>
								  <option value="biology">Biology</option>
								  <option value="physics">Physics</option>
								</select>
							</div>

							<div class="input-group">
								<button type="submit" class="btn" name="create_user">Create</button>
							</div>
				</form>
			</div>

		</div>		
			

				
	</body>

</html>