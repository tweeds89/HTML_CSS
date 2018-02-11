<?php
require_once 'connection.php';

$sql = "CREATE TABLE users (
       id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
       first_name varchar(256) NOT NULL,
       last_name varchar(256) NOT NULL,
       email varchar(256) NOT NULL,
       username varchar(256) NOT NULL,
       password varchar(256) NOT NULL)";

$result = $conn->query($sql);

if ($result == TRUE) {
    echo "Tabela users została stworzona poprawnie <br>";
} else {
    echo "Tabela users nie została stworzona: ". $conn->error;
}