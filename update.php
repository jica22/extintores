<?php
require 'cors.php';
require 'auth.php';
require 'db.php';

$id = $_POST['id'] ?? '';
$andar = $_POST['andar'] ?? '';
$localizacao = $_POST['localizacao'] ?? '';
$tipo = $_POST['tipo'] ?? '';

$imagem = null;

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
    $filename = uniqid("img_", true) . '.' . $ext;
    $uploadPath = $uploadDir . $filename;

    if (!move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadPath)) {
        echo json_encode(["error" => "Falha ao mover nova imagem"]);
        exit;
    }

    $imagem = $uploadPath;
}

if ($imagem) {
    $sql = "UPDATE extintores SET andar = ?, localizacao = ?, tipo = ?, imagem = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $andar, $localizacao, $tipo, $imagem, $id);
} else {
    $sql = "UPDATE extintores SET andar = ?, localizacao = ?, tipo = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $andar, $localizacao, $tipo, $id);
}

$stmt->execute();

echo json_encode(["message" => "Extintor atualizado com sucesso"]);