<?php declare(strict_types = 1); 
      require_once('database/restaurant.class.php');
      require_once('database/dish.class.php');
?>

<?php function drawAddDish(int $id_Category, int $id_Restaurant, string $restaurantName) { ?>
    <li>
      <a href="addDish.php?cat=<?=$id_Category?>&id=<?=$id_Restaurant?>&name=<?=$restaurantName?>">
      <p class="add">Add new Dish</p>
      <i class="fa-regular fa-circle-plus"></i>
      </a>
    </li>
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
          <button onclick="addToCart(['<?=$dish->image_path?>','<?=$dish->name?>',<?=$dish->price?>,<?=$dish->id_Dish?>])"  class="add-button" data-title="<?=$dish->description?>" data-price="<?=$dish->price?>">
            Add to Cart
          </button>  
        </li>  
    <?php } 
      if($restaurant->id_Owner == $session->getId_User()) 
      drawAddDish($restaurant->id_category, $restaurant->id_Restaurant, $restaurant->name);?>
    </ul> 
    <div id="#clean" class="screen-cart">
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
      <button onclick="purchaseSession()" class="add-prch"> PURCHASE </button>
    </div>
  </div> 
  </section>
  <script type="text/javascript">
    
    function purchaseSession() {

      
      let cart = document.getElementById("#clean")
      let meter = document.createElement("div");
      let title = document.createElement("p");
      let s_time = document.createElement("p");
      let time = document.createElement("p");      
      let request = document.createElement("p");
      cart.innerHTML = ""

      title.className = "title"
      meter.className = "meter"
      s_time.className = "s_time"
      time.className = "time"
      request.className = "request"
      title.innerHTML = "Confirming your order..."
      s_time.innerHTML = "Arrival time:"
      time.innerHTML = "9:33PM"
      request.innerHTML = "Thank you so much for your choice! "

      cart.appendChild(meter)
      cart.appendChild(title)
      cart.appendChild(s_time)
      cart.appendChild(time)
      cart.appendChild(request)
    }
  </script>
<?php } ?>
