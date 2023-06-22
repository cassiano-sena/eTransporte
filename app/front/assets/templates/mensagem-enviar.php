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
    <div class="mensagem-enviar-box">
        <div class="mensagem-enviar-transporte">
            <div class="msg-enviar-transporte"  style="height:100%; width:100%;">Usuário<br>
                <img src="<?php echo IMAGES ;?>usuario.png" alt="usuário" width="50px" style="padding:10px; padding-left:4px;">
            </div>
        </div>
        <div class="mensagem-enviar-content">
            <div style="text-align:left;line-height:1.5;height:50px;">
                <select name="" id="">
                    <option value="Transporte">Transporte</option>
                </select>
                <!-- <div class="spacer"></div> -->
                <img src="<?php echo IMAGES ;?>e-mail.png" alt="" width="40px" style="">
            </div>
            <div style="">
                <textarea rows="4" cols="50" class="mensagem-enviar-field"></textarea>
            </div>
        </div>
    </div>
</div>
</body>
</html>