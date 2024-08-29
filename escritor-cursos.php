<?php



$curso = "\nPHP I/O: trabalhando com arquivos e streams II";

file_put_contents('cursos-php.txt', $curso, FILE_APPEND);