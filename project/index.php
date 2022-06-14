<?php declare(strict_types = 1);

require_once('util/session.php');
require_once('template/common.tpl.php');
$session = new Session();

drawHeaderIndex($session);
drawIndex();
drawFooter(); 
?>