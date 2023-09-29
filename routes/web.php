<?php

use App\Controllers\UserController;
use App\Models\Error;

$error = new Error();

$routes = [
    'usuarios' => [
        'controller' => UserController::class,
        'methods' => [
            'salvar' => 'save',
            'editar' => 'edit',
            'deletar' => 'delete',
            'pesquisar' => 'search',
            'default' => 'index'
        ]
    ],
    'erro' => [
        'controller' => Error::class,
        'methods' => [
            '404' => 'error404',
            '500' => 'error500',
            'default' => 'error404'
        ]
    ]
];
