 <?php
 require_once 'Classes/User.php';
require_once 'Classes/UserTable.php';
require_once 'Classes/Connection.php';

$connection = Connection::getInstance();
$userTable = new UserTable($connection);
$user = $userTable->getUserByUsername("ion");

$file = 'QTOutput.txt';
$current = file_get_contents($file);
$started = microtime(true);

//$user = $userTable->getUserByUsername("Slayer");
//$userTable->insertPet("NumberFive");
$userTable->DeletePet(5);
//$userTable->updatePet($user,4);


$end = microtime(true);
$diff = $end - $started;
$querryTime = number_format($diff, 10);
$current .= "     Timp de raspuns query delete  ";
$current .= $querryTime;

file_put_contents($file, $current);

	

?>
