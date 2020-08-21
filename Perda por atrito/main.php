<?php


// Estação apenas de teste para algoritmo coretectoolsFreyssinetPerdaProtensaoAtritov0001 Comentar assim que usar
include_once('coretectoolsFreyssinetPerdaProtensaoAtritov0001.php');
include_once('coretectoolsFreyssinetPerdaProtensaoAtritoErrov0001.php');

$carga_pi_t0 = 1000;
$distancia_x = 10;
$fat_alfa = 0.17;
$fat_micro = 0.05;
$as_ativa = 4.05;

//Limpando o texto do console para usar em interpretador sistema linux
system('clear');
//Limpando o texto do console para usar em interpretador sistema window
//system('cls');

coretectoolsFreyssinetPerdaProtensaoAtritov0001($carga_pi_t0,$distancia_x,$fat_alfa,$fat_micro,$as_ativa);


?>