<?php

//Linux
// define('BACKEND', '/var/www/html/eTransporte/app/back/');
// define('CURL', '/var/www/html/eTransporte/app/back/curl/');
// define('FRONTEND', '/var/www/html/eTransporte/app/front/');
// define('TEMPLATE', '/var/www/html/eTransporte/app/front/assets/templates/');
// define('PAGES', '/eTransporte/app/front/paginas/');
// define('CSS', '/eTransporte/app/front/assets/css/');
// define('JS', '/eTransporte/app/front/assets/js/');
// define('FONTS', '/var/www/html/eTransporte/app/front/assets/font/');
// define('IMAGES', '/eTransporte/app/front/assets/img/');
// define('SECURITY', '/var/www/html/eTransporte/app/front/security/');
// define('DATABASE_CONNECTION', '/var/www/html/eTransporte/app/front/security/connect.php');

//Windows
// define('BACKEND', 'C:\xampp\htdocs\eTransporte\app\back/');
// define('CURL', 'C:\xampp\htdocs\eTransporte\app\back/curl/');
// define('FRONTEND', 'C:\xampp\htdocs\eTransporte\app\front/');
// define('TEMPLATE', 'C:\xampp\htdocs\eTransporte\app\front/assets/templates/');
// define('PAGES', '/eTransporte/app/front/paginas/');
// define('CSS', '/eTransporte/app/front/assets/css/');
// define('JS', '/eTransporte/app/front/assets/js/');
// define('FONTS', 'C:\xampp\htdocs\eTransporte\app\front/assets/font/');
// define('IMAGES', '/eTransporte/app/front/assets/img/');
// define('SECURITY', 'C:\xampp\htdocs\eTransporte\app\front\security/');
// define('DATABASE_CONNECTION', 'C:\xampp\htdocs\eTransporte\app\front\security/connect.php');

//Cassiano
define('BACKEND', 'D:\XAMPP\htdocs\eTransporte\app\back/');
define('CURL', 'D:\XAMPP\htdocs\eTransporte\app\back/curl/');
define('FRONTEND', 'D:\XAMPP\htdocs\eTransporte\app\front/');
define('TEMPLATE', 'D:\XAMPP\htdocs\eTransporte\app\front/assets/templates/');
define('PAGES', '/eTransporte/app/front/paginas/');
define('CSS', '/eTransporte/app/front/assets/css/');
define('JS', '/eTransporte/app/front/assets/js/');
define('FONTS', 'D:\XAMPP\htdocs\eTransporte\app\front/assets/font/');
define('IMAGES', '/eTransporte/app/front/assets/img/');
define('SECURITY', 'D:\XAMPP\htdocs\eTransporte\app\front\security/');
define('DATABASE_CONNECTION', 'D:\XAMPP\htdocs\eTransporte\app\front\security/connect.php');

$conexao = new PDO('mysql:host=localhost;dbname=projeto_pw', 'root', '');
// $conexao = new PDO('mysql:host=localhost;dbname=projeto_pw', 'root', 'root');

?>

<!DOCTYPE html>
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
            if(act=="Cadastro"){
                window.location.href='<?php echo PAGES ;?>login-registrar.php';
            }else if(act=="Login"){
                window.location.href='<?php echo PAGES ;?>home.php';
            }else if(act=="Transport-See"){
                window.location.href='<?php echo PAGES ;?>transporte-ver.php';
            }else if(act=="Create"){
                window.location.href='<?php echo PAGES ;?>login.php';
            }else if(act=="Redefine"){
                window.location.href='<?php echo PAGES ;?>login.php';
            }else if(act=="Send"){
                window.location.href='<?php echo PAGES ;?>login-redefinir.php';
            }
        }
    </script>
</head>
</html>