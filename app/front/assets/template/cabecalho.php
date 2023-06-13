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
            menu.style.width = "200px";
            // menu.style.display="block";
        } else {
            menu.style.width = "0px";
            // menu.style.display="hidden";
        }
        }
    </script>
</head>
<body>
    <div class="cabecalho">
        A
        <img src="./assets/img/more.png" alt="menu" width="32px" onClick="toggleMenu()">
        <div id="menu" class="menu">
        <?php include 'assets/template/menu.php'; ?>
        </div>
    </div>
</body>
</html>