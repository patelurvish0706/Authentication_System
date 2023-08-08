<?php

    $host = "localhost";
    $dbname = "login_db"; // Make sure first you are setup database.
    $username = "root"; //Enter Username (else keep as it is).
    $password = ""; // enter Password into "".(if available)

    // --- Creating Connection ---
    $mysqli = new mysqli($host, $username, $password, $dbname);

    // --- Check the connection ---
    if ($mysqli->connect_errno) {
        die("Connection Error: " . $mysqli->connect_error);
    }

    return $mysqli;

?>