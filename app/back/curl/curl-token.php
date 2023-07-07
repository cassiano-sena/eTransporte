<?php
// session_start();
require_once '../../front/security/path.php';
// require_once BACKEND.'dbconnect.php';
// $email = $_POST['email'];
// $senha = $_POST['senha'];
$email = isset($_POST['email']) ? $_POST['email'] : "";
$senha = isset($_POST['senha']) ? $_POST['senha'] : "";
if ($email != "" && $senha != "") {

  $curl = curl_init();

  curl_setopt_array($curl, [
    CURLOPT_URL => "http://127.0.0.1/eTransporte/app/back/",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\n  \"name\": \"generateToken\",\n  \"param\": {\n    \"email\": \"$email\",\n    \"senha\": \"$senha\"\n  }\n}",
    CURLOPT_HTTPHEADER => [
      "Accept: */*",
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
    $responseData = json_decode($response, true);
    if ($responseData && isset($responseData['response']['status'])) {
      $httpStatusCode = $responseData['response']['status'];
      $expectedStatusCode = 200;

      if ($httpStatusCode === $expectedStatusCode) {
        $_SESSION['token'] = $responseData['response']['result']['token'];
        // $conexao = new PDO('mysql:host=localhost;dbname=projeto_pw', 'root', '');
        // $conexao = new PDO('mysql:host=localhost;dbname=projeto_pw', 'root', 'root');
        $stmt = $conexao->prepare("SELECT * FROM tab_usuarios WHERE email=:email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
        $usuario_id = $usuario['usuario_id'];
        $nome = $usuario['nome'];
        $email = $usuario['email'];
        $telefone = $usuario['telefone'];
        $senha = $usuario['senha'];
        $is_admin = $usuario['is_admin'];
        $is_driver = $usuario['is_driver'];
        $is_active = $usuario['is_active'];
        $usuario_status = $usuario['usuario_status'];
        $created_on = $usuario['created_on'];
        $imagem = $usuario['imagem'];
        $cidade = $usuario['cidade'];
        $_SESSION['usuario_id'] = $usuario_id;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['telefone'] = $telefone;
        $_SESSION['senha'] = $senha;
        $_SESSION['is_admin'] = $is_admin;
        $_SESSION['is_driver'] = $is_driver;
        $_SESSION['is_active'] = $is_active;
        $_SESSION['usuario_status'] = $usuario_status;
        $_SESSION['created_on'] = $created_on;
        $_SESSION['imagem'] = $imagem;
        $_SESSION['cidade'] = $cidade;
        
        // echo $response;
        // echo $responseData;
        echo addslashes(json_encode($response));
        // echo addslashes(json_encode($responseData));
        header("Location: http://localhost/eTransporte/app/front/paginas/home.php");
        exit();
      } else {
        // echo "User not found.";
        echo "Usuário/Senha incorretos.";
      }
      } else {
        echo "Invalid response: " . $httpStatusCode;
      }
    } else {
      echo "Invalid response format.";
    }
  }
}