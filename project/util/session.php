<?php
  class Session {
    private array $messages;
    private array $cart;

    public function __construct() {
      session_start();
      $_SESSION['cart']=array();
      $this->messages = isset($_SESSION['messages']) ? $_SESSION['messages'] : array();
      unset($_SESSION['messages']);
    }

    public function isLoggedIn() : bool {
      return isset($_SESSION['id_User']);    
    }

    public function logout() {
      session_destroy();
    }

    public function getId_User() : ?int {
      return isset($_SESSION['id_User']) ? $_SESSION['id_User'] : null;    
    }

    public function getName() : ?string {
      return isset($_SESSION['fullname']) ? $_SESSION['fullname'] : null;
    }

    public function getFirstName() : ?string {
      return isset($_SESSION['fname']) ? $_SESSION['fname'] : null;
    }

    public function getLastName() : ?string {
      return isset($_SESSION['lname']) ? $_SESSION['lname'] : null;
    }

    public function setId_User(int $id_User) {
      $_SESSION['id_User'] = $id_User;
    }

    public function setName(string $fullname) {
      $_SESSION['fullname'] = $fullname;
    }

    public function setFirstName(string $fname) {
      $_SESSION['fname'] = $fname;
    }

    public function setLastName(string $lname) {
      $_SESSION['lname'] = $lname;
    }

    public function addMessage(string $type, string $text) {
      $_SESSION['messages'][] = array('type' => $type, 'text' => $text);
    }

    public function addCart(int $id) {
      array_push($_SESSION['cart'], $id);
      echo $id;
    }

    /*public function printCart() {
      $max=sizeof($_SESSION['cart']);
      for($i=0; $i<$max; $i++) { 
      while (list ($key, $val) = each ($_SESSION['cart'][$i])) { 
        echo "$key -> $val ,"; 
      } // inner array while loop
      echo "<br>";  
      } 
    }*/

    public function getMessages() {
      return $this->messages;
    }
  }
?>