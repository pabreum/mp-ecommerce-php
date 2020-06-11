<?php
require_once __DIR__ .  '/config.php';
require_once __DIR__ .  '/helpers.php';
require_once __DIR__ .  '../../../vendor/autoload.php';

function generatePayment(string $title, float $unit_price, string $picture_url)
{
    $img_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/".substr_replace($picture_url, '', 0, 2);
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken($GLOBALS['AccessToken']);
    MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

    $payer = new MercadoPago\Payer();
    $payer->name = "Lalo";
    $payer->surname = "Landa";
    $payer->email = "test_user_63274575@testuser.com";
    $payer->phone = array(
    "area_code" => "11",
    "number" => "22223333"
    );
    $payer->address = array(
        "stree_name" => "False",
        "stree_number" => 123,
        "zip_code" => "1111",
    );    


    $item = new MercadoPago\Item();
    $item->id = "1234";
    $item->title = $title;
    $item->description = "Dispositivo móvil de Tienda e-commerce";
    $item->picture_url = $img_link;
    $item->quantity = 1;
    $item->unit_price = $precio;
    //$item->currency_id = "ARS";

    $payment_methods = array(
        "excluded_payment_types" => array(
            array ( "id" => "atm" )
        ),
        "excluded_payment_methods" => array(
            array("id" => "amex")
          ),        
        "installments" => 6
    );

    $preference = new MercadoPago\Preference();
    $preference->payer = $payer;
    $preference->payment_methods = $payment_methods;
    $preference->external_reference = "pabreu.ar@gmail.com";
    $preference->items = array($item);
    $preference->back_urls = getBackUrl($GLOBALS['SubDomain']);
    $preference->auto_return = "approved";
    $preference->save();
    return getHtml($preference->init_point);
}
?>
