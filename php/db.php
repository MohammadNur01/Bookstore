<?php
function createDb()
{
    $servername = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "bookstore";

    // Create connection
    $con = mysqli_connect($servername, $dbuser, $dbpass);

    // check connection
    if (!$con) {
        die("Connection Failed:" . mysqli_connect_error());
    }

    // create database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if (mysqli_query($con, $sql)) {
        $con = mysqli_connect($servername, $dbuser, $dbpass, $dbname);

        $sql = "
            CREATE TABLE IF NOT EXISTS books(
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                book_name VARCHAR(25) NOT NULL,
                book_publisher VARCHAR(20),
                book_price FLOAT
            );
        ";
        if (mysqli_query($con, $sql)) {
            return $con;
        } else {
            echo "Cannot Create Table...!";
        }
    } else {
        echo "Error while creating database" . mysqli_error($con);
    }
}
