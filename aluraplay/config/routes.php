<?php

return [
    'GET|/' => \Alura\Mvc\Controller\VideoListController::class,
    'GET|/novo-video' => \Alura\Mvc\Controller\VideoFormController::class,
    'POST|/novo-video' => \Alura\Mvc\Controller\NewVideoController::class,
    'GET|/alterar-video' => \Alura\Mvc\Controller\VideoFormController::class,
    'POST|/alterar-video' => \Alura\Mvc\Controller\EditVideoController::class,
    'GET|/remover-video' => \Alura\Mvc\Controller\DeleteVideoController::class,
    'GET|/login' => \Alura\Mvc\Controller\LoginFormController::class,
    'POST|/login' => \Alura\Mvc\Controller\LoginController::class,
    'GET|/logout' => \Alura\Mvc\Controller\LogoutController::class,
    'GET|/videos-json' => \Alura\Mvc\Controller\JsonVideoListController::class,
];
