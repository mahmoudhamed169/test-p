<?php

// Set headers to allow cross-origin resource sharing (CORS)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Get the request method and input data
$method = $_SERVER['REQUEST_METHOD'];
$data = json_decode(file_get_contents('php://input'), true);

// Check if the request method is POST
if ($method !== 'POST') {
    http_response_code(405);
    echo json_encode(array('message' => 'Method not allowed.'));
    exit;
}

// Check if the email and password were sent
if (!isset($data['email']) || !isset($data['password'])) {
    http_response_code(400);
    echo json_encode(array('message' => 'Email and password are required.'));
    exit;
}

// Validate the email and password (for example, check if they are in a database)
if ($data['email'] !== 'example@example.com' || $data['password'] !== 'password123') {
    http_response_code(401);
    echo json_encode(array('message' => 'Invalid email or password.'));
    exit;
}

// If the email and password are valid, create a token (for example, using JWT)
$token = 'your_token_here';

// Return the token
http_response_code(200);
echo json_encode(array('token' => $token));
