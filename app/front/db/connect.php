<?php

$con=new mysqli('localhost','root','','projeto_pw');

if(!$con){
    die(mysqli_error($con));
}

?>