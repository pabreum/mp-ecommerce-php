<?php
require_once __DIR__ .  '/config.php';
require_once __DIR__ .  '/helpers.php';
require_once __DIR__ .  '../../../vendor/autoload.php';

function generatePayment(string $title, float $unit_price, string $picture_url)
{
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken($GLOBALS['AccessToken']);
    MercadoPago\SDK::setIntegratorId($GLOBALS['IntegratorId']);

    $payer = new MercadoPago\Payer();
    $payer->name = "Lalo";
    $payer->surname = "Landa";
    $payer->email = "test_user_63274575@testuser.com";
    $payer->phone = array(
    "area_code" => "11",
    "number" => "22223333"
    );
    $payer->address = array(
        "street_name" => "False",
        "street_number" => 123,
        "zip_code" => "1111",
    );    

    $item = new MercadoPago\Item();
    $item->id = "1234";
    $item->title = $title;
    $item->description = "Dispositivo móvil de Tienda e-commerce";
    $item->picture_url = getHostUrl($GLOBALS['SubDomain']).substr_replace($picture_url, '', 0, 2);
    $item->quantity = 1;
    $item->unit_price = $unit_price;

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
    $preference->notification_url =  getNotificationUrl($GLOBALS['SubDomain']);
    $preference->save();
    return getHtml($preference->init_point);
}
?>
