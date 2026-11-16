CREATE DATABASE revisaooficina;

USE revisaooficina;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(100),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE veiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    placa VARCHAR(100) NOT NULL,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50),
    ano VARCHAR(50),
    cliente_id INT NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);

CREATE TABLE agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATE NOT NULL,
    hora TIME NOT NULL,
    serviço VARCHAR(255),
    status VARCHAR(255),
    veiculo_id INT NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (veiculo_id) REFERENCES veiculos(id)
);

use revisaooficina;

INSERT INTO usuarios 
(nome, email, senha, created_at, updated_at)
VALUES
('Maria Clara', 'mariaclara@saep.com', SHA2('123456', 256), NOW(), NOW()),
('João Pedro', 'joaopedro@saep.com', SHA2('123456', 256), NOW(), NOW()),
('Ana Beatriz', 'anabeatriz@saep.com', SHA2('123456', 256), NOW(), NOW());

INSERT INTO clientes
(nome, cpf, telefone, email, created_at, updated_at)
VALUES
('Maria Clara', '12345678901', '(19) 99999-1001', 'mariaclara@email.com', NOW(), NOW()),
('João Pedro', '23456789012', '(19) 99999-1002', 'joaopedro@email.com', NOW(), NOW()),
('Ana Beatriz', '34567890123', '(19) 99999-1003', 'anabeatriz@email.com', NOW(), NOW()),
('Lucas Ferreira', '45678901234', '(19) 99999-1004', 'lucas@email.com', NOW(), NOW());

INSERT INTO veiculos
(placa, marca, modelo, cliente_id, created_at, updated_at)
VALUES
('ABC1D23', 'Toyota', 'Corolla', 1, NOW(), NOW()),
('DEF4E56', 'Honda', 'Civic', 1, NOW(), NOW()),
('GHI7J89', 'Volkswagen', 'Gol', 2, NOW(), NOW()),
('JKL0M12', 'Fiat', 'Argo', 3, NOW(), NOW()),
('NOP3Q45', 'Chevrolet', 'Onix', 4, NOW(), NOW());
INSERT INTO agendamentos
(data, hora, descricao, veiculo_id, created_at, updated_at)
VALUES
('2026-09-21', '08:00:00', 'Troca de óleo e filtro', 1, NOW(), NOW()),
('2026-09-22', '10:30:00', 'Alinhamento e balanceamento', 2, NOW(), NOW()),
('2026-09-23', '14:00:00', 'Revisão dos freios', 3, NOW(), NOW()),
('2026-09-24', '09:00:00', 'Revisão geral do veículo', 4, NOW(), NOW()),
('2026-09-25', '15:30:00', 'Troca de pneus', 5, NOW(), NOW()),
('2026-09-26', '11:00:00', 'Manutenção preventiva', 1, NOW(), NOW());