
CREATE DATABASE IF NOT EXISTS viajesparati_proveidors;

USE viajesparati_proveidors;

CREATE TABLE IF NOT EXISTS Proveidors(
    id INT(255) AUTO_INCREMENT NOT NULL,
    nom VARCHAR(75),
    email VARCHAR(100),
    telefon VARCHAR(16),
    tipus VARCHAR(75),
    estat TINYINT(1),
    create_at DATETIME,
    edited_at DATETIME,
    CONSTRAINT pk_proveedors PRIMARY KEY(id)
)

INSERT INTO `Proveidors` (`nom`, `email`, `telefon`, `tipus`, `estat`) VALUES ('Adrià Milan', 'adria4milan@gmail.com', '+34 635 92 99 67', 'Complemento', '1');
INSERT INTO `Proveidors` (`nom`, `email`, `telefon`, `tipus`, `estat`) VALUES ('ViajesParaTi', 'personal@viajesparati.com', '+34 123 12 31 23', 'Complemento', '1');
INSERT INTO `Proveidors` (`nom`, `email`, `telefon`, `tipus`, `estat`) VALUES ('Boí Taüll', 'boitaull@email.com', '+34 123 12 31 23', 'Hotel', '1');
INSERT INTO `Proveidors` (`nom`, `email`, `telefon`, `tipus`, `estat`) VALUES ('Condes del Pallars', 'condesdelpallars@email.com', '+34 123 12 31 23', 'Hotel', '1');
INSERT INTO `Proveidors` (`nom`, `email`, `telefon`, `tipus`, `estat`) VALUES ('Port Aine', 'portaine@email.com', '+34 123 12 31 23', 'Hotel', '1');