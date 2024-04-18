<?php
// boolean mail(string to, string subject, string message [, string addl_headers
//[, string addl_params]])

// mail("test@example.com", "This is a subject", "This is the mail body",
//"From:admin@example.com\r\n");

// Pinging a Server
// Which server to ping?
$server = "www.example.com";
// Ping the server how many times?
$count = 3;
// Perform the task
echo "<pre>";
system("/bin/ping -c $count $server");
echo "</pre>";
// Kill the task
system("killall -q ping");

// Creating a Port Scanner
/*$target = "www.example.com";
echo "<pre>";
system("/usr/bin/nmap $target");
echo "</pre>";
// Kill the task
system("killall -q nmap");*/

// Testing User Bandwidth
/*// Retrieve the data to send to the user
$data = file_get_contents("textfile.txt");
// Determine the data's total size, in Kilobytes
$fsize = filesize("textfile.txt") / 1024;
// Define the start time
$start = time();
// Send the data to the user
echo "<!-- $data -->";
// Define the stop time
$stop = time();
// Calculate the time taken to send the data
$duration = $stop - $start;
// Divide the file size by the number of seconds taken to transmit it
$speed = round($fsize / $duration,2);
// Display the calculated speed in Kilobytes per second
echo "Your network speed: $speed KB/sec.";*/
