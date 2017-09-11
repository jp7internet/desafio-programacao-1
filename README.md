# JP7 Challenge
This challenge relates the test of the second stage of the application programmer vacancy PHP / Laravel of JP7.
> This application is already updated to 5.2 laravel

## First Step:
Clone this project:

```$ git clone git@github.com:fehmathais/desafio-programacao-1.git```

> You will need to install and configure ssh access.

## Second Step:
You will need update composer to add the libraries installed in this project.

```$ composer update```

## Third step
Copy, paste and change the name .env.example to .env and let's configure it.

```
$ cp .env.exemple .env
```

Create your database exemple: "challenge"

Add in your .env the database informations
Exemple:
```
DB_HOST=127.0.0.1
DB_DATABASE=challenge
DB_USERNAME=root
DB_PASSWORD=
```

Time to migrations
```$ php artisan migrate```

#Setting Auth with Github
The application is already pre-configured to authenticate with github. You just need to create an application on github that provides a client id and client secret.

1. - Login in your Github Account
1. - Go to Settings
1. - Go to Applications
1. - Developer applications
1. - Register new Application
1. - Add your name application, homepage url, application description and Authorization callback URL in this case: https://localhost:8000/auth/github/callback
1. - Register your application and take your client id and client secret

> For Homepage URL you may use ngrok to obtain a public URI. Visit ngrok site: https://ngrok.com

Open your .env to configure your Github app.
- Add your cliend id
- Add your client secret
- In GITHUB_URL add your Auth Callback, in this case: https://localhost:8000/auth/github/callback

And finally, run the command ```php artisan serve``` to start the application

-----------------------------------------------------------------------------------------------------------------------

# Desafio de programação 1
A idéia deste desafio é nos permitir avaliar melhor as habilidades de candidatos à vagas de programador, de vários níveis.

Este desafio deve ser feito por você em sua casa. Gaste o tempo que você quiser, porém normalmente você não deve precisar de mais do que algumas horas.

## Instruções de entrega do desafio
1. Primeiro, faça um fork deste projeto para sua conta no Github (crie uma se você não possuir).
1. Em seguida, implemente o projeto tal qual descrito abaixo, em seu próprio fork.
1. Por fim, empurre todas as suas alterações para o seu fork no Github e envie um pull request para este repositório original. Se você já entrou em contato com alguém da JP7 sobre uma vaga, avise também essa pessoa por email, incluindo no email o seu usuário no Github.

## Descrição do projeto
Você recebeu um arquivo de texto com os dados de vendas da empresa. Precisamos criar uma maneira para que estes dados sejam importados para um banco de dados.

Sua tarefa é criar uma interface web que aceite upload de arquivos, normalize os dados e armazene-os em um banco de dados relacional.

Sua aplicação web DEVE:

1. Aceitar (via um formulário) o upload de arquivos separados por TAB com as seguintes colunas: purchaser name, item description, item price, purchase count, merchant address, merchant name. Você pode assumir que as colunas estarão sempre nesta ordem, que sempre haverá dados em cada coluna, e que sempre haverá uma linha de cabeçalho. Um arquivo de exemplo chamado example_input.tab está incluído neste repositório.
1. Interpretar ("parsear") o arquivo recebido, normalizar os dados, e salvar corretamente a informação em um banco de dados relacional.
1. Exibir a receita bruta total representada pelo arquivo enviado após o upload + parser.
1. Possuir CRUD para criação, listagem, atualização e exclusão de cada registro individualmente
1. Ser escrita obrigatoriamente em Node.js, Ruby 2.0+ ou PHP 7.0+ (caso esteja entrevistando para uma vaga específica, utilize a linguagem solicitada pela vaga).
1. Ser simples de configurar e rodar, funcionando em ambiente compatível com Unix (Linux ou Mac OS X). Ela deve utilizar apenas linguagens e bibliotecas livres ou gratuitas.
1. Utilizar banco de dados SQLite para facilitar setup

## Avaliação
Seu projeto será avaliado de acordo com os seguintes critérios.

1. Sua aplicação preenche os requerimentos básicos?
1. Você documentou a maneira de configurar o ambiente e rodar sua aplicação?
1. Você seguiu as instruções de envio do desafio?

Adicionalmente, tentaremos verificar a sua familiarização com as bibliotecas padrões (standard libs), bem como sua experiência com programação orientada a objetos a partir da estrutura de seu projeto.

### Referência

Este desafio foi baseado nestes outros desafios:

* https://github.com/myfreecomm/desafio-programacao-1
* https://github.com/lschallenges/data-engineering
