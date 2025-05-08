<?php
require 'auth.php';
require 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM extintores WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(["message" => "Extintor removido com sucesso"]);
} else {
    echo json_encode(["error" => "Erro ao remover"]);
}
?>