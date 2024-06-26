
CREATE DATABASE IF NOT EXISTS roled;
USE roled;
CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT primary key,
    username VARCHAR(20) NOT NULL UNIQUE,
    pwdHash VARCHAR(255) NOT NULL,
    email VARCHAR(30) NOT NULL,
    tipo ENUM('U','A','S','C') NOT NULL,
    avatar VARCHAR(30) DEFAULT NULL,
    fecha_nac DATE CHECK(fecha_nac >= '1900-01-01')
);

CREATE TABLE IF NOT EXISTS design(
    id_design INT AUTO_INCREMENT primary key,
    fecha DATE DEFAULT CURDATE(),
    id_usuario VARCHAR(20) NOT NULL,
    nombre VARCHAR(40) NOT NULL,
    valoraciones INT DEFAULT 0
);

CREATE TABLE IF NOT EXISTS dispositivo (
    id_dispositivo INT AUTO_INCREMENT primary key,
    id_usuario INT NOT NULL
);

ALTER TABLE design
ADD CONSTRAINT fk_usu_des FOREIGN key (id_usuario) references usuarios(username);

ALTER TABLE dispositivo
ADD CONSTRAINT fk_usu_dispo FOREIGN key (id_usuario) references usuarios(id_usuario);