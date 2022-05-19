<?php
  declare(strict_types = 1);

  class User {
    public int $id_User;
    public string $username;
    public string $fname;
    public string $lname;
    public int $phone;
    public int $id_Address;
   

    public function __construct(int $id_User, string $username, string $fname, string $lname, int $phone, int $id_Address)
    {
      $this->id_User = $id_User;
      $this->username = $username;
      $this->fname = $fname;
      $this->lname = $lname;
      $this->phone = $phone;
      $this->id_Address = $id_Address;
    }

    function fullName() {
      return $this->fname . ' ' . $this->lname;
    }

    function save($db) {
      $stmt = $db->prepare('UPDATE Customer SET fname = ?, lname = ?
                            WHERE id_User = ?');

      $stmt->execute(array($this->fname, $this->lname, $this->id_User));
    }
    
    static function getUserWithPassword(PDO $db, string $username, string $password) : ?User {
      $stmt = $db->prepare('SELECT id_User, fname, lname, phone, id_Address
                            FROM User 
                            WHERE lower(username) = ? AND password = ?');

      $stmt->execute(array(strtolower($username), sha1($password))); //TODO: Improve security!
  
      if ($user = $stmt->fetch()) {
        return new User(
          $user['id_User'],
          $user['fname'],
          $user['lame'],
          $user['phone'],
          $user['id_Address']
        );
      } else return null;
    }

    static function getUser(PDO $db, int $id_User) : User {
      $stmt = $db->prepare('SELECT id_User, fname, lname, phone, id_Address                            
                            FROM User 
                            WHERE id_User = ?');

      $stmt->execute(array($id_User));
      $customer = $stmt->fetch();
      
      return new User(
        $user['id_User'],
        $user['fname'],
        $user['lame'],
        $user['phone'],
        $user['id_Address']
      );
    }
  }
?>