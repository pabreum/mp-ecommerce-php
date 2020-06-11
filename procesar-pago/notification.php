<?php
require_once __DIR__ .  '../../vendor/emp/config.php';
require_once __DIR__ .  '../../vendor/autoload.php';

MercadoPago\SDK::setAccessToken($GLOBALS['AccessToken']);
switch($_POST["type"]) {
    case "payment":
        $payment = MercadoPago\Payment.find_by_id($_POST["id"]);
        echo($payment);
        file_put_contents("hola.txt", $_POST);
        break;
    case "plan":
        $plan = MercadoPago\Plan.find_by_id($_POST["id"]);
        echo($plan);
        //file_put_contents($_POST["id"].".txt", $plan);
        break;
    case "subscription":
        $plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
        echo($plan);
        //file_put_contents($_POST["id"].".txt", $plan);
        break;
    case "invoice":
        $plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
        echo($plan);
        //file_put_contents($_POST["id"].".txt", $plan);
        break;
}

file_put_contents("webhooks.txt",json_encode($_POST));
file_put_contents("webhooks2.txt",file_get_contents("php://input"));
mail('pabreu.ar@gmail.com', 'Mi título', file_get_contents("php://input"));
?>
