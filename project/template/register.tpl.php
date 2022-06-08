<?php declare(strict_types = 1); 
  require_once('util/session.php');?>

<?php function drawRegisterBox(Session $session) { ?> 
<div id="loginbox">
  <h2> Register </h2>
    <form action="/actions/action_register.php" id="formreg" method="post" class="register">
      <input id="fname" type="text" name="fname" placeholder="First Name">
        <br>
      <input id="lname" type="text" name="lname" placeholder="Last Name">
        <br>
      <input id="email" type="text" name="email" placeholder="e-mail">
        <br>
      <input id="password" type="password" name="password" placeholder="Password">
        <br>
      <input id="confirm_password" type="confirm_password" name="confirm_password" placeholder="Confirm Password">
        <br>
      <input  id="street" type="text" name="street" placeholder="Street">
        <br>
      <input  id="city" type="text" name="city" placeholder="City">
        <br>
      <input  id="postalCode" type="text" name="postalCode" placeholder="Postal Code">
        <br>
      <input id="phone" type="tel" name="phone" placeholder="Phone Number">
        <br>
        </form>
        <span id=buttons>
      <button class="register_button" form="formreg">Register</button>
      <a href="login.php">
      <button class="login_button">Login</button>
      </a>
</span>
</div>
<?php } ?>