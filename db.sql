drop database if exists propositos;
create database propositos;


create table usuarios(
    id int primary key auto_increment,
    email  varchar(100) unique,
    nombre varchar(100),
    password varchar(32),
    creacion datetime default CURRENT_TIMESTAMP,
    actualizacion datetime default CURRENT_TIMESTAMP
);

create table propositos(
    id int primary key auto_increment,
    id_usuario int not null,
    foreign key (id_usuario) references usuarios(id),
    proposito varchar(150),
    vencimiento date
);