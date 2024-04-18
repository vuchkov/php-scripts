<?php
//delpic.php
require_once ("config.php");
require_once ("functions.php");
$imgarr = getImages();
$pic = $_GET['pic'];
$succ = false;
if (in_array($pic, $imgarr)) {
    $path = $GLOBALS['imagesfolder'] . '/' . $pic;
    $succ = unlink($path);
}
?>
<div class="status">
    <?php if ($succ) { ?>
        <div>
            Image successfully removed.
        </div>
    <?php } else { ?>
        <div class="status-err">
            Image could not be removed.
        </div>
    <?php } ?>
</div>