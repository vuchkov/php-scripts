<?php
require_once ("config.php");
require_once ("functions.php");
// Check for a valid file upload.
if (!isset($_FILES['myfile']) || $_FILES['myfile']['error'] != UPLOAD_ERR_OK)
    exit;
// Check for a valid file type.
if (in_array($_FILES['myfile']['type'], $GLOBALS['allowedmimetypes'])){
// Finally, copy the file to our destination directory.
    $dstPath = $GLOBALS['imagesfolder'] . '/' . $_FILES['myfile']['name'];
    move_uploaded_file($_FILES['myfile']['tmp_name'], $dstPath);
}
