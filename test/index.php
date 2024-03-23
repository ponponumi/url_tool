<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Ponponumi\UrlTool\Domain;

$url = "http://localhost:2250/hello.php";
$host = Domain::hostGet($url);

var_dump($host);
