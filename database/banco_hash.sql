CREATE DATABASE bancohash;

USE bancohash;

CREATE TABLE usuario(
    id int primary key auto_increment,
    nome varchar(30),
    email varchar(100) unique,
    senha varchar(255),
    data_criacao timestamp default current_timestamp,
    foto_perfil varchar(255) default 'default.jpg'
);

