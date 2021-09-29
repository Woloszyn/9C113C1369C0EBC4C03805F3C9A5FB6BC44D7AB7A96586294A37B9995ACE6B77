CREATE TABLE produtos (
    nome varchar(50),
    sku varchar(90) primary key,
    quantidade_inicial int
);

CREATE TABLE movimentacoes (
    id int primary key,
    sku varchar(90),
    quantidade int,
    CONSTRAINT fk_movimentacoes FOREIGN KEY (sku) REFERENCES produtos (sku)
);