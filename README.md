## Cadastro e busca de CEP

O sistema é simples, no index você tem um campo de busca por cep, ao fazer essa busca com um cep valido ele o sistema mostrara para o usuário as informações, referente aquele CEP.
Caso o sistema não encontre em sua base de dados, ele fara uma requisição na API do ViaCEP, mostrara para o usuário as informações daquela busca, e dando a opção de salvar essas informações na base de dados do sistema.
O sistema também conta com a opção de editar ou remover os dados já existente no sistema.
No projeto foi utilizado o PHP 8, com o framework Laravel 9 e banco de dados mysql.

## Como executar

Usando o xampp ou wampserve você criara o seu banco de dados.
CREATE DATABASE cbm_se;
As configurações do banco conta do .env ou .env.example.

Start o servidor do projeto com o comando, php artisan serve para executar o projeto localmente.
Depois que tudo estiver rodando execute o comando php artisan migrate, ou executar a linha
###### php artisan migrate --path=./database/migrations/2022_05_26_022955_create_enderecos_table.php
para criar a tabela no banco de dados.
Com isso o sistema já estará pronto para teste.



###Autor do projeto
Wagner
