<?php
// require_once '../../front/security/path.php';
// require_once BACKEND.'dbconnect.php';
$token = $_POST['token'];
var_dump($token);
$usuario_id = $_POST['usuario_id'];
var_dump($usuario_id);
$rota_id = $_POST['rota_id'];
var_dump($rota_id);
$descricao = $_POST['descricao'];
var_dump($descricao);
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "http://127.0.0.1/eTransporte/app/back/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"name\": \"addMensagem\",\n  \"param\": {\n    \"usuario\": \"$usuario_id\",\n    \"rota\": \"$rota_id\",\n    \"descricao\": \"$descricao\",\n    \"mensagem_status\": \"A\"\n    }\n}",
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