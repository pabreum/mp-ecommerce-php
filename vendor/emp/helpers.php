<?php
function getBackUrl(string $subDomain = "")  
{
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";
    $back_urls = array(
        "success" => getHostUrl($subDomain)."procesar-pago/success.php",
        "failure" => getHostUrl($subDomain)."procesar-pago/failure.php",
        "pending" => getHostUrl($subDomain)."procesar-pago/pending.php"
    );
    return $back_urls;
}

function getNotificationUrl(string $subDomain = "")  
{
    return getHostUrl($subDomain)."procesar-pago/notification.php";
}

function getHostUrl(string $subDomain = "")  
{
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";
    return $actual_link . $subDomain ;
}

function getHtml(string $preferenceId = "")  
{
    $button = '<button type="button" class="mercadopago-button" onclick="location.href=\''.$preferenceId.'\'" >Pagar la compra</button>';
    return $button;
}
?>