CREATE DATABASE robooks;

USE robooks;

CREATE TABLE livros (
    LIVRO_ID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    LIVRO_TITULO VARCHAR(150) NOT NULL,
    LIVRO_N_AUTOR VARCHAR(100) NOT NULL,
    LIVRO_S_AUTOR VARCHAR(100) NOT NULL,
    LIVRO_GENERO VARCHAR(100) NOT NULL,
    LIVRO_ISBN BIGINT NOT NULL,
    LIVRO_PRATELEIRA VARCHAR (10),
    LIVRO_DATALANC DATE,
    LIVRO_PRECO DECIMAL(10,2)
);

DROP TABLE LIVRO ()

CREATE TABLE clientes (
    ID_CLIENTE INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    NOME VARCHAR(255) NOT NULL,
    LOGRADOURO VARCHAR(255) NOT NULL,
    COMPLEMENTO VARCHAR(255),
    BAIRRO VARCHAR(100) NOT NULL,
    CIDADE VARCHAR(100) NOT NULL,
    CEP INT NOT NULL,
    UF CHAR(2) NOT NULL,
    TEL1 VARCHAR(15) NOT NULL,  -- Alterado para VARCHAR para suportar formatos de telefone
    TEL2 VARCHAR(15),           -- Alterado para VARCHAR para suportar formatos de telefone
    DATANASC DATE NOT NULL,
    DATACAD DATETIME NOT NULL
);

SE robooks;

-- Inserir livros na tabela
INSERT INTO livros (LIVRO_TITULO, LIVRO_N_AUTOR, LIVRO_S_AUTOR, LIVRO_GENERO, LIVRO_ISBN, LIVRO_PRATELEIRA, LIVRO_DATALANC, LIVRO_PRECO)
VALUES 
('O Código Da Vinci', 'Dan', 'Brown', 'Mistério', 9780385504201, 'A1', '2003-03-18', 39.90),
('O Hobbit', 'J.R.R.', 'Tolkien', 'Fantasia', 9780261103283, 'B2', '1937-09-21', 29.90),
('1984', 'George', 'Orwell', 'Distopia', 9780451524935, 'C3', '1949-06-08', 34.90),
('Dom Casmurro', 'Machado', 'de Assis', 'Literatura Brasileira', 9788520914775, 'D1', '1899-05-09', 19.90),
('Harry Potter e a Pedra Filosofal', 'J.K.', 'Rowling', 'Fantasia', 9788532511002, 'E5', '1997-06-26', 49.90),
('O Senhor dos Anéis: A Sociedade do Anel', 'J.R.R.', 'Tolkien', 'Fantasia', 9780345339706, 'F4', '1954-07-29', 59.90),
('A Culpa é das Estrelas', 'John', 'Green', 'Romance', 9780142424179, 'G2', '2012-01-10', 29.90),
('A Metamorfose', 'Franz', 'Kafka', 'Ficção', 9788535916718, 'H3', '1915-10-01', 24.90),
('O Pequeno Príncipe', 'Antoine', 'de Saint-Exupéry', 'Infantil', 9788535912284, 'I1', '1943-04-06', 22.90),
('O Alquimista', 'Paulo', 'Coelho', 'Ficção', 9780061122415, 'J2', '1988-11-01', 39.90),
('Cem Anos de Solidão', 'Gabriel', 'García Márquez', 'Realismo Mágico', 9780307389717, 'K4', '1967-06-05', 49.90),
('Orgulho e Preconceito', 'Jane', 'Austen', 'Romance', 9780141439518, 'L1', '1813-01-28', 19.90),
('O Grande Gatsby', 'F. Scott', 'Fitzgerald', 'Literatura Americana', 9780743273565, 'M2', '1925-04-10', 39.90),
('O Vendedor de Sonhos', 'Augusto', 'Cury', 'Autoajuda', 9788580410291, 'N5', '2008-08-01', 29.90),
('A Guerra dos Tronos', 'George', 'R.R. Martin', 'Fantasia', 9780553103540, 'O6', '1996-08-06', 59.90);

