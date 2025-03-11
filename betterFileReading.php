<?php 

$file = 'copyOfQuotes.txt';

// opening a file for reading
// TUTORIAL: https://www.w3schools.com/php/func_filesystem_fopen.asp
//$handle = fopen($file, 'r'); // read only
//$handle = fopen($file, 'r+');  // read and write
$handle = fopen($file, 'a+');  // will place the pointer at the end of the file 


// read the file
//echo fread($handle, filesize($file));
echo fread($handle, 112);

// read a single line
echo fgets($handle); // s for single line
echo fgets($handle); 
// we just read two lines 

// read a single character
// will read from line 3 bc we just read the first two lines 
echo fgetc($handle);  // c for character
echo fgetc($handle);  // c for character
// will return the first two characters

// writing to a file 
fwrite($handle, "\nTea is great. ");

// always close file after using it
fclose($handle);

// delete a file
unlink($file);
?>