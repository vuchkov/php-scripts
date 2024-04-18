<?php
//picnav.php
require_once ("config.php");
require_once ("functions.php");
//Find a total amount of images.
$imgarr = getImages();
$numimages = count($imgarr);
//If there is more than one image.
if ($numimages > 0) {
    $curimage = $_GET['curimage'];
    if (!in_array($curimage, $imgarr))
        $curimage = $imgarr[0];
    $selectedidx = array_search($curimage, $imgarr);
    ?>
    <table id="navtable">
    <tr>
    <?php
    $numtoshow = min($numimages, $GLOBALS['maxperrow']);
    $firstidx = max(0, $selectedidx - floor($numtoshow / 2));
    if ($firstidx + $numtoshow > $numimages)
        $firstidx = $numimages - $numtoshow;
    for ($i = $firstidx; $i < $numtoshow + $firstidx; $i++) {
        $file = $imgarr[$i];
        $selected = $selectedidx == $i;
        $thumb = createthumb($file,
            $GLOBALS['maxwidththumb'],
            $GLOBALS['maxheightthumb'],
            '_th');
        if (!file_exists($thumb) || !is_file($thumb))
            continue;
        ?>
        <td<?php if ($selected) { ?> class="selected"<?php } ?>>
            <a href="sample7_1.php?curimage=<?= $file ?>"
               onclick="imageClick('<?= $file ?>'); return false">
                <img src="<?= $thumb ?>" alt="" />
            </a>
        </td>
        <?php
    }
    ?>
    </tr>
    </table>
    <?php
}
