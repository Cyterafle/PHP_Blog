<?php


function connection_init(){
    $server = "localhost";
    $username = "root";
    $conn = new mysqli($server, $username, "", "blog");
    if (!$conn){
        die("Problème lors de la connection :" . mysqli_connect_error());
        return NULL;
    }
    return $conn;
}
