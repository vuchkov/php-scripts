<?php
//midpic.php
require_once ("config.php");
require_once ("functions.php");
$imgarr = getImages();
// If our gallery contains images, show either the selected
// image, or if there are none selected, then show the first one.
if (count($imgarr) > 0) {
    $curimage = $_GET['curimage'];
    if (!in_array($curimage, $imgarr))
        $curimage = $imgarr[0];
// Create a smaller version in case of huge uploads.
    $thumb = createthumb($curimage,
        $GLOBALS['maxwidth'],
        $GLOBALS['maxheight'],
        '_big');
    if (file_exists($thumb) && is_file($thumb)) {
        ?>
        <div id="imagecontainer">
            <img src="<?= $thumb ?>" alt="" />
        </div>
        <div id="imageoptions">
            <a href="delpic.php?pic=<?= $curimage ?>"
               onclick="removeimg ('<?= $curimage ?>'); return false">
                <img src="delete.png" alt="Delete image" />
            </a>
        </div>
        <?php
    }
}
else
    echo "Gallery is empty.";
