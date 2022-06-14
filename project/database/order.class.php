<?php
  declare(strict_types = 1);

  class Order {
    public int $id_Order;
    public float $price;
    public string $description;
    public string $order_status;
    public int $id_Restaurant;
    public int $id_User;

    public function __construct(int $id_Order, float $price, string $description, string $order_status ,int $id_Restaurant, int $id_User)
    {
      $this->id_Order = $id_Order;
      $this->price = $price;
      $this->description = $description;
      $this->order_status = $order_status;
      $this->id_Restaurant = $id_Restaurant;
      $this->id_User = $id_User;
    }

    static function save_newOrder(PDO $db, float $price, string $description, string $order_status, int $id_Restaurant, int $id_User) {
      $stmt = $db->prepare('INSERT INTO Order (price, description, order_status, id_Restaurant, id_User) 
                            VALUES (?,?,?,?,?)');

      $stmt->execute(array($price, $description, $order_status, $id_Restaurant, $id_User));

    }

    static function getOrdersFromRestaurant(PDO $db, int $id_Restaurant) : array {
        $stmt = $db->prepare('SELECT id_Order, price, description, order_status, id_Restaurant, id_User
                              FROM Order 
                              WHERE id_Restaurant= ?');
        $stmt->execute(array($id_Restaurant));      
    
        $orders = array();
        while ($order = $stmt->fetch()) {
          $orders[] = new Order(
            (int)$order['id_Order'],
            (float)$order['price'],
            (string)$order['description'],
            (string)$order['order_status'],
            (int)$order['id_Restaurant'],
            (int)$order['id_User']
            
          );
        }
    
        return $orders;
      
      }

    }
  
?>