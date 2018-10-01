<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblioteca";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        echo 'Database connection error';
        die("Connection failed: " . $conn->connect_error);
    }

    mysqli_query($conn, "SET NAMES 'utf8'");
	mysqli_query($conn, 'SET character_set_connection=utf8');
	mysqli_query($conn, 'SET character_set_client=utf8');
	mysqli_query($conn, 'SET character_set_results=utf8');

?>