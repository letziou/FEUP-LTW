<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Hasburgui</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="css/index_style.css" rel="stylesheet">
    <link href="css/index_layout.css" rel="stylesheet">
  </head>
  <body>
  <header>
        <div id="logo">
        <img src="images/hasburgi.png" alt="">
        </div>
      <div id="signup">
        <a href="login.php">
        <button class="button">Signup</button>
        </a>
      </div>
    </header>
    <div id="searchbar">
        <input type="text" placeholder="Search Food" class="searchbar">
      </div>
      
      <section id="foodsections">
      <article>
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

    <footer>
      <p>&copy; Hasburgui Industries, 2022</p>
    </footer>
  </body>
</html>
