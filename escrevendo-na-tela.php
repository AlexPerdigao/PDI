<?php


fwrite(STDOUT, "Olá Mundo\n");

$cursos = fopen('zip://cursos.zip#cursos-php.txt', 'r');
stream_copy_to_stream($cursos, STDOUT);
