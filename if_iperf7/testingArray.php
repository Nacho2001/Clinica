<?php
$cp0 = ["a0sw03","a0sw05","a0sw01b","a0sw02","a0sw06","a0sw04b","a0sw01"];
$cp2 = ["a2sw02","a2sw03b","a2sw04"];
$cp6 = ["a6sw02","a6sw01"];
$cpOtros = ["a1sw01", "a4sw01"];
$arrayClinica = [$cp0, $cp2, $cp6, $cpOtros];
for ($i=0; $i < count($arrayClinica); $i++) { 
    $piso = $arrayClinica[1];
    echo $piso[$i];
}

?>