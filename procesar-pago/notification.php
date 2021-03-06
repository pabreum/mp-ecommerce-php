<?php
require_once __DIR__ .  '../../vendor/emp/config.php';
require_once __DIR__ .  '../../vendor/autoload.php';

MercadoPago\SDK::setAccessToken($GLOBALS['AccessToken']);
switch($_POST["type"]) {
    case "payment":
        $payment = MercadoPago\Payment.find_by_id($_POST["id"]);
        break;
    case "plan":
        $plan = MercadoPago\Plan.find_by_id($_POST["id"]);
        break;
    case "subscription":
        $plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
        break;
    case "invoice":
        $plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
        break;
}
file_put_contents("php://stderr", file_get_contents("php://input"));
?>
