<?php
require_once __DIR__ .  '/config.php';
require_once __DIR__ .  '/helpers.php';
require_once __DIR__ .  '../../../vendor/autoload.php';

function generatePayment(string $title, float $precio, string $personName, string $personSurname, int $personDocument, string $reference)
{
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken($GLOBALS['AccessToken']);

    $payer = new MercadoPago\Payer();
    $payer->name = $personName;
    $payer->surname = $personSurname;
    $payer->identification = array(
    "type" => "DNI",
    "number" => $personDocument
    );

    $item = new MercadoPago\Item();
    $item->id = "420101";
    $item->title = $title;
    $item->quantity = 1;
    $item->currency_id = "ARS";
    $item->unit_price = $precio;

    $payment_methods = array(
        "excluded_payment_types" => array(
            array ( "id" => "ticket" ),
            array ( "id" => "atm" )
        ),
        "installments" => 1
      );

    $preference = new MercadoPago\Preference();
    $preference->payer = $payer;
    $preference->payment_methods = $payment_methods;
    $preference->external_reference = $reference;
    $preference->items = array($item);
    $preference->back_urls = getBackUrl($GLOBALS['SubDomain']);
    //$preference->binary_mode = true;
    $preference->save();
    return getHtml($preference->init_point);
}
?>
