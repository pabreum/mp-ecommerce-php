Ejemplo de Uso
-Paso 1 configurar en
/vendor/emp/config.php
AccessToken y SubDomain

-Paso 2 Decidir que accion ejecutar en
/vendor/procesar-pago
failure.php
pending.php
success.php

-Paso 3 Incluir boton de pago
<!DOCTYPE html>
<html>
<head>
<title>Boton de Pago</title>
</head>
<body>
<?php
  require_once __DIR__ .  '/vendor/emp/init.php';
  //Generar el boton de Pago
  echo(generatePayment("Consulta Médica", 500, "Paciente", "Genérico", 12345678));
?>
</body>
</html>