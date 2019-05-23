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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="Artificial Intelligence based on the Minimax- and α-β-Pruning principles.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Connect Four</title>
        <link rel="stylesheet" href="CSS/ConnectFour.css">
    </head>
    <body>
        <?php 
   $username= $_SESSION['username'];
    $connection = Connection::getInstance();
    $userTable = new UserTable($connection);
    $user = $userTable->getUserByUsername($username);
    $coins= $user->getCoins();
    $idc= $user->getId();


    if (isset($_COOKIE['coinsC'])) {
        $coins_num=$_COOKIE['coinsC'];
        $coinsf= $coins+$coins_num;
       
        $userTable->updateCoins($user,$coinsf);
         unset($_COOKIE['coinsC']);
        setcookie('coinsC', '', time() - 3600, '/'); 

    }

            if(isset($_COOKIE['scoreC']))
            { $scor=$_COOKIE['scoreC'];

            $search_query = "SELECT highscore FROM usergame  WHERE id_user='$idc' and id_game=6 ";

        $result = mysqli_query($connection, $search_query);
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            $high=$user['highscore'];

            $updateDC="Update usergame set daily_count=daily_count+1 where id_user='$idc'  and id_game=6";

            if (!mysqli_query($connection, $updateDC))
                //echo "Record updated successfully daily count";
            //else 
                echo "Error updating daily count: " . mysqli_error($connection);

            if($scor>$high)
            {
                $updateH="Update usergame set highscore=$scor where id_user='$idc' and id_game=6";

                if (!mysqli_query($connection, $updateH))
                    //echo "Record updated successfully highscore";
                //else 
                    echo "Error updating highscore record: " . mysqli_error($connection);
            }

            $updateCS="Update usergame set current_score=$scor where id_user='$idc'  and id_game=6";

            if (!mysqli_query($connection, $updateCS))
                //echo "Record updated successfully current score";
            //else 
                echo "Error updating current score record: " . mysqli_error($connection);

          

            unset($_COOKIE['scoreC']);
            setcookie('scoreC', '', time() - 3600, '/'); 

        }}
?>
    
        <div id="container">

            <div class="box-left">
                <div id="coin"></div>
                <table id="game_board" cellpadding="0"></table> 
                <div id="loading">AI is thinking...</div>
            </div>

            <div class="box-right">
                <div id="options">
                    <p class="header">Difficulty</p>
                    <p>
                        <select id="difficulty" autocomplete="off">
                            <option value="1">Depth 1</option>
                            <option value="2">Depth 2 (Passive)</option>
                            <option value="3">Depth 3</option>
                            <option value="4" selected="selected">Depth 4 (Easy)</option>
                            <option value="5">Depth 5</option>
                            <option value="6">Depth 6 (Moderate)</option>
                            <option value="7">Depth 7</option>
                            <option value="8">Depth 8 (Tougher)</option>
                        </select>
                    </p>
                    <p><button class="save" onclick="Game.restartGame();" type="submit">Restart game</button></p>
                </div>

                <div id="debug">
                    <!--<p><strong>AI debugging</strong></p>-->
                    <p>Generated with</p>
                     <p> <span id="ai-iterations">?</span> iterations</p>

                    <p>Measured with <span id="ai-time">?</span></p>
                    <p><span id="ai-column">Column: ?</span></p>
                    <p><span id="ai-score">Score: ?</span></p>
                    <br/>
                    <p>Status: <span id="status" class="status-running">Running</span></p>
                </div>
            </div>
        </div>

        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/board.js"></script>
        <script src="js/connect-four.js"></script>

        <script>
        $('#algorithm-select').change(function() {
            window.location = '../' + $(this).val() + '/index.html';
        });
        </script>
    </body>
</html>
