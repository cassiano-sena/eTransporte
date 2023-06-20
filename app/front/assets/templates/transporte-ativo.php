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
    <title>eTransporte</title>
</head>
<body>
    <div class="conteudo">
        <div class="home-title">
            <!-- Transporte-Ativo<br> -->
        </div>
        <span class="transportes-disponiveis">
            <div id="participado" class="participado">
                <div class="title-left">Meus Transportes</div>
                <div class="enclosed-box">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3557.601858519024!2d-48.668813469702265!3d-26.9161280458464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94d8cb8842138761%3A0x648dbc8d0ef634c1!2sUniversidade%20do%20Vale%20do%20Itaja%C3%AD%2C%20Campus%20Itaja%C3%AD!5e0!3m2!1spt-BR!2sbr!4v1679960261964!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </span>
    </div>
</body>
</html>