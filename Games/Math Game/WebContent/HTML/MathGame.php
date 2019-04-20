<?php
require_once '../../../../Classes/User.php';
require_once '../../../../Classes/UserTable.php';
require_once '../../../../Classes/Connection.php';
require_once '../../../../Classes/Functions.php';

start_session();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Math Game</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet prefetch" href="https://fonts.googleapis.com/css?family=Coda">
    <link rel="stylesheet prefetch" href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Permanent+Marker" >
    <link rel="stylesheet" href="../CSS/MathGame.css">
</head>
<body>
<?php 
   $username= $_SESSION['username'];
    $connection = Connection::getInstance();
    $userTable = new UserTable($connection);
    $user = $userTable->getUserByUsername($username);
    $coins= $user->getCoins();
    $idc= $user->getId();

    if (isset($_COOKIE['coinsM'])) {
        $coins_num=$_COOKIE['coinsM'];

        $coinsf= $coins+$coins_num;
       
        $userTable->updateCoins($user,$coinsf);


        unset($_COOKIE['coinsM']);
        setcookie('coinsM', '', time() - 3600, '/'); 
    }
    //else
       // echo "Error no cookie ";

    
        $search_query = "SELECT highscore,id_user FROM usergame ,users  WHERE username='$username' and id_user=id and id_game=2 ";

        $result = mysqli_query($connection, $search_query);
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            $high=$user['highscore'];
            $idc=$user['id_user'];

            if(isset($_COOKIE['scoreM']))
            { $scor=$_COOKIE['scoreM'];

                  $updateDC="Update usergame set daily_count=daily_count+1 where id_user=$idc  and id_game=2";

            if (!mysqli_query($connection, $updateDC))
                //echo "Record updated successfully daily count";
            //else 
                echo "Error updating daily count: " . mysqli_error($connection);

            if($scor>$high)
            {
                $updateH="Update usergame set highscore=$scor where id_user=$idc and id_game=2";

                if (!mysqli_query($connection, $updateH))
                    //echo "Record updated successfully highscore";
                //else 
                    echo "Error updating highscore record: " . mysqli_error($connection);
            }

            $updateCS="Update usergame set current_score=$scor where id_user=$idc  and id_game=2";

            if (!mysqli_query($connection, $updateCS))
                //echo "Record updated successfully current score";
            //else 
                echo "Error updating current score record: " . mysqli_error($connection);

          

            unset($_COOKIE['scoreM']);
            setcookie('scoreM', '', time() - 3600, '/'); 

        }
        //else
           // echo "Err no score cookie ";        
}
else
echo "Err bad query". mysqli_error($connection);

    ?>


    <div class="container">
        <header>
            <h1>Math Game</h1>
        </header>

        <section class="score-panel">
        
            <div class="timer">
            </div>
            <div class="answers">
            </div>

        </section>
        
        
        
        <ul id="term1"></ul>
        <ul id="operation"></ul>
        <ul id="term2"></ul>
        <ul id="equals"></ul>
        <ul id="result"></ul>
        
        <div id="popup1" class="overlay">
            <div class="popup">
                <div class="content-2">
                    <p>You answered <span id=correct> </span> questions correctly </p>
                    <p>Score: <span id=score></span></p>
                </div>
            </div>
            
        </div>
    </div>
    <script src="../JS/MathGame.js"></script>
</body>
</html>