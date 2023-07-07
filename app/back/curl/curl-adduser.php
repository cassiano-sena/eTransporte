<?php
// require_once '../../front/security/path.php';
// require_once BACKEND.'dbconnect.php';
// $token=$_POST['token'];
// $usuario_id=$_POST['usuario_id'];
$nome=$_POST['nome'];
var_dump($nome);
$email=$_POST['email'];
var_dump($email);
$senha=$_POST['senha'];
var_dump($senha);
$telefone="-";
var_dump($telefone);
// $telefone=$_POST['telefone'];
$is_admin="0";
var_dump($is_admin);
// $is_admin=$_POST['is_admin'];
$is_driver="0";
var_dump($is_driver);
// $is_driver=$_POST['is_driver'];
$is_active="0";
var_dump($is_active);
// $is_active=$_POST['is_active'];
$usuario_status="A";
var_dump($usuario_status);
// $usuario_status=$_POST['usuario_status'];
$created_on="";
var_dump($created_on);

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "http://127.0.0.1/eTransporte/app/back/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"name\": \"addUsuario\",\n  \"param\": {\n    \"nome\": \"$nome\",\n    \"email\": \"$email\",\n    \"telefone\": \"$telefone\",\n    \"senha\": \"$senha\",\n    \"is_admin\": \"$is_admin\",\n    \"is_driver\": \"$is_driver\",\n    \"is_active\": \"$is_active\",\n    \"usuario_status\": \"$usuario_status\",\n    \"created_on\":\"$created_on\"\n  }\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: */*",
    // "Authorization: Bearer $token",
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