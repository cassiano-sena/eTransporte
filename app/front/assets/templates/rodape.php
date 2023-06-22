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
    <footer class="rodape">
        <o style="margin-left:30px; margin-right:2px;">Sobre</o>
        <o style="margin-left:30px; margin-right:20px;">Contato</o>
        <img src="<?php echo IMAGES ;?>instagram.png" alt="instagram" width="32px" style="margin-left:10px; margin-right:2px;" onClick="">
        <img src="<?php echo IMAGES ;?>whatsapp.png" alt="whatsapp" width="32px" style="margin-left:10px; margin-right:2px;" onClick="">
        <img src="<?php echo IMAGES ;?>github.png" alt="github" width="32px" style="margin-left:8px; margin-right:2px;" onClick="redirect('github')">
        <img src=""style="margin-right:30px;"  alt="">
    </footer>
</body>
</html>