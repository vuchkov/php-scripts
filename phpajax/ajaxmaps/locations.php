<?php
// locations.php
require_once('dbconnector.php');
opendatabase();
$query = sprintf('select * from store');
$result = mysql_query($query);
$rowXml = '<marker latitude="%s" longitude="%s" locname="%s"'
    .= ' address="%s" city="%s" province="%s" postal="%s" />';
$xml = "<markers>\n";
while ($row = mysql_fetch_array($result)) {
    $xml .= sprintf($rowXml . "\n",
        htmlentities($row['latitude']),
        htmlentities($row['longitude']),
        htmlentities($row['locname']),
        htmlentities($row['address']),
        htmlentities($row['city']),
        htmlentities($row['province']),
        htmlentities($row['postal']));
}
$xml .= "</markers>\n";
header('Content-type: text/xml');
echo $xml;
