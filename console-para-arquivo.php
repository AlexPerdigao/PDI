<?php


$novoCurso = trim(fgets(STDIN));
file_put_contents('lista-cursos.txt', "\n$novoCurso", FILE_APPEND);
