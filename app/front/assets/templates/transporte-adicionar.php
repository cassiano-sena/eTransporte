<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once '../security/path.php';

$stmt = $conexao->prepare("SELECT * FROM tab_rotas");
$stmt->execute();
$rotas = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>eTransporte-</title>
    <script>
    // Adicionar button click event
    $(document).on('click', '.adicionar-btn', function() {
        if (confirm("Adicionar transporte?")) {
            var rota = $('#add-transport').val();
            var motorista_id = $('#input-motorista').val();
            var datas = $('#input-datas').val();
            var horarios = $('#input-horarios').val();
            var token = <?php echo json_encode($_SESSION['token']); ?>;

            $.ajax({
                url: '../../back/curl/curl-addroute.php',
                method: 'POST',
                data: {
                    rota: rota,
                    motorista_id: motorista_id,
                    datas: datas,
                    horarios: horarios,
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
</script>
</head>
<body>
    <div class="conteudo">
    <div class="enclosed-box" style="display:flex;">
            <div class="transport-item">
                <img src="<?php echo IMAGES ;?>bus.png" alt="" width="40px" style="font-size:10px;margin-top:10px;"><br>
                <input class="input-stylized" id="add-transport" type="text" style="font-size:10px;" value="<?php $rota; ?>" placeholder="Título" ></input>
            </div>
            <div class="notificacao-mensagem">
            <?php
            $stmt = $conexao->prepare("SELECT * FROM tab_usuarios WHERE is_driver = 1");
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <div class="not-mesg-user" style="height: 100%; width: 30%;">
                Motorista<br>
                <h5 style="font-size: 10px;">
                    <select name="motorista" id="motorista">
                        <?php foreach ($usuarios as $usuario) {
                            $motorista_id = $usuario['usuario_id'];
                            $motorista_nome = $usuario['nome'];
                            if ($motorista_id != $rota['motorista']) {
                                echo '<option id="input-motorista" value="' . $motorista_id . '">' . $motorista_nome . '</option>';
                            } else {
                                echo '<option id="input-motorista" value="' . $motorista_id . '" selected>' . $motorista_nome . '</option>';
                            }
                        } ?>
                    </select>
                    <!-- <input id="< ?php echo $rota['motorista']; ?>" class="input-stylized" type="text" value="< ?php echo $rota['m']; ?>" placeholder="Nome" ></input> -->
                    <br>
                </h5>
            </div>
                
            <div>
                Horários
                <div class="rota-cad" style="font-size:14px; line-height: 0.8;display:flex;justify-content:center;">
                        <div class="rotas">
                            <div class="rotas-dados">
                                <div class="rotas-percurso-3">
                                    <input id="input-datas" class="input-stylized" type="text" value="<?php $datas; ?>" placeholder="Datas" ></input>
                                    <input id="input-horarios" class="input-stylized" type="text" value="<?php $horarios; ?>" placeholder="Embarque e Desembarque" ></input>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="not-mesg-content" style="height:100%; width:100%; margin-bottom:50px;"><br>
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14230.406809397276!2d-48.664329!3d-26.916133000000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94d8cb8842138761%3A0x648dbc8d0ef634c1!2sUniversidade%20do%20Vale%20do%20Itaja%C3%AD%2C%20Campus%20Itaja%C3%AD!5e0!3m2!1spt-BR!2sbr!4v1688152142333!5m2!1spt-BR!2sbr" width="350" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                </div>
                    
                <div style="display:flex;text-align:center;justify-content:center; line-height:2;">
                    <button type="button" class="adicionar-btn btn btn-primary btn-sm">Adicionar</button>
                </div>
                
                </div>
            </div>
    </div>
</body>
</html>