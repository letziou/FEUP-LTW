<?php declare(strict_types = 1);

require_once('util/session.php');
require_once('template/common.tpl.php');
$session = new Session();

drawHeaderCart($session);
?>
  <div class="screen-cart">
    <h2>Your Cart</h2>
    <ul class="cart-items">
    </ul>
    
    <div class="cart-math">
      <p>Add items to cart</p>
    </div>
  </div>
<?php drawFooter() ?>