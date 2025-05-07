<?php

header('Content-Type: image/png');
header('Access-Control-Allow-Origin: *');
header('Cross-Origin-Resource-Policy: cross-origin'); // <- celui-ci est crucial

$data = [
  'timestamp' => date('c'),
  'ip' => $_SERVER['REMOTE_ADDR'],
  'ua' => $_SERVER['HTTP_USER_AGENT'],
  'referer' => $_SERVER['HTTP_REFERER'] ?? 'none',
  'lang' => $_GET['lang'] ?? null,
  'width' => $_GET['width'] ?? null,
  'height' => $_GET['height'] ?? null,
  'ratio' => $_GET['ratio'] ?? null,
  'hasVisited' => $_GET['hasVisited'] ?? '0'
];

file_put_contents('logs_pixel.jsonl', json_encode($data) . "\n", FILE_APPEND);

// Pixel transparent
header('Content-Type: image/png');
echo base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/wIAAgMBAp44ZK0AAAAASUVORK5CYII=');
