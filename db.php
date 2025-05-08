<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "api_allan";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>