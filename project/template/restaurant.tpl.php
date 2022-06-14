<?php declare(strict_types = 1); 
      require_once('database/restaurant.class.php');
      require_once('database/dish.class.php');
?>

<?php function drawAddDish(int $id_Category, int $id_Restaurant, string $restaurantName) { ?>
    <li class="menu-item">
      <a href="addDish.php?cat=<?=$id_Category?>&id=<?=$id_Restaurant?>&name=<?=$restaurantName?>"  id="flexy">
      <span style="margin-top: 11px; padding: 0.5em;"><i class="fa-solid fa-plus"></i></span>
      <p class="menu-item-add">Add new Dish</p>
      </a>
    </li>
<?php } ?>

<?php function drawAddtoCart(dish $dish) { ?>
  <button onclick="addToCart(['<?=$dish->image_path?>','<?=$dish->name?>',<?=$dish->price?>])"  class="add-button" data-title="<?=$dish->description?>" data-price="<?=$dish->price?>">
            Add to Cart
          </button>
<?php } ?>

<?php function drawCart() { ?>
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
<?php } ?>

<?php function drawRestaurants(array $restaurants) { ?>
  <h2>Restaurants :</h2>
  <section id="restaurantsections">
    <?php foreach($restaurants as $restaurant) { ?> 
      <article>
      <a href="restaurant.php?cat=<?=$restaurant->id_category?>&id=<?=$restaurant->id_Restaurant?>&name=<?=$restaurant->name?>">
          <img src="images/Rest_Logos/<?=$restaurant->image_path?>">
          <p><?=$restaurant->name?></p>
      </a>
      </article>
    <?php } ?>
  </section>
<?php } ?>

<?php function drawRestaurantsFromOwner(array $restaurants, int $id_Owner) { ?>
  <section id="restaurantsOwnedsections">
    <h2>Your Restaurants :</h2>
    <?php foreach($restaurants as $restaurant) { ?> 
      <article>
      <a href="restaurant.php?cat=<?=$restaurant->id_category?>&id=<?=$restaurant->id_Restaurant?>&name=<?=$restaurant->name?>">
          <p><?=$restaurant->name?></p>
      </a>
      </article>
    <?php } ?>
    <div id="addRestaurant">
      <a href="addRestaurant.php?id=<?=$id_Owner?>">
      <span style="margin-top: 8px; padding: 0.5em;"><i class="fa-solid fa-plus"></i></span>
      <p class="add">Add new Restaurant</p>
      </a>
    </div>
  </section>
<?php } ?>

<?php function drawRestaurant(Session $session, array $dishes, Restaurant $restaurant) { ?>
  <h2><?=$restaurant->name?></h2>
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
          <?php if($restaurant->id_Owner != $session->getId_User())
            drawAddtoCart($dish); ?>  
        </li>  
    <?php } 
      if($restaurant->id_Owner == $session->getId_User()) 
      drawAddDish($restaurant->id_category, $restaurant->id_Restaurant, $restaurant->name);?>
    </ul> 
    <?php if($restaurant->id_Owner != $session->getId_User())
            drawCart(); ?>
  </div> 
  </section>
<?php } ?>
