<?php

// MySQLi or PDO
// connect to database
$conn = mysqli_connect('localhost', 'shaun', 'test1234', 'ninja_pizza');

// check the connection
if (!$conn) {
    echo 'Connection error' . mysqli_connect_error();
}

?>