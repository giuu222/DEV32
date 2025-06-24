INSERT INT livros(
    ,
    LIVRO_N_AUTOR,
    LIVRO_S_AUTOR,
    LIVRO_GENERO,
    LIVRO_ISBN,
    LIVRO_PRATELEIRA,
    LIVRO_DATALANC,
    LIVRO_PRECO)
     VALUES (
        "Guerra dos Tronos", "George.R.R", "Martin", "Morte",9781234567890, "16", "1900-02-01", 60.45);
        
        UPDATE livros SET LIVRO_TITULO= "OTO LIVRO", LIVRO_N_AUTOR= "Oto Autor",
        LIVRO_S_AUTOR= "Oto Autor",
        LIVRO_S_AUTOR= "Oto S Autor",
        LIVRO_GENERO= "Oto Genero",
        LIVRO_ISBN= 1234567890,
        LIVRO_PRATELEIRA= "16",
        LIVRO_DATALANC= "1900-02-01",
        LIVRO_PRECO= 60.45
        WHERE LIVRO_ID= 1;

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

        