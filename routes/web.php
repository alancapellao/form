<?php

use App\Controllers\UserController;

// Mapeamento de rotas
$routes = [
    'usuarios' => [
        'controller' => UserController::class,
        'methods' => [
            'criar' => 'create',
            'editar' => 'edit',
            'deletar' => 'delete',
            'default' => 'index'
        ]
    ],
    // Adicione outras rotas conforme necessário
];