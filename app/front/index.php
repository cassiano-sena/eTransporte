<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/comum.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <title>eTransporte-</title>
    <script language="javascript">
        function redirect(loc){
            if(loc=="usuario"){
                window.location.href='./paginas/servicos/usuario/usuario.php';
            }else if(loc=="mensagens"){
                window.location.href='./paginas/servicos/mensagem/mensagens.php';
            }else if(loc=="transporte"){
                window.location.href='./paginas/servicos/transporte/transporte.php';
            }else if(loc=="home"){
                // window.location.href='./paginas/servicos/home.php';
                window.location.href='index.php';
            }else if(loc=="github"){
                window.location.href='https://github.com/cassiano-sena/eTransporte/tree/main';
            }
        }
    </script>
</head>
<body>
    <!-- <div class="janela"> -->
        <?php include 'assets/template/cabecalho.php'; ?>
        <?php include 'assets/template/menu.php'; ?>
        <?php include 'assets/template/conteudo.php'; ?>
        <?php include 'assets/template/debug.php'; ?>
        <?php include 'assets/template/rodape.php'; ?>
    <!-- </div> -->
</body>
</html>