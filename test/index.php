<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Ponponumi\UrlTool\Domain;

$url = "http://localhost:2250/hello.php";
$host = Domain::hostGet($url);

$in = Domain::internalLinkCheck($url); // trueが返れば成功
$ex = Domain::externalLinkCheck($url); // falseが返れば成功

var_dump($host);
var_dump($in);
var_dump($ex);

$in = Domain::internalLinkCheck($url,"localhost:2250"); // trueが返れば成功
$ex = Domain::externalLinkCheck($url,"localhost:2250"); // falseが返れば成功

var_dump($in);
var_dump($ex);

$in = Domain::internalLinkCheck($url,"http://example.com"); // falseが返れば成功
$ex = Domain::externalLinkCheck($url,"http://example.com"); // trueが返れば成功

var_dump($in);
var_dump($ex);

$url = "https://example.com";
$host = Domain::hostGet($url);

$in = Domain::internalLinkCheck($url); // falseが返れば成功
$ex = Domain::externalLinkCheck($url); // trueが返れば成功

var_dump($host);
var_dump($in);
var_dump($ex);

$url = "example.com";
$host = Domain::hostGet($url);
var_dump($host);

$url = "localhost";
$host = Domain::hostGet($url);
var_dump($host);

$url = "http://localhost";
$host = Domain::hostGet($url);
var_dump($host);

$url = "localhost:8080";
$host = Domain::hostGet($url);
var_dump($host);

$url = "http://localhost:8080";
$host = Domain::hostGet($url);
var_dump($host);
