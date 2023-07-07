<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once '../security/path.php';
require_once CURL.'curl-token.php';

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>eTransporte</title>
</head>
<body>
    <div class="conteudo">
        <div class="home-title">
            <div class="login-main">
            <img class="etransporte-header-icon" src="<?php echo IMAGES ;?>etransporte.png" alt="menu" width="100px" style="position:center;margin:0;margin-top:100px; margin-bottom:50px;">
                <form class="login-1" method="post" action="login.php" id="formLogin">
                    <input id="email" name="email" class="input-login" type="text" placeholder="Email" style="width:240px;" value="<?php echo $email; ?>" required="true">
                    <input id="senha" name="senha" class="input-login" type="password" placeholder="Senha" style="width:240px;" value="<?php echo $senha; ?>" required="true">
                    <div class="login-center">Esqueceu a senha? <a href="" class="redefinir">Redefinir</a></div>
                </form>
                <div class="buttons">
                    <div class="register">
                        <input type="button" class="btn btn-primary" value="Cadastro" onclick="action(this.value)"></button>
                    </div>
                    <div class="login">
                        <input id="login" type="submit" class="btn btn-primary" value="Login" style="margin-left:30px;" form="formLogin">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include(TEMPLATE . 'rodape.php'); ?>
</body>
</html>