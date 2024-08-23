<?php

echo "Bem-vindo(a) ao screen match!\n";

$nomeFilme = "Thor: Ragnarok";
$nomeFilme = "Se beber não case";
$nomeFilme = "Top Gun - Maverick";

$anoLancamento = 2022;
$quantidadeDeNotas = $argc - 1;

$notas = [];

for ($contador = 1; $contador < $argc; $contador ++) {
    $notas[] = (float) $argv[$contador];
}

$notaFilme = array_sum($notas) / $quantidadeDeNotas;

$planoPrime = true;
$incluidoNoPlano = $planoPrime || $anoLancamento < 2020;



echo "Nome do Filme: " . $nomeFilme . "\n";
echo "Nota do Filme: $notaFilme\n";
echo "Ano de Lançamento: $anoLancamento\n";

if ($anoLancamento > 2022) {
    echo "Esse filem é um lançamento\n";
} elseif ($anoLancamento > 2020 && $anoLancamento <= 2022) {
    echo "Esse filme ainda é novo\n";
}else {
    echo "Esse filme não é um lançamento\n";
}

$genero = match ($nomeFilme) {
    "Top Gun - Maverick" => "Ação",
    "Thor: Ragnarok" => "Super-Herói",
    "Se beber não case" => "Comédia,",
    default => "Genero desconhecido",
};

echo "O genero do filme é: $genero ";

