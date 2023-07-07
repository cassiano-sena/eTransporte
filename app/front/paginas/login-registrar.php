<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once '../security/path.php';

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
    <script>
        $(document).on('click', '.adicionar-btn', function() {
        if (confirm("Adicionar usuário?")) {
            var nome = $('#nome').val();
            var email = $('#email').val();
            var senha = $('#senha').val();
            // var token = < ?php echo json_encode($_SESSION['token']); ?>;

            $.ajax({
                url: '../../back/curl/curl-adduser.php',
                method: 'POST',
                data: {
                    nome: nome,
                    email: email,
                    senha: senha
                    // token: token
                },
                success: function(response) {
                    console.log(response);
                    window.location.href = 'login.php';
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
    </script>
</head>
<body>
    <div class="conteudo">
        <div class="home-title">
            <div class="login-main">
            <img class="etransporte-header-icon" src="<?php echo IMAGES ;?>etransporte.png" alt="menu" width="100px" style="position:center;margin:0;margin-top:100px; margin-bottom:50px;">
                <div class=login-1>
                    <input class="input-login" value="<?php $nome; ?>" id="nome" type="text" placeholder="Nome">
                    <input class="input-login" value="<?php $email; ?>" id="email" type="email" placeholder="Email">
                    <input class="input-login" value="<?php $senha; ?>" id="senha" type="password" placeholder="Senha">
                </div>
                <div class="buttons" style="justify-content:center;">
                    <div>
                        <button type="button" class="adicionar-btn btn btn-primary" id="">Criar Conta</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include(TEMPLATE . 'rodape.php'); ?>
</body>
</html>