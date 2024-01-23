<?php

ob_start();
include './tpl/menu.php';
$nav = ob_get_clean();

$nav = str_replace('About', 'About us', $nav);
echo $nav;
