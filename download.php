<?php
/**
 * Created by PhpStorm.
 * User: Loris
 * Date: 30/07/14
 * Time: 21:52
 */

$url_video = $_POST["url_video"];
$url_pagina = $_POST["url_pagina"];
$file_name = $_POST["file_name"].$_POST["ext"];

ini_set('memory_limit', '-1');
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url_video);
curl_setopt($curl, CURLOPT_REFERER, $url_pagina);
curl_setopt($curl, CURLOPT_TIMEOUT, 300);
curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$html = curl_exec($curl);
curl_close($curl);

header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=$file_name");
echo($html);
?>