<?php
require_once('constants.php');
    class Rest {
        protected $request;
        protected $serviceName;
        protected $param;
        protected $dbConn;
        protected $userId;
        public function __construct(){
            /**
            * APENAS POSSIBILITA 'POST'
            */
            
            if($_SERVER['REQUEST_METHOD'] !== 'POST'){
                $this->throwError(REQUEST_METHOD_NOT_VALID, 'Request method is not valid.');
            }
            $handler = fopen('php://input', 'r');
            $this->request = stream_get_contents($handler);
            $this->validateRequest();
            $db=new DbConnect;
            $this->dbConn=$db->connect();
            // se o servico chamado for gerar-token, ignorar
            if('generatetoken'!=strtolower($this->serviceName)){
                $this->validateToken();
            }
        }
        public function validateRequest(){
            // se conteudo nao e json, erro
            if($_SERVER['CONTENT_TYPE'] !== 'application/json'){
                $this->throwError(REQUEST_CONTENTTYPE_NOT_VALID, 'Request content type is not valid');
            }
            $data = json_decode($this->request, true);

            // se api sem nome, erro
            if(!isset($data['name']) || $data['name'] == ""){
                $this->throwError(API_NAME_REQUIRED, "API name required.");
            }
            $this->serviceName=$data['name'];

            // se sem parametro, erro
            if(!is_array($data['param'])){
                $this->throwError(API_PARAM_REQUIRED, "API PARAM is required.");
            }
            $this->param=$data['param'];
        }
        public function processApi(){
            $api=new Api;
            $rMethod=new reflectionMethod('API',$this->serviceName);
            if(!method_exists($api,$this->serviceName)){
                $this->throwError(API_DOES_NOT_EXIST,"API does not exist.");
            }
            $rMethod->invoke($api);
        }
        // validar parametros passados
        public function validateParameter($fieldName,$value,$dataType,$required=true){
            if($required==true && empty($value)==true){
                $this->throwError(VALIDATE_PARAMETER_REQUIRED,$fieldName." Parameter is required");
            }
            switch($dataType){
                // se nao boolean, erro
                case BOOLEAN:
                    if(!is_bool($value)){
                        $this->throwError(VALIDATE_PARAMETER_DATATYPE,"Datatype is not valid for ".$fieldName.". It should be boolean.");
                    }
                    break;
                // se nao integer, erro
                case INTEGER:
                    if(!is_numeric($value)){
                        $this->throwError(VALIDATE_PARAMETER_DATATYPE,"Datatype is not valid for ".$fieldName.". It should be numeric.");
                    }
                    break;
                // se nao string, erro
                case STRING:
                    if(!is_string($value)){
                        $this->throwError(VALIDATE_PARAMETER_DATATYPE,"Datatype is not valid for ".$fieldName.". It should be string.");
                    }
                    break;
                // erro padrao
                default:
                    $this->throwError(VALIDATE_PARAMETER_DATATYPE,"Datatype is not valid for ".$fieldName);
                    break;
            }
            return $value;
        }
        // validar um token
        // necessario para todos os servicos menos gerar-token
        public function validateToken(){
            try{
                //precisa de token, chave secreta e o algoritmo(hs256)
                //esta funcionando!
                $token=$this->getBearerToken();
                $payload=JWT::decode($token,SECRET_KEY,['HS256']);
                $stmt=$this->dbConn->prepare("SELECT * FROM tab_usuarios WHERE usuario_id = :userId");
                $stmt->bindParam(":userId",$payload->userId);
                $stmt->execute();
                $user=$stmt->fetch(PDO::FETCH_ASSOC);
                // cai nesse laço
                if(!is_array($user)){
                    $this->returnResponse(INVALID_USER_PASS, "This user was not found in the database.");
                }
                if($user['usuario_status']!=='A'){
                    $this->returnResponse(LIMITED_USER_ACCESS, "This user access is limited. Please contact support for further information.");
                }
                $this->userId=$payload->userId;
            }catch(Exception $e){
                $this->throwError(ACCESS_TOKEN_ERROR,$e->getMessage());
            }
        }

        // mostrar erro da requisicao, em json
        public function throwError($code,$message){
            header("content-type: application/json");
            $errorMsg = json_encode(['error'=>['status'=>$code, 'message'=>$message]]);
            echo $errorMsg; exit;
        }
        // retornar resposta da requisicao, em json
        public function returnResponse($code,$data){
            header("content-type: application/json");
            $response=json_encode(['response'=>['status'=>$code,"result"=>$data]]);
            echo $response; exit;
        }
        // coletar header da autorizacao
        public function getAuthorizationHeader(){
            $headers=null;
            if(isset($_SERVER['Authorization'])){
                $headers=trim($_SERVER["Authorization"]);
            }
            // nginx/fastcgi
            else if(isset($_SERVER["HTTP_AUTHORIZATION"])){
                $headers=trim($_SERVER["HTTP_AUTHORIZATION"]);
            }
            // android
            else if(function_exists('apache_request_headers')){
                $requestHeaders=apache_request_headers();
                $requestHeaders=array_combine(array_map('ucwords',
                    array_keys($requestHeaders)), array_values($requestHeaders));
                if(isset($requestHeaders['Authorization'])){
                    $headers=trim($requestHeaders['Authorization']);
                }
            }
            return $headers;
        }
        // coletar access token do header
        public function getBearerToken(){
            $headers=$this->getAuthorizationHeader();
            // pega o token de acesso do header
            if(!empty($headers)){
                // formatação ideal 'bearer (token)'
                if(preg_match('/Bearer\s(\S+)/',$headers,$matches)){
                    return $matches[1];
                }
            }
            $this->throwError(AUTHORIZATION_HEADER_NOT_FOUND,'Access Token not found');
        }
    }