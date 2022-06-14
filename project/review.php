<?php declare(strict_types = 1);

require_once('util/session.php');
$session = new Session();

require_once('database/connection.db.php');
require_once('database/review.class.php');

require_once('template/common.tpl.php');
require_once('template/review.tpl.php');

$db= getDatabaseConnection();
$reviews = Review::getReviewsFromRes($db, intval($_GET['id']));

drawHeaderReviews($session, intval($_GET['cat']), intval($_GET['id']), $_GET['name']);
drawReviews($session, intval($_GET['id']), $_GET['name'], $reviews);
drawFooter();
 ?>