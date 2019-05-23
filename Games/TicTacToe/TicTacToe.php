<?php
require_once '../../Classes/User.php';
require_once '../../Classes/UserTable.php';
require_once '../../Classes/Connection.php';
require_once '../../Classes/Functions.php';

start_session();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Tic-Tac-Toe</title>
		<meta name="description" content="Artificial Intelligence based on the Monte Carlo search.">
		<link rel="stylesheet" href="CSS/TicTacToe.css">
	</head>
	<body>
	<?php 
   	$username= $_SESSION['username'];
    $connection = Connection::getInstance();
    $userTable = new UserTable($connection);
    $user = $userTable->getUserByUsername($username);
    $coins= $user->getCoins();
    $idc= $user->getId();


    if (isset($_COOKIE['coinsT'])) {
        $coins_num=$_COOKIE['coinsT'];
        $coinsf= $coins+$coins_num;
        $userTable->updateCoins($user,$coinsf);
         unset($_COOKIE['coinsT']);
        setcookie('coinsT', '', time() - 3600, '/'); 

    }

            if(isset($_COOKIE['scoreT']))
            { $scor=$_COOKIE['scoreT'];
            $search_query = "SELECT highscore FROM usergame  WHERE id_user='$idc' and id_game=5 ";

        $result = mysqli_query($connection, $search_query);
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            $high=$user['highscore'];

            $updateDC="Update usergame set daily_count=daily_count+1 where id_user='$idc'  and id_game=5";

            if (!mysqli_query($connection, $updateDC))
                //echo "Record updated successfully daily count";
            //else 
                echo "Error updating daily count: " . mysqli_error($connection);

            if($scor>$high)
            {
                $updateH="Update usergame set highscore=$scor where id_user='$idc' and id_game=5";

                if (!mysqli_query($connection, $updateH))
                    //echo "Record updated successfully highscore";
                //else 
                    echo "Error updating highscore record: " . mysqli_error($connection);
            }

            $updateCS="Update usergame set current_score=$scor where id_user='$idc'  and id_game=5";

            if (!mysqli_query($connection, $updateCS))
                //echo "Record updated successfully current score";
            //else 
                echo "Error updating current score record: " . mysqli_error($connection);

          

            unset($_COOKIE['scoreT']);
            setcookie('scoreT', '', time() - 3600, '/'); 

        }}
?>
    
	<div class="center-wrapper-parent">
	  <div class="canvas-wrapper">
		<canvas id="board" class="center-v"></canvas>
	  </div>
	</div>
	<script data-main="js/main" src="js/require.js"></script>
	</body>
</html>