<?php declare(strict_types = 1); ?>

<?php function drawHeaderIndex() { ?>
  <!DOCTYPE html>
  <html lang="en-US">
    <head>
      <title>Hasburgui</title>    
      <meta charset="UTF-8">
      <link href="css/index_style.css" rel="stylesheet">
      <link href="css/index_layout.css" rel="stylesheet">
    </head>
    <body>
    <header>
      <div id="logo">
      <a href="index.php">
        <p>Hasburgi</p>
      </a>
      </div>
      <div id="signup">
        <button class="button">Signup</button>
      </div>
    </header>
    <div id="searchbar">
        <input type="text" placeholder="Search Food" class="searchbar">
    </div>
<?php } ?>

<?php function drawHeaderCasual() { ?>
  <!DOCTYPE html>
  <html lang="en-US">
    <head>
      <title>Hasburgui</title>    
      <meta charset="UTF-8">
      <link href="css/casual_style.css" rel="stylesheet">
      <link href="css/page_layout.css" rel="stylesheet">
    </head>
    <body>
    <header>
      <div id="logo">
      <a href="index.php">
        <p>Hasburgi</p>
      </a>
      </div>
      <div id="signup">
        <button class="button">Signup</button>
      </div>
    </header>
    <div id="searchbar">
        <input type="text" placeholder="Search Food" class="searchbar">
    </div>
<?php } ?>

<?php function drawHeaderDessert() { ?>
  <!DOCTYPE html>
  <html lang="en-US">
    <head>
      <title>Hasburgui</title>    
      <meta charset="UTF-8">
      <link href="css/dessert_style.css" rel="stylesheet">
      <link href="css/page_layout.css" rel="stylesheet">
    </head>
    <body>
    <header>
      <div id="logo">
      <a href="index.php">
        <p>Hasburgi</p>
      </a>
      </div>
      <div id="signup">
        <button class="button">Signup</button>
      </div>
    </header>
    <div id="searchbar">
        <input type="text" placeholder="Search Food" class="searchbar">
    </div>
<?php } ?>

<?php function drawHeaderFastfood() { ?>
  <!DOCTYPE html>
  <html lang="en-US">
    <head>
      <title>Hasburgui</title>    
      <meta charset="UTF-8">
      <link href="css/fastfood_style.css" rel="stylesheet">
      <link href="css/page_layout.css" rel="stylesheet">
    </head>
    <body>
    <header>
      <div id="logo">
      <a href="index.php">
        <p>Hasburgi</p>
      </a>
      </div>
      <div id="signup">
        <button class="button">Signup</button>
      </div>
    </header>
    <div id="searchbar">
        <input type="text" placeholder="Search Food" class="searchbar">
    </div>
<?php } ?>

<?php function drawHeaderHealthy() { ?>
  <!DOCTYPE html>
  <html lang="en-US">
    <head>
      <title>Hasburgui</title>    
      <meta charset="UTF-8">
      <link href="css/healthy_style.css" rel="stylesheet">
      <link href="css/page_layout.css" rel="stylesheet">
    </head>
    <body>
    <header>
      <div id="logo">
      <a href="index.php">
        <p>Hasburgi</p>
      </a>
      </div>
      <div id="signup">
        <button class="button">Signup</button>
      </div>
    </header>
    <div id="searchbar">
        <input type="text" placeholder="Search Food" class="searchbar">
    </div>
<?php } ?>

<?php function drawFooter() { ?>
  <footer>
      <p>&copy; Hasburgui Industries, 2022</p>
  </footer>
  </body>
  </html>
<?php } ?>