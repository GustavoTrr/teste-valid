# VALID/ANOREG

Este projeto foi criado para atender o desafio proposto no processo de seleção para Desenvolvedor Pleno [VALID](https://www.validcertificadora.com.br/), intermediado pela [MAZZATECH](http://mazza.tech/)

[DESAFIO](Desafio_PHP_Pleno.pdf)

## Construção

Este sistema foi construindo ulizando a stack PHP, JS, CSS e HTML, com o auxílio de frameworks e plugins solicitados como requisitos.

O Servidor de Banco de Dados utilizado no desenvolvimento foi o PostgreSQL v. 12.3

Foram mesclados recursos nativos do Framework Laravel com Plugins a fim de mostrar a versatilidadeda que a aplicação pode ter conforme a necessidade de sua utiilização e manejo.

Tendo em vista o foco na simplicidade da aplicação, alguns padrões, como Repository, não foram implementados, pois não se identificou a necessidade.


### Para o perfeito funcionamento desta aplicação, é fundamental que:

1. Esteja em um ambiente com:
	- Apache 2
	- PHP Versão 7.3 ou superior
	- PostgreSQL v. 12.3 ou superior
    - Composer (para a instalação das dependências e do autoload PSR-4)
	
2. O mod_rewrite do Apache esteja habilitado
	- Em caso de dúvidas pode seguir o tutorial em http://www.devfuria.com.br/linux/apache-habilitar-mod_rewrite-no-apache-mod/

### Instalação

Após feito o download ou clone do projeto, 

* Crie um banco de dados no seu servidor de Banco de Dados
* Copie o arquivo ".env.example", renomeando para ".env" e defina os dados de configuração neste arquivo
* Execute acessando o diretório raiz da aplicação por um CLI (como CMD ou Terminal), execute os seguintes comandos:

Para instalar as dependências:

```
composer install
```

Para Gerar a Chave da Aplicação:

```
php artisan key:generate
```

Para fazer a criação da estrutura de banco de dados:
```
php artisan migrate
```

Após estes passos, o sistema estará pronto para uso, podendo ser acessado via browser, apontando para diretório raiz da aplicação.

## Desenvolvido com

* PHP
* [Laravel 7](https://laravel.com/) - The PHP Framework for Web Artisans
* [Composer](https://getcomposer.org/) - Dependency Manager for PHP

* JS, CSS e HTML5
* [JQuery](https://jquery.com/) - JavaScript library
* [Bootstrap 4](https://getbootstrap.com/) - front-end component library
* [Datatables](https://datatables.net/) - library for HTML tables
* [FontAwsome](https://fontawesome.com/) - icons
* [Toastr](https://codeseven.github.io/toastr/) - jquery/css notifications
* [AminLTE](https://adminlte.io/) - Admin Dashboard Template


## Versão

1.0.0

## Authors

* **Gustavo Torres** - *Initial work* - [GustavoTorres-SoftwareDeveloper](http://gustavo-torres.esy.es/)
