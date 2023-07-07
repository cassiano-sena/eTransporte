<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once '../security/path.php';
require_once SECURITY.'timer.php';

// echo $_SESSION['usuario_id'];
// echo $_SESSION['nome'];
// echo $_SESSION['token'];
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
    <script language="javascript">
    </script>
</head>
<body>
    <?php include TEMPLATE . 'cabecalho.php'; ?>
    <?php include TEMPLATE . 'menu.php'; ?>
    <div class="conteudo">
        <div class="home-title home-greetings">
            Seja bem vindo, <?php echo $_SESSION['nome']; ?>.<br>
            Como podemos ajudar?
        </div>
        <?php include TEMPLATE . 'home-notificacoes.php'; ?>
    </div>
</body>
</html>