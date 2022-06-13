<?php
  declare(strict_types = 1);

  class Order {
    public int $id_Order;
    public float $price;
    public string $description;
    public int $id_Restaurant;
    public int $id_User;

    public function __construct(int $id_Order, float $price, string $description, int $id_Restaurant, int $id_User)
    {
      $this->id_Order = $id_Order;
      $this->price = $price;
      $this->description = $description;
      $this->id_Restaurant = $id_Restaurant;
      $this->id_User = $id_User;
    }

    /*static function getRestaurantOrders(PDO $db, int $id_Restaurant) : Order {}*/
      
}

  
?>