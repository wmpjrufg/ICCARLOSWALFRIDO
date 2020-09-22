<?php


// Estação apenas de teste para algoritmo coretectoolsFreyssinetPerdaProtensaoEscorregamentov0001 Comentar assim que usar
include_once('coretectoolsFreyssinetPerdaProtensaoEscorregamentov0001.php');
include_once('coretectoolsFreyssinetPerdaProtensaoEscorregamentoErrov0001.php');

$carga_pi_t0 = 1039.4;
$distancia_x = 121400;
$delta_e     = 4;
$as          = 722;
$e           = 202;

//Limpando o texto do console para usar em interpretador sistema linux
system('clear');
//Limpando o texto do console para usar em interpretador sistema window
//system('cls');

coretectoolsFreyssinetPerdaProtensaoEscorregamentov0001($carga_pi_t0,$distancia_x,$delta_e,$as,$e);


?>