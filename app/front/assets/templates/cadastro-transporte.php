<?php
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
    <script language="javascript">
    </script>
</head>
<body>
<div class="conteudo">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3557.601858519024!2d-48.668813469702265!3d-26.9161280458464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94d8cb8842138761%3A0x648dbc8d0ef634c1!2sUniversidade%20do%20Vale%20do%20Itaja%C3%AD%2C%20Campus%20Itaja%C3%AD!5e0!3m2!1spt-BR!2sbr!4v1679960261964!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <!-- <br>
        <button type="button" class="btn btn-danger">Danger</button>
        <button type="button" class="btn btn-dark">Dark</button>
        <button type="button" class="btn btn-light">Light</button>
        <button type="button" class="btn btn-primary">Primary</button>
        <button type="button" class="btn btn-outline-primary">Primary</button> -->

    <div id="adicionar-transporte" class="transporte-adicionar" onclick="adicionar()" onhover="colorChange('fifth');">
    <div class="notificacao-transporte">
        <div class="not-mesg-transporte"  style="height:100%; width:100%;">Transporte<br>
            <img src="<?php echo IMAGES ;?>bus.png" alt="transporte" width="50px" style="padding:10px; padding-left:4px;"><br>
            <button type="button" class="btn btn-outline-primary btn-sm">Participando</button>
            <button type="button" class="btn btn-primary btn-sm">Ver</button>
        </div>
    </div>
    <div class="not-spacer">
        <div class="not-design-column-spacer"></div>
    </div>
    <div class="notificacao-mensagem">
        <div class="not-mesg-user" style="height:100%; width:30%;">Motorista<br>
        <img src="<?php echo IMAGES ;?>usuario.png" alt="motorista" width="50px" style="padding:10px; padding-left:4px;"><br>
        <algo style="font-size:10px;">
        Nome-do-motorista
        <br>
        <img src="<?php echo IMAGES ;?>phone-solid.svg" alt="telefone" width="10px">
        (11)1111-1111
        </algo>
        </div>
        <div class="not-mesg-content" style="height:100%; width:70%;">Rota<br>
            <!-- <img src="< ?php echo IMAGES ;?>etransporte.png" alt="rota" width="50px" style="padding:10px; padding-left:4px;"> -->
            <div class="rota-cad" style="font-size:10px; line-height: 0.8;display:flex;justify-content:center;">
                <div class="rota-1">
                    <div>
                        Viagem 1
                        <div>
                            1
                        </div>
                        <div>
                            2
                        </div>
                    </div>
                    <div>
                        Estimado
                        <div>
                            1
                        </div>
                        <div>
                            2
                        </div>
                    </div>
                </div>
                <div class="rota-2">
                    <div>
                        Viagem 2
                        <div>
                            3
                        </div>
                        <div>
                            4
                        </div>
                    </div>
                    <div>
                        Estimado
                        <div>
                            3
                        </div>
                        <div>
                            4
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm">Deixar</button>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
</body>
</html>