<?php declare(strict_types = 1);

require_once('util/session.php');
$session = new Session();

require_once('database/connection.db.php');
require_once('database/review.class.php');

require_once('template/common.tpl.php');
require_once('template/review.tpl.php');

$db= getDatabaseConnection();
//$reviews = Review::getReviewsFromRes($db, intval($_GET['id']));

drawHeaderReviews($session, intval($_GET['cat']), intval($_GET['id']), $_GET['name']);
//drawReviews($session, $_GET['name'], $reviews);
?>

<h2>Reviews about McDonalds</h2>
<section id="review-container">
  <article class="review">
    <span class="user">plutoniumfogg</span>
    <span class="date">11m</span>
    <p>Aliquam dignissim finibus lectus non condimentum. Cras accumsan diam vitae nulla efficitur congue. Vivamus porta arcu sit amet dapibus ultricies. Donec ac sodales mauris. Nulla eget tortor urna. Donec a malesuada libero. Curabitur blandit erat ut diam rhoncus venenatis. Proin.</p>
    <span class="score">5 stars</span>
  </article>
  <article class="review">
    <span class="user">plutoniumfogg</span>
    <span class="date">11m</span>
    <p>Aliquam dignissim finibus lectus non condimentum. Cras accumsan diam vitae nulla efficitur congue. Vivamus porta arcu sit amet dapibus ultricies. Donec ac sodales mauris. Nulla eget tortor urna. Donec a malesuada libero. Curabitur blandit erat ut diam rhoncus venenatis. Proin.</p>
    <span class="score">5 stars</span>
  </article>
  <article class="review">
    <span class="user">plutoniumfogg</span>
    <span class="date">11m</span>
    <p>Aliquam dignissim finibus lectus non condimentum. Cras accumsan diam vitae nulla efficitur congue. Vivamus porta arcu sit amet dapibus ultricies. Donec ac sodales mauris. Nulla eget tortor urna. Donec a malesuada libero. Curabitur blandit erat ut diam rhoncus venenatis. Proin.</p>
    <span class="score">5 stars</span>
  </article>
  <article class="review">
    <span class="user">plutoniumfogg</span>
    <span class="date">11m</span>
    <p>Aliquam dignissim finibus lectus non condimentum. Cras accumsan diam vitae nulla efficitur congue. Vivamus porta arcu sit amet dapibus ultricies. Donec ac sodales mauris. Nulla eget tortor urna. Donec a malesuada libero. Curabitur blandit erat ut diam rhoncus venenatis. Proin.</p>
    <span class="score">5 stars</span>
  </article>
  <article class="review">
    <span class="user">plutoniumfogg</span>
    <span class="date">11m</span>
    <p>Aliquam dignissim finibus lectus non condimentum. Cras accumsan diam vitae nulla efficitur congue. Vivamus porta arcu sit amet dapibus ultricies. Donec ac sodales mauris. Nulla eget tortor urna. Donec a malesuada libero. Curabitur blandit erat ut diam rhoncus venenatis. Proin.</p>
    <span class="score">5 stars</span>
  </article>
</section>

<?php drawFooter(); ?>