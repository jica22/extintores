<?php
require 'auth.php';
require 'db.php';

$data = json_decode(file_get_contents("php://input"));

$andar = $data->andar;
$localizacao = $data->localizacao;
$tipo = $data->tipo;

$sql = "INSERT INTO extintores (andar, localizacao, tipo) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $andar, $localizacao, $tipo);

if ($stmt->execute()) {
    echo json_encode(["message" => "Extintor cadastrado com sucesso"]);
} else {
    echo json_encode(["error" => "Erro ao cadastrar"]);
}
?>