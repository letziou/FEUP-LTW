<?php declare(strict_types = 1);

require_once('util/session.php');
$session = new Session();

require_once('database/connection.db.php');

require_once('template/common.tpl.php');

$db= getDatabaseConnection();

drawHeaderAddOns($session, intval($_GET['cat']), intval($_GET['id']), $_GET['name']);

drawFooter();
 ?>