USE robooks;

-- Inserir 15 clientes na tabela
INSERT INTO clientes (NOME, LOGRADOURO, COMPLEMENTO, BAIRRO, CIDADE, CEP, UF, TEL1, TEL2, DATANASC, DATACAD)
VALUES 
('Lucas Pereira', 'Rua das Palmeiras, 150', 'Casa', 'Centro', 'São Paulo', 23456789, 'SP', '(11) 98876-5432', '(11) 96543-2341', '1991-06-11', NOW()),
('Patrícia Costa', 'Avenida Santa Teresa, 342', 'Apto 204', 'Vila Nova', 'Rio de Janeiro', 34567890, 'RJ', '(21) 91123-4567', NULL, '1993-02-25', NOW()),
('Roberto Lima', 'Rua do Rio, 654', 'Casa 10', 'Bela Vista', 'Salvador', 45678901, 'BA', '(71) 96325-4789', '(71) 93210-1234', '1986-04-18', NOW()),
('Camila Oliveira', 'Rua dos Açores, 100', NULL, 'Jardim da Paz', 'Curitiba', 56789012, 'PR', '(41) 92234-5678', '(41) 91345-6789', '1992-09-14', NOW()),
('Felipe Rodrigues', 'Rua dos Girassóis, 321', 'Casa', 'Vila Nova', 'Porto Alegre', 67890123, 'RS', '(51) 93345-6789', '(51) 96789-2345', '1989-11-30', NOW()),
('Ana Lima', 'Avenida Central, 500', 'Apto 404', 'Centro', 'Fortaleza', 78901234, 'CE', '(85) 98765-1234', NULL, '1995-07-20', NOW()),
('Felipe Almeida', 'Rua das Flores, 210', 'Casa', 'Vila Oliveira', 'Belo Horizonte', 89012345, 'MG', '(31) 92345-6789', '(31) 96543-2341', '1988-03-17', NOW()),
('Gustavo Souza', 'Rua da Paz, 710', 'Bloco 3', 'Jardim América', 'São Paulo', 90123456, 'SP', '(11) 91234-5678', '(11) 97654-3210', '1990-12-06', NOW()),
('Isabela Silva', 'Avenida das Américas, 890', 'Casa 12', 'Barra da Tijuca', 'Rio de Janeiro', 23456789, 'RJ', '(21) 92345-6789', '(21) 98765-4321', '1993-05-10', NOW()),
('Ricardo Santos', 'Rua do Sol, 430', 'Casa 8', 'Vila das Flores', 'Recife', 12345678, 'PE', '(81) 97325-9876', '(81) 91234-5678', '1982-10-22', NOW()),
('Amanda Rocha', 'Rua das Águas, 560', 'Apto 302', 'Centro', 'Manaus', 23456789, 'AM', '(92) 96234-5678', NULL, '1994-08-14', NOW()),
('Luana Mendes', 'Rua da Liberdade, 890', 'Casa', 'Lagoa Azul', 'Porto Alegre', 34567890, 'RS', '(51) 97325-9876', '(51) 96543-2341', '1996-01-10', NOW()),
('Paulo Ferreira', 'Rua das Pedras, 12', 'Bloco 5', 'Jardim Bela Vista', 'São Paulo', 45678901, 'SP', '(11) 93345-6789', '(11) 99345-1234', '1987-07-25', NOW()),
('Mariana Souza', 'Avenida Brasil, 1500', 'Casa 3', 'Centro', 'Rio de Janeiro', 56789012, 'RJ', '(21) 91123-4567', '(21) 91234-6789', '1995-03-18', NOW()),
('Carlos Costa', 'Rua do Norte, 888', NULL, 'Vila Mar', 'Salvador', 67890123, 'BA', '(71) 95123-6789', NULL, '1989-02-12', NOW()),
('Beatriz Almeida', 'Avenida São João, 401', 'Casa 2', 'Vila Americana', 'Curitiba', 78901234, 'PR', '(41) 94234-5678', '(41) 92234-8765', '1994-11-25', NOW());