<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\{Conta\Titular, Endereco, CPF, Conta\Conta, Conta\ContaCorrente};


$endereco = new Endereco('Petrópolis', 'um bairro', 'minha rua', '71B');
$vinicius = new Titular(new CPF('123.456.789-10'), 'Alex Perdigão', $endereco);
$primeiraConta = new ContaCorrente($vinicius);
$primeiraConta->deposita(500);
$primeiraConta->saca(300); // isso é ok

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

$patricia = new Titular(new CPF('698.549.548-10'), 'Patricia', $endereco);
$segundaConta = new ContaCorrente($patricia);
var_dump($segundaConta);

$outroEndereco = new Endereco('A', 'b', 'c', '1D');
$outra = new ContaCorrente(new Titular(new CPF('123.654.789-01'), 'Juliana Perdigão', $endereco));
unset($segundaConta);
echo Conta::recuperaNumeroDeContas();