<?php
  declare(strict_types = 1);

  class Dish {
    public int $id_Dish;
    public string $name;
    public float $price;
    public string $description;
    public int $id_Restaurant;
    public int $id_Image;
    public string $image_path;

    public function __construct(int $id_Dish, string $name, float $price, string $description, int $id_Restaurant, int $id_Image, string $image_path)
    {
      $this->id_Dish = $id_Dish;
      $this->name = $name;
      $this->price = $price;
      $this->description = $description;
      $this->id_Restaurant = $id_Restaurant;
      $this->id_Image = $id_Image;
      $this->image_path =$image_path;
    }

    static function getId(Dish $dish) {
      return $dish->id_Dish;
    }

    static function save_newDish(PDO $db, string $name, float $price, string $description, int $id_Restaurant, int $id_Image) {
      $stmt = $db->prepare('INSERT INTO Dish (name, price, description, id_Restaurant, id_Image) 
                            VALUES (?,?,?,?,?)');

      $stmt->execute(array($name, $price, $description, $id_Restaurant, $id_Image));

    }

    static function save_editDish(PDO $db) {
      $stmt = $db->prepare('UPDATE Dish SET name = ?, price = ?, description =?, id_Restaurant = ?, id_Image = ?
                            WHERE id_Dish = ?');

      $stmt->execute(array($this->name, $this->price, $this->description, $this->id_Restaurant, $this->id_Image));
    }
    
    
    static function getDish(PDO $db, int $id_Dish) : Dish {
      $stmt = $db->prepare('SELECT id_Dish, name, price, description, id_Restaurant, id_Image, image as image_path
      FROM Dish JOIN Image using (id_image)
      WHERE id_Dish= ?');
      $stmt->execute(array($id_Dish));
  
      $dish = $stmt->fetch();
  
      return new Dish(
        (int)$dish['id_Dish'],
        (string)$dish['name'],
        (float)$dish['price'],
        (string)$dish['description'],
        (int)$dish['id_Restaurant'],
        (int)$dish['id_Image'],
        (string)$dish['image_path']
      );
    }  

    static function getDishes(PDO $db, int $id_rest) : array {
        $stmt = $db->prepare('SELECT id_Dish, name, price, description, id_Restaurant, id_Image, image as image_path
          FROM Dish JOIN Image using (id_image)
          WHERE id_Restaurant= ?');
        $stmt->execute(array($id_rest));
        
        $dishes = array();
        while ($dish = $stmt->fetch()) {
          $dishes[] = new Dish(
            (int)$dish['id_Dish'],
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