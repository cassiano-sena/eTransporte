<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once '../security/path.php';

$stmt = $conexao->prepare("SELECT * FROM tab_mensagens ORDER BY hora ");
$stmt->execute();
$mensagens = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($mensagens as $mensagem):
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
endforeach;
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
    <span class="notificacoes-home" style="font-size:10px;">
        <div class="notificacao-transporte">
            <div class="not-mesg-transporte"  style="height:100%; width:100%;"><?php echo $rota['rota']; ?><br>
                <img src="<?php echo IMAGES ;?>bus.png" alt="transporte" width="50px" style="padding:10px; padding-left:4px;">
            </div>
        </div>
        <div class="not-spacer">
            <div class="not-design-column-spacer"></div>
        </div>
        <div class="notificacao-mensagem">
            <div class="not-mesg-user" style="height:100%; width:30%;"><?php echo $usuario['nome']; ?>
            <?php echo " ["; ?>
            <?php echo $mensagem['hora']; ?>
            <?php echo "] "; ?><br>
                <div style="font-size:8px;line-height:1.5;">
                </div>
                <img src="<?php echo IMAGES ;?>usuario.png" alt="usuario" width="80px" style="padding:10px; padding-left:4px;">
            </div>
            <div class="not-mesg-content" style="height:100%; width:70%;">
                <div class="enclosed-box" style="margin:10px;">
                    <?php echo $mensagem['descricao']; ?><br><br>
                </div>
            </div>
        </div>
    </span>
</body>
</html>
