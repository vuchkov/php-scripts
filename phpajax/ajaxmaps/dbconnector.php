<?php
// dbconnector.php
$GLOBALS['host'] = 'localhost';
$GLOBALS['user'] = 'webuser';
$GLOBALS['pass'] = 'secret';
$GLOBALS['db'] = 'apress';
function opendatabase()
{
    $db = mysql_connect($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pass']);
    if (!$db)
        return false;
    if (!mysql_select_db($GLOBALS['db'], $db))
        return false;
    return true;
}
