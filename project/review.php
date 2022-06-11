<?php declare(strict_types = 1);

require_once('util/session.php');
require_once('template/common.tpl.php');
$session = new Session();

drawHeaderReviews($session, intval($_GET['cat']), intval($_GET['id']), $_GET['name']);
//drawReviews($session, $_GET['name']);