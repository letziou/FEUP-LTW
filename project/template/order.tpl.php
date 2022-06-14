<?php declare(strict_types = 1); 
      require_once('database/review.class.php');
      require_once('util/session.php');
?>

<?php function drawOrders(Session $session, array $orders) { ?>
  <h2>Your Orders</h2>
  <section id="order-container">
      <?php foreach ($orders as $order) { ?>
        <article class="order">
          <span class="restaurant_name"><?=$order->restaurant_name?>
          <span class="description"><?=$order->description?></span>
          <span class="price"><?=$order->price?></span>
          <span class="order_status"><?=$order->order_status?></span>       
      </article>  
    <?php } ?> 
  </section>
  <?php } ?>