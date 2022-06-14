<?php declare(strict_types = 1); 
  require_once('util/session.php');?>


<?php function drawProfileInfo(Session $session, User $user, Address $address) { ?>
    <div class="userInfo">
    <h1>Account Information</h1>
    <h2>Name: <?=$session->getName();?></h2>
    <h2>Phone: <?=$user->phone?></h2>
    <h2>Address: </h2>
    <ul> 
      <li>City: <?=$address->city?> </li>
      <li>Postal Code: <?=$address->postalCode?> </li>
      <li>Street: <?=$address->street?></li>
    </ul>
  </div>
  <div class="restButton">
    <a href="edit_profile.php">
      <button class="edit_button"> Edit Profile</button>
    </a>  
    <a href="restaurants_owned.php?id=<?=$user->id_User?>">
      <button>Checkout your restaurants!</button>
    </a>
    <a href="user_orders.php?id=<?=$user->id_User?>">
      <button>Check your orders!</button>
    </a>
  </div>
<?php } ?>

<?php function drawEditProfile(Session $session, User $user, Address $address) { ?>
  <div id="loginbox">
  <h2> Edit Profile: </h2>
    <form action="/actions/action_EditProfile.php" id="formedit" method="post" class="edit">
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
      <button class="edit_button" form="formedit">Confirm Changes</button>
      </span>
</div>
<?php } ?>
