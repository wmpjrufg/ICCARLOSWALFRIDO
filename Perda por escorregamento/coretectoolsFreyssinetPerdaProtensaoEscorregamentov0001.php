<?php


// ######################################################################
// UNIVERSIDADE FEDERAL DE CATALÃO (UFCAT)
// DEPARTAEMNTO DE ENGENHARIA CIVIL
// Autores
// Carlos Magno Silva Carneiro
// Walfrido Carvalho do Valle
// Walter Albergaria
// Prof. Wanderlei Malaquias Pereira Junior
// ######################################################################

// ----------------------------INFORMAÇÕES BÁSICAS
//
// Nome:    coretectoolsFreyssinetPerdaProtensaoEscorregamentov0001
// Versão:  versão 0001
// Notas:
// 20-09-2020: 	C. M. S. Carneiro and W. C. do Valle finalizaram a versão beta
// 
//
// ----------------------------

// ----------------------------DESCRIÇÃO
//
// O programa abaixo determina a perda de tensão devido ao escorregamento dos cabos, que ocorre devido a acomodação das cunhas na ancorragem.
//
// ----------------------------

// ----------------------------VARIÁVEIS

// carga_pi_t0 			      - Força de Protensão inicial na ancoragem (kN)
// sigma_pi_t0                - Tensão na armadura na operação de protensão (kN/mm²)
// distancia_x 	              - Comprimento da pista de protensão (mm)
// delta_e                    - Escoregamento / acomodação dado pelo fabricante (mm)
// delta_lp                   - Alongamento do aço (mm)
// as                         - Área da seção transvesal do cabo (mm²)
// e                          - Módulo de elasticidade do aço (kN/mm²)
// delta_epsilon_pi           - Redução na deformação da armadura (mm/mm)
// delta_sigma_pi_t1          - Redução na tensão da armadura (kN/mm²)
// delta_carga_pi_t1          - Variação de força de protenção final na ancoragem (kN/mm²)
// sigma_pi_t1                - Tensão na armadura após a operação de protenção (kN/mm²)
// carga_pi_t1                - Força de Protenção final na ancoragem (kN/mm²)
// perda_perc                 - Perda percentual de protenção (%)
//
// ----------------------------

// ----------------------------MÉTODOS
//
include_once('coretectoolsFreyssinetPerdaProtensaoEscorregamentoErrov0001.php');
//
// ----------------------------

function coretectoolsFreyssinetPerdaProtensaoEscorregamentov0001($carga_pi_t0,$distancia_x,$delta_e,$as,$e)
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
	echo "CÁLCULO DA PERDA DE PROTENSÃO POR ESCORREGAMENTO\n";
	echo "------------------------------------------------\n\n";

	// Passo 1.1: Validação das entradas
	if (gettype($carga_pi_t0)=="string" || gettype($distancia_x)=="string" || gettype($delta_e)=="string" || gettype($as)=="string" || gettype($e)=="string") {
      $erro = 2;
      coretectoolsFreyssinetPerdaProtensaoEscorregamentoErrov0001($erro);
      return;
	}

	if ($carga_pi_t0 <= 0 || $distancia_x <= 0 || $delta_e <= 0 || $as <= 0 || $e <= 0) {
      $erro = 1;
      coretectoolsFreyssinetPerdaProtensaoEscorregamentoErrov0001($erro);
      return;
	}

	// Passo 1.2: Determinação da tensão inicial
	$sigma_pi_t0 = $carga_pi_t0 / $as;

	// Impressão no console
	echo "-----------------------------------------------\n";
	echo "PARÂMETROS DE ENTRADA:\n";
	echo "-----------------------------------------------\n";
	echo "Carga de protensão Inicial (Pi)       = $carga_pi_t0 kN\n";
	echo "Tensão de protensão (σPi)             = $sigma_pi_t0 kN\n";
	echo "Comprimento da pista de protenão (x)  = $distancia_x mm\n";
	echo "Escorregamento (e)                    = $delta_e mm\n";
	echo "Área da seção transvesal do cabo (As) = $as mm²\n";
	echo "Módulo de elasticidade do aço (E)     = $e kN/mm²\n";
	echo "-----------------------------------------------\n\n";

	// Passo 1.3: Determinação do pré-alongamento do cabo
	$delta_lp = $distancia_x * ($sigma_pi_t0/$e);

	// Passo 1.4: Redução na deformação da armadura
	$delta_epsilon_pi = $delta_e / ($distancia_x + $delta_lp);

	// Passo 1.5: Redução na tensão da armadura
	$delta_sigma_pi_t1 = $e * $delta_epsilon_pi;

	// Passo 1.6: Redução na tensão da armadura
	$sigma_pi_t1 = $sigma_pi_t0 * $delta_sigma_pi_t1;

	// Passo 1.7: Variação de carga após a perda de tensão por escorregamento
	$delta_carga_pi_t1 = $delta_sigma_pi_t1 * $as;

	// Passo 1.8: Carga após a perda de tensão por escorregamento
	$carga_pi_t1 = $sigma_pi_t1 * $as;

	// Passo 1.9: Perda percentual de carga
	$perda_perc = ($delta_carga_pi_t1 / $carga_pi_t0) * 100;

	// Impressão no console
	echo "-----------------------------------------------\n";
	echo "CARGA DE PROTENSÃO APÓS CONSIDERAÇÃO DA PERDA:\n";
	echo "-----------------------------------------------\n";
	echo "Carga Pi(x=0)       = $carga_pi_t0 kN\n";
	echo "σPi(x=0)            = $sigma_pi_t0 MPa\n";
	echo "Carga Pi(x)         = $carga_pi_t1 kN\n";
	echo "σPi(x)              = $sigma_pi_t1 MPa\n";
	echo "Perda Pi            = $delta_carga_pi_t1 kN\n";
	echo "Perda σPi           = $delta_sigma_pi_t1 MPa\n";
	echo "Percentual de perda = $perda_perc %\n";
	echo "-----------------------------------------------\n\n";
}


?>