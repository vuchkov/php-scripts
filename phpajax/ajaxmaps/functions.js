//functions.js
// div to hold the map
var mapContainer = null;
// div to hold messages
var msgContainer = null;
// coords for Calgary
var mapLng = -114.06;
var mapLat = 51.05;
var mapZoom = 7;
// locations xml file
var locationsXml = 'locations.php';
function trim(str)
{
    return str.replace(/^(\s+)?(\S*)(\s+)?$/, '$2');
}
function showMessage(msg)
{
    if (msg.length == 0)
        msgContainer.style.display = 'none';
    else {
        msgContainer.innerHTML = msg;
        msgContainer.style.display = 'block';
    }
}
function init(mapId, msgId)
{
    mapContainer = document.getElementById(mapId);
    msgContainer = document.getElementById(msgId);
    loadMap();
}
function createInfoMarker(point, theaddy)
{
    var marker = new GMarker(point);
    GEvent.addListener(marker, "click",
        function() {
            marker.openInfoWindowHtml(theaddy);
        }
    );
    return marker;
}
function loadMap()
{
    var map = new GMap(mapContainer);
    map.addControl(new GMapTypeControl());
    map.addControl(new GLargeMapControl());
    map.centerAndZoom(new GPoint(mapLng, mapLat), mapZoom);
    var request = GXmlHttp.create();
    request.open("POST", locationsXml, true);
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var xmlDoc = request.responseXML;
            var markers = xmlDoc.documentElement.getElementsByTagName("marker");
            for (var i = 0; i < markers.length; i++) {
                var point = new GPoint(parseFloat(markers[i].getAttribute("longitude")),
                    parseFloat(markers[i].getAttribute("latitude")));
                var theaddy = '<div class="location"><strong>'
                    + markers[i].getAttribute('locname')
                    + '</strong><br />';
                theaddy += markers[i].getAttribute('address') + '<br />';
                theaddy += markers[i].getAttribute('city') + ', '
                    + markers[i].getAttribute('province') + '<br />'
                    + markers[i].getAttribute('postal') + '</div>';
                var marker = createInfoMarker(point, theaddy);
                map.addOverlay(marker);
            }
        }
    }
    request.send('a');
}
function submitForm(frm)
{
    var fields = {
        locname
: 'You must enter a location name',
    address
: 'You must enter an address',
    city
: 'You must enter the city',
    province : 'You must enter the province',
    postal
: 'You must enter a postal code',
    latitude : 'You must enter the latitude',
    longitude : 'You must enter the longitude'
};
    var errors = [];
    var values = 'ajax=1';
    for (field in fields) {
        val = frm[field].value;
        if (trim(val).length == 0)
            errors[errors.length] = fields[field];
        values += '&' + field + '=' + escape(val);
    }if (errors.length > 0) {
    var errMsg = '<strong>The following errors have occurred:</strong>';
    + '<br /><ul>\n';
    for (var i = 0; i < errors.length; i++){
        errMsg += '<li>' + errors[i] + '</li>\n';
    }
    errMsg += '</ul>\n';
    showMessage(errMsg);
    return false;
}
//Create a loading message.
    mapContainer.innerHTML = "<b>Loading...</b>";
    var xmlhttp = GXmlHttp.create();
    xmlhttp.open("POST", frm.action, true);
    xmlhttp.setRequestHeader("Content-Type",
        "application/x-www-form-urlencoded; charset=UTF-8");
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            showMessage(xmlhttp.responseText);
        }
    }
    xmlhttp.send(values);
    setTimeout("loadMap()",1000);
}
