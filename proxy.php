<?php
// proxy.php
$base = "https://storage.y8.com/y8-studio/unity_webgl/gamosoftstudios/y8_TurboMotoRacer-2025-32bit_1_2/";
$path = isset($_GET['p']) ? $_GET['p'] : "index.html";
$url  = $base . $path;

$ch = curl_init($url);
curl_setopt_array($ch, [
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HEADER         => true,
  CURLOPT_USERAGENT      => $_SERVER['HTTP_USER_AGENT'] ?? 'Mozilla/5.0'
]);
$response = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$headers = substr($response, 0, $header_size);
$body    = substr($response, $header_size);
$content = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
curl_close($ch);

if ($content) header("Content-Type: $content");

$body = str_replace(
  ['href="', 'src="'],
  ['href="?p=', 'src="?p='],
  $body
);

echo $body;
