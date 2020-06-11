<?php
function getBackUrl(string $subDomain = "")  
{
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";
    $back_urls = array(
        "success" => $actual_link . $subDomain . "/vendor/procesar-pago/success.php",
        "failure" => $actual_link . $subDomain . "/vendor/procesar-pago/failure.php",
        "pending" => $actual_link . $subDomain . "/vendor/procesar-pago/pending.php"
    );
    return $back_urls;
}

function getHtml(string $preferenceId = "")  
{
    $button = '<form action="vendor/emp/payment.php" method="POST">
                    <script
                        src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                            data-preference-id="'.$preferenceId.'">
                    </script>
               </form>';
    return $button;
}
?>