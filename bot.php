<?php

use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\FileCache;
use BotMan\BotMan\Storages\Drivers\FileStorage;
use BotMan\Drivers\Line\LineDriver;

require_once __DIR__ . '/vendor/autoload.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/') {
    http_response_code(200);
    header('Content-Type: application/json');
    echo json_encode(['status' => 'ok', 'bot' => 'LINE BotMan']);
    return;
}

if (str_starts_with($uri, '/media/')) {
    $file = __DIR__ . $uri;
    if (file_exists($file)) {
        $mime = mime_content_type($file) ?: 'application/octet-stream';
        header('Content-Type: ' . $mime);
        readfile($file);
        return;
    }
    http_response_code(404);
    echo 'Not Found';
    return;
}

if ($uri !== '/botman') {
    http_response_code(200);
    echo 'OK';
    return;
}

$configFile = __DIR__ . '/config.php';
$config = file_exists($configFile) ? require $configFile : require __DIR__ . '/config.test.php';

$body = file_get_contents('php://input');
$events = json_decode($body, true)['events'] ?? [];

if (empty($events)) {
    http_response_code(200);
    echo 'OK';
    return;
}

$cacheDir = __DIR__ . '/cache';
$storageDir = __DIR__ . '/storage';
if (!is_dir($cacheDir)) {
    mkdir($cacheDir, 0777, true);
}
if (!is_dir($storageDir)) {
    mkdir($storageDir, 0777, true);
}

$cache = new FileCache($cacheDir);
$storage = new FileStorage($storageDir);

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

if (getenv('LINE_API_BASE_URL')) {
    $config['line']['api_base_url'] = getenv('LINE_API_BASE_URL');
}

if (getenv('LINE_CHANNEL_SECRET')) {
    $config['line']['channel_secret'] = getenv('LINE_CHANNEL_SECRET');
}

if (getenv('LINE_CHANNEL_ACCESS_TOKEN')) {
    $config['line']['channel_access_token'] = getenv('LINE_CHANNEL_ACCESS_TOKEN');
}

$botman = BotManFactory::create($config, $cache, $request, $storage);

$botman->setDriver(LineDriver::class);

require __DIR__ . '/routes/botman.php';

try {
    $botman->listen();
} catch (Throwable $e) {
    error_log('BotMan listen error: ' . $e->getMessage());
}

http_response_code(200);
echo 'OK';
