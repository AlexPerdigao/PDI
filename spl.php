<?php

$arquivoCursos = new SplFileObject("cursos.csv");

while (!$arquivoCursos->eof()) {
    $linha = $arquivoCursos->fgetcsv(';');
    echo mb_convert_encoding($linha[0], 'utf8', 'Windows-1252') . PHP_EOL;
}
$date = new DateTime();
$date->setTimestamp($arquivoCursos->getCTime());

echo $date->format('d/m/Y H:i:s') . PHP_EOL;