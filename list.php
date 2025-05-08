<?php
require 'auth.php';
require 'db.php';

$sql = "SELECT * FROM extintores";
$result = $conn->query($sql);

$extintores = [];

while ($row = $result->fetch_assoc()) {
    $extintores[] = $row;
}

echo json_encode($extintores);
?>