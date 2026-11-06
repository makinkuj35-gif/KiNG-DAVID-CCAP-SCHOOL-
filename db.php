<?php
declare(strict_types=1);
$configFile = __DIR__ . '/config.php';
if (!is_file($configFile)) { http_response_code(500); exit('Database configuration missing. Copy config.example.php to config.php and set your credentials.'); }
$c = require $configFile;
$dsn = 'mysql:host=' . $c['host'] . ';dbname=' . $c['database'] . ';charset=utf8mb4';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false];
$pdo = new PDO($dsn, $c['username'], $c['password'], $options);
