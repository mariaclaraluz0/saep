CREATE DATABASE saep_clinica;

USE saep_clinica;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    ativo VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE tutores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf_criptografado VARBINARY(255) NOT NULL,
    telefone VARCHAR(50),
    email VARCHAR(50),
    endereco VARCHAR(50),
	created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL   
);

CREATE TABLE pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tutor_id INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
	especie VARCHAR(50),
    raca VARCHAR(50),
    email VARCHAR(50),
    endereco VARCHAR(50),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (tutor_id) REFERENCES tutores(id)
);

CREATE TABLE agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id INT NOT NULL,
    data DATE NOT NULL,
    hora TIME NOT NULL,
    motivo VARCHAR(255),
    status VARCHAR(255),
	created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (pet_id) REFERENCES pets(id)
);

use saep_clinica;

INSERT INTO usuarios
(nome, email, senha, ativo, created_at, updated_at)
VALUES
('João Silva', 'joao@email.com', 'hash_senha_123', 'Sim', NOW(), NOW()),
('Maria Oliveira', 'maria@email.com', 'hash_senha_456', 'Sim', NOW(), NOW()),
('Carlos Santos', 'carlos@email.com', 'hash_senha_789', 'Não', NOW(), NOW());


INSERT INTO tutores
(nome, cpf_criptografado, telefone, email, endereco, created_at, updated_at)
VALUES
('Ana Souza', UNHEX('A1B2C3D4'), '(16) 99999-1111', 'ana@email.com', 'Rua A, 100', NOW(), NOW()),
('Pedro Lima', UNHEX('B1C2D3E4'), '(16) 98888-2222', 'pedro@email.com', 'Rua B, 200', NOW(), NOW()),
('Juliana Costa', UNHEX('C1D2E3F4'), '(16) 97777-3333', 'juliana@email.com', 'Rua C, 300', NOW(), NOW());

INSERT INTO pets
(id, nome, especie, raca, email, endereco, tutor_id, created_at, updated_at)
VALUES
(1, 'Mel', 'Cachorro', 'Shih-tzu', 'ana@email.com', 'Rua A, 100', 1, NOW(), NOW()),
(2, 'Thor', 'Cachorro', 'Labrador', 'pedro@email.com', 'Rua B, 200', 2, NOW(), NOW()),
(3, 'Mimi', 'Gato', 'Siamês', 'juliana@email.com', 'Rua C, 300', 3, NOW(), NOW());

INSERT INTO agendamentos
(id, data, hora, motivo, status,pet_id, created_at, updated_at)
VALUES
(1, '2026-12-01', '09:00:00', 'Consulta de rotina', 'Agendado', 1, NOW(), NOW()),
(2, '2026-12-02', '10:30:00', 'Vacinação', 'Confirmado', 2, NOW(), NOW()),
(3, '2026-12-03', '14:00:00', 'Avaliação veterinária', 'Concluído', 3, NOW(), NOW());
