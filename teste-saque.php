<?php

use Alura\Banco\Modelo\Conta\{ContaPoupanca, ContaCorrente, Titular};
use Alura\Banco\Modelo\{CPF, Endereco};

require_once 'autoload.php';

$conta = new ContaPoupanca(
    new Titular(
        new CPF('123.456.789-10'),
        'Alex Perdigão',
        new Endereco('Ribeirão', 'Irajá', 'Rua 1234', '12345')
    )
);
$conta->deposita(500);
try {
    $conta->saca(100);
} catch (\Alura\Banco\Modelo\Conta\SaldoInsuficienteException $exception) {
    echo "Você não tem saldo para realizar esse saque." . PHP_EOL;
    echo $exception->getMessage() . PHP_EOL;
}


echo "Saldo atual " . $conta->recuperaSaldo();
