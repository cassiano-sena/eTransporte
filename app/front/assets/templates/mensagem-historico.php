<?php
// session_start();
require_once '../security/path.php';

$stmt = $conexao->prepare("SELECT * FROM tab_mensagens ORDER BY hora ");
$stmt->execute();
$mensagens = $stmt->fetchAll(PDO::FETCH_ASSOC);

$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : '';
$token = isset($_SESSION['token']) ? $_SESSION['token'] : '';
$usuarioId = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : '';
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
        .mensagem-util{
            display:inline-block;
            text-align:right;
        }
        .mensagem-historico-box{
            overflow:hidden;
        }
        .msg-historico-content{
            flex:1;
            width:100%;
        }
    </style>
</head>
<body>
<div class="conteudo">
        <div class="title-left">
            Histórico
        </div>
        
        <?php foreach ($mensagens as $mensagem): ?>
        <?php
            $usuarioId = $mensagem['usuario'];
            $rotaId = $mensagem['rota'];
            $hora = $mensagem['hora'];
            $mensagemId = $mensagem['mensagem_id'];
            $mensagemDataAttr = 'data-mensagem-id="' . $mensagemId . '"';
            $usuarioStmt = $conexao->prepare("SELECT * FROM tab_usuarios WHERE usuario_id = :usuarioId");
            $usuarioStmt->bindParam(':usuarioId', $usuarioId);
            $usuarioStmt->execute();
            $usuario = $usuarioStmt->fetch(PDO::FETCH_ASSOC);

            $rotaStmt = $conexao->prepare("SELECT * FROM tab_rotas WHERE rota_id = :rotaId");
            $rotaStmt->bindParam(':rotaId', $rotaId);
            $rotaStmt->execute();
            $rota = $rotaStmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <span class="mensagem-historico-box" <?php echo $mensagemDataAttr; ?>>
            <div class="mensagem-historico-field">
                <div class="msg-historico-user" style="height:100%; width:30%; padding-left:4px;padding-top:4px; font-size:10px; line-height:1.5;">
                    <?php echo $usuario['nome']; ?><br>
                    <div style="font-size:8px;">
                        <?php echo $rota['rota']; ?>
                        <?php echo " ["; ?>
                        <?php echo $mensagem['hora']; ?>
                        <?php echo "] "; ?><br>
                    </div>
                    <img src="<?php echo IMAGES ;?>usuario.png" alt="usuario" width="50px" style="padding:10px; padding-left:4px;">
                </div>
                <div class="msg-historico-content" style="padding-left:5px;padding-right:5px;text-align:justify;font-size:12px;">
                    <?php echo $mensagem['descricao']; ?><br>
                </div>
                <div class="mensagem-util">
                  <button type="button" class="editar-btn btn btn-secondary btn-sm">Editar</button>
                  <button type="button" class="remover btn btn-danger btn-sm">Remover</button>
                  <button type="button" class="salvar-btn btn btn-primary btn-sm" style="display: none;">Salvar</button>
                  <button type="button" class="cancelar-btn btn btn-secondary btn-sm" style="display: none;">Cancelar</button>
                </div>
            </div>
        </span>
        <?php endforeach; ?>
        
    </div>
    <script>
    $(document).ready(function() {
      // Editar button click event
      $('.editar-btn').click(function() {
        var box = $(this).closest('.mensagem-historico-box');

        if (!box.hasClass('edit-mode')) {
          box.addClass('edit-mode');

          var content = box.find('.msg-historico-content');
          var descricao = content.text().trim();

          var inputField = $('<input>')
            .attr('type', 'text')
            .addClass('message-enviar-field')
            .val(descricao);

          content.html(inputField);

          $(this).hide();
          box.find('.remover, .salvar-btn, .cancelar-btn').show();
        }
      });

      // Cancelar button click event
      $(document).on('click', '.cancelar-btn', function() {
        var box = $(this).closest('.mensagem-historico-box');
        box.removeClass('edit-mode');
        var descricao = box.find('.message-enviar-field').val();
        var content = box.find('.msg-historico-content');
        content.text(descricao);
        box.find('.message-enviar-field').remove();
        box.find('.editar-btn, .remover').show();
        $(this).hide();
        box.find('.salvar-btn').hide();
      });

      // Salvar button click event
      $(document).on('click', '.salvar-btn', function() {
        if(confirm("Atualizar mensagem?")){

          var box = $(this).closest('.mensagem-historico-box');
          var mensagemId = box.attr('data-mensagem-id');
          var descricao = box.find('.message-enviar-field').val();
          var token = <?php echo json_encode($_SESSION['token']); ?>;
          
          $.ajax({
            url: '../../back/curl/curl-updatemessage.php',
            method: 'POST',
            data: {
              mensagem_id: mensagemId,
              descricao: descricao,
              token: token
            },
            success: function(response) {
              console.log(response);
              location.reload();
            },
            error: function(xhr, status, error) {
              console.error(error);
            }
          });
        }
      });

      // Remover button click event
      $(document).on('click', '.remover', function() {
        if (confirm("Remover mensagem?")) {
        var box = $(this).closest('.mensagem-historico-box');
        var mensagemId = box.attr('data-mensagem-id');
        var token = <?php echo json_encode($_SESSION['token']); ?>;
          $.ajax({
            url: '../../back/curl/curl-deletemessage.php',
            method: 'POST',
            data: {
              mensagem_id: mensagemId,
              token: token
            },
            success: function(response) {
              console.log(response);
              location.reload();
            },
            error: function(xhr, status, error) {
              console.error(error);
            }
          });
        }
      });
    });
  </script>
</body>
</html>