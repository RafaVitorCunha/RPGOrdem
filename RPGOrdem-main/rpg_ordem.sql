CREATE DATABASE IF NOT EXISTS rpg_ordem CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE rpg_ordem;

CREATE TABLE IF NOT EXISTS classe (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS origem (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS personagem (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  idade INT NOT NULL,
  nex INT NOT NULL,
  classe_id INT NOT NULL,
  origem_id INT NOT NULL,
  historia TEXT NOT NULL,
  FOREIGN KEY (classe_id) REFERENCES classe(id) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY (origem_id) REFERENCES origem(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

INSERT INTO classe (nome) VALUES
('Combatente'),
('Ocultista'),
('Especialista');

INSERT INTO origem (nome) VALUES
('Militar'),
('Acadêmico'),
('Amnésico'),
('Investigador');
