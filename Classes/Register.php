<?php
require_once 'User.php';
require_once 'UserTable.php';
require_once 'Connection.php';
require_once 'Functions.php';

start_session();

try{

  // preia toate informatiile din formular
      $formdata = array(); 
      $input_method = INPUT_POST;

     $formdata['username'] = filter_input($input_method, "username", FILTER_SANITIZE_STRING);
     $formdata['password_1'] = filter_input($input_method, "password_1", FILTER_SANITIZE_STRING);
      $formdata['email'] = filter_input($input_method, "email", FILTER_SANITIZE_STRING);
     $formdata['password_2'] = filter_input($input_method, "password_2", FILTER_SANITIZE_STRING);


  if (empty($formdata['username']) || empty($formdata['password_1'] )  || empty($formdata['password_2'] ) || empty($formdata['email'] ) ) {
    array_push($errors, "All fields required!");
     throw new Exception("");
  }


  //verificam daca formularul e completat corect 
        $username = $formdata['username'];
        $password1 = $formdata['password_1'];
        $email = $formdata['email'];
        $password2 = $formdata['password_2'];

  if ($password1 != $password2) {
	   array_push($errors, "The two passwords do not match");
     throw new Exception("");
  }

  		  $connection = Connection::getInstance();
        $userTable = new UserTable($connection);
        $userN = $userTable->getUserByUsername($username);
        $userE = $userTable->getUserByEmail($email);

   if ($userN != null) {
             array_push($errors,"Username already registered");
              throw new Exception("");
        }

        if ($userE != null) {
             array_push($errors,"Email already registered");
              throw new Exception("");
        }

  
  // Daca nu sunt erori, inregistrarea e completa
  if (count($errors) == 0) {

  	 $password = md5($password1);//encryption pt password         
  	$user = new User(null, $username, $email, $password,'','',10,2);  
    $id = $userTable->insert($user);
    $user->setId($id);

  	$_SESSION['username'] = $username;
  	$_SESSION['user'] = $user;
    header('location: ../Registration/creation.php?');
  	
  }
  else {
        array_push($errors, "Some errors");
       throw new Exception("");
}


}
catch(Exception $ex){require '../Registration/register.php';}

?>
