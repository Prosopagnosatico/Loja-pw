CREATE DATABASE ModularProduto;
use ModularProduto;

CREATE TABLE produtos(
    id_produto int AUTO_INCREMENT PRIMARY KEY,
    nome_produto varchar(100),
    descricao text,
    valor decimal(10,2)
);

CREATE TABLE imagens(
    id_imagem int AUTO_INCREMENT PRIMARY KEY,
    nome_imagem varchar(100),
    fk_id_produto int,
    FOREIGN KEy(fk_id_produto) REFERENCES produtos(id_produto)
)

CREATE TABLE usuarios{
    id_usuario int AUTO_INCREMENT PRIMARY KEY,
    nome_usuario varchar(200),
    email varchar(200),
    senha varchar(200)
}