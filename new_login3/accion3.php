<?php
$username = $_POST['username']; //link de retorno
$backlink = $_POST['backlink'];
$backlinkFull = $backlink . $username;
header("Location: $backlinkFull"); // Redirección al mikrotik
exit();
?>