<?php declare(strict_types =1);

require_once('util/session.php');
$session = new Session();

require_once('database/connection.db.php');
require_once('database/restaurant.class.php');

require_once('template/common.tpl.php');
require_once('template/login.tpl.php');
require_once('template/restaurant.tpl.php');

  $db= getDatabaseConnection();

  drawHeaderLogin($session);
  drawSignInBox($session);

?>

    <!-- FOR TESTING PURPOSES! TODO: INCLUDE THIS IN drawSignInBox-->
    <section id="messages"> 
      <?php foreach ($session->getMessages() as $messsage) { ?>
        <article class="<?=$messsage['type']?>">
          <?=$messsage['text']?>
        </article>
      <?php } ?>
    </section>
     <!-- FOR TESTING PURPOSES! TODO: INCLUDE THIS IN drawSignInBox-->

<?php drawFooter();?>