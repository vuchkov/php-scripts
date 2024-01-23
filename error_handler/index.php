<?php

function errorHandler (
    int $type,
    string $msg,
    ?string $file = null,
    ?int $line = null
) {
    echo $type . ': ' . $msg . ' in ' . $file . ' on line ' . $line;
    exit;
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

set_error_handler('errorHandler', E_ALL);

//echo $x;
