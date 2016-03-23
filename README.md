# Desafio de programação 1
Esta é uma aplicação Laravel, que tem como objetivo realizar as seguintes tarefas:
1. Aceitar (via um formulário) o upload de arquivos separados por TAB com as seguintes colunas: purchaser name, item description, item price, purchase count, merchant address, merchant name. Você pode assumir que as colunas estarão sempre nesta ordem, que sempre haverá dados em cada coluna, e que sempre haverá uma linha de cabeçalho. Um arquivo de exemplo chamado example_input.tab está incluído neste repositório.
1. Interpretar ("parsear") o arquivo recebido, normalizar os dados, e salvar corretamente a informação em um banco de dados relacional.
1. Exibir a receita bruta total representada pelo arquivo enviado após o upload + parser.
1. Possuir CRUD para criação, listagem, atualização e exclusão de cada registro individualmente
1. Ser simples de configurar e rodar, funcionando em ambiente compatível com Unix (Linux ou Mac OS X). Utilizar apenas linguagens e bibliotecas livres ou gratuitas.

## Descrição do projeto
A aplicação  foi desenvolvida no ambiente Homestead, utilizando:

1. SQLite3
1. PHP 7
1. Laravel Framework 5.2.23
1. Boostrap 3
1. JQuery

### Referência

Este desafio foi baseado nestes outros desafios:
* https://github.com/jp7internet/desafio-programacao-1
* https://github.com/myfreecomm/desafio-programacao-1
* https://github.com/lschallenges/data-engineering
