<?php
  declare(strict_types = 1);

  class Review {
    public int $id_Order;
    public int $id_User;
    public string $date; /*incorrect type for date*/
    public string $comment;
    public int $score;

    public function __construct(int $id_Order, int $id_User, string $date, string $comment, int $score)
    {
      $this->id_Order = $id_Order;
      $this->id_User = $id_User;
      $this->date = $date;
      $this->comment = $comment;
      $this->score = $score;
    }

    /*static function getReviewFromIDOrder(PDO $db, int $id_Order) : Order {}*/
    static function getReviewFromRes(PDO $db, int $id_dish) : Dish {
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
      
}

  
?>