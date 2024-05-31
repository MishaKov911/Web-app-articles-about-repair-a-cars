<?php 
    session_start();
    // $conn=mysqli_connect("localhost","root","","qanda_db");

    // remote
    // $conn=mysqli_connect("remotemysql.com","XsxkXQfFKh","pdrfBbF76F","XsxkXQfFKh");

    $servername = "localhostforum";
    $database = "qanda_db";
    $username = "root";
    $password = "";

    $conn = mysqli_connect('localhostforum', "root", "", "qanda_db");
?>