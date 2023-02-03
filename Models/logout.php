<?php
session_start();

setcookie('ultimo_login', date('Y-m-d H:i:s'), time() + 60 * 60 * 24 * 7,'/');
// Destruir sesión y redirigir a la página de inicio de sesión
session_destroy();
header('Location:../Index.php');
exit;
?>