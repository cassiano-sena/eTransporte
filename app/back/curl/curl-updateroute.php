<?php
// require_once '../../front/security/path.php';
// require_once BACKEND.'dbconnect.php';

$token = isset($_POST['token']) ? $_POST['token'] : "";
var_dump($token);
$rota_id = isset($_POST['rota_id']) ? $_POST['rota_id'] : "";
var_dump($rota_id);
$rota = isset($_POST['rota']) ? $_POST['rota'] : "";
var_dump($rota);
$veiculo = "1";
var_dump($veiculo);
$motorista = isset($_POST['motorista']) ? $_POST['motorista'] : "";
var_dump($motorista);
$datas = isset($_POST['datas']) ? $_POST['datas'] : "";
var_dump($datas);
$horarios = isset($_POST['horarios']) ? $_POST['horarios'] : "";
var_dump($horarios);
$imagem = isset($_POST['imagem']) ? $_POST['imagem'] : "";
var_dump($imagem);
$rota_status = "A";
var_dump($rota_status);

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "http://127.0.0.1/eTransporte/app/back/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"name\": \"updateRota\",\n  \"param\": {\n    \"rota_id\": \"$rota_id\",\n    \"rota\": \"$rota\",\n    \"veiculo\": \"$veiculo\",\n    \"motorista\": \"$motorista\",\n    \"datas\": \"$datas\",\n    \"horarios\": \"$horarios\",\n    \"rota_status\": \"$rota_status\",\n    \"imagem\": \"$imagem\"\n  }\n}",
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