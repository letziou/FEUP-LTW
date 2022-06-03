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
  <section id="dish-container">
    <ul class="menu-items">
      <?php foreach ($dishes as $dish) { ?>
        <li class="menu-item">
          <img src="images/Food_images/<?=$dish->image_path?>"> 
          <div class="menu-item-dets">
            <p class="menu-item-heading"><?=$dish->name?></p>
            <p class="g-price"><?=$dish->price?>€</p> 
            <p class="menu-item-decription"><?=$dish->description?></p>        
          </div>
          <button onclick="addToCart(['<?=$dish->image_path?>','<?=$dish->name?>',<?=$dish->price?>])"  class="add-button" data-title="<?=$dish->description?>" data-price="<?=$dish->price?>">
            Add to Cart
          </button>  
        </li>  
    <?php } ?>
    </ul> 
    <div id="#cart_"class="screen-cart">
    <h2>Your Cart</h2>
    <ul class="cart-items">
    </ul>
    </div>
  </div> 
  </section>
<?php } ?>