//functions.js
//Create a boolean variable to check for a valid Internet Explorer instance.
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
//If we are using a non-IE browser, create a javascript instance of the object.
if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
    xmlhttp = new XMLHttpRequest();
}
//Function to run a word grabber script.
function grabword (theelement){
//If there is nothing in the box, run Ajax to populate it.
    if (document.getElementById(theelement).innerHTML.length == 0){
//Change the background color.
        document.getElementById(theelement).style.background = "#CCCCCC";
        serverPage = "wordgrabber.php";
        var obj = document.getElementById(theelement);
        xmlhttp.open("POST", serverPage);
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                obj.innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.send(null);
    } else {
//Change the background color.
        document.getElementById(theelement).style.background = "#FFFFFF";
//If the box is already populated, clear it.
        document.getElementById(theelement).innerHTML = "";
    }
}
