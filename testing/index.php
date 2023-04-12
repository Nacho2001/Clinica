<?php
$arreglo1=array();
$arreglo2=array();
$arreglo1=["1","2"];
print_array($arreglo1);
$arreglo2=["3","4"];
print_array($arreglo2);
$arreglo1[]=$arreglo2;
print_array($arreglo1);

function print_array($arreglo){
    for ($i=0; $i < count($arreglo); $i++) { 
        echo $arreglo[$i];
    }
}
?>