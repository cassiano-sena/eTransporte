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
    <title>eTransporte-</title>
    <script language="javascript">
        function toggleMenu() {
            var menu = document.getElementById("menu");
            if (menu.style.width === "0px") {
                menu.style.width = "100px";
            } else {
                menu.style.width = "0px";
            }
        }
    </script>
</head>
<body>
    <header class="cabecalho">
            <img class="etransporte-header-icon" src="<?php echo IMAGES ;?>etransporte.png" alt="menu" width="45px" onClick="redirect('home')">
            <div class="spacer"></div>
            <img class="header-hamburguer-menu" src="<?php echo IMAGES ;?>more.png" alt="menu" width="45px" onClick="toggleMenu()">
        <!-- < ?php include 'assets/template/menu.php'; ?> -->
    </header>
</body>
</html>