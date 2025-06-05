<?php
require 'cors.php';
session_start();

if (isset($_SESSION['user_id'])) {
    echo json_encode([
        "logado" => true,
        "user_id" => $_SESSION['user_id'],
        "usuario" => $_SESSION['usuario'] ?? null,
        "admin" => $_SESSION['admin'] ?? false
    ]);
} else {
    echo json_encode(["logado" => false]);
}
?>