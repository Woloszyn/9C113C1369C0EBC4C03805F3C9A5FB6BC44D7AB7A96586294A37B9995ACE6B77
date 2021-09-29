CREATE TABLE produtos (
    nome varchar(50),
    sku varchar(90) primary key,
    quantidade_inicial int
);

CREATE TABLE movimentacoes (
    id int,
    sku varchar(90) primary key,
    quantidade int,
    CONSTRAINT fk_movimentacoes FOREIGN KEY (sku) REFERENCES produtos (sku)
);

CREATE TABLE historico_movimentacoes (
    id int,
    movimentacoes json
);