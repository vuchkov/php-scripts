<?php
if (isset($_GET['message']))
    $message = trim(strip_tags(stripslashes($_GET['message'])));
else
    $message = '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script src="http://maps.google.com/maps?file=api&v=1&key=[yourkey]"
            type="text/javascript"></script>
    <script src="functions.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Video Games Jones-ing Helper</title>
</head>
<body onload="init('map', 'messages')">
<div id="main">
    <div id="map"></div>
    <div id="formwrapper">
        <?php if (strlen($message) > 0) { ?>
            <div id="messages">
                <?php echo htmlentities($message) ?>
            </div>
        <?php } else { ?>
            <div id="messages" style="display: none"></div>
        <?php } ?>
        <h3>Add a New Location:</h3>
        <form method="post" action="process_form.php"
              onsubmit="submitForm(this); return false;">
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="locname" maxlength="150" /></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="address" maxlength="150" /></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><input type="text" name="city" maxlength="150" /></td>
                </tr>
                <tr>
                    <td>Province:</td>
                    <td><input type="text" name="province" maxlength="150" /></td>
                </tr>
                <tr>
                    <td>Postal:</td>
                    <td><input type="text" name="postal" maxlength="150" /></td>
                </tr>
                <tr>
                    <td>Latitude:</td>
                    <td><input type="text" name="latitude" maxlength="150" /></td>
                </tr>
                <tr>
                    <td>Longitude:</td>
                    <td><input type="text" name="longitude" maxlength="150" /></td>
                </tr>
            </table>
            <p>
                <input type="submit" value="Add Location" />
            </p>
        </form>
    </div>
</div>
</body>
</html>
