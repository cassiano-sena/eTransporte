<?php
// require_once '../../front/security/path.php';
// require_once BACKEND.'dbconnect.php';
$token=$_POST['token'];
var_dump($token);
$usuario_id=$_POST['usuario_id'];
var_dump($usuario_id);
$nome=$_POST['nome'];
var_dump($nome);
$email=$_POST['email'];
var_dump($email);
$senha=$_POST['senha'];
var_dump($senha);
$telefone=$_POST['telefone'];
var_dump($telefone);
$is_admin=$_POST['is_admin'];
var_dump($is_admin);
$is_driver=$_POST['is_driver'];
var_dump($is_driver);
// $is_active=$_POST['is_active'];
$is_active="";
var_dump($is_active);
// $usuario_status=$_POST['usuario_status'];
$usuario_status="A";
var_dump($usuario_status);
// $created_on=$_POST['created_on'];
$created_on="";
var_dump($created_on);
// $cidade=$_POST['cidade'];
$cidade="";
var_dump($cidade);
// $rotas=$_POST['rotas'];
$rotas="";
var_dump($rotas);
// $imagem=$_POST['imagem'];
$imagem="";
var_dump($imagem);

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "http://127.0.0.1/eTransporte/app/back/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"name\": \"updateUsuario\",\n  \"param\": {\n    \"usuario_id\": \"$usuario_id\",\n    \"nome\": \"$nome\",\n    \"email\": \"$email\",\n    \"telefone\": \"$telefone\",\n    \"senha\": \"$senha\",\n    \"is_admin\": \"$is_admin\",\n    \"is_driver\": \"$is_driver\",\n    \"is_active\": \"$is_active\",\n    \"usuario_status\": \"$usuario_status\",\n    \"created_on\": \"$created_on\",\n    \"cidade\": \"$cidade\",\n    \"rotas\": \"$rotas\",\n    \"imagem\": \"$imagem\"\n  }\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: */*",
    "Authorization: Bearer $token",
    "Content-Type: application/json",
    "User-Agent: Thunder Client (https://www.thunderclient.com)"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}