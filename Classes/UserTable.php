<?php

require_once 'User.php';

class UserTable {
    private $link;
    
    public function __construct($connection) {
        $this->link = $connection;
    }

    public function insert($user) {
        if (!isset($user)) {
            throw new Exception("User required");
        }

            $username = $user->getUsername();
            $password = $user->getPassword();
            $email = $user->getEmail();

        $stmt = "INSERT INTO users (username, email, password,IGN,gender,coins,pet_id) 
              VALUES('$username', '$email', '$password','','',10,2)"; 

         $result = mysqli_query($this->link, $stmt);

             if(! $result ) 
                  throw new Exception("Could not save user ");
       

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";

  $result = mysqli_query($this->link, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { 
    if ($user['id']) 
        $id=$user['id'];
       }
        
        return $id;
        }

    public function delete($user) {
        if (!isset($user)) {
            throw new Exception("User required");
        }
        $id = $user->getId();

        if ($id == null) {
            throw new Exception("User id required");
        }
         $sql = "DELETE FROM users WHERE id = '$id'";
         $result = mysqli_query($this->link, $sql);

        if(! $result ) 
            throw new Exception("Could not delete user! ");
    }

   

     public function updateCoins($user, $coins) {
        if (!isset($user)) {
            throw new Exception("User required");
        }
        $id = $user->getId();
        if ($id == null) {
            throw new Exception("User id required");
        }
        $sql = "UPDATE users SET coins = '$coins' WHERE id = '$id' ";
        $result = mysqli_query($this->link, $sql);

        if(! $result ) 
            throw new Exception("Could not  update user status! ");

    }

     public function updatePet($user,$pet) {
        if (!isset($user)) {
            throw new Exception("User required");
        }
        $id = $user->getId();
        if ($id == null) {
            throw new Exception("User id required");
        }

        $sql = "UPDATE users SET pet_id = '$pet' WHERE id = '$id' ";
        $result = mysqli_query($this->link, $sql);

        if(! $result ) 
            throw new Exception("Could not  update user status! ");

    }

 public function updateUser($username, $g, $i) {

        $sql =  "UPDATE users SET gender='$g',IGN='$i' WHERE username='$username' ";
        $result = mysqli_query($this->link, $sql);

        if(! $result ) 
            throw new Exception("Could not  update user status! ");
    }

 public function insertField($id, $f) {

        $sql = "INSERT INTO fields (id,field_name) VALUES('$id', '$f')";

        $result = mysqli_query($this->link, $sql);

        if(! $result ) 
            throw new Exception("Could not insert into fields table! ");
    }

     public function insertUserGame($id) {

          for ($i = 1; $i <= 6; $i++){                                    
            $sql= "INSERT INTO `usergame`( `id_user`, `id_game`, `highscore`, `current_score`, `daily_count`) VALUES  ('$id', '$i',1,1,1)"; 
            $result = mysqli_query($this->link, $sql);
            if(! $result ) 
                throw new Exception("Could not insert into usergame table! ");
        }  
    }

    public function insertPet($name)
    {
         $sql= "INSERT INTO `pets`(`id`, `name`) VALUES (5,'$name')"; 
            $result = mysqli_query($this->link, $sql);
            if(! $result ) 
                throw new Exception("Could not insert into pets table! ");
    }

         public function deletePet($id)
    {
         $sql= "DELETE FROM `pets` WHERE id='$id' "; 
            $result = mysqli_query($this->link, $sql);
            if(! $result ) 
                throw new Exception("Could not delete entry! ");
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = '$id' ";
        $result = mysqli_query($this->link, $sql);

        if(! $result ) 
            throw new Exception("Could not retrieve user! ");

        $user = null;
       if (mysqli_num_rows($result) == 1) {
            $row =  mysqli_fetch_assoc($result);  
            $username = $row['username'];
            $pwd = $row['password'];
            $IGN = $row['IGN'];
            $email = $row['email'];
            $gender =  $row['gender'];
            $coins =  $row['coins'];
            $pet =  $row['pet_id'];
            $user = new User($id, $username, $email, $pwd,$IGN, $gender,$coins,$pet);
            
        }
        return $user;
    }

    public function getUserByUsername($username) {
         $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1 ";
         $result = mysqli_query($this->link, $sql);

        if(! $result ) 
            throw new Exception("Could not retrieve user! ");

        $user = null;
         if (mysqli_num_rows($result) == 1) {
            $row =  mysqli_fetch_assoc($result);
            $id = $row['id'];
            $username = $row['username'];
            $pwd = $row['password'];
            $IGN = $row['IGN'];
            $email = $row['email'];
            $gender =  $row['gender'];
            $coins =  $row['coins'];
            $pet =  $row['pet_id'];
            $user = new User($id, $username, $email, $pwd,$IGN, $gender,$coins,$pet);
            
        }
        return $user;
    }

    public function getUserByEmail($email) {
         $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1 ";
         $result = mysqli_query($this->link, $sql);

        if(! $result ) 
            throw new Exception("Could not retrieve user! ");

        $user = null;
         if (mysqli_num_rows($result) == 1) {
            $row =  mysqli_fetch_assoc($result);
             $id = $row['id'];
            $username = $row['username'];
            $pwd = $row['password'];
            $IGN = $row['IGN'];
            $email = $row['email'];
            $gender =  $row['gender'];
            $coins =  $row['coins'];
            $pet =  $row['pet_id'];
            $user = new User($id, $username, $email, $pwd,$IGN, $gender,$coins,$pet);
        }
        return $user;
    }


}

?>
