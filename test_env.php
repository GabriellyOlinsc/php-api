<?php
require_once __DIR__ . '/src/Database.php';

$env = (new ReflectionClass('Database'))
        ->getMethod('loadEnv')
        ->invoke(null, __DIR__ . '/.env');

print_r($env);
