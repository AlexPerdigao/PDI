<?php

$saldo = 1_000;
$titularConta = "Alex Perdigão";

echo "*******************\n";
echo "Titular: $titularConta\n";
echo "Saldo em conta corrente = R$$saldo\n";
echo "*******************\n";

    do {
        echo "1. Consulta\n";
        echo "2. Saque\n";
        echo "3. Depósito\n";
        echo "4. Sair\n";

        $opcao = (int) fgets(STDIN);

        switch ($opcao) {
            case 1:
                echo "*******************\n";
                echo "Titular: $titularConta\n";
                echo "Saldo em conta corrente = R$$saldo\n";
                echo "*******************\n";
                break;

            case 2:
                echo "Qual o valor deseja sacar?\n";
                $valorSaque = (float) fgets(STDIN);
                if ($valorSaque >= $saldo) {
                    echo "Saldo insuficiente";
                }else {
                    $saldo -= $valorSaque;
                    echo "Saldo atualizado = R$$saldo\n";
                }
                break;

            case 3:
                echo "Qual é o valor do depósito?\n";
                $valorDeposito = (float) fgets(STDIN);
                if ($valorDeposito <= 0) {
                    echo "valor do Depósito tem que maior que zero\n";
                }else {
                    $saldo += $valorDeposito;
                    echo "Saldo atualizado = R$$saldo\n";
                }
                break;

            case 4:
                echo "Obrigado por utlizar nossos serviços. Até logo\n";
                break;

            default:
                echo "Opção inválida!\n";

        }
            }
    while ($opcao != 4);



