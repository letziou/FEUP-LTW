<?php declare(strict_types = 1);?>

<?php function drawAddOnDish(string $restaurantName, int $id_Restaurant) { ?>
  <<div class="addOnbox">

<h1> Add dish to <?=$restaurantName?> </h1>
<form action="/actions/action_createDish.php" method="post" enctype="multipart/form-data">
  <input id="name" type="name" name="name" placeholder="Name of Dish" />
  <input id="price" type="price" name="price" placeholder="Price of Dish" />
  <input id="description" type="description" name="description" placeholder="Description of Dish" />
    <label>Upload Image:
    <input type="file" name="image">
    </label>
    <input type="hidden" id="id_Restaurant" type="id_Restaurant" name="id_Restaurant" value=<?=$id_Restaurant?>/>
    <span id=buttons>
    <button class="addOn_button" input type= "submit"> Add</button>
  </span> 
  </form>
</div> 
<?php } ?>


<?php function drawAddOnRestaurant() { ?>
  <div class="addOnbox">

    <h1> Add Restaurant</h1>
    <form action="/actions/action_createRestaurant.php" method="post" class="addOn" enctype="multipart/form-data">
    <div class="form-content">
      <input id="name" type="name" name="name" placeholder="Name of restaurant" />
      <select name="category">
        <option value="1" selected>Fast-Food</option>
        <option value="2">Casual Dining</option>
        <option value="3">Healthy</option>
        <option value="4">Desert</option>
      </select>
      <input id="street" type="street" name="street" placeholder="Street of restaurant" />
      <input id="city" type="city" name="city" placeholder="City of restaurant" />
      <input id="postalCode" type="postalCode" name="postalCode" placeholder="Postal code of restaurant" />
      <label>Upload Image:
        <input type="file" name="image">
      </label>
      <span id=buttons>
        <button class="addOn_button" input type= "submit"> Add</button>
      </span> 
      </form> 
      </div>
      
  </div> 
<?php } ?>