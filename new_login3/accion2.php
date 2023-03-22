<?php
$backlink = $_POST['backlink']; //link de retorno
header("Location: $backlink"); // Redirección al mikrotik
exit();
?>