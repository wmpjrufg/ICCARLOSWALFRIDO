<?php


// ######################################################################
// UNIVERSIDADE FEDERAL DE CATALÃO (UFCAT)
// FACULDADE DE ENGENHARIA - DEPARTAMENTO DE ENGENHARIA CIVIL
// Autores
// Carlos Magno Silva Carneiro
// Walfrido Carvalho do Valle
// Walter Albergaria
// Prof. Wanderlei Malaquias Pereira Junior
// ######################################################################

// ----------------------------INFORMAÇÕES BÁSICAS
//
// Nome:        coretectoolsFreyssinetPerdaProtensaoAtritov0001
// Versão: 	    versão 0001
// Notas:
// 15-04-2020: 	C. M. S. Carneiro and W. C. do Valle finalizaram a versão beta
// 18-08-2020: 	W. M. Pereira Junior alterações de estilo e introdução de uma função de erros 
//
// ----------------------------

// ----------------------------DESCRIÇÃO
//
// O algoritmo determina a perda de protensão devido ao atrito nos cabos
//
// ----------------------------

// ----------------------------VARIÁVEIS
//
// carga_pi_t0 			      - Força de Protensão inicial na ancoragem (kN)
// distancia_x 	          - Comprimento do cabo medido a partir da ancoragem até a distância que se deseja verificar a perda de protensão (m)
// fat_alfa        				- Ângulo de desvio entre a ancoragem e o ponto da abscissa distancia_x (radianos)
// fat_micro  				    - Ângulo de atrito aparente entre o cabo e a bainha (1/radianos)
// as_ativa               - Área dos cabos de protensão (cm2)
// fat_k      				    - Coeficiente de perda por metro provocado por curvaturas não intencionais do cabo (1/m)
// sigma_pi_t0            - Tensão de protensão nos cabos na ancoragem (MPa)
// delta_carga_pi         - Perda de carga para a peça considerando atrito e distorção nos cabos (kN)
// carga_pi_t1            - Força de Protensão após ocorrência das perdas na abscissa x (kN)   
// perda_perc             - Perda percentual de protensão (kN)
// sigma_pi_t1            - Tensão de Protensão após ocorrência das perdas na abscissa x (MPa)  
// delta_sigma_pi         - Perda de tensão para a peça considerando atrito e distorção nos cabos (MPa)
//
// ----------------------------

// ----------------------------MÉTODOS
//
include_once('coretectoolsFreyssinetPerdaProtensaoAtritoErrov0001.php');
//
// ----------------------------

function coretectoolsFreyssinetPerdaProtensaoAtritov0001($carga_pi_t0,$distancia_x,$fat_alfa,$fat_micro,$as_ativa)
{
  //
  //
  //=========================================================================%
  // ETAPA 1: DECLARAÇÃO DOS PARÂMETROS DE ENTRADA
  //=========================================================================%
  //
  //
  // Impressão no console
  echo "------------------------------------------------\n";
  echo "CORETECTOOLS - FREYSSINET                       \n";
  echo "CÁLCULO DA PERDA DE PROTENSÃO POR ATRITO        \n";
  echo "------------------------------------------------\n\n";

  // Passo 1.1: Validação das entradas
  if (gettype($carga_pi_t0)=="string" || gettype($distancia_x)=="string" || gettype($fat_alfa)=="string" || gettype($fat_micro)=="string" || gettype($as_ativa)=="string") {
      $erro = 2;
      coretectoolsFreyssinetPerdaProtensaoAtritoErrov0001($erro);
      return;
  }

  if ($carga_pi_t0 <= 0 || $distancia_x <= 0 || $fat_alfa <= 0 || $fat_micro <= 0 || $as_ativa <= 0) {
      $erro = 1;
      coretectoolsFreyssinetPerdaProtensaoAtritoErrov0001($erro);
      return;
  }

  // Passo 1.1: Determinação do fator_k e tensão inicial de protensão
  $fat_k = 0.01 * $fat_micro;
  $sigma_pi_t0 = $carga_pi_t0/$as_ativa*10;

  // Impressão no console
  echo "-----------------------------------------------\n";
  echo "PARÂMETROS DE ENTRADA:\n";
  echo "-----------------------------------------------\n";
  echo "Carga de protensão Inicial (Pi)   = $carga_pi_t0 kN\n";
  echo "As cabos                          = $as_ativa cm2\n";
  echo "Tensão de Protensão (σPi)         = $sigma_pi_t0 MPa\n";
  echo "Abscissa do cabo (x)              = $distancia_x m\n";
  echo "Ângulo de desvio (α)              = $fat_alfa radiano\n";
  echo "Coeficiente de atrito (µ)         = $fat_micro 1/radiano\n";
  echo "Coeficiente de perda (k)          = $fat_k 1/m\n";
  echo "-----------------------------------------------\n\n";

  // Passo 1.2: Determinação da força e tensão nos cabos considerando a perda por atrito e distorções no cabo
  $termo_exp_1 = $fat_micro*$fat_alfa;
  $termo_exp_2 = $fat_k*$distancia_x;
  $termo_exp_0 = ($termo_exp_1-$termo_exp_2);
  $delta_carga_pi = $carga_pi_t0*(1-exp(-$termo_exp_0));
  $carga_pi_t1 = $carga_pi_t0*(exp(-$termo_exp_0));
  $perda_perc = $delta_carga_pi/$carga_pi_t0*100;
  $sigma_pi_t1 = $sigma_pi_t0*(1-$perda_perc/100);
  $delta_sigma_pi = $sigma_pi_t0-$sigma_pi_t1;

  // Impressão no console
  echo "-----------------------------------------------\n";
  echo "CARGA DE PROTENSÃO APÓS CONSIDERAÇÃO DA PERDA:\n";
  echo "-----------------------------------------------\n";
  echo "Parcela µ.α         = $termo_exp_1 \n";
  echo "Parcela k.x         = $termo_exp_2\n";
  echo "Parcela e^()        = $termo_exp_0 \n";
  echo "Carga Pi(x=0)       = $carga_pi_t0 kN\n";
  echo "σPi(x=0)            = $sigma_pi_t0 MPa\n";
  echo "Carga Pi(x)         = $carga_pi_t1 kN\n";
  echo "σPi(x)              = $sigma_pi_t1 MPa\n";
  echo "Perda Pi            = $delta_carga_pi kN\n";
  echo "Perda σPi           = $delta_sigma_pi MPa\n";
  echo "Percentual de perda = $perda_perc %\n";
  echo "-----------------------------------------------\n\n";
}


?>