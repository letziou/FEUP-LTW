<?php declare(strict_types = 1);

require_once('util/session.php');
$session = new Session();

require_once('database/connection.db.php');
require_once('database/order.class.php');

require_once('template/common.tpl.php');
require_once('template/order.tpl.php');

$db= getDatabaseConnection();
$orders = OOrder::getOrdersFromUser($db, intval($_GET['id']));

drawHeaderProfile($session);
drawOrders($session, $orders);
drawFooter();
 ?>