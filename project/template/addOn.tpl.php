<?php declare(strict_types = 1);?>


<?php function drawAddOnDish(string $restaurantName, int $id_Restaurant) { ?>
  <<div class="addOnbox">

    <h1> Add dish to <?=$restaurantName?> </h1>
    <form action="/actions/action_createDish.php" id="formlog" method="post" class="addOn" enctype="multipart/form-data>
    <div class="form-content">
      <input id="name" type="name" name="name" placeholder="Name of Dish" />
      <input id="price" type="price" name="price" placeholder="Price of Dish" />
      <input id="description" type="description" name="description" placeholder="Description of Dish" />        
      <label>Upload Image:
        <input type="file" name="image" >
      </label>
      <input type="hidden" id="id_Restaurant" type="id_Restaurant" name="id_Restaurant" value=<?=$id_Restaurant?>  />
      </form> 
      </div>
      <span id=buttons>
        <button class="addOn_button" form="formlog"> Add</button>
      </span> 
  </div> 
<?php } ?>


<?php function drawAddOnRestaurant() { ?>
  <<div class="addOnbox">

    <h1> Add Restaurant</h1>
    <form action="/actions/action_createRestaurant.php" id="formlog" method="post" class="addOn">
    <div class="form-content">
      <input id="name" type="name" name="name" placeholder="Name of restaurant" />
      <input id="category" type="category" name="category" placeholder="Category of restaurant" />
      <input id="street" type="street" name="street" placeholder="Street of restaurant" />
      <input id="city" type="city" name="city" placeholder="City of restaurant" />
      <input id="postalcode" type="postalcode" name="postalcode" placeholder="Postal code of restaurant" />
      <input id="type" type="type" name="type" placeholder="Type of picture of Dish" />
      <input id="image" type="image" name="image" placeholder="File of Dish image" />
      </form> 
      </div>
      <span id=buttons>
        <button class="addOn_button" form="formlog"> Add</button>
      </span> 
  </div> 
<?php } ?>