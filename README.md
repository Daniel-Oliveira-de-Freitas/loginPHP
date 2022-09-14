# loginPHP

# criando o data base
CREATE DATABASE selke;

# criando a tebela usuarios
CREATE TABLE students ( 
id INT(6) AUTO_INCREMENT PRIMARY KEY, 
nome VARCHAR(255) NOT NULL, 
usuario VARCHAR(255) NOT NULL, 
senha_usuario VARCHAR(255) NOT NULL,
fone VARCHAR(255) NOT NULL, 
curso VARCHAR(255) NOT NULL )
