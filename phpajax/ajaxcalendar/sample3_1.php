<!-- sample3_1.html -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"?
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Sample 3_1</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <script type="text/javascript" src="functions.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="createtask" class="formclass"></div>
<div id="autocompletediv" class="autocomp"></div>
<div id="taskbox" class="taskboxclass"></div>
<p><a href="javascript://" onclick="showHideCalendar()">?
        <img id="opencloseimg" src="images/plus.gif" alt="" title="" ?
             style="border: none; width: 9px; height: 9px;" /></a>?
    <a href="javascript://" onclick="showHideCalendar()">My Calendar</a></p>
<div id="calendar" style="width: 105px; text-align: left;"></div>
</body>
</html>
//functions.js
//Create a boolean variable to check for a valid IE instance.
var xmlhttp = false;
//Check if we are using IE.
try {
//If the javascript version is greater than 5.
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
//If not, then use the older active x object.
try {
//If we are using IE.
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
} catch (E) {
//Else we must be using a non-IE browser.
xmlhttp = false;
}
}
//If we are using a non-IE browser, create a JavaScript instance of the object.
if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
xmlhttp = new XMLHttpRequest();
}
//A variable used to distinguish whether to open or close the calendar.
var showCalendar = true;
function showHideCalendar() {
//The location we are loading the page into.
var objID = "calendar";
//Change the current image of the minus or plus.
if (showCalendar == true){
//Show the calendar.
document.getElementById("opencloseimg").src = "images/mins.gif";
//The page we are loading.
var serverPage = "calendar.php";
//Set the open close tracker variable.
showCalendar = false;
var obj = document.getElementById(objID);
xmlhttp.open("GET", serverPage);
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
obj.innerHTML = xmlhttp.responseText;
}
}
xmlhttp.send(null);
} else {
//Hide the calendar.
document.getElementById("opencloseimg").src = "images/plus.gif";
showCalendar = true;
document.getElementById(objID).innerHTML = "";
}
}