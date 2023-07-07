<?php
// require_once '../../front/security/path.php';
// require_once BACKEND.'dbconnect.php';

$token= $_POST['token'];
var_dump($token);
$mensagem_id = $_POST['mensagem_id'];
var_dump($mensagem_id);
$usuario = "";
var_dump($usuario);
$rota = "";
var_dump($rota);
$mensagem_data = "";
var_dump($mensagem_data);
$hora = "";
var_dump($hora);
$descricao = $_POST['descricao'];
var_dump($descricao);
$mensagem_status = "A";
var_dump($mensagem_status);

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "http://127.0.0.1/eTransporte/app/back/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"name\": \"updateMensagem\",\n  \"param\": {\n    \"mensagem_id\": \"$mensagem_id\",\n    \"usuario\": \"$usuario\",\n    \"rota\": \"$rota\",\n    \"mensagem_data\": \"$mensagem_data\",\n    \"hora\": \"$hora\",\n    \"descricao\": \"$descricao\",\n    \"mensagem_status\": \"$mensagem_status\"\n  }\n}",
  // CURLOPT_POSTFIELDS => "{\n  \"name\": \"updateMensagem\",\n  \"param\": {\n    \"mensagem_id\": \"3\",\n    \"usuario\": \"2\",\n    \"rota\": \"2\",\n    \"mensagem_data\": \"\",\n    \"hora\": \"\",\n    \"descricao\": \"B\",\n    \"mensagem_status\": \"I\"\n  }\n}"
  // CURLOPT_POSTFIELDS => "{\n  \"name\": \"updateMensagem\",\n  \"param\": {\n    \"mensagem_id\": \"$mensagem_id\",\n    \"usuario\": \"$usuario\",\n    \"rota\": \"$rota\",\n    \"mensagem_data\": \"$mensagem_data\",\n    \"hora\": \"$hora\",\n    \"descricao\": \"$descricao\",\n    \"mensagem_status\": \"$mensagem_status\",\n  }\n}",
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