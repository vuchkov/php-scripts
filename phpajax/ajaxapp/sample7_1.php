<!-- sample7_1.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Sample 7_1</title>
    <script type="text/javascript" src="functions.js"></script>
</head>
<body>
<h1>My Gallery</h1>
<div id="maindiv">
    <!-- Big Image -->
    <div id="middiv">
        <?php require_once ("midpic.php"); ?>
    </div>
    <!-- Messages -->
    <div id="errordiv"></div>
    <!-- Image navigation -->
    <div id="picdiv"><?php require_once ("picnav.php"); ?></div>
</div>
<h2>Add An Image</h2>
<form action="process_upload.php" method="post" target="uploadframe"
      enctype="multipart/form-data" onsubmit="uploadimg(this); return false">
    <input type="file" id="myfile" name="myfile" />
    <input type="submit" value="Submit" />
    <iframe id="uploadframe" name="uploadframe" src="process_upload.php">
    </iframe>
</form>
</body>
</html>