<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="assets/js/bootstrap.min.js"></script>
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
            <img class="etransporte-header-icon" src="./assets/img/etransporte.png" alt="menu" width="45px" onClick="redirect('home')">
            <div class="spacer"></div>
            <img class="header-hamburguer-menu" src="./assets/img/more.png" alt="menu" width="45px" onClick="toggleMenu()">
        <!-- < ?php include 'assets/template/menu.php'; ?> -->
    </header>
</body>
</html>