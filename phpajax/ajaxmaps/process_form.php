<?php
// process_form.php
require_once('dbconnector.php');
opendatabase();
// see whether this is being via ajax or normal form submission
$ajax = (bool) $_POST['ajax'];
$values = array('locname'
=> '',
    'address'
    => '',
    'city'
    => '',
    'province' => '',
    'postal'
    => '',
    'latitude' => '',
    'longitude' => '');
$error = false;
foreach ($values as $field => $value) {
    $val = trim(strip_tags(stripslashes($_POST[$field])));
    $values[$field] = mysql_real_escape_string($val);
    if (strlen($values[$field]) == 0)
        $error = true;
}
if ($error) {
    $message = 'Error adding location';
}
else {
    $query = sprintf("insert into store (%s) values ('%s')",
        join(', ', array_keys($values)),
        join("', '", $values));
    mysql_query($query);
    $message = 'Location added';
}
if ($ajax)
    echo $message;
else {
    header('Location: sample10_1.php?message=' . urlencode($message));
    exit;
}
