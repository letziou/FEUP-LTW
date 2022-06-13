<?php declare(strict_types = 1); 
      require_once('database/restaurant.class.php');
      require_once('database/dish.class.php');
?>

<?php function drawRestaurants(array $restaurants) { ?>
  <h2>Restaurants :</h2>
  <section id="restaurantsections">
    <?php foreach($restaurants as $restaurant) { ?> 
      <article>
      <a href="restaurant.php?cat=<?=$restaurant->id_category?>&id=<?=$restaurant->id_Restaurant?>&name=<?=$restaurant->name?>">
          <img src="images/<?=$restaurant->image_path?>">
          <p><?=$restaurant->name?></p>
      </a>
      </article>
    <?php } ?>
  </section>
<?php } ?>

<?php function drawRestaurant(string $restaurantName, array $dishes, int $id_Category, int $id_Restaurant) { ?>
  <h2><?=$restaurantName?></h2>
  <section id="dish-container">
    <ul class="menu-items">
      <?php foreach ($dishes as $dish) { ?>
        <li class="menu-item">
          <img src="images/Food_images/<?=$dish->image_path?>" id="myImage"> 
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
    <li>
      <a href="addDish.php?cat=<?=$id_Category?>&id=<?=$id_Restaurant?>&name=<?=$restaurantName?>">
      <p class="add">Add new Dish</p>
      <i class="fa-regular fa-circle-plus"></i>
    </a>
    </li>
    </ul> 
    <div class="screen-cart">
    <h2>Your Cart</h2>
    <ul id="#cart_" class="cart-items">
    </ul>
    <div id="#cart_m" class="cart-math" style="padding-top: 20px;">
      <p class="cart-math-item">
        <span class="cart-math-header">Subtotal:</span>
        <span id="#subtotal_tax" class="g-price subtotal"></span>
      </p>
      <p class="cart-math-item">
        <span class="cart-math-header">Tax:</span>
        <span id="#total_tax" class="g-price tax"></span>
      </p>
      <p class="cart-math-item">
        <span class="cart-math-header">Total:</span>
        <span id="#total" class="g-price total"></span>
      </p>
    </div>
    </div>
  </div> 
  </section>
<?php } ?>