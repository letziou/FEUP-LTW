<?php declare(strict_types = 1); 
      require_once('database/restaurant.class.php');
      require_once('database/dish.class.php');
?>

<?php function drawRestaurants(array $restaurants) { ?>
  <h2>Restaurants :</h2>
  <section id="restaurantsections">
    <?php foreach($restaurants as $restaurant) { ?> 
      <article>
      <a href="restaurant.php?id=<?=$restaurant->id_Restaurant?>&name=<?=$restaurant->name?>">
          <img src="images/<?=$restaurant->image_path?>">
          <p><?=$restaurant->name?></p>
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
        <img src="images/Food_images/<?=$dish->image_path?>"> 
        <p><?=$dish->name?> price : <?=$dish->price?></p> 
        </a>
        <p><?=$dish->description?></p>
        </article>
    <?php } ?>
  </section>
<?php } ?>