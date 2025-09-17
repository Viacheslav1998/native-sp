<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Services\DatabaseBackup;

$backup = new DatabaseBackup();
$backup->backup();
