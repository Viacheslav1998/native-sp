<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Seeds\Seeder;
use Core\Model;

$options = getopt('', ['count::']);
$total = isset($options['count']) ? (int)$options['count'] : 1000000;

//db use/connect
$table = 'test_data';
$db = Model::staticPDO();

$seeder = new Seeder($db, $table);
$seeder->seed($total);

