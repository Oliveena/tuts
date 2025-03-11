<?php

// $quotes = readfile('quotes.txt');
// echo $quotes;

$file = 'quotes.txt';

if (file_exists($file)) {

    // // read file
    // echo readfile($file);

    // //copy file
    // copy($file, 'copyOfQuotes.txt');

    // // absolute path
    // echo realpath($file) . '<br>';

    // // file size
    // echo filesize($file) . '<br>';

    //     // rename the file
    //  rename($file, 'renamedTxtFile.txt');

} else {
    echo 'file does not exist';
}

// make dir

//mkdir('quotes');
