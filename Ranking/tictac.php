<?php

require_once '../Classes/Connection.php';
require_once '../Classes/Functions.php';
start_session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Minigames RANKING</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="CSS/style2.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <div id="rectangle">
 <?php   

    $connection = Connection::getInstance();
    
   $query = "SELECT @rownum:=@rownum + 1 as row_number, 
       t.*
FROM ( 
   SELECT u.IGN FROM users u, usergame g WHERE u.id=g.id_user and g.id_game=5 order by g.highscore desc
) t,
(SELECT @rownum := 0) r ";
    $results = mysqli_query($connection, $query);
    if (mysqli_num_rows($results) != 1) { echo "<table>"; 

while($row = mysqli_fetch_array($results,MYSQLI_ASSOC)){   
echo "<tr><td>" . $row['row_number'] . "</td><td>" . $row['IGN'] . "</td></tr>";   
}

echo "</table>"; 

}
?>
</div>

</body>
</html>
