<?php
require_once 'User.php';
require_once 'UserTable.php';
require_once 'Connection.php';
require_once 'Functions.php';
	
start_session();

try{
 	
 		$formdata = array(); 
     	$input_method = INPUT_POST;

  	 $formdata['username'] = filter_input($input_method, "username", FILTER_SANITIZE_STRING);
     $formdata['password'] = filter_input($input_method, "password", FILTER_SANITIZE_STRING);


  if (empty($formdata['username']) || empty($formdata['password'] )) {
    array_push($errors, "Both fields required");
     throw new Exception("");
  }
  
  if (count($errors) == 0) {
  		$username = $formdata['username'];
        $password1 = $formdata['password'];
   		   $password = md5($password1);

    	$connection = Connection::getInstance();
        $userTable = new UserTable($connection);
        $user = $userTable->getUserByUsername($username);
   
    if ($user != null && $user->getPassword() == $password ) {
      $_SESSION['username'] = $username;
      $_SESSION['user'] = $user;
      header('location:../Room.php?');
    }else {
      	array_push($errors, "Wrong username or password!");
       throw new Exception("");
    }
  }

}
catch(Exception $ex){require '../Registration/login.php';}

?>

