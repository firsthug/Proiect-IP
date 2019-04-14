<?php include('../Classes/Functions.php');
    start_session();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Minigames RANKING</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

<div id="container">
<div class="container" >
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Start</a></li>
    <li><a data-toggle="pill" href="#menu1">Math</a></li>
    <li><a data-toggle="pill" href="#menu3">Memory</a></li>
    <li><a data-toggle="pill" href="#menu4">Quizz</a></li>
    <li><a data-toggle="pill" href="#menu5">Coins</a></li>
  </ul>
  
  <div class="tab-content" >
    <div id="home" class="tab-pane fade in active">
      <h3>HIGHSCORE</h3>
      <p>HI! Choose which game you would like to see your ranking for!</p>
    </div>
    <div id="menu1" class="tab-pane fade">
       <object width="500" height="500" id="content" data="math1.php" ></object> 
    </div>
    <div id="menu3" class="tab-pane fade">
       <object width="500" height="500" id="content" data="flippy.php"></object> 
    </div>
    <div id="menu4" class="tab-pane fade">
       <object width="500" height="500" id="content" data="quizzh.php"></object> 
    </div>

     <div id="menu5" class="tab-pane fade">
       <object width="500" height="500" id="content" data="coins.php"></object> 
    </div>
</div>
</div>
</div>

</body>
</html>
