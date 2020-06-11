<?php
require_once __DIR__ .  '../../emp/config.php';
require_once __DIR__ .  '../../emp/helpers.php';

//Process payment
$back_urls = getBackUrl($GLOBALS['SubDomain']);
$back_url= explode("?", $_REQUEST['back_url'], 2)[0];
$action = array_search($back_url, $back_urls);
switch ($action) {
    case "success":
        require_once __DIR__ .  '../../procesar-pago/success.php';
        success($_REQUEST);
        break;
    case "failure":
        require_once __DIR__ .  '../../procesar-pago/failure.php';
        failure($_REQUEST);
        break;
    case "pending":
        require_once __DIR__ .  '../../procesar-pago/pending.php';
        pending($_REQUEST);
        break;
}
?>