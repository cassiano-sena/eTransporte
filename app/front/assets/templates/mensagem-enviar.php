<?php
// session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once '../security/path.php';

$stmt = $conexao->prepare("SELECT * FROM tab_rotas");
$stmt->execute();
$rotas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $token=$SESSION['token']
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
    <style>
        .mensagem-enviar-box{
            overflow:hidden;
        }
    </style>
    <script>
        $(document).ready(function() {
            //CRIAR
            $('#enviar').click(function(e) {
                e.preventDefault();
                var rota_id = $('#rota_id').val();
                var descricao = $('#descricao').val();
                var usuario_id = <?php echo json_encode($_SESSION['usuario_id']); ?>;
                var token = <?php echo json_encode($_SESSION['token']); ?>;

                $.ajax({
                    url: '../../back/curl/curl-addmessage.php',
                    method: 'POST',
                    data: {
                    usuario_id: usuario_id,
                    rota_id: rota_id,
                    descricao: descricao,
                    token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    },  
                });
            });
            });
    </script>
</head>
<body>
<div class="conteudo">
    <div class="mensagem-enviar-box">
        <div class="mensagem-enviar-transporte">
            <div class="msg-enviar-transporte"  style="height:100%; width:100%;">
                <div>
                <?php echo $_SESSION['nome']; ?>
                </div><br>
                <img src="<?php echo IMAGES ;?>usuario.png" alt="usuário" width="50px" style="padding:10px; padding-left:4px;">
            </div>
        </div>
        <div class="mensagem-enviar-content">
            <form method="POST" action="">
                <div style="margin-top:10px;">
                    <textarea id="descricao" name="descricao" rows="4" cols="50" class="mensagem-enviar-field" placeholder="Descrição" required><?php echo isset($descricao) ? $descricao : ''; ?></textarea>
                </div>
                <div style="text-align:left;line-height:1.5;height:50px;">
                    <div class="select-rota" style="display:flex;margin:10px;margin-right:20px;">
                        <select id="rota_id" name="rota_id" id="" required>
                            <?php foreach ($rotas as $rota): ?>
                            <option id="" value="<?php echo $rota['rota_id']; ?>"><?php echo $rota['rota']; ?></option>    
                            <?php endforeach; ?>
                        </select>
                        <div class="spacer"></div>
                        <button type="submit" id="enviar" class="btn btn-primary btn-sm">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
