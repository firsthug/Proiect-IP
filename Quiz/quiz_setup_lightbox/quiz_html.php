<!--<?php
require_once '../../Classes/User.php';
require_once '../../Classes/UserTable.php';
require_once '../../Classes/Connection.php';
require_once '../../Classes/Functions.php';

start_session();
?>
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Quiz</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="quiz_js_setup.js"></script>
	<link rel="stylesheet" type="text/css" href="quiz_css_setup.css">
</head>
<body>
	<!--
	<?php 
	
	 $username= $_SESSION['username'];
    $connection = Connection::getInstance();
    $userTable = new UserTable($connection);
    $user = $userTable->getUserByUsername($username);
    $coins= $user->getCoins();
    $idc= $user->getId();

	if (isset($_COOKIE['coinsQ'])) {
		$coins_num=$_COOKIE['coinsQ'];

		
        $coinsf= $coins+$coins_num;
       
        $userTable->updateCoins($user,$coinsf);
        
		unset($_COOKIE['coinsQ']);
		setcookie('coinsQ', '', time() - 3600, '/'); 
	}
	//else
		//echo "Error no cookie ";

	
		$search_query = "SELECT highscore,id_user FROM usergame ,users  WHERE username='$username' and id_user=id and id_game=4 ";

		$result = mysqli_query($connection, $search_query);
		if (mysqli_num_rows($result) == 1) {
			$user = mysqli_fetch_assoc($result);
			$high=$user['highscore'];
			$idc=$user['id_user'];

			$searchF="Select field_name from fields where id=$idc";
			$result1 = mysqli_query($connection, $searchF);
			if (mysqli_num_rows($result1) == 1) {
			$user = mysqli_fetch_assoc($result1);
			$dbfield=$user['field_name'];
			echo "<input type='hidden' id='myPhpValue' value='".$dbfield." '/>";

			//echo "Ce domeniu".$dbfield;
				}
				else
			echo "Err bad query". mysqli_error($connection);

			if(isset($_COOKIE['scoreQ']))
			{
				$scor=$_COOKIE['scoreQ'];

			if($scor>$high)
			{
				$updateH="Update usergame set highscore=$scor where id_user=$idc and id_game=4 ";

				if (!mysqli_query($connection, $updateH))
					//echo "Record updated successfully highscore";
				//else 
					echo "Error updating highscore record: " . mysqli_error($connection);
			}

			$updateCS="Update usergame set current_score=$scor where id_user=$idc  and id_game=4";

			if (!mysqli_query($connection, $updateCS))
				//echo "Record updated successfully current score";
			//else 
				echo "Error updating current score record: " . mysqli_error($connection);

			$updateDC="Update usergame set daily_count=daily_count+1 where id_user=$idc  and id_game=4";

			if (!mysqli_query($connection, $updateDC))
				//echo "Record updated successfully daily count";
			//else 
				echo "Error updating current score record: " . mysqli_error($connection);

			unset($_COOKIE['scoreQ']);
			setcookie('scoreQ', '', time() - 3600, '/'); 

		}
		//else
			//echo "Err no score cookie ";		
}
else
echo "Err bad query". mysqli_error($connection);

mysqli_close($connection);
	?>
	-->
	<div id="frame" role="content"></div>
</body>
</html>


