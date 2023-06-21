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
    <!-- < ?php var_dump(TEMPLATE);?> -->
    <?php include(TEMPLATE . 'cabecalho.php'); ?>
    <?php include(TEMPLATE . 'menu.php'); ?>
    <?php include(TEMPLATE . 'cadastro-transporte.php'); ?>
    <?php include(TEMPLATE . 'rodape.php'); ?>
</body>
</html>