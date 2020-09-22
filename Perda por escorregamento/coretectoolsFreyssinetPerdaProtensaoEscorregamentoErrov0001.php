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
// Nome:        coretectoolsFreyssinetPerdaProtensaoEscorregamentoErrov0001
// Versão:      versão 0001
// Notas:
// 20-09-2020:  C. M. S. Carneiro and W. C. do Valle finalizaram a versão beta
//
// ----------------------------

// ----------------------------DESCRIÇÃO
//
// O algoritmos informa os erros identificados no script coretectoolsFreyssinetPerdaProtensaoEscorregamentov0001
//
// ----------------------------

// ----------------------------VARIÁVEIS
//
// erro 			      - Variável de verificação de erro
//
// ----------------------------

function coretectoolsFreyssinetPerdaProtensaoEscorregamentoErrov0001($erro)
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