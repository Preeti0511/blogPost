<?php

use Illuminate\Database\Capsule\Manager as Capsule;

require __DIR__ . '/../vendor/autoload.php';

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'sqlite',
    'database' => ':memory:',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

// Create schema from file
$schema = file_get_contents(__DIR__ . '/schema.sql');
$capsule::connection()->getPdo()->exec($schema);

