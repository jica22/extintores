<?php

if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    http_response_code(403);
    echo json_encode(["error" => "Acesso não autorizado, não é admin."]);
    exit;
}
?>