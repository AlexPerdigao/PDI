<?php

$contexto = stream_context_create([
    'zip' => [
        'password' => '241014'
    ]
]);

echo file_get_contents('zip://curso-php.zip#lista-cursos.txt', false, $contexto);

