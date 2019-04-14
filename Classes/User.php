<?php
class User {
    private $id;
    private $username;
    private $email;
    private $password;
    private $IGN; 
    private $gender;
    private $coins;
    private $pet_id;

    public function __construct($i, $uname,$e, $pwd, $ign ,$g, $c,$p) {
        $this->id = $i;
        $this->username = $uname;
        $this->password = $pwd;
        $this->IGN = $ign;
        $this->gender = $g;
        $this->coins = $c;
        $this->email = $e;
        $this->pet_id = $p;

    }
    public function getId() { return $this->id; }
    public function getUsername() { return $this->username; }
    public function getPassword() { return $this->password; }
    public function getGender() { return $this->gender; }
    public function getEmail() { return $this->email; }
    public function getCoins() { return $this->coins; }
    public function getIGN() { return $this->IGN; }
    public function getPet() { return $this->pet_id; }

    public function setId($i) { $this->id = $i; }
    public function setUsername($n) { $this->username = $n; }
    public function setPassword($p) { $this->password = $p; }
    public function setCoins($c) { $this->coins = $c; }
    public function setEmail($e) { $this->email = $e; }
    public function setIGN($s) { $this->IGN = $s; }
    public function setPet($s) { $this->pet_id = $s; }
    public function setGender($s) { $this->gender = $s; }

}
?>
