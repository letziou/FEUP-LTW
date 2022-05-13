<?php declare(strict_types = 1); ?>

<?php function drawRestaurants(array $restaurants) { ?>
  <h2>Restaurants :</h2>
  <section id="restaurantsections">
    <?php foreach($restaurants as $restaurant) { ?> 
      <article>
      <a href="restaurant.php">
          <img src="https://picsum.photos/418/190">
          <p><?=$restaurant['name']?></p>
      </a>
      </article>
    <?php } ?>
  </section>
<?php } ?>

<?php function drawRestaurant(string $restaurantName, array $dishes) { ?>
  <h2><?=$restaurantName?></h2>
  <section id="dishsection">
    <?php foreach ($dishes as $dish) { ?>
      <article>
        <a href="restaurant.php?id=1">
        <img src="https://picsum.photos/418/190"> 
        <p><?=$dish['name']?> price : <?=$dish['price']?></p> 
        </a>
        <p><?=$dish['description']?></p>
        </article>
    <?php } ?>
  </section>
<?php } ?>