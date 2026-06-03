<?php

use Illuminate\Http\Request;
use Illuminate\Contracts\Http\Kernel;

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

// Paksa Blade Template menggunakan /tmp untuk compile views jika di Vercel
if (env('VERCEL') || isset($_ENV['VERCEL'])) {
    if (!is_dir('/tmp/views')) {
        mkdir('/tmp/views', 0755, true);
    }
    config(['view.compiled' => '/tmp/views']);
}
// ----------------------------------------------

// Ambil instance Kernel HTTP Laravel secara resmi
$kernel = $app->make(Kernel::class);

// Tangkap request dan kirim response
$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);