# SGE - Sistema de Gestão Escolar

API para gestão integrada de instituições de ensino, turmas, disciplinas, professores, alunos e demais processos acadêmicos.

**Stack:** PHP 8.5 · Laravel 13 · MySQL 8 · Redis · Nginx · Laravel Sanctum (autenticação) · Spatie Laravel Permission (permissões) · Pest (testes)

## Funcionalidades

- Autenticação por token com Laravel Sanctum
- Controle de usuários, papéis e permissões
- Gestão de professores, alunos e responsáveis
- Gestão de anos e períodos letivos
- Gestão de níveis e séries escolares
- Cadastro de disciplinas e turmas
- Vinculação de disciplinas às turmas
- Vinculação de professores às disciplinas
- Exclusão lógica e restauração de registros

## Pré-requisitos

- Docker
- Docker Compose
- Git
- Portas livres no host: `80`, `3306` e `6379`
- Porta `3307` para execução dos testes de integração
- Porta `9003` para depuração com Xdebug

## Início rápido

Clone o projeto e copie o arquivo de configuração de exemplo:

```bash
git clone https://github.com/bymega/educore-backend.git
cd educore-backend
cp .env.example .env
docker compose up -d --build
docker compose up -d --build
docker compose exec php bash
```

### Configuração do ambiente

Em seguida, configure a conexão com o MySQL e o Redis no arquivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=educore
DB_USERNAME=educore
DB_PASSWORD=secret

REDIS_CLIENT=phpredis
REDIS_HOST=redis
REDIS_PORT=6379
```

Dentro dos contêineres, `mysql` e `redis` são os nomes dos serviços definidos no Docker Compose.

### Inicialização da aplicação

Depois de configurar o `.env`, dentro do container:

```bash
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
```

A aplicação estará disponível em:

```text
http://localhost
```

## Acesso inicial

Após executar os seeders, utilize as seguintes credenciais para acessar o ambiente local:

```text
E-mail: admin@educore.com
Senha: Ab123456#@
```

> Essas credenciais são destinadas exclusivamente ao ambiente local de desenvolvimento.

## Documentação da API

Gere a documentação da API com o Scribe:

```bash
docker compose exec php php artisan scribe:generate
```

Após a geração, acesse:

```text
http://localhost/docs
```

## Testes

Execute a suíte de testes com:

```bash
docker compose exec php php artisan test
```

Ou utilize o script do Composer:

```bash
docker compose exec php composer test
```

## Comandos úteis

```bash
# Acessar o contêiner PHP
docker compose exec php bash

# Visualizar os contêineres
docker compose ps

# Acompanhar os logs
docker compose logs -f

# Recriar o banco de dados e executar os seeders
docker compose exec php php artisan migrate:fresh --seed

# Limpar os caches da aplicação
docker compose exec php php artisan optimize:clear

# Parar os contêineres
docker compose down
```
