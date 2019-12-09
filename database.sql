create database ycodes;

create table usuario(
	idUsuario int not null auto_increment primary key,
    nome varchar(30) not null,
    senha varchar(30) not null
);

create table comentario(
	idComentario int not null auto_increment primary key,
    idUsuario int not null,
	foreign key(idUsuario) references usuario(idUsuario),
	comentario varchar(150) not null
);

