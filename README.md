# Sistema de Cadastro de Usuários

Este projeto é um sistema simples de cadastro de usuários desenvolvido com PHP puro no backend e MySQL como banco de dados. Ele permite realizar as seguintes operações:

Cadastrar novos usuários

Listar usuários cadastrados

Editar dados de usuários

Excluir usuários

# Pré-requisitos

1. XAMPP ou um servidor local similar (WAMP, Laragon, etc.).
2. Navegador da web atualizado (Google Chrome, Mozilla Firefox, etc.).
3. Editor de texto ou IDE (opcional, para visualizar ou editar o código).
4. MySQL Workbench (opcional, para gerenciar o banco de dados visualmente).

# Instalação e Configuração

1. Clone o Repositório

Baixe ou clone o repositório do projeto ou baixe diretamente o arquivo ZIP e extraia em uma pasta no seu computador.

git clone https://github.com/seu-usuario/sistema-cadastro-usuarios.git

2. Configure o Servidor Local

Copie a pasta do projeto para o diretório do servidor local:
No XAMPP, coloque a pasta dentro de C:\xampp\htdocs\.

Exemplo: C:\xampp\htdocs\cadastroUsuarios.

Inicie o Apache e o MySQL através do Painel de Controle do XAMPP.

3. Configure o Banco de Dados

Acesse o phpMyAdmin no navegador:

http://localhost/phpmyadmin

Crie um banco de dados chamado cadastrousuarios: No menu, clique em "Novo", insira o nome cadastrousuarios e clique em "Criar". 

Importe a estrutura da tabela: Com o banco de dados cadastrousuarios selecionado, clique em "Importar", selecione o arquivo cadastrousuarios.sql fornecido no projeto e clique em "Executar".

A tabela usuarios será criada com os seguintes campos:

id (INT, AUTO_INCREMENT, PRIMARY KEY)

nome (VARCHAR)

email (VARCHAR, UNIQUE)

senha (VARCHAR)

4. Configure a Conexão com o Banco de Dados

Abra o arquivo conexao.php no editor de texto e verifique as credenciais de acesso ao MySQL:

$host = 'localhost';

$dbname = 'cadastrousuarios';

$username = 'root'; // Altere se necessário

$password = ''; // Altere se necessário

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

Se o XAMPP estiver usando configurações padrão, as credenciais acima funcionarão. Caso hajam problemas de conexão, verificar o arquivo conexao.php, que contém os dados para conexão ao banco.

5. Acesse o Sistema no Navegador

No navegador, acesse: http://localhost/cadastroUsuarios/

Use o sistema para cadastrar, listar, editar e excluir usuários.
