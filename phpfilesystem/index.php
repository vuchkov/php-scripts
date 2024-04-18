<?php
/*$path = '/home/www/data/users.txt';
printf("Filename: %s <br />", basename($path));
printf("Filename sans extension: %s <br />", basename($path, ".txt"));
printf("Directory path: %s", dirname($path));*/

/*$pathinfo = pathinfo('/home/www/htdocs/book/chapter10/index.html');
printf("Dir name: %s <br />", $pathinfo['dirname']);
printf("Base name: %s <br />", $pathinfo['basename']);
printf("Extension: %s <br />", $pathinfo['extension']);
printf("Filename: %s <br />", $pathinfo['filename']);*/

/*$imgPath = '../testimage.jpg';
$absolutePath = realpath($imgPath);
// Returns /www/htdocs/book/images/cover.gif*/

/*$file = '/www/htdocs/book/chapter1.pdf';
$bytes = filesize($file);
$kilobytes = round($bytes/1024, 2);
printf("File %s is $bytes bytes, or %.2f kilobytes", basename($file), $kilobytes);*/

/*$partition = '/usr';
// Determine total partition space
$totalSpace = disk_total_space($partition) / 1048576;
// Determine used partition space
$usedSpace = $totalSpace - disk_free_space($partition) / 1048576;
printf("Partition: %s (Allocated: %.2f MB. Used: %.2f MB.)",
    $partition, $totalSpace, $usedSpace);*/

/*function directorySize($directory) {
    $directorySize=0;
// Open the directory and read its contents.
    if ($dh = @opendir($directory)) {
// Iterate through each directory entry.
        while (($filename = readdir ($dh))) {
// Filter out some of the unwanted directory entries
            if ($filename != "." && $filename != "..")
            {
// File, so determine size and add to total
                if (is_file($directory."/".$filename))
                    $directorySize += filesize($directory."/".$filename);
// New directory, so initiate recursion
                if (is_dir($directory."/".$filename))
                    $directorySize += directorySize($directory."/".$filename);
            }
        }
    }
    @closedir($dh);
    return $directorySize;
}
$directory = '/usr/';
$totalSize = round((directorySize($directory) / 1048576), 2);
printf("Directory %s: %f MB", $directory: "$totalSize);*/

/*$file = '/var/www/www/index.html';
//printf("File last accessed: %s", date("m-d-y g:i:sa", fileatime($file)));
//printf("File inode last changed: %s", date("m-d-y g:i:sa", filectime($file)));
echo "File last updated: ".date("m-d-y g:i:sa", filemtime($file));*/

/*// Open a text file for reading purposes
$fh = fopen('/var/www/www/index.html', 'r');
//$fh = fopen('/var/www/www/index.html', 'w');
// While the end-of-file hasn't been reached, retrieve the next line
while (!feof($fh)) echo fgets($fh);
// Close the file
fclose($fh);*/

/*
// Read the file into an array
$users = file('/var/www/www/index.html');
// Cycle through the array
foreach ($users as $user) {
// Parse the line, retrieving the name and e-mail address
    list($name, $email) = explode(' ', $user);
// Remove newline from $email
    $email = trim($email);
// Output the formatted name and e-mail address
    echo "<a href=\"mailto:$email\">$name</a> <br /> ";
}*/

/*// Open the subscribers data file
$fh = fopen('/home/www/data/subscribers.csv', 'r');
// Break each line of the file into three parts
while (list($name, $email, $phone) = fgetcsv($fh, 1024, ',')) {
// Output the data in HTML format
    printf("<p>%s (%s) Tel. %s</p>", $name, $email, $phone);
}*/

/*// Read the file into an array
$users = file('/home/www/data/subscribers.csv');
foreach ($users as $user) {
// Break each line of the file into three parts
    list($name, $email, $phone) = explode(',', $user);
// Output the data in HTML format
    printf("<p>%s (%s) Tel. %s</p>", $name, $email, $phone);*/

/*// Reading a Specific Number of Characters.
// Open a handle to users.txt
$fh = fopen('/home/www/data/users.txt', 'r');
// While the EOF isn't reached, read in another line and output it
while (!feof($fh)) echo fgets($fh);
// Close the handle
fclose($fh);*/

