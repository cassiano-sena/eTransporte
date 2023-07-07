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
    <title>eTransporte</title>
    <style>
        .enclosed-box{
            overflow:hidden;
        }
        .transport-item{
            width:80px;
            margin:5px;
            font-size:14px;
            line-height:2.5;
            text-align:center;
        }
        .item-title{
            font-size:8px;
            overflow:hidden;
        }
        .input-stylized,
        .input-stylized-rota,
        .input-stylized-titulo,
        #input-stylized{
            font-size:10px;
            width:80px;
            height: 30px;
            border-radius: 10px;
            background-color: #A2A6A8;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="conteudo">
        <div class="title-left">Transportes Disponíveis</div>
        <?php foreach ($rotas as $rota): ?>
        <div class="enclosed-box" style="display:flex;">
            <div class="transport-item">
                <img src="<?php echo IMAGES ;?>bus.png" alt="<?php echo $rota['rota']; ?>" width="40px" style="font-size:10px;margin-top:10px;"><br>
                <input class="input-stylized-rota input-stylized" data-rota-id="<?php echo $rota['rota_id']; ?>" type="text" style="font-size:10px;" value="<?php echo $rota['rota']; ?>" placeholder="Título" readonly>
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
                    <select class="motorista-select" name="motorista" id="motorista" readonly>
                        <?php foreach ($usuarios as $usuario) {
                            $motorista_id = $usuario['usuario_id'];
                            $motorista_nome = $usuario['nome'];
                            $is_driver = $usuario['is_driver'];

                            if ($is_driver) {
                                if ($motorista_id != $rota['motorista']) {
                                    echo '<option class="motorista-select-option" data-motorista-id="' . $motorista_id . '" value="' . $motorista_id . '">' . $motorista_nome . '</option>';
                                } else {
                                    echo '<option class="motorista-select-option" data-motorista-id="' . $motorista_id . '" value="' . $motorista_id . '" selected>' . $motorista_nome . '</option>';
                                }
                            }
                        } ?>
                    </select>
                    <br>
                </h5>
            </div>
                
            <div>
                Horários
                <div class="rota-cad" style="font-size:14px; line-height: 0.8;display:flex;justify-content:center;">
                        <div class="rotas">
                            <div class="rotas-dados">
                                <div class="rotas-percurso-3">
                                    <input id="input-stylized-datas" class="input-stylized" type="text" value="<?php echo $rota['datas']; ?>" placeholder="Datas" readonly></input>
                                    <input id="input-stylized-horarios" class="input-stylized" type="text" value="<?php echo $rota['horarios']; ?>" placeholder="Embarque e Desembarque" readonly></input>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14230.406809397276!2d-48.664329!3d-26.916133000000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94d8cb8842138761%3A0x648dbc8d0ef634c1!2sUniversidade%20do%20Vale%20do%20Itaja%C3%AD%2C%20Campus%20Itaja%C3%AD!5e0!3m2!1spt-BR!2sbr!4v1688152142333!5m2!1spt-BR!2sbr" width="350" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                    <img src="<?php echo IMAGES ?>pb-itajai.png" width="300px" style="margin:0;" height="130px" alt="">
                <div class="not-mesg-content" style="height:100%; width:100%; margin-bottom:50px;"><br>
                </div>
                    
                <div style="display:flex;text-align:center;justify-content:center; line-height:2;">
                    <button type="button" class="editar-btn btn btn-secondary btn-sm">Editar</button>
                    <button type="button" class="remover-btn btn btn-danger btn-sm" style="display: none;">Remover</button>
                    <button type="button" class="salvar-btn btn btn-primary btn-sm" style="display: none;">Salvar</button>
                    <button type="button" class="cancelar-btn btn btn-secondary btn-sm" style="display: none;">Cancelar</button>
                </div>
                
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
    <script>
        $(document).ready(function() {
            // Editar button click event
            $('.editar-btn').click(function() {
            var box = $(this).closest('.enclosed-box');

            if (!box.hasClass('edit-mode')) {
                box.addClass('edit-mode');

                var inputFields = box.find('.input-stylized');

                inputFields.prop('readonly', false);

                $(this).hide();
                box.find('.remover-btn, .salvar-btn, .cancelar-btn').show();
            }
            });

            // Cancelar button click event
            $(document).on('click', '.cancelar-btn', function() {
                var box = $(this).closest('.enclosed-box');
                box.removeClass('edit-mode');

                var inputFields = box.find('.input-stylized');

                inputFields.each(function() {
                    var originalValue = $(this).data('original-value');
                    $(this).val(originalValue);
                });

                inputFields.prop('readonly', true);

                $(this).hide();
                box.find('.editar-btn').show();
                box.find('.salvar-btn, .remover-btn').hide();
            });

            // Salvar button click event
            $(document).on('click', '.salvar-btn', function() {
            var inputElement = document.getElementsByClassName('input-stylized-rota')[0];
            var box = $(this).closest('.enclosed-box');
            var rotaId = box.find('.input-stylized-rota').data('rota-id');
            var rotaNome = inputElement.value;
            // var rotaNome = box.find('.input-stylized-titulo').val();
            var motorista = box.find('.motorista-select-option').data('motorista-id');
            var datas = box.find('#input-stylized-datas').val();
            var horarios = box.find('#input-stylized-horarios').val();
            var token = <?php echo json_encode($_SESSION['token']); ?>;

            if (confirm("Atualizar transporte?")) {
                var formData = {
                rota_id: rotaId,
                rota: rotaNome,
                motorista: motorista,
                datas: datas,
                horarios: horarios,
                token: token
                };

                $.ajax({
                url: '../../back/curl/curl-updateroute.php',
                method: 'POST',
                data: formData,
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
            $(document).on('click', '.remover-btn', function() {
                if (confirm("Remover transporte?")) {
                    var box = $(this).closest('.enclosed-box');
                    var rotaId = box.find('.input-stylized-rota').data('rota-id');
                    var token = <?php echo json_encode($_SESSION['token']); ?>;

                    $.ajax({
                        url: '../../back/curl/curl-deleteroute.php',
                        method: 'POST',
                        data: {
                            token: token,
                            rota_id: rotaId
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
</html>
