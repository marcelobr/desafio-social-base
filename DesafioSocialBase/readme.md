Desafio SocialBase
---
### Considerações:
O framework escolhido foi o Laravel na versão 5.2, além do framework o código implementado conta com as seguintes características principais:

* Banco de dados SQLite;
* Cache em arquivo, foi colocado em arquivo somente para fins de teste, mas pode ser facilmente trocado por Redis. Bastando alterar apenas configurações, sem alteração na implementação;
* Teste Unitários com phpUnit utilizando SQLite em memória;
* Arquitetura MVC;
* Eloquent ORM;
* Padrão de Projeto Repository.

### Requisitos Mínimos:
    - PHP >= 5.5.9
    - Composer
    - Laravel 5.2
    - PDO PHP Extension
    - Mbstring PHP Extension

### Testar a Aplicação:
Precisei instalar também:

XML PHP Extension:

    $ apt-get install php7.0-xml

Sqlite3 PHP Extension:

    $ apt-get install php7.0-sqlite3

Instalar o Composer:

    $ curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

Fazer clone do projeto:

    $ git clone https://github.com/marcelobr/desafio-social-base.git

Acessar a pasta do projeto:

    $ cd caminho-ate-a-pasta/DesafioSocialBase

Executar o comando:

    $ composer update

Criar o banco de dados:

    $ touch database/database.sqlite

Criar estrutura do banco de dados e popular tabela user com o usuário SocialBase:

    $ php artisan migrate --seed

Gerar novo arquivo .env:

    $ cp .env.example .env

Gerar nova chave:

    $ php artisan key:generate

Comentar(com #) ou retirar no novo arquivo .env as linhas:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret

Para iniciar o servidor de testes:

    $ php artisan serve

Para rodar os testes:

    $ vendor/phpunit/phpunit/phpunit tests/MessageTest.php

Exemplo para publicar uma mensagem:

    $ curl -H "Content-Type:application/json" -X POST -d '{"message":"Teste","user_id":1}' http://localhost:8000/api/message/publish

Para consultar todas as mensagens:

    $ curl localhost:8000/api/message

Para consultar mensagens por usuário(usando id):

    $ curl localhost:8000/api/message/user/1

Exemplo para criar um novo usuário:

    $ curl -H "Content-Type:application/json" -X POST -d '{"name":"Teste","username":"teste","password":"teste"}' http://localhost:8000/api/user/create

Para consultar todos os usuários:

    $ curl localhost:8000/api/user

