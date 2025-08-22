# CRUD de Produtos

Este é um projeto de CRUD de produtos desenvolvido em Laravel. Ele permite criar, listar, editar e excluir produtos, além de incluir funcionalidades como pesquisa, ordenação e paginação.

## Pré-requisitos

Antes de começar, certifique-se de ter os seguintes softwares instalados em sua máquina:

- [PHP](https://www.php.net/) (versão 8.0 ou superior)
- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com/) (instalado via Composer, para instalação siga os passos da documentação oficial: https://laravel.com/docs/12.x/installation)
- [PostgreSQL](https://www.postgresql.org/) (banco de dados, anote a senha que colocar na instalação, ela sera usada para configuração)
- [pgAdmin](https://www.pgadmin.org/) (opcional, para gerenciar o banco de dados)

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/pauloKushino/crud-produtos.git

2. Navegue até a pasta do projeto:
   ```bash 
   cd crud-produtos

3. Instale as dependências do Laravel:
   ```bash
   composer install

4. Crie o arquivo .env com as configurações do ambiente:
   ```bash
   cp .env.example .env

5. Configure o banco de dados no arquivo .env:
   ```bash
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=crud_produtos
   DB_USERNAME=seu_usuario (usuario usado no postgreSQL)
   DB_PASSWORD=sua_senha (senha criada no postgreSQL)

6. Execute as migrações para criar as tabelas no banco de dados:
   ```bash
   php artisan migrate

7. (Opcional) Popule a tabela de produtos com dados de teste usando o seeder:
   ```bash
   php artisan db:seed --class=ProdutoSeeder

Como rodar o projeto -
Inicie o servidor de desenvolvimento do Laravel:
   ```bash 
   php artisan serve
   ``` 
e acesse o projeto no navegador