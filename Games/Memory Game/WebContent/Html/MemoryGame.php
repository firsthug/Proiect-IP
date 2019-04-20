<?php

require_once '../../../../Classes/User.php';
require_once '../../../../Classes/UserTable.php';
require_once '../../../../Classes/Connection.php';
require_once '../../../../Classes/Functions.php';

start_session();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Memory Game</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet prefetch" href="https://fonts.googleapis.com/css?family=Coda">
    <link rel="stylesheet prefetch" href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Permanent+Marker" >
    <link rel="stylesheet" href="../CSS/MemoryGame.css">
</head>
<body>
<?php 

    $username= $_SESSION['username'];
    $connection = Connection::getInstance();
    $userTable = new UserTable($connection);
    $user = $userTable->getUserByUsername($username);
    $coins= $user->getCoins();
    $idc= $user->getId();
    if (isset($_COOKIE['coinsF'])) {
        $coins_num=$_COOKIE['coinsF'];
        $coinsf= $coins+$coins_num;
        //echo "COINS". $coinsf;

        $userTable->updateCoins($user,$coinsf);

        unset($_COOKIE['coinsF']);
        setcookie('coinsF', '', time() - 3600, '/'); 
    }
    
        $search_query = "SELECT highscore,id_user FROM usergame ,users  WHERE username='$username' and id_user='$idc' and id_game=1 ";

        $result = mysqli_query($connection, $search_query);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            $high=$user['highscore'];

            if(isset($_COOKIE['scoreF']))
            { $scor=$_COOKIE['scoreF'];

                  $updateDC="Update usergame set daily_count=daily_count+1 where id_user=$idc  and id_game=1";

            if (!mysqli_query($connection, $updateDC))
                //echo "Record updated successfully daily count";
            //else 
                echo "Error updating daily count: " . mysqli_error($connection);

            if($scor>$high)
            {
                $updateH="Update usergame set highscore=$scor where id_user=$idc and id_game=1";

                if (!mysqli_query($connection, $updateH))
                    //echo "Record updated successfully highscore";
                //else 
                    echo "Error updating highscore record: " . mysqli_error($connection);
            }

            $updateCS="Update usergame set current_score=$scor where id_user=$idc  and id_game=1";

            if (!mysqli_query($connection, $updateCS))
                //echo "Record updated successfully current score";
            //else 
                echo "Error updating current score record: " . mysqli_error($connection);

          

            unset($_COOKIE['scoreF']);
            setcookie('scoreF', '', time() - 3600, '/'); 

        }
       // else
           // echo "Err no score cookie ";        
}
else
echo "Err bad query". mysqli_error($connection);

    ?>


    <div class="container">
        <header>
            <h1>Memory Game</h1>
        </header>

        <section class="score-panel">
        	

            <div class="timer">
            </div>
            <div class="pairs">
            </div>

        </section>

        <ul class="deck" id="card-deck">
            <li class="card a">
            </li>
            <li class="card b">
            </li>
            <li class="card c">
            </li>
            <li class="card d">
            </li>
            <li class="card e">
            </li>
            <li class="card f">
            </li>
            <li class="card g">
            </li>
            <li class="card h">
            </li>
            <li class="card a">
            </li>
            <li class="card b">
            </li>
            <li class="card c">
            </li>
            <li class="card d">
            </li>
            <li class="card e">
            </li>
            <li class="card f">
            </li>
            <li class="card g">
            </li>
            <li class="card h">
            </li>
        </ul>

        <div id="popup1" class="overlay">
            <div class="popup">
                <div class="content-2">
                    <p>You made <span id=pairs> </span> pairs </p>
                    <p>Time remaining: <span id=timeLeft> </span> </p>
                    <p>Score: <span id=score></span></p>
                </div>
            </div>
            
        </div>
    </div>
    <script src="../JS/MemoryGame.js"></script>
</body>
</html>