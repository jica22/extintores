<?php
require 'cors.php';
session_start();
require 'db.php';

$data = json_decode(file_get_contents("php://input"));

$email = $data->email;
$senha = $data->senha;

$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    
    if (password_verify($senha, $user['senha'])) {
        $_SESSION['user_id'] = $user['id'];
        echo json_encode(["message" => "Login bem-sucedido", "usuario" => $user['nome']]);
    } else {
        echo json_encode(["error" => "Senha incorreta"]);
    }
} else {
    echo json_encode(["error" => "Usuário não encontrado"]);
}
?>