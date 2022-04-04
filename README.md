<h3 align="center">
    <p align="center">
      <b>LISTA DE TAREFAS</b> 
    </p>
</h3>

<p align="center">
  <a href="https://github.com/Diogo-Freitas" target="_blank">
    <img alt="Made by Diogo-Freitas" src="https://img.shields.io/badge/By-Diogo--Freitas-green">
    <img alt="GitHub Last Commit" src="https://img.shields.io/github/last-commit/Diogo-Freitas/lista-de-tarefas" />
    <img alt="Repo Size" src="https://img.shields.io/github/repo-size/Diogo-Freitas/lista-de-tarefas" />
  </a>
</p>

<div align="center">
    <p>
        <a href="#sobre">Sobre</a> |
        <a href="#screenshots">Screenshots</a> |
        <a href="#tecnologias-utilizadas">Tecnologias Utilizadas</a> |
        <a href="#plugins">Plugins Utilizados</a> |
        <a href="#como-utilizar">Como Utilizar</a>
    </p>
</div>


<div id="sobre"></div>

## 🔖 Sobre

<p>Crie uma aplicação de lista de tarefas (data, descrição, usuário), construída em PHP JAVASCRIPT E POSTGRES, com as seguintes funcionalidades: Incluir, alterar, excluir e listagem das atividades cadastradas. Obrigatório persistir os dados no banco de dados. Implantação de Login. Tela de Cadastro de Usuários. Uso de docker.</p>

<div id="screenshots"></div>

## 📷 Screenshots
<h1>
    <img width="270" alt="REGISTER" src="https://user-images.githubusercontent.com/6785738/161546448-127eab27-189b-4cef-a94e-dc02f03d7d1e.png">
    <img width="270" alt="TASKS" src="https://user-images.githubusercontent.com/6785738/161546519-14d16cc8-f7f0-441b-8db6-31ffae0818c4.png">
    <img width="270" alt="EDIT" src="https://user-images.githubusercontent.com/6785738/161546570-617933d7-28b0-48ae-8872-5b6c0e4b9713.png">
</h1>

<div id="tecnologias-utilizadas"></div>


## 🚀 Tecnologias Utilizadas


- [PHP 8.1](https://php.net/)
- [Laravel 9.x](https://laravel.com/)

<div id="plugins"</div>

## 🧩 Plugins Utilizados
 - [Laravel Sail](https://github.com/laravel/sail)
 - [Laravel Breeze](https://github.com/laravel/breeze)

<a id="como-utilizar"></a>

## 💻 Como Utilizar

### 1. Faça um clone :

###### Clonando o repositório
```sh
git clone https://github.com/Diogo-Freitas/lista-de-tarefas.git
```

###### Entrando no diretório
```sh
cd lista-de-tarefas
```

### 2. Instalando a Aplicação Utilizando Sail com Docker:

###### Instalando dependências do Composer para aplicativos existentes
```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
 ```
 
###### Configurando um Alias Bash
```sh
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

###### Criando um arquivo .env
```sh
cp .env.example .env
```

###### Iniciando Sail
```sh
sail up -d
```

###### Gerando uma nova chave
```sh
sail artisan key:generate
```

###### Execultando o composer
```sh
sail composer install
```

###### Execultando as migrações
```sh
sail artisan migrate --seed
```

### 3. Acessando a Aplicação:

###### Link:
    http://localhost/

###### Usuário:
    Email: usuario@exemplo.com
    Senha: password
