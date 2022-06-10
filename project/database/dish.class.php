<?php
  declare(strict_types = 1);

  class Dish {
    public int $id_dish;
    public string $name;
    public float $price;
    public string $description;
    public int $id_Restaurant;
    public int $id_Image;
    public string $image_path;

    public function __construct(int $id_dish, string $name, float $price, string $description, int $id_Restaurant, int $id_Image, string $image_path)
    {
      $this->id_dish = $id_dish;
      $this->name = $name;
      $this->price = $price;
      $this->description = $description;
      $this->id_Restaurant = $id_Restaurant;
      $this->id_Image = $id_Image;
      $this->image_path =$image_path;
    }

    static function save_newDish(PDO $db, $name, $price,  $description,  $id_Restaurant, $id_Image, $image_path) {
      $stmt = $db->prepare('INSERT INTO Dish (name, price, description, id_Restaurant, id_Image, image_path) 
                            VALUES (?,?,?,?,?,?)');

      $stmt->execute(array($name, $id_category, $id_Address, $id_Owner, $id_Image, $image_path));

    }

    static function save_editDish($db) {
      $stmt = $db->prepare('UPDATE Dish SET name = ?, price = ?, description =?, id_Restaurant = ?, id_Image = ?, image_path = ?
                            WHERE id_Dish = ?');

      $stmt->execute(array($this->name, $this->price, $this->description, $this->id_Restaurant, $this->id_Image, $this->image_path));
    }
    
    
    static function getDish(PDO $db, int $id_dish) : Dish {
      $stmt = $db->prepare('SELECT id_dish, name, price, description, id_Restaurant, id_Image, image as image_path
      FROM Dish JOIN Image using (id_image)
      WHERE id_Dish= ?');
      $stmt->execute(array($id));
  
      $dish = $stmt->fetch();
  
      return new Dish(
        (int)$dish['id_dish'],
        (string)$dish['name'],
        (float)$dish['price'],
        (string)$dish['description'],
        (int)$dish['id_Restaurant'],
        (int)$dish['id_Image'],
        (string)$dish['image_path']
      );
    }  

    static function getDishes(PDO $db, int $id_rest) : array {
        $stmt = $db->prepare('SELECT id_dish, name, price, description, id_Restaurant, id_Image, image as image_path
          FROM Dish JOIN Image using (id_image)
          WHERE id_Restaurant= ?');
        $stmt->execute(array($id_rest));
        
        $dishes = array();
        while ($dish = $stmt->fetch()) {
          $dishes[] = new Dish(
            (int)$dish['id_dish'],
            (string)$dish['name'],
            (float)$dish['price'],
            (string)$dish['description'],
            (int)$dish['id_Restaurant'],
            (int)$dish['id_Image'],
            (string)$dish['image_path']
            
          );
        }
    
        return $dishes;
      }
    }

  
?>