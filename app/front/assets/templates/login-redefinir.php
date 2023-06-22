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
    <title>eTransporte</title>
</head>
<body>
    <div class="conteudo">
        <div class="home-title">
            <div class="login-main">
            <img class="etransporte-header-icon" src="<?php echo IMAGES ;?>etransporte.png" alt="menu" width="100px" style="position:center;margin:0;margin-top:100px; margin-bottom:50px;">
                <div class=login-1>
                    <input class="input-login"type="text" placeholder="Email"><br>
                    <div class="login-center" style="line-height:20px; text-align: center;">Enviaremos um código de recuperação para esse email.</div>
                </div>
                <div class="login-2">
                    <input class="input-login" type="codigo" placeholder="Código">
                </div>
                <div class="buttons" style="justify-content:center;">
                    <div>
                        <button type="button" class="btn btn-primary" value="Send" style="margin-right:10px;" onclick="action(this.value)">Enviar Código</button>
                        <button type="button" class="btn btn-primary" value="Redefine" style="margin-left:10px;" onclick="action(this.value)">Redefinir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>