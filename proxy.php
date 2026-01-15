<?php
$url = "https://storage.y8.com/y8-studio/unity_webgl/gamosoftstudios/y8_TurboMotoRacer-2025-32bit_1_2/index.html";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$data = curl_exec($ch);
curl_close($ch);
echo $data;
