<?php
  class Session {
    private array $messages;

    public function __construct() {
      session_start();

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

    public function setId_User(int $id_User) {
      $_SESSION['id_User'] = $id_User;
    }

    public function setName(string $fullname) {
      $_SESSION['fullname'] = $fullname;
    }

    public function addMessage(string $type, string $text) {
      $_SESSION['messages'][] = array('type' => $type, 'text' => $text);
    }

    public function getMessages() {
      return $this->messages;
    }
  }
?>