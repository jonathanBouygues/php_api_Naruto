<?php

// Initialisation data for redirection
$request_method = $_SERVER["REQUEST_METHOD"];
$requestUri = $_SERVER["REQUEST_URI"];

// Diffrence between
if (preg_match('/villages/', $requestUri, $result)) {
    $table = 'villages';
} else {
    $table = 'characters';
}