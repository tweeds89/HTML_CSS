<?php

$server = '127.0.0.1';
$username = 'root';
$password = '';

$conn = new mysqli($server, $username, $password);

if($conn->connect_error){
    die('Wystąpił błąd'. $conn -> connect_error);
}

$sql = "CREATE DATABASE about";
$result = $conn->query($sql);
   
   if($result){
       echo 'Baza danych about została utworzona';
   }else{
       echo 'Nie udało się utworzyć bazy danych: '. $conn->error;
   }
   
   $conn->close();
    