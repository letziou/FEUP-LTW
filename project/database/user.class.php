<?php
  declare(strict_types = 1);

  class User {
    public int $id_User;
    public string $username;
    public string $password;
    public string $fname;
    public string $lname;
    public int $phone;
    public int $id_Address;
   

    public function __construct(int $id_User, string $username, string $password, string $fname, string $lname, int $phone, int $id_Address)
    {
      $this->id_User = $id_User;
      $this->username = $username;
      $this->password = $password;
      $this->fname = $fname;
      $this->lname = $lname;
      $this->phone = $phone;
      $this->id_Address = $id_Address;
    }

    function fullName() {
      return $this->fname . ' ' . $this->lname;
    }

    function firstName() {
      return $this->fname;
    }

    function lastName() {
      return $this->lname;
    }

    static function save_newUser(PDO $db, $username, $password, $fname, $lname, $phone, $id_Address ) {
      $options = ['cost'=>12];
      $stmt = $db->prepare('INSERT INTO User (username, password, fname, lname, phone, id_Address) 
                            VALUES (?,?,?,?,?,?)');

      $stmt->execute(array(strtolower($username), password_hash($password, PASSWORD_DEFAULT, $options), $fname, $lname, $phone, $id_Address));

    }

    function save_NewPassword($db, $newpassword) {
      $options = ['cost'=>12];
      $stmt = $db->prepare('UPDATE User SET password = ?
                            WHERE id_User = ?');

      $stmt->execute(array(password_hash($newpassword, PASSWORD_DEFAULT, $options), $this->id_User));
    }

    function save_editUser($db) {
      $stmt = $db->prepare('UPDATE User SET username = ?, phone = ?
                            WHERE id_User = ?');

      $stmt->execute(array($this->username, $this->phone, $this->id_User));
    }

   
    static function getUserWithPassword(PDO $db, string $username, string $password) : ?User {
      $stmt = $db->prepare('SELECT id_User, username, password, fname, lname, phone, id_Address
                            FROM User 
                            WHERE username = ? ');

      $stmt->execute(array(strtolower($username))); 

      $user = $stmt->fetch();
  
      if ($user && password_verify($password, $user['password'])) {
        return new User(
          (int)$user['id_User'],
          (string)$user['username'],
          (string)$user['password'],
          (string)$user['fname'],
          (string)$user['lname'],
          (int)$user['phone'],
          (int)$user['id_Address']
        );
      } else return null;
    }

    static function getUser(PDO $db, int $id_User) : User {
      $stmt = $db->prepare('SELECT id_User, username, password, fname, lname, phone, id_Address                            
                            FROM User 
                            WHERE id_User = ?');

      $stmt->execute(array($id_User));
      $user = $stmt->fetch();
      
      return new User(
        (int)$user['id_User'],
        (string)$user['username'],
        (string)$user['password'],
        (string)$user['fname'],
        (string)$user['lname'],
        (int)$user['phone'],
        (int)$user['id_Address']
      );
    }
  }
?>