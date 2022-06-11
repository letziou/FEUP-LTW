<?php
  declare(strict_types = 1);

  class Review {
    public int $id_Order;
    public int $id_User;
    public int $id_Restaurant;
    public string $date; /*incorrect type for date*/
    public string $comment;
    public int $score;

    public function __construct(int $id_Order, int $id_User, int $id_Restaurant, string $date, string $comment, int $score)
    {
      $this->id_Order = $id_Order;
      $this->id_User = $id_User;
      $this->id_Restaurant = $id_Restaurant;
      $this->date = $date;
      $this->comment = $comment;
      $this->score = $score;
    }

    /*static function getReviewFromIDOrder(PDO $db, int $id_Order) : Order {}*/
    static function getReviewFromRes(PDO $db, int $id_Order) : Review {
      $stmt = $db->prepare('SELECT id_order, id_User, id_Restaurant, published, text, score
      FROM Review
      WHERE id_Order= ?');
      $stmt->execute(array($id));
  
      $review = $stmt->fetch();
  
      return new Review(
        (int)$review['id_order'],
        (int)$review['id_User'],
        (int)$review['id_Restaurant'],
        (string)$review['published'],
        (string)$review['text'],
        (int)$review['score']
      );
    }

    static function getReviewsFromRes(PDO $db, int $id_rest) : array {
      $stmt = $db->prepare('SELECT id_order, id_User, id_Restaurant, published, text, score
      FROM Review
      WHERE id_Restaurant= ?');
      $stmt->execute(array($id_rest));
      
      $reviews = array();
      while ($review = $stmt->fetch()) {
        $reviews[] = new Review(
          (int)$review['id_order'],
          (int)$review['id_User'],
          (int)$review['id_Restaurant'],
          (string)$review['published'],
          (string)$review['text'],
          (int)$review['score']
        );
      }
  
      return $reviews;
    }
      
}

  
?>