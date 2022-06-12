<?php declare(strict_types = 1);

require_once('util/session.php');
require_once('template/common.tpl.php');
$session = new Session();

drawHeaderIndex($session);
?>

      <section id="foodsections">
      <article class="container">
        <a href="restaurant_category.php?id=1">
        <img src="images/fast.png" alt="">
        <p> Fast Food </p>
      </a>
      </article>

      <article>
        <a href="restaurant_category.php?id=2">
        <img src="images/casual.png" alt="">
        <p> Casual Dining</p>
        </a>
    </article>
      <article>
      <a href="restaurant_category.php?id=3">
        <img src="images/healthy.png" alt="">
        <p> Healthy</p>
      </a>
      </article>
      <article>
        <a href="restaurant_category.php?id=4">
        <img src="images/desserts.png" alt="">
        <p> Desserts</p>
        </a>
      </article>
    </section>
<?php drawFooter() ?>