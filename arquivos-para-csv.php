<?php

$meusCursos = file('lista-cursos.txt');
$outrosCursos = file('cursos-php.txt');

$arquivoCsv = fopen('cursos.csv', 'w');
foreach ($meusCursos as $curso) {
    $linha = [trim(mb_convert_encoding($curso, "Windows-1252", "utf8")), 'Sim'];
    fputcsv($arquivoCsv, $linha, ';');
}
foreach ($outrosCursos as $curso) {
    $linha = [trim(mb_convert_encoding($curso, "Windows-1252", "utf8")), 'Não'];
    fputcsv($arquivoCsv, $linha, ';');
}
fclose($arquivoCsv);