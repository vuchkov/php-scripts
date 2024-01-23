<?php

ini_get('display_errors');
ini_set('display_errors', 1);

$dir = scandir(__DIR__);
//var_dump($dir);

//mkdir('test');
//rmdir('test');

mkdir('test/subtest', recursive: true);

/*if (file_exists('read.me')) {
    echo filesize('read.me');
    file_put_contents('read.me', 'hello world');
    clearstatcache();
    echo filesize('read.me');
} else {
    echo 'File not found';
}*/

if (! file_exists('read.me')) {
    echo 'File not found';
    return;
}
$file = @fopen('read.me', 'r');
//var_dump($file);
while ($line = fgets($file) !== false) {
//while ($line = fgetcsv($file) !== false) {
    echo $line . '<br>';
}
fclose($file);

$content = file_get_contents('read.me', offset: 3, length: 2);
echo $content;
file_put_contents('read.me', 'hello world');
file_put_contents('read.me', 'guys', FILE_APPEND);

unlink('read.me');
copy('read.me', 'readme.txt');
rename('read.me', 'readme.txt');
