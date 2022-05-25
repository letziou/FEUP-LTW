<?php
  declare(strict_types = 1);

  class Address {
    public int $id_Address;
    public string $city;
    public string $postalCode;
    public string $street;
    
    public function __construct(int $id_Address, string $city, string $postalCode, string $street)
    {
      $this->id_Address = $id_Address;
      $this->city = $city;
      $this->postalCode = $postalCode;
      $this->street = $street;
    }

    /*function save_newAddress($db) {}*/

      static function save_AddressEdit(PDO $db) {
        $stmt = $db->prepare('UPDATE Address SET city = ?, postalCode = ?, street = ?
                              WHERE id_Address = ?');
  
        $stmt->execute(array($this->id_Address, $this->city, $this->postalCode, $this->street));
      }

      static function getAddressFromID(PDO $db, int $id_Address) : Address {
        $stmt = $db->prepare('SELECT id_Address, city, postalCode, street
                            FROM Address
                            WHERE id_Address = ?');
        $stmt->execute(array($id_Address));
    
        $address = $stmt->fetch();
    
        return new Address(
            (int)$address['id_Address'],
            (string)$address['city'],
            (string)$address['postalCode'],
            (string)$address['street']
        );
      }  
    }

  
?>