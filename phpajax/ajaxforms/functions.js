//functions.js
function createform (e, thedate){
    theObject = document.getElementById("createtask");
    theObject.style.visibility = "visible";
    theObject.style.height = "200px";
    theObject.style.width = "200px";
    var posx = 0;
    var posy = 0;
    posx = e.clientX + document.body.scrollLeft;
    posy = e.clientY + document.body.scrollTop;
    theObject.style.left = posx + "px";
    theObject.style.top = posy + "px";
//The location we are loading the page into.
    var objID = "createtask";
    var serverPage = "theform.php?thedate=" + thedate;
    var obj = document.getElementById(objID);
    processajax (serverPage, obj, "get", "");
}
//Functions to submit a form.
function getformvalues (fobj, valfunc){
    var str = "";
    aok = true;
    var val;
//Run through a list of all objects contained within the form.
    for(var i = 0; i < fobj.elements.length; i++){
        if(valfunc) {
            if (aok == true){
                val = valfunc (fobj.elements[i].value,fobj.elements[i].name);
                if (val == false){
                    aok = false;
                }
            }
        }
        str += fobj.elements[i].name + "=" + escape(fobj.elements[i].value) + "&";
    }
//Then return the string values.
    return str;
}
function submitform (theform, serverPage, objID, valfunc){
    var file = serverPage;
    var str = getformvalues(theform,valfunc);
//If the validation is ok.
    if (aok == true){
        obj = document.getElementById(objID);
        processajax (serverPage, obj, "post", str);
    }
}
function trim (inputString) {
// Removes leading and trailing spaces from the passed string. Also removes
// consecutive spaces and replaces them with one space. If something besides
// a string is passed in (null, custom object, etc.), then return the input.
    if (typeof inputString != "string") { return inputString; }
    var retValue = inputString;
    var ch = retValue.substring(0, 1);
    while (ch == " ") { // Check for spaces at the beginning of the string
        retValue = retValue.substring(1, retValue.length);
        ch = retValue.substring(0, 1);
    }
    ch = retValue.substring(retValue.length-1, retValue.length);
    while (ch == " ") { // Check for spaces at the end of the string
        retValue = retValue.substring(0, retValue.length-1);
        ch = retValue.substring(retValue.length-1, retValue.length);
    }
    while (retValue.indexOf(" ") != -1) {?
// Note there are two spaces in the string
// Therefore look for multiple spaces in the string
        retValue = retValue.substring(0, retValue.indexOf(" ")) +?
retValue.substring(retValue.indexOf(" ")+1, retValue.length);?
// Again, there are two spaces in each of the strings
    }
    return retValue; // Return the trimmed string back to the user
} // Ends the "trim" function
//Function to validate the addtask form.
function validatetask (thevalue, thename){
    var nowcont = true;
    if (thename == "yourname"){
        if (trim (thevalue) == ""){
            document.getElementById("themessage").innerHTML = ?
"You must enter your name.";
            document.getElementById("newtask").yourname.focus();
            nowcont = false;
        }
    }
    if (nowcont == true){
        if (thename == "yourtask"){
            if (trim (thevalue) == ""){
                document.getElementById("themessage").innerHTML = ?
"You must enter a task.";
                document.getElementById("newtask").yourtask.focus();
                nowcont = false;
            }
        }
    }
    return nowcont;
}
