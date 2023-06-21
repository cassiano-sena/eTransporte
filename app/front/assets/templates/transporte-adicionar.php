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
        function adicionar(){
            var div = document.getElementById("adicionar-transporte");
            // Add a click event listener to the div
            div.addEventListener("click", function() {
            // Redirect the user to a different page
            window.location.href = "<?php echo PAGES;?>/cadastro-transporte.php"; // Replace with your desired URL
            });
        }
    </script>
</head>
<body>
    <div class="conteudo">
        <!-- <div class="home-title">
            Transporte-Adicionar<br>
        </div> -->
        <div id="adicionar-transporte" class="transporte-adicionar" onclick="adicionar()" onhover="colorChange('fifth');">
            <div class="adicionar">
                +<br>Adicionar novo transporte
            </div>
        </div>
    </div>
</body>
</html>