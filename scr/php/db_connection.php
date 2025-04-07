<?php

function OpenCon() {
    // Database connection settings
    $dbhost = 'localhost';  // Host of the database server
    $dbname = 'school_management_system';  // Name of the database
    $dbusername = 'root';  // Database username 
    $dbpassword = '';  // Database password 

    try {
        $con = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);;
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit();  // Stops further script execution if the connection fails
    }

    return $con;  // Return the connection object
}

function CloseCon() {
    // Close the database connection
    $con = null;
}