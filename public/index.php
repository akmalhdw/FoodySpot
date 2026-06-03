<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Tentukan jalur ke maintenance mode jika ada
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Registrasi Autoloader Composer
require __DIR__ . '/../vendor/autoload.php';

// Jalankan Aplikasi Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

// --- TRIK KHUSUS VERCEL SERVERLESS (WAJIB) ---
$app->useStoragePath('/tmp');
// ----------------------------------------------

$handle = $app->make(Request::class);

$response = $handle->handle(
    $request = Request::capture()
)->send();

$handle->terminate($request, $response);