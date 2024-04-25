CREATE DATABASE gerenciador_biblioteca;
USE gerenciador_biblioteca;
SET SQL_SAFE_UPDATES = 0;

CREATE TABLE autores (
  id_autores INT PRIMARY KEY,
  biografia MEDIUMTEXT,
  nacionalidade VARCHAR(50) NOT NULL,
  data_nascimento DATE NOT NULL,
  nome_completo VARCHAR(200) NOT NULL
);

CREATE TABLE endereco (
  id_endereco INT AUTO_INCREMENT PRIMARY KEY,
  rua VARCHAR(100) NOT NULL,
  bairro VARCHAR(100) NOT NULL,
  cidade VARCHAR(50) NOT NULL,
  numero_residencia INT NOT NULL
);

CREATE TABLE editora (
  id_editora INT auto_increment PRIMARY KEY,
  nome VARCHAR(200) NOT NULL,
  pais VARCHAR(100) NOT NULL,
  endereco_id INT NOT NULL,
  telefone VARCHAR(20),
  email VARCHAR(80),
  FOREIGN KEY (endereco_id) REFERENCES endereco (id_endereco)
);

CREATE TABLE livro (
  titulo VARCHAR(50),
  isbn VARCHAR(17) PRIMARY KEY,
  categoria VARCHAR(50) NOT NULL,
  numero_pag INT,
  ano_public DATE NOT NULL,
  quant_disponivel INT NOT NULL,
  autor_id INT NOT NULL,
  editora_id INT NOT NULL,
  FOREIGN KEY (autor_id) REFERENCES autores (id_autores),
  FOREIGN KEY (editora_id) REFERENCES editora (id_editora)
);

CREATE TABLE usuario (
  cpf VARCHAR(14) PRIMARY KEY,
  nome_completo VARCHAR(100) NOT NULL,
  endereco_id INT NOT NULL,
  telefone VARCHAR(20),
  email VARCHAR(150) NOT NULL,
  data_nascimento DATE NOT NULL,
  pendencias VARCHAR(250),
  curso VARCHAR(100) NOT NULL,
  data_de_ingresso DATE,
  FOREIGN KEY (endereco_id) REFERENCES endereco (id_endereco)
);

CREATE TABLE exemplar (
  id_exemplar INT PRIMARY KEY AUTO_INCREMENT,
  isbn VARCHAR(17) NOT NULL,
  FOREIGN KEY (isbn) REFERENCES livro (isbn)
);

CREATE TABLE emprestimo (
  id_emprestimo INT AUTO_INCREMENT PRIMARY KEY,
  data_emprestimo DATE NOT NULL,
  data_devolu_prevista DATE NOT NULL,
  data_devolu_efetuada DATE,
  status_emprestimo TINYINT(1) NOT NULL,
  isbn_livro VARCHAR(17) NOT NULL,
  id_exemplar INT NOT NULL,
  usuario_cpf VARCHAR(14) NOT NULL,
  FOREIGN KEY (isbn_livro) REFERENCES livro (isbn),
  FOREIGN KEY (id_exemplar) REFERENCES exemplar (id_exemplar),
  FOREIGN KEY (usuario_cpf) REFERENCES usuario (cpf)
);

CREATE TABLE reserva (
  id_reserva INT AUTO_INCREMENT PRIMARY KEY,
  data_reserva DATE NOT NULL,
  status_reserva TINYINT(1),
  isbn_livro VARCHAR(17) NOT NULL,
  cpf_usuario VARCHAR(14) NOT NULL,
  FOREIGN KEY (isbn_livro) REFERENCES livro (isbn),
  FOREIGN KEY (cpf_usuario) REFERENCES usuario (cpf)
);

CREATE TABLE funcionario (
  cpf VARCHAR(14) PRIMARY KEY,
  nome VARCHAR(70) NOT NULL,
  cargo VARCHAR(50) NOT NULL,
  telefone VARCHAR(50),
  email VARCHAR(150)
);

UPDATE livro
SET quant_disponivel = (
  SELECT COUNT(*) 
  FROM exemplar 
  WHERE livro.isbn = exemplar.isbn
);
