<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once '../security/path.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS ;?>bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?php echo CSS ;?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo CSS ;?>index.css">
    <link rel="stylesheet" href="<?php echo CSS ;?>comum.css">
    <script src="<?php echo JS ;?>bootstrap.min.js"></script>
    <title>eTransporte-</title>
</head>
<body>
    <div class="debug">
    <a href="paginas/usuarios.php">Gerenciar Usuarios</a><br>
    <a href="paginas/rotas.php">Gerenciar Rotas</a><br>
    <a href="paginas/transportes.php">(TODO)Gerenciar Transportes</a><br>
    <a href="paginas/mensagens.php">Gerenciar Mensagens</a><br>
    <a href="paginas/cadastrar_usuario.php">Cadastrar Usuario</a><br>
    <a href="paginas/cadastrar_rota.php">(colar)Cadastrar Rota</a><br>
    <a href="paginas/cadastrar_transporte.php">(TODO)Cadastrar Transporte</a><br>
    <a href="paginas/cadastrar_mensagem.php">(colar)Cadastrar Mensagem</a><br>
    <a href="paginas/editar_usuario.php">(TODO,opcao exclusiva para tabela de usuarios)Editar Usuario</a><br>
    <a href="paginas/editar_rota.php">(TODO,opcao exclusiva para tabela de rotas)Editar Rota</a><br>
    <a href="paginas/editar_transporte.php">(TODO,opcao exclusiva para tabela de transportes)Editar Transporte</a><br>
    <a href="paginas/editar_mensagem.php">(TODO,opcao exclusiva para tabela de mensagens)Editar Mensagem</a><br>
    </div>
</body>
</html>