/*// Stripping Tags from Input.
// Build list of acceptable tags
$tags = '<h2><h3><p><b><a><img>';
// Open the article, and read its contents.
$fh = fopen('article.html', 'r');
while (! feof($fh)) {
    $article .= fgetss($fh, 1024, $tags);
}
// Close the handle
fclose($fh);
// Open the file up in write mode and output its contents.
$fh = fopen('article.html', 'w');
fwrite($fh, $article);
// Close the handle
fclose($fh);*/

/*$file = '/home/www/data/users.txt';
// Open the file for reading
$fh = fopen($file, 'r');
// Read in the entire file
$userdata = fread($fh, filesize($file));
// Close the file handle
fclose($fh);*/

/*// Reading in an Entire File.
$file = '/home/www/articles/gilmore.html';
// Output the article to the browser.
$bytes = readfile($file);*/

/*// Reading a File According to a Predefined Format.
$fh = fopen('socsecurity.txt', 'r');
// Parse each SSN in accordance with integer-integer-integer format
while ($user = fscanf($fh, "%d-%d-%d")) {
    // Assign each SSN part to an appropriate variable
    list ($part1,$part2,$part3) = $user;
    printf(“Part 1: %d Part 2: %d Part 3: %d <br />", $part1, $part2, $part3);
}
fclose($fh);*/

// Writing a String to a File
/*// Data we'd like to write to the subscribers.txt file
$subscriberInfo = 'Jason Gilmore|jason@example.com';
// Open subscribers.txt for writing
$fh = fopen('/home/www/data/subscribers.txt', 'a');
// Write the data
fwrite($fh, $subscriberInfo);
// Close the handle
fclose($fh);*/

// int fseek(resource handle, int offset [, int whence])
// int ftell(resource handle)
// int rewind(resource handle)

// Reading Directory Contents
// Opening a Directory Handle
// resource opendir(string path [, resource context])
// void closedir(resource directory_handle)

/*// Parsing Directory Contents
$dh = opendir('/var/www/html/');
while ($file = readdir($dh))
    echo "$file <br />";
closedir($dh);

// Reading a Directory into an Array
print_r(scandir('/var/www/html/'));*/

// Executing Shell Commands.
/*function deleteDirectory($dir)
{
    if ($dh = opendir($dir))
    {
// Iterate through directory contents
        while (($file = readdir ($dh)) != false)
        {
            if (($file == ".") || ($file == "..")) continue;
            if (is_dir($dir . '/' . $file))
                deleteDirectory($dir . '/' . $file);
            else
                unlink($dir . '/' . $file);
        }
        closedir($dh);
        rmdir($dir);
    }
}
$dir = '/usr/local/apache2/htdocs/book/chapter10/test/';
deleteDirectory($dir);*/

// boolean rename(string oldname, string newname [, resource context])
// int touch(string filename [, int time [, int atime]])
// boolean rename(string oldname, string newname [, resource context])
// string escapeshellarg(string arguments)
// string escapeshellcmd(string command)
/*$outcome = exec("languages.pl", $results);
foreach ($results as $result) echo $result;*/
// Retrieving a System Command’s Results.
// string system(string command [, int return_var])

// Executing a Shell Command with Backticks
/*$result = `date`;
printf("<p>The server timestamp is: %s", $result);*/
/*$result = shell_exec('date');
printf("<p>The server timestamp is: %s</p>", $result);*/

// string escapeshellarg(string arguments)
// string escapeshellcmd(string command)
// exec("/usr/bin/".$command."inventory_manager ".$sku." ".$inventory);
// string htmlentities(string input [, int quote_style [, string charset]])
// string strip_tags(string str [, string allowed_tags])
/*$email = "john@@example.com";
if (! filter_var($email, FILTER_VALIDATE_EMAIL))
{
    echo "INVALID E-MAIL!";
}*/
/*$ipAddress = "192.168.1.01";
if (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6))
{
    echo "Please provide an IPV6 address!";
}*/
/*$userInput = "Love the site. E-mail me at <a href='http://www.example.com'>Spammer</a>.";
$sanitizedInput = filter_var($userInput, FILTER_SANITIZE_STRING);
// $sanitizedInput = Love the site. E-mail me at Spammer.*/
