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
    <script language="javascript">
        function redirect(loc){
            if(loc=="usuario"){
                window.location.href='./paginas/usuario.php';
            }else if(loc=="mensagens"){
                window.location.href='./paginas/mensagens.php';
            }else if(loc=="transporte"){
                window.location.href='./paginas/transporte.php';
            }else if(loc=="home"){
                // window.location.href='./paginas/home.php';
                // window.location.href='../../index.php';
            }else if(loc=="github"){
                window.location.href='https://github.com/cassiano-sena/eTransporte/tree/main';
            }
        }
    </script>
</head>
<body>
    <div id="menu" class="menu">
        <img src="" alt="" height="60px"><br>
        <img src="<?php echo IMAGES ;?>usuario.png" alt="usuario" width="50px" style="padding:10px; padding-left:4px;" onClick="redirect('usuario')"><br>
        <img src="<?php echo IMAGES ;?>bell.png" alt="mensagens" width="50px" style="padding:10px; padding-left:4px;" onClick="redirect('mensagens')"><br>
        <img src="<?php echo IMAGES ;?>bus.png" alt="transporte" width="50px" style="padding:10px; padding-left:4px;" onClick="redirect('transporte')"><br>
        <div class="spacer-column"></div>
        <img src="<?php echo IMAGES ;?>logout.png" alt="logout" width="50px" style="padding:10px; padding-left:4px;" onClick="redirect('logout')"><br>
    </div>
</body>
</html>