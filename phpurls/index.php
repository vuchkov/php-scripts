<?php

//session_start();

if (PHP_SAPI == 'cli') {
    echo 'Server protocol: ' . $_SERVER['SERVER_PROTOCOL'] . PHP_EOL;
    exit;
}

function htmlHeader(
    $arr = ['index', '/', 'Index page', 'Homepage of the website', 'index,webpage,website','img/logo.webp']
): string {
    return <<<EOT

EOT;
}

function htmlFooter(): string {
    return '';
}

function urlToArray($url) {
    $res = []; $counter = 1;
    var_dump(strpos($url, DIRECTORY_SEPARATOR));
    if (str_contains($url, DIRECTORY_SEPARATOR)) {
        $urls = explode('/', $url);
        echo '<h1>'.count($urls).'</h1>';
        foreach ($urls as $url)
            if (!empty($url)) {
                $res[$counter] = $url;
                $counter++;
                break;
            }
    }
    return $res;
}

$requested_url = !empty($_SERVER['REQUEST_URI']) ? urldecode($_SERVER['REQUEST_URI']) : '/';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    switch ($requested_url) {
        case DIRECTORY_SEPARATOR:
            echo htmlHeader([
                'index',
                '/',
                'Index page',
                'Homepage of the website',
                'index,webpage,website',
                'img/logo.webp'
            ]);
            echo $content = '';
            echo htmlFooter();
            break;
        default: $requested_url = urlToArray($requested_url);
    }
    if ((count($requested_url) === 1) && is_int($requested_url[1])) {

    }
    else {
        switch ($requested_url[1]) {
            case 'about':
                break;
            default: echo '404 not found';
        }
    }
}
else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<pre>';
    var_dump($_POST, $_SERVER);
    echo '</pre>';
}

// Debug info.
/*$url = 'http://username:password@hostname:9090/path?arg=value#anchor';
var_dump(parse_url($url));
var_dump(parse_url($url, PHP_URL_SCHEME));
var_dump(parse_url($url, PHP_URL_USER));
var_dump(parse_url($url, PHP_URL_PASS));
var_dump(parse_url($url, PHP_URL_HOST));
var_dump(parse_url($url, PHP_URL_PORT));
var_dump(parse_url($url, PHP_URL_PATH));
var_dump(parse_url($url, PHP_URL_QUERY));
var_dump(parse_url($url, PHP_URL_FRAGMENT));*/

echo '<pre>';
var_dump($_SERVER);
echo '</pre>';
