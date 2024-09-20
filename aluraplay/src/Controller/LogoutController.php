<?php

namespace Alura\Mvc\Controller;

class LogoutController
{
    public function processaRequisicao(): void
    {
        session_destroy();
        header('Location: /login');
    }

}