<?php declare(strict_types = 1); 
  require_once('util/session.php');?>

<?php function drawSignInBox(Session $session) { ?>

    <?php 
        if ($session->isLoggedIn()) drawLogoutBox($session);
        else drawLoginBox($session);
      ?>
<?php } ?>

<?php function drawLoginBox(Session $session) { ?>
    <div class="signinbox">

      <h1> Sign in </h1>
      <form action="/actions/action_login.php" id="formlog" method="post" class="login">
      <div class="form-content">
        <input id="username" type="username" name="username" placeholder="email" />
        <input id="password" type="password" name="password" placeholder="password" />
        </form> 
        </div>
        <span id=buttons>
          <button class="login_button" form="formlog"> Login</button>
          </br>
          <a href="register.php">
          <button class="registerbutton">Register</button>
          </a>
        </span> 
    </div> 

<?php } ?>

<!-- FOR TESTING PURPOSES. TODO:IMPROVE-->
<?php function drawLogoutBox(Session $session) { ?>
    <div class="signinbox">
      <h1> Sign OUT </h1>
          <a href="/actions/action_logout.php">
            <button class="signoutbutton">SIGNOUT</button>
          </a>
    </div> 

<?php } ?>