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
    <span class="notificacoes-home">
        <div class="notificacao-transporte">
            <div class="not-mesg-transporte"  style="height:100%; width:100%;">Transporte<br>
                <img src="<?php echo IMAGES ;?>bus.png" alt="transporte" width="50px" style="padding:10px; padding-left:4px;">
            </div>
        </div>
        <div class="not-spacer">
            <div class="not-design-column-spacer"></div>
        </div>
        <div class="notificacao-mensagem">
            <div class="not-mesg-user" style="height:100%; width:30%;">Usuario<br>
                <img src="<?php echo IMAGES ;?>usuario.png" alt="usuario" width="50px" style="padding:10px; padding-left:4px;">
            </div>
            <div class="not-mesg-content" style="height:100%; width:70%;">Mensagem<br>
                <img src="<?php echo IMAGES ;?>e-mail.png" alt="" width="50px" style="padding:10px; padding-left:4px;">
            </div>
        </div>
</span>
</body>
</html>