<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<?php
print "<body>";
print "<FORM  action='{$_SERVER['PHP_SELF']}'  method='post' enctype='multipart/form-data'>";

print "<input type='submit' name='next' value='Next'>";
if (isset($_POST["next"])) {
    print "Hello " . $_SERVER['PHP_SELF'];
}
print "</form>";
print "</body>";
print "</html>";
