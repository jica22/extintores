<?php
require 'cors.php';
require 'auth.php';
require 'db.php';

$andar = $_POST['andar'] ?? '';
$localizacao = $_POST['localizacao'] ?? '';
$tipo = $_POST['tipo'] ?? '';

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    $filename = basename($_FILES['imagem']['name']);
    $uploadPath = $uploadDir . $filename;

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadPath)) {
        $sql = "INSERT INTO extintores (andar, localizacao, tipo, imagem) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $andar, $localizacao, $tipo, $uploadPath);
        $stmt->execute();
        echo json_encode(["message" => "Extintor inserido com imagem"]);
    } else {
        echo json_encode(["error" => "Falha ao mover imagem"]);
    }
} else {
    echo json_encode(["error" => "Imagem não enviada"]);
}
