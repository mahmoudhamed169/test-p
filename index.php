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
} else {
    // Print "hello" if the URL path is anything else
    echo json_encode(array('message' => 'hello'));
}
