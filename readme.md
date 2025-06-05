# Como rodar
1. Coloque essa pasta na pasta htdocs do seu xampp
2. Abra o xampp e rode o apache e o MySQL
3. Crie um banco de dados novo chamado 'api_allan', com o user como 'root' e a senha ''
4. Crie as tabelas abaixo por meio de comandos SQL:

# COMANDOS SQL A EXECUTAR
CREATE TABLE extintores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    andar VARCHAR(50) NOT NULL,
    localizacao VARCHAR(100) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    imagem VARCHAR(255) DEFAULT NULL
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    admin INT(1) DEFAULT 0
);

# OBS:
Você provavelmente irá querer colocar seu usuário como admin do sistema.
Para ser admin do sistema você precisa mudar manualmente no banco de dados se seu usuário é admin.

- COMO FAZER ISSO?
1. Após registrar-se no site, vá para o banco de dados 'api_allan'.
2. Vá para a tabela usuarios, e pegue o ID da conta que você criou.
3. Rode o comando SQL abaixo:

- COMANDO (troque X pelo ID do seu usuario):
UPDATE usuarios
SET admin = 1
WHERE id = X;
