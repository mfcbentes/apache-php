# Projeto Docker com PHP, Apache, MySQL e Adminer

Este projeto demonstra a configuração de um ambiente de desenvolvimento usando Docker, que inclui PHP, Apache, MySQL e Adminer. É ideal para desenvolvedores PHP que precisam de um ambiente isolado e configurável para desenvolvimento e testes.

## Pré-requisitos

- Docker
- Docker Compose

## Estrutura do Projeto

- html/: Diretório onde os arquivos PHP serão armazenados.
- docker-compose.yml: Arquivo de configuração do Docker Compose para definir e executar os serviços de contêineres.
- Dockerfile: Arquivo de configuração para criar a imagem do contêiner do Apache com PHP.

### Configuração

- Dockerfile: Cria uma imagem personalizada do Apache com a extensão pdo_mysql do PHP habilitada.

```Dockerfile
FROM php:8.1-apache
RUN docker-php-ext-install pdo pdo_mysql
```

- docker-compose.yml: Define os serviços necessários para o projeto.

```Dockerfile
version: '3.8'
services:
  web:
    build: .
    container_name: apache_php
    volumes:
      - ./html:/var/www/html
    ports:
      - "8080:80"
  db:
    image: mariadb
    environment:
      MYSQL_ROOT_PASSWORD: rootpassword
      MYSQL_DATABASE: registros
      MYSQL_USER: seu_usuario
      MYSQL_PASSWORD: sua_senha
    ports:
      - "3306:3306"
  adminer:
    image: adminer
    restart: always
    ports:
      - "8081:8080"
```

### Como Usar

Construa e inicie os contêineres:

```bash
docker-compose up --build
```

### Acesse a aplicação PHP:

Abra seu navegador e visite http://localhost:8080 para ver a aplicação PHP.

### Acesse o Adminer:

Abra seu navegador e visite http://localhost:8081 para gerenciar o banco de dados MySQL através do Adminer.

### Administração do Banco de Dados

Use o Adminer para gerenciar seu banco de dados:

- URL: http://localhost:8081
- Servidor: db
- Usuário: seu_usuario
- Senha: sua_senha
- Banco de Dados: registros

### Limpeza

Para parar e remover os contêineres, redes e volumes criados pelo docker-compose up, execute:

```bash
docker-compose down -v
```

Este comando limpará todos os recursos utilizados, mantendo seu ambiente limpo.
