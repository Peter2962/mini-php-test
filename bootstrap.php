<?php

require_once 'vendor/autoload.php';

use Core\{App};

$app = new App(getBaseDir(), getRoutesFile());
$app->setup();