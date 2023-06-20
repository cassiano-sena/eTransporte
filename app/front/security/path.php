<?php

//Linux
define('TEMPLATE', '/var/www/html/eTransporte/app/front/assets/templates/');
define('PAGES', '/eTransporte/app/front/paginas/');
define('CSS', '/eTransporte/app/front/assets/css/');
define('JS', '/eTransporte/app/front/assets/js/');
define('FONTS', '/var/www/html/eTransporte/app/front/assets/font/');
define('IMAGES', '/eTransporte/app/front/assets/img/');
define('SECURITY', '/var/www/html/eTransporte/app/front/security/');

//Windows
// define('TEMPLATE', 'C:\xampp\htdocs\eTransporte\app\front/assets/templates/');
// define('PAGES', '/eTransporte/app/front/paginas/');
// define('CSS', '/eTransporte/app/front/assets/css/');
// define('JS', '/eTransporte/app/front/assets/js/');
// define('FONTS', 'C:\xampp\htdocs\eTransporte\app\front/assets/font/');
// define('IMAGES', '/eTransporte/app/front/assets/img/');
// define('SECURITY', 'C:\xampp\htdocs\eTransporte\app\front\security/');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>eTransporte</title>
    <script language="javascript">
        function redirect(loc){
            if(loc=="usuario"){
                window.location.href='<?php echo PAGES ;?>usuario.php';
            }else if(loc=="mensagens"){
                window.location.href='<?php echo PAGES ;?>mensagem.php';
            }else if(loc=="transporte"){
                window.location.href='<?php echo PAGES ;?>transporte.php';
            }else if(loc=="home"){
                window.location.href='<?php echo PAGES ;?>home.php';
            }else if(loc=="login"){
                window.location.href='<?php echo PAGES ;?>login.php';
            }else if(loc=="logout"){
                window.location.href='<?php echo PAGES ;?>logout.php';
            }else if(loc=="github"){
                window.location.href='https://github.com/cassiano-sena/eTransporte/tree/main';
            }
        }

        function action(act){
            if(act=="Register"){
                window.location.href='<?php echo PAGES ;?>cadastro.php';
            }else if(act=="Login"){
                window.location.href='<?php echo PAGES ;?>home.php';
            }else if(act=="Create"){
                window.location.href='<?php echo PAGES ;?>login.php';
            }else if(act=="Redefine"){
                window.location.href='<?php echo PAGES ;?>login.php';
            }else if(act=="Send"){
                window.location.href='<?php echo PAGES ;?>recuperar_senha.php';
            }
        }

        function colorChange(color){
            if(color=='fifth'){
                transporte-adicionar.background-color=quinary-color;
            }
        }
    </script>
</head>
</html>