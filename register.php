<?php
require 'cors.php';
require 'db.php';

$data = json_decode(file_get_contents("php://input"));

$nome = $data->nome;
$email = $data->email;
$senha = $data->senha;

// Criptografar senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nome, $email, $senha_hash);

if ($stmt->execute()) {
    echo json_encode(["message" => "Usuário cadastrado com sucesso"]);
} else {
    echo json_encode(["error" => "Erro ao cadastrar usuário ou email já está em uso"]);
}
?>
