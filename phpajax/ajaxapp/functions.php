<?php
// functions.php
// A function to create an array of all the images in the folder.
function getImages()
{
    $images = array();
    if (is_dir($GLOBALS['imagesfolder'])) {
        $files = scandir ($GLOBALS['imagesfolder']);
        foreach ($files as $file) {
            $path = $GLOBALS['imagesfolder'] . '/' . $file;
            if (is_file($path)) {
                $pathinfo = pathinfo($path);
                if (array_key_exists($pathinfo['extension'],
                    $GLOBALS['allowedfiletypes']))
                    $images[] = $file;
            }
        }
    }
    return $images;
}
// Calculate the new dimensions based on maximum allowed dimensions.
function calculateDimensions($width, $height, $maxWidth, $maxHeight)
{
    $ret = array('w' => $width, 'h' => $height);
    $ratio = $width / $height;
    if ($width > $maxWidth || $height > $maxHeight) {
        $ret['w'] = $maxWidth;
        $ret['h'] = $ret['w'] / $ratio;
        if ($ret['h'] > $maxHeight) {
            $ret['h'] = $maxHeight;
            $ret['w'] = $ret['h'] * $ratio;
        }
    }
    return $ret;
}
// A function to change the size of an image.
function createThumb($img, $maxWidth, $maxHeight, $ext = '')
{
    $path = $GLOBALS['imagesfolder'] . '/' . basename($img);
    if (!file_exists($path) || !is_file($path))
        return;
    $pathinfo = pathinfo($path);
    $extension = $pathinfo['extension'];
    if (!array_key_exists($extension, $GLOBALS['allowedfiletypes']))
        return;
    $cursize = getImageSize($path);
    $newsize = calculateDimensions($cursize[0], $cursize[1],
        $maxWidth, $maxHeight);
    $newfile = preg_replace('/(\.' . preg_quote($extension, '/') . ')$/',
        $ext . '\\1', $img);
    $newpath = $GLOBALS['thumbsfolder'] . '/' . $newfile;
    $loadfunc = $GLOBALS['allowedfiletypes'][$extension]['load'];
    $savefunc = $GLOBALS['allowedfiletypes'][$extension]['save'];
    $srcimage = $loadfunc($path);
    $dstimage = ImageCreateTrueColor($newsize['w'], $newsize['h']);
    ImageCopyResampled($dstimage, $srcimage,
        0, 0, 0, 0,
        $newsize['w'], $newsize['h'],
        $cursize[0], $cursize[1]);
    $savefunc($dstimage, $newpath);
    return $newpath;
}
