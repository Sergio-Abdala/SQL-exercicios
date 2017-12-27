1) SELECT cod_prod FROM Produtos LEFT JOIN Vendas ON Produtos.cod_prod = Vendas.cod_prod WHERE Vendas.cod_venda is NULL;

2)SELECT nome_user FROM Usuarios INNER JOIN Vendas ON Vendas.cod_user = Usuarios.cod_user

3)SELECT * FROM Produtos INNER JOIN Vendas ON Produtos.cod_prod = Vendas.cod_prod WHERE preco_prod > 100.00;

4)DELIMITER $$
CREATE PROCEDURE Selecionar_Produtos(IN cod INT, IN preco FLOAT, IN quant INT)
BEGIN
INSERT INTO Produtos(cod_prod,preco_prod,qtd_estoque) VALUES(cod,preco,quant);
END $$
DELIMITER;

5)DELIMITER $$
CREATE PROCEDURE cont_prod(INOUT codigo INT)
BEGIN
SELECT qtd_estoque FROM Produtos WHERE cod_prod=codigo;
END $$
DELIMITER;

6)DELIMITER $$
CREATE PROCEDURE usuario(IN codigo INT)
BEGIN
