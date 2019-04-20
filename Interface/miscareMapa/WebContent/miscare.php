<?php
require_once '../../../Classes/User.php';
require_once '../../../Classes/UserTable.php';
require_once '../../../Classes/Connection.php';
require_once '../../../Classes/Functions.php';
start_session();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Your world</title>
		<link rel="stylesheet" href="miscare.css">
		<link rel="stylesheet" href="colorbox.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="../jquery.colorbox.js"></script>
		
</head>
<body id="mapa">
<canvas id="moveAnimation"></canvas>
<script src="miscare.js"></script>
<?php
				$connection = Connection::getInstance();
        		$userTable = new UserTable($connection);
        		$username= $_SESSION['username'];
        		$user = $userTable->getUserByUsername($username);

					$gen=$user->getGender();
					if($gen==='female')
					echo "<input type='hidden' id='myPhpValue' value=0 />";
					else
					echo "<input type='hidden' id='myPhpValue' value=1 />";
				
				
					?>
</body>
</html>



