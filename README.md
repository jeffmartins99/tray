# tray

Projetinho feito em laravel
(ao subir online, apontar para a pasta public)


#Database/Migrations
#Na pasta Database/Migrations, está as tabelas do banco. 
Ao fazer um migrate nelas, já está tudo ok

#Routes
#Na pasta Routes, contem um arquivo chamado web.php
nele contem todas as rotas do projeto

#App
#na pasta App, contem o arquivo votacao.php 
que apenas insere novas votações e faz alguns selects no banco

#Resources/View
#aqui se encontra os arquivos de visualização do site: 
welcome.blade.php
home.blade.php
detalhe.blade.php

#App/Controllers
#nesta pasta, contem todos os arquivos de classe que realizam as regras de negocio do projeto
Arquivos:
#DetalheController.php - envia os dados da api para a pagina detalhe.blade.php
#GetJsonController.php - pega os dados da api
#HomeController.php - envia os dados da api para a pagina welcome
#LikeController.php - recebe os dados de votação para encaminhar para o arquivo votacao.php
#RelatorioCOntroller.php - Gera o relatorio após efetuar o voto

  

