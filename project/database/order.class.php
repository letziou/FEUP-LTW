<?php
  declare(strict_types = 1);

  class OOrder {
    public int $id_Order;
    public float $price;
    public string $description;
    public string $order_status;
    public int $id_Restaurant;
    public int $id_User;
    public string $restaurant_name;

    public function __construct(int $id_Order, float $price, string $description, string $order_status, int $id_Restaurant, int $id_User, string $restaurant_name)
    {
      $this->id_Order = $id_Order;
      $this->price = $price;
      $this->description = $description;
      $this->order_status = $order_status;
      $this->id_Restaurant = $id_Restaurant;
      $this->id_User = $id_User;
      $this->restaurant_name = $restaurant_name;
    }

    static function change_status(PDO $db) {
      $stmt = $db->prepare('UPDATE OOrder SET order_status = ?
                            WHERE id_Order = ?');

      $stmt->execute(array($this->order_status, $this->id_Order));
    }

    static function save_newOrder(PDO $db, float $price, string $description, string $order_status, int $id_Restaurant, int $id_User) {
      $stmt = $db->prepare('INSERT INTO OOrder (price, description, order_status, id_Restaurant, id_User) 
                            VALUES (?,?,?,?,?)');

      $stmt->execute(array($price, $description, $order_status, $id_Restaurant, $id_User));

    }

    static function getOrdersFromUser(PDO $db, int $id_User) : array {
      $stmt = $db->prepare('SELECT id_Order, price, description, order_status, id_Restaurant, id_User, name as restaurant_name
                            FROM OOrder JOIN Restaurant using (id_Restaurant)
                            WHERE id_User= ?');
      $stmt->execute(array($id_User));      
  
      $orders = array();
      while ($order = $stmt->fetch()) {
        $orders[] = new OOrder(
          (int)$order['id_Order'],
          (float)$order['price'],
          (string)$order['description'],
          (string)$order['order_status'],
          (int)$order['id_Restaurant'],
          (int)$order['id_User'],
          (string)$order['restaurant_name']
        );
      }
  
      return $orders;
    
    }

  

    static function getOrdersFromRestaurant(PDO $db, int $id_Restaurant) : array {
        $stmt = $db->prepare('SELECT id_Order, price, description, order_status, id_Restaurant, id_User, name as restaurant_name 
                              FROM Order JOIN Restaurant using (id_Restaurant)
                              WHERE id_Restaurant= ?');
        $stmt->execute(array($id_Restaurant));      
    
        $orders = array();
        while ($order = $stmt->fetch()) {
          $orders[] = new OOrder(
            (int)$order['id_Order'],
            (float)$order['price'],
            (string)$order['description'],
            (string)$order['order_status'],
            (int)$order['id_Restaurant'],
            (int)$order['id_User'],
            (string)$order['restaurant_name']
          );
        }
    
        return $orders;
      
      }

    }
  
?>