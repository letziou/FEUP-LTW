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
      
}

  
?>