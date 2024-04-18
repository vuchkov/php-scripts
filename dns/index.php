<?php
$recordexists = checkdnsrr("example.com", "ANY");
if ($recordexists)
    echo "The domain name exists!";
else
    echo "The domain name does not appear to exist!";

/*$email = "ceo@example.com";
$domain = explode("@",$email);
$valid = checkdnsrr($domain[1], "ANY");
if($valid)
    echo "The domain exists!";
else
    echo "Cannot locate MX record for $domain[1]!";*/

/*$result = dns_get_record("example.com");
$result = dns_get_record("example.com", DNS_A);
print_r($result);*/
/*getmxrr("wjgilmore.com", $mxhosts);
print_r($mxhosts);*/
/*echo "HTTP's default port number is: ".getservbyname("http", "tcp").'<br>';
echo "Port 80's default service is: ".getservbyport(80, "tcp");*/

// Establishing Socket Connections
/*// Establish a port 80 connection with www.example.com
$http = fsockopen("www.example.com",80);
// Send a request to the server
$req = "GET / HTTP/1.1\r\n";
$req .= "Host: www.example.com\r\n";
$req .= "Connection: Close\r\n\r\n";
fputs($http, $req);
// Output the request results
while(!feof($http)) {
    echo fgets($http, 1024);
}
// Close the connection
fclose($http);*/

// Creating a Port Scanner with fsockopen()
/*// Give the script enough time to complete the task
ini_set("max_execution_time", 120);
// Define scan range
$rangeStart = 0;
$rangeStop = 1024;
// Which server to scan?
$target = "localhost";
// Build an array of port values
$range =range($rangeStart, $rangeStop);
echo "<p>Scan results for $target</p>";
// Execute the scan
foreach ($range as $port) {
    $result = @fsockopen($target, $port,$errno,$errstr,1);
    if ($result) echo "<p>Socket open at port $port</p>";
}*/
