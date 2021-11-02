# Desafio Back-End - César Augusto Pires

## Features

- [x] Cadastro de usuário
- [x] Listagem
- [x] Listar um único usuário
- [x] Excluir através do id
- [x] Associação entre movimentação e usuário
- [x] Visualizar todas as movimentações de um usuário
- [x] Excluir movimentação relacionada ao usuária
- [ ] Exportar arquivo por excel (csv)
- [x] Adicionar o saldo inicial no usuário
- [x] Somatorio da movimentação e do saldo incial
- [x] Excluir apenas usuário sem movimentação
- [x] Cadastrar apenas usuários maiores de 18 anos
- [ ] Exportar arquivo por excel (csv), com cabeçalho
- [ ] Criar validações com base na Request
- [ ] Utilizar cache para otimizar as consultas e buscas
- [ ] Criar Seeders ou Inicializadores de dados para o usuários e suas movimentações
- [ ] Criar os métodos baseados em algum método de autênticação
- [x] Documentação dos endpoint`s

## Rodando o Projeto

- Rodar os seguintes comando, essa sequência terá como objetivo baixar o projeto e configurar o ambiente laravel e o banco de dados será necessário ter instalado o docker e o git anteriormente.

  ```bash
  git clone https://github.com/cesarapires/desafio-backend.git

  cd desafio-backend/

  cp .env.example .env
  ```

- Agora você deve rodar o comando para iniciar o container
  
  ```bash
  docker-compose up -d
  ```

- Feito isso, agora você terá que ir para dentro do container para instalar as dependências do projeto. Para isso você utilizará o comando: 

  ```bash
  docker ps
  ```

  Com isso você verá os containers que estão rodando na sua máquina, copie o ID da imagem do challenge para usar o comando abaixo, 
  subtituindo o ID "bc6299a9fb53" pelo ID gerado para o seu container e em seguida continuar executando os outros comandos:

  ```bash
  docker exec -it bc6299a9fb53 bash
  composer install
  php artisan key:generate
  php artisan migrate
  ```
- Por fim, o desáfio estará rodando na URL: `localhost:8080`.

---

## Documentação da API

- Para realizar todos os testes foi utilizado o Postman, para ver a documentação você pode procurar pelo arquivo Desafio-Backend.postman_collection.json que está na raiz do projeto ou utilzar o link abaixo:

[Documentação](Desafio-Backend.postman_collection.json)
