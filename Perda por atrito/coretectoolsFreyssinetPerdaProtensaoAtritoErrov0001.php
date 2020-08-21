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
// Nome:        coretectoolsFreyssinetPerdaProtensaoAtritoErrov0001
// Versão:      versão 0001
// Notas:
// 18-08-2020: 	W. M. Pereira Junior criação da função de verificação de erro
//
// ----------------------------

// ----------------------------DESCRIÇÃO
//
// O algoritmos informa os erros identificados no script coretectoolsFreyssinetPerdaProtensaoAtritov0001
//
// ----------------------------

// ----------------------------VARIÁVEIS
//
// erro 			      - Variável de verificação de erro
//
// ----------------------------

function coretectoolsFreyssinetPerdaProtensaoAtritoErrov0001($erro)
{
  //
  //
  //=========================================================================%
  // ETAPA 1: VERIFICA OS ERROS DE PROCESSAMENTO
  //=========================================================================%
  //
  //
  // Passo 1.1: Verificação de erros
  if ($erro == 1) {
      echo "Não é permitida entrada de dados do tipo <=0 \n";
  } elseif ($erro == 2) {
      echo "Não é permitida entrada de dados do tipo string \n";
  }
  return;
}

?>