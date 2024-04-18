<?php
//config.php
// Max dimensions of generated images.
$GLOBALS['maxwidth'] = 500;
$GLOBALS['maxheight'] = 200;
// Max dimensions of generated thumbnails.
$GLOBALS['maxwidththumb'] = 60;
$GLOBALS['maxheightthumb'] = 60;
// Where to store the images and thumbnails.
$GLOBALS['imagesfolder'] = "images";
$GLOBALS['thumbsfolder'] = "images/thumbs";
// Allowed file types and mime types
$GLOBALS['allowedmimetypes'] = array('image/jpeg',
    'image/pjpeg',
    'image/png',
    'image/gif');
$GLOBALS['allowedfiletypes'] = array(
    'jpg' => array('load' => 'ImageCreateFromJpeg',
        'save' => 'ImageJpeg'),
    'jpeg' => array('load' => 'ImageCreateFromJpeg',
        'save' => 'ImageJpeg'),
    'gif' => array('load' => 'ImageCreateFromGif',
        'save' => 'ImageGif'),
    'png' => array('load' => 'ImageCreateFromPng',
        'save' => 'ImagePng')
);
// Number of images per row in the navigation.
$GLOBALS['maxperrow'] = 7;
