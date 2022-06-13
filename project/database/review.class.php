<?php
  declare(strict_types = 1);

  class Review {
    public int $id_Review;
    public int $id_User;
    public int $id_Restaurant;
    public string $published; /*incorrect type for date*/
    public string $text;
    public int $score;
    public string $fname;
    public string $lname;

    public function __construct(int $id_Review, int $id_User, int $id_Restaurant, string $published, string $text, int $score, string $fname, string $lname)
    {
      $this->id_Review = $id_Review;
      $this->id_User = $id_User;
      $this->id_Restaurant = $id_Restaurant;
      $this->published = $published;
      $this->text = $text;
      $this->score = $score;
      $this->fname = $fname;
      $this->lname = $lname;
    }

    static function save_newReview(PDO $db, int $id_User, int $id_Restaurant, string $published, string $text, int $score) {
      $stmt = $db->prepare('INSERT INTO Review (id_User, id_Restaurant, published, text, score) 
                            VALUES (?,?,?,?,?)');

      $stmt->execute(array($id_User, $id_Restaurant,  $published, $text, $score));

    }

    static function getReview(PDO $db, int $id_Review) : Review {
      $stmt = $db->prepare('SELECT id_Review, id_User, id_Restaurant, published, text, score, fname, lname
      FROM Review JOIN User using (id_User)
      WHERE id_Review= ?');
      $stmt->execute(array($id_Review));
  
      $review = $stmt->fetch();
  
      return new Review(
        (int)$review['id_Review'],
        (int)$review['id_User'],
        (int)$review['id_Restaurant'],
        (string)$review['published'],
        (string)$review['text'],
        (int)$review['score'],
        (string)$review['fname'],
        (string)$review['lname']
      );
    }

    static function getReviewsFromRes(PDO $db, int $id_rest) : array {
      $stmt = $db->prepare('SELECT id_Review, id_User, id_Restaurant, published, text, score, fname, lname
      FROM Review JOIN User using (id_User)
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
          (int)$review['score'],
          (string)$review['fname'],
          (string)$review['lname']
        );
      }
  
      return $reviews;
    }
      
}

  
?>