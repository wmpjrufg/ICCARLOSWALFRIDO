Neste manual estão contidas os procedimentos de cálculo adotados para a criação das calculadoras de perda de protensão baseados na NBR 6118 (2014). 

### coretec_tools_perda_de_atrito_calc

Nome: **coretec_tools_perda_de_atrito_calc**  
Criador(es): Carlos Magno Silva Carneiro e Walfrido Carvalho do Valle  
Última versão: 09/09/2020

Descrição: O que ela faz

Variáveis

#### A calculadora as contas

Como calcula

`teste
  $termo_exp_1 = $fat_micro*$fat_alfa;
  $termo_exp_2 = $fat_k*$distancia_x;
  $termo_exp_0 = ($termo_exp_1-$termo_exp_2);
  $delta_carga_pi = $carga_pi_t0*(1-exp(-$termo_exp_0));
  $carga_pi_t1 = $carga_pi_t0*(exp(-$termo_exp_0));
  $perda_perc = $delta_carga_pi/$carga_pi_t0*100;
  $sigma_pi_t1 = $sigma_pi_t0*(1-$perda_perc/100);
  $delta_sigma_pi = $sigma_pi_t0-$sigma_pi_t1;
`

Equação Pi = Perda*Pi

