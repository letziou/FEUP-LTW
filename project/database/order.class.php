<?php
  declare(strict_types = 1);

  class Order {
    public int $id_Order;
    public float $price;
    public string $description;
    public int $id_Restaurant;

    public function __construct(int $id_Order, float $price, string $description, int $id_Restaurant)
    {
      $this->id_Order = $id_Order;
      $this->price = $price;
      $this->description = $description;
      $this->id_Restaurant = $id_Restaurant;
    }

    /*static function getRestaurantOrders(PDO $db, int $id_Restaurant) : Order {}*/
      
}

  
?>