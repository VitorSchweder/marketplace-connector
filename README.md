## Passo a passo de como executar o projeto

### Instalação
1. Após clonar o repositório
2. Entre no diretório do projeto:
   ```bash
   cd marketplace-connector
   ```
3. Suba os containers Docker:
   ```bash
    docker compose up -d --build
   ```
4. Instalar as dependências:
   ```bash
    docker compose exec app composer install
   ```
5. Configure o ambiente:
   ```bash
    cp .env.example .env
    docker compose exec app php artisan key:generate
   ```
6. Rode as migrations:
   ```bash
    docker compose exec app php artisan migrate
   ```
7. Para executar as filas:
   ```bash
    docker compose exec app php artisan queue:work
   ```
8. Realizar um POST para iniciar a importação para a url: http://localhost:8080/api/import-offers