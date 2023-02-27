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

