<?php
function getBackUrl(string $subDomain = "")  
{
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";
    $back_urls = array(
        "success" => $actual_link . $subDomain . "procesar-pago/success.php",
        "failure" => $actual_link . $subDomain . "procesar-pago/failure.php",
        "pending" => $actual_link . $subDomain . "procesar-pago/pending.php"
    );
    return $back_urls;
}

function getHtml(string $preferenceId = "")  
{
    $button = '<button type="button" class="mercadopago-button" onclick="location.href=\''.$preferenceId.'\'" >Pagar</button>';
    return $button;
}
?>