<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Robots;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

$robots = new Robots(trim($_GET['url'], '/'));
$responseCode = $robots->getRespondeCode();

echo $twig->load('response-table.twig')->render([
    'isExists' => $robots->checkExists(),
    'isSuccessfulResponse' => str_contains($responseCode, '200'),
    'responseCode' => $responseCode,
    'hostsQuantity' => $robots->countHosts(),
    'size' => $robots->validateSize(),
    'isSitemapExists' => $robots->checkSitemap(),
]);
