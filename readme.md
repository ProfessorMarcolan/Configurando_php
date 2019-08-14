# Configurando o ambiente de desenvolvimento
Para programar em PHP utilizando o VSCode no Windows 10. é necessário fazer a instalação e a configuração de alguns elementos. O primeiro elemento que você deve baixar é o XAMPP. O XAMPP poussie em sua instalação o Apache (servidor), Mysql (sistema gerenciador de banco de dados relacional), PHP (linguagem de programação), PERL (linguagem de programação); É nessesário baixar o VCScode.

## Instale o VScode

É necessário isntalar o VScode, [baixe esse editor de texto](https://code.visualstudio.com/). Espere baixae, clique no executavel e siga a instalaçao padrão

## Instalando o XAMPP
Para instalar o XAMPP é necessário então baixalo no site própio(https://www.apachefriends.org/pt_br/index.html). Após baixar é necessário insatalar para isso basta abrir o download e apertar next next até o fim.

Após a instalação é necessário fazer algumas configurações extras para que fique mais fácil de usar o Mysql e o PHP7. 

### Configurando o Mysql

Para facitar o uso do Mysql é necessáiro colocar o caminho do executavel dele nas variaveis do sistema do Windows. Esse caminho, se você seguiu a instalação padrão vai estar no caminho: "C:\xampp\mysql\bin";

### Configurando o php (passo a mais)

Para facilitar o uso do PHP é necessário colocar o caminho do executavel dele nas variaveis do sistema do Windows. Essee caminho, se você seguiu a instalação padrão vai ser o :"C:\xampp\php"


# Rodando o XAMPP
Após fazer a instalação básica rode o XAMPP. Se tudo estiver certo você conseguira acessar o site no localhost. Digite esse endereçõ do no seu navegador preferido (que nao seja o internet explorer, baixe o chrome).



# Instalado o Debugador do PHP
PAra facilitar o uso do PHP é necessário isntalar o debugador dele que não vem junto da instalação padrão. Para instalar o debugador o primeiro passo é necessário analisar algumas caracteriscas do PHP que você instalou. Para isso é necessário criar um pagina dentro do "C:\xampp\htdocs"  chamada de teste.php.

```
<?php

phpinfo();

?>
```

Abra a pagina: "localhost/teste.php" e vocÊ verá uma tabela. Copie todo o html gerado. Vá na [pagina do xdebug](https://xdebug.org/wizard.php) e no campo de texto coloque o html que você copiou da pagina teste.php.  Clique, então, no botão Analyse my phpinfo() output. VocÊ será redirecionado para uma pagina que te permite baixar a biblitoteca do xdebug. Baixe esse dll no link de dowload fornecido (e.g Download php_xdebug-2.7.2-7.3-vc15-x86_64.dll)

Mova o arquivo baixado para a pagina indicada. No meu caso é para a pasta "C:\xampp\php\ext". E depois abra o arquivo php.ini indicado na pagina. No meu caso o arquivo esta na pasta: "C:\xampp\php\php.ini";

Ao abrir esse documento procure por "zend". Após encontrar a primeira palavra coloque o texto informado pelo site em baixo do primeiro texto localizado. No meu caso foi na linha 349 e o texto colocado foi:

```
zend_extension = C:\xampp\php\ext\php_xdebug-2.7.2-7.3-vc15-x86_64.dll

```
Depois disso vá até o fim desse arquivo e coloque o seguinte texto:
```
[XDebug]
xdebug.remote_enable = 1
xdebug.remote_autostart = 1
```
Salve o documento e reinicie o server. Falta só configurar o VSCode

## Configurando o debugador no VCScode.

Após ter configurado o PHP é a hora de configurar o VCSCode. Abra p VSCode e para configura-lo é necessário baixar uma estensão cahamda: PHP Extension Pack; criada por Felix Becker. Clique no botão esquero do VCScode que se asemelha a uns quadrados e digite: PHP Extension Pack. Clique em instalar a extensão. Após instalar a extensão restart o  VCSCode.


## Usando o debugador no VScode.
Abra o VSCode na pasta do htdocs. Para isso clique no botão direito deitro da pasta do htdocs para abrir o menu contexto do windows e cliqeu na opção "abra com o VSCode". Crie um arquivo na pasta htdocs de nome "primeira_pagina.php". Coloque no documento a seguinte linha de código:
```
<?php
$oi = "oi";
echo $oi;
phpinfo();

?>
```
Clique no lado esquerdo dos numeros do documento para adicionar Breackpoints (pontos em vermelho). Para usar o debugado nesse projeto, pasta clique no icone do debugador no canto esquerdo em cima clique na engrenagem e selecioneo PHP. ISso gerará um arquivo "lauch.json" dentro da pasta ".vscode". Para acionar o debugador clique no botão Verde e para executar a pagina faça uma requisição para ela no navegador.




# Instalando o debuger
http://localhost/aprendendo/test.php
copiar o conteudo do site;

e colocar em 
https://xdebug.org/wizard.php



# Baixou um banco de dados pronto



# PAra importar um arquivo poewshell

Para abrir o powersehll no windows 10 é necessário segurar o botão shift e clicar com o obtão direito na pasta que você clonou o repositório. 






# Importando o baco de dados que iremos usar;

logar:
```
mysql -u root -p
(prompts for password)
```

Dentro do mariadb
```
CREATE DATABASE new_database;
use new_database;
source db.sql;
```

# Modelar dados usando o workbench

# Exportar banco de dados Mysql




# Referencias 
[1](https://stackoverflow.com/questions/1774238/mysql-import-on-windows)
[2](https://github.com/datacharmer/test_db/blob/master/load_salaries3.dump)
[3](https://dev.mysql.com/doc/employee/en/sakila-structure.html)
[4](https://www.apachefriends.org/pt_br/index.html)
[5 versao melhro do xampp](https://www.appserv.org/en/)
[6](https://imasters.com.br/back-end/configurando-debugger-php-no-vs-code)