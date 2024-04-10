<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Ponponumi\UrlTool\Domain;

var_dump(Domain::httpHostGet());
var_dump(Domain::sslCheck());
var_dump(Domain::topPageUrlGet());
