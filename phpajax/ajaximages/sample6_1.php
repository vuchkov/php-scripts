<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sample 6_1</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="text/javascript" src="xmlhttp.js"></script>
    <script type="text/javascript" src="functions.js"></script>
</head>
<body>
<div id="showimg"></div>
<form id="uploadform" action="process_upload.php" method="post"
      enctype="multipart/form-data" target="uploadframe"
      onsubmit="uploadimg(this); return false">
    Upload a File:<br />
    <input type="file" id="myfile" name="myfile" />
    <input type="submit" value="Submit" />
    <iframe id="uploadframe" name="uploadframe" src="process_upload.php"
            class="noshow"></iframe>
</form>
</body>
</html>
