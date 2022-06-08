Cadastro e busca de CEP

O sistema é simples, no index você tem um campo de busca por cep, ao fazer essa busca com um cep valido ele o sistema mostrara para o usuário as informações, referente aquele CEP. Caso o sistema não encontre em sua base de dados, ele fara uma requisição na API do ViaCEP, mostrara para o usuário as informações daquela busca, e dando a opção de salvar essas informações na base de dados do sistema. O sistema também conta com a opção de editar ou remover os dados já existente no sistema. No projeto foi utilizado o PHP 8, com o framework Laravel 9 e banco de dados mysql.

###Como executar
-Depois compile a imagem.
docker-compose build app

-Executar o ambiente
docker-compose up -d

-Executar o composer install para instalar as dependências.

-Gere uma chave única para o aplicativo.

-As configurações do banco consta no .env.example.

-Primeiro execute as migrations
Para rodar as migrations na linha no .env execute com DB_HOST=127.0.0.1 depois altere para
DB_HOST=db_cbmse_prova
Não sei porquê, mas só é possivel rodar as migrations em localhost.


###Autor do projeto Wagner
