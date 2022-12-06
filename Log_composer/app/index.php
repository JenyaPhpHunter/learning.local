<?php

require __DIR__ . '/src/Application.php';
require __DIR__ . '/../Logging/Logger.php';
require_once __DIR__ . '/../vendor/autoload.php';

use Learning\Logging\Logger;

$filename = __DIR__ . '/../logs/log.txt';
$context = ['context'];
$message = 'messssaage';
$format = '{level} {data} {message} {context}';

$logger = new Logger($filename, $message, $context, $format);
$app = new Application($logger);
$app->format_and_write();

