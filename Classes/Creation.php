<?php
require_once 'User.php';
require_once 'UserTable.php';
require_once 'Connection.php';
require_once 'Functions.php';
	
start_session();


try{

      $formdata = array(); 
      $input_method = INPUT_POST;

     $formdata['field1'] = filter_input($input_method, "field1", FILTER_SANITIZE_STRING);
     $formdata['field2'] = filter_input($input_method, "field2", FILTER_SANITIZE_STRING);
     $formdata['gamename'] = filter_input($input_method, "gamename", FILTER_SANITIZE_STRING);
     $formdata['gender'] = filter_input($input_method, "gender", FILTER_SANITIZE_STRING);

     $val_field1 = $formdata['field1'];
     $val_field2 = $formdata['field2'];
     $ign=$formdata['gamename'];
     $gender = $formdata['gender'];
     $username= $_SESSION['username'];


      $fields_val=$val_field1.'-'.$val_field2;

        $connection = Connection::getInstance();
        $userTable = new UserTable($connection);
        $user = $userTable->getUserByUsername($username);
        $id = $user->getId();
        $userTable->updateUser($username, $gender,$ign);
        $userTable->insertUserGame($id);
        $userTable->insertField($id,$fields_val);
        

  header('location: ../Room.php?');   //momentan   
}

catch(Exception $ex){require '../Registration/creation.php';}

?>

