Neste manual estão contidas os procedimentos de cálculo adotados para a criação das calculadoras de perda de protensão baseados na NBR 6118 (2014). 

### coretec_tools_perda_de_atrito_calc

Nome: **coretec_tools_perda_de_atrito_calc**  
Criador(es): Carlos Magno Silva Carneiro e Walfrido Carvalho do Valle  
Última versão: 09/09/2020

Descrição: O que ela faz

Variáveis

#### A calculadora as contas

Como calcula

~~~php
  $termo_exp_1 = $fat_micro*$fat_alfa;
  $termo_exp_2 = $fat_k*$distancia_x;
  $termo_exp_0 = ($termo_exp_1-$termo_exp_2);
  $delta_carga_pi = $carga_pi_t0*(1-exp(-$termo_exp_0));
  $carga_pi_t1 = $carga_pi_t0*(exp(-$termo_exp_0));
  $perda_perc = $delta_carga_pi/$carga_pi_t0*100;
  $sigma_pi_t1 = $sigma_pi_t0*(1-$perda_perc/100);
  $delta_sigma_pi = $sigma_pi_t0-$sigma_pi_t1;
~~~

~~~javascript
Esta é uma linha de código em Javascript.
~~~

~~~php
Esta é uma linha de código em PHP.
~~~

~~~html
Esta é uma linha de código em HTML.
~~~

Exemplo   | Valor do exemplo
--------- | ------
Exemplo 1 | R$ 10
Exemplo 2 | R$ 8
Exemplo 3 | R$ 7
Exemplo 4 | R$ 8

Alinhado a esquerda | Centralizado | Alinhado a direita
:--------- | :------: | -------:
Valor | Valor | Valor

 Esta é uma linha que contém um ˋcódigoˋ.

ˋˋˋ
Esta é uma linha de código
 ˋˋˋ
 
1. Item 1
2. Item 2
3. Item 3

# Título <h1>
## Título <h2>
### Título <h3>
#### Título <h4>
##### Título <h5>
###### Título <h6>
 
>Este é um *blockquote*. O sinal usado abre e fecha este código no HTML. 
>Para adicionar mais uma linha à citação, basta teclar Enter para um novo
>código sinal. Isso gerará um novo parágrafo dentro do *blockquote*.
>Códigos de **negrito**, _itálico_ e <https://links.com> funcionam aqui.

Equação Pi = Perda*Pi

