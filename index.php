<?php

// Set headers to allow cross-origin resource sharing (CORS)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(array('message' => 'Method not allowed.'));
    exit;
}

// Check the URL path
if ($_SERVER['REQUEST_URI'] === '/test') {
    // Print "test" if the URL path is "/test"
    echo json_encode(array('message' => 'test'));
} elseif ($_SERVER['REQUEST_URI'] === '/') {
    // Print "hello" if the URL path is "/"
    echo json_encode(array('message' => 'hello'));
} else {
    // Return 404 Not Found if the URL path is anything else
    http_response_code(404);
    echo json_encode(array('message' => 'Not found.'));
}

// Specify the port to listen on (in this case, port 8000)
$port = 8000;

// Start the web server
if (!isset($_SERVER['HTTP_HOST'])) {
    $_SERVER['HTTP_HOST'] = 'localhost';
}
$server = sprintf('%s://%s:%s', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', $_SERVER['HTTP_HOST'], $port);
echo sprintf("Server running on %s\n", $server);
if (PHP_SAPI === 'cli-server') {
    chdir(__DIR__);
    $file = preg_replace('/\?.*/', '', $_SERVER["REQUEST_URI"]);
    if (is_file($file)) {
        return false;
    }
    include_once 'index.php';
} else {
    die('This script should be run under PHP\'s built-in web server. Try running "php -S ' . $_SERVER['HTTP_HOST'] . ':' . $port . ' ' . __FILE__ . '" instead.');
}
