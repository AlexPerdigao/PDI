<?php

$cursos = file_get_contents("lista-cursos.txt");

echo "$cursos";

$cursos = file("lista-cursos.txt");

var_dump($cursos);