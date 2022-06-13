<?php
  declare(strict_types = 1);

  class Restaurant {
    public int $id_Restaurant;
    public string $name;
    public int $id_category;
    public int $id_Address;
    public int $id_Owner;
    public int $id_Image;
    public string $image_path;

    public function __construct(int $id_Restaurant, string $name, int $id_category, int $id_Address, int $id_Owner, int $id_Image, string $image_path)
    {
      $this->id_Restaurant = $id_Restaurant;
      $this->name = $name;
      $this->id_category = $id_category;
      $this->id_Address = $id_Address;
      $this->id_Owner = $id_Owner;
      $this->id_Image = $id_Image;
      $this->image_path =$image_path;
    }

    static function save_newRestaurant(PDO $db, $name, $id_category,  $id_Address,  $id_Owner, $id_Image, $image_path) {
      $stmt = $db->prepare('INSERT INTO Restaurant (name, id_category, id_Address, id_Owner, id_Image, image_path) 
                            VALUES (?,?,?,?,?,?)');

      $stmt->execute(array($name, $id_category, $id_Address, $id_Owner, $id_Image, $image_path));

    }

    static function save_editRestaurant($db) {
      $stmt = $db->prepare('UPDATE Restaurant SET name = ?, id_category = ?, id_Address = ?, id_Image = ?, image_path = ?
                            WHERE id_Restaurant = ?');

      $stmt->execute(array($this->name, $this->id_category, $this->id_Address, $this->id_Image,$this->image_path));
    }

    function getRestaurant_Category(){
      return $this->id_category;
    }

    function getResName(){
      return $this->name;
    }

    
    function getAddress_ID(){
      return $this->id_Address;
    }

    static function getRestaurants(PDO $db, int $id_cat) : array {
        $stmt = $db->prepare('SELECT id_Restaurant, name, id_category, id_Address, id_Owner, id_Image, image as image_path
                              FROM Restaurant JOIN Image using (id_image)
                              WHERE id_Category= ?');
        $stmt->execute(array($id_cat));
        

        
    
        $restaurants = array();
        while ($restaurant = $stmt->fetch()) {
          $restaurants[] = new Restaurant(
            (int)$restaurant['id_Restaurant'],
            (string)$restaurant['name'],
            (int)$restaurant['id_category'],
            (int)$restaurant['id_Address'],
            (int)$restaurant['id_Owner'],
            (int)$restaurant['id_Image'],
            (string)$restaurant['image_path']
            
          );
        }
    
        return $restaurants;
      }
  
      static function getRestaurant(PDO $db, int $id_Rest) : Restaurant {
        $stmt = $db->prepare('SELECT id_Restaurant, name, id_category, id_Address, id_Owner, id_Image, image as image_path
                              FROM Restaurant JOIN Image using (id_image)
                              WHERE id_Restaurant = ?');
        $stmt->execute(array($id_Rest));
    
        $restaurant = $stmt->fetch();
    
        return new Restaurant(
            (int)$restaurant['id_Restaurant'],
            (string)$restaurant['name'],
            (int)$restaurant['id_category'],
            (int)$restaurant['id_Address'],
            (int)$restaurant['id_Owner'],
            (int)$restaurant['id_Image'],
            (string)$restaurant['image_path']
        );
      }  
    }

  
?>