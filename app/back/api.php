<?php
    // vai acessar as funcoes criadas em rest
    class Api extends Rest{
        // forma para conectar na db
        public function __construct(){
            parent::__construct();
        }
        // aqui gera um token
        public function generateToken(){
            // validar usuario e senha
            $user=$this->validateParameter('email',$this->param['email'],STRING);
            $pass=$this->validateParameter('senha',$this->param['senha'],STRING);
            try{
                $stmt=$this->dbConn->prepare("SELECT * FROM tab_usuarios WHERE email=:email AND senha=:senha");
                $stmt->bindParam(":email",$user);
                $stmt->bindParam(":senha",$pass);
                $stmt->execute();
                $user=$stmt->fetch(PDO::FETCH_ASSOC);
                if(!is_array($user)){
                    $this->returnResponse(INVALID_USER_PASS, "Email or Password is incorrect.");
                }
                if($user['is_active']==1){
                    $this->returnResponse(USER_IS_ACTIVE, "User is already active in the system.");
                }
                if($user['usuario_status']!=='A'){
                    $this->returnResponse(LIMITED_USER_ACCESS, "User access is limited. Please contact support for further information.");
                }
                // valido por 15m
                $payload=[
                    'iat'=>time(),
                    'iss'=>'localhost',
                    'exp'=>time()+(15*60),
                    'userId'=>$user['usuario_id']
                ];
                $token=JWT::encode($payload, SECRET_KEY);
                $data=['token'=>$token];
                $this->returnResponse(SUCCESS_RESPONSE,$data);
            }catch(Exception $e){
                $this->throwError(JWT_PROCESSING_ERROR,$e->getMessage());
            }
        }
        // adicionar um usuario
        public function addUsuario(){
            $nome=$this->validateParameter('nome',$this->param['nome'],STRING,false);
            $email=$this->validateParameter('email',$this->param['email'],STRING,false);
            $telefone=$this->validateParameter('telefone',$this->param['telefone'],STRING,false);
            $senha=$this->validateParameter('senha',$this->param['senha'],STRING,false);
            $is_admin=$this->validateParameter('is_admin',$this->param['is_admin'],STRING,false);
            $is_driver=$this->validateParameter('is_driver',$this->param['is_driver'],STRING,false);
            $is_active=$this->validateParameter('is_active',$this->param['is_active'],STRING,false);
            $usuario_status=$this->validateParameter('usuario_status',$this->param['usuario_status'],STRING,false);

            $aux=new Usuario;
            $aux->setNome($nome);
            $aux->setEmail($email);
            $aux->setTelefone($telefone);
            $aux->setSenha($senha);
            $aux->setIsAdmin($is_admin);
            $aux->setIsDriver($is_driver);
            $aux->setIsActive($is_active);
            $aux->setStatus($usuario_status);
            $aux->setCreatedOn(date('Y-m-d'));
            if(!$aux->insert()){
                $message='Failed to insert.';
            }else{
                $message="Inserted successfully.";                
            }$this->returnResponse(SUCCESS_RESPONSE, $message);
        }

        // pegar detalhes do usuario a partir do id
        public function getUsuarioDetails() {
			$usuario_Id = $this->validateParameter('usuario_id', $this->param['usuario_id'], INTEGER);

			$aux = new Usuario;
			$aux->setId($usuario_Id);
			$usuario = $aux->getUsuarioById();
			if(!is_array($usuario)) {
				$this->returnResponse(SUCCESS_RESPONSE, ['message' => 'User details not found.']);
			}

			$response['usuario_id']=$usuario['usuario_id'];
			$response['nome']=$usuario['nome'];
			$response['email']=$usuario['email'];
			$response['telefone']=$usuario['telefone'];
			$response['senha']=$usuario['senha'];
			$response['is_admin']=$usuario['is_admin'];
			$response['is_driver']=$usuario['is_driver'];
			$response['is_active']=$usuario['is_active'];
			$response['usuario_status']=$usuario['usuario_status'];
			$response['created_on']=$usuario['created_on'];
			$this->returnResponse(SUCCESS_RESPONSE, $response);
		}
        
        public function updateUsuario() {
			$usuario_id = $this->validateParameter('usuario_id', $this->param['usuario_id'], INTEGER);
			$nome = $this->validateParameter('nome', $this->param['nome'], STRING, false);
			$email = $this->validateParameter('email', $this->param['email'], STRING, false);
			$telefone = $this->validateParameter('telefone', $this->param['telefone'], STRING, false);
            $senha = $this->validateParameter('senha', $this->param['senha'], STRING, false);
            $is_admin = $this->validateParameter('is_admin', $this->param['is_admin'], STRING, false);
            $is_driver = $this->validateParameter('is_driver', $this->param['is_driver'], STRING, false);
            $is_active = $this->validateParameter('is_active', $this->param['is_active'], STRING, false);
            $usuario_status = $this->validateParameter('usuario_status', $this->param['usuario_status'], STRING, false);
            $created_on = $this->validateParameter('created_on', $this->param['created_on'], STRING, false);

			$aux = new Usuario;
			$aux->setId($usuario_id);
			$aux->setNome($nome);
			$aux->setEmail($email);
			$aux->setTelefone($telefone);
			$aux->setSenha($senha);
			$aux->setIsAdmin($is_admin);
			$aux->setIsDriver($is_driver);
			$aux->setIsActive($is_active);
			$aux->setStatus($usuario_status);
            $aux->setCreatedOn($created_on);

            // print_r($aux);exit;
			if(!$aux->update()) {
				$message = 'Failed to update.';
			} else {
				$message = "Updated successfully.";
			}

			$this->returnResponse(SUCCESS_RESPONSE, $message);
		}

        // deletar usuario
        public function deleteUsuario() {
			$usuario_id = $this->validateParameter('usuario_id', $this->param['usuario_id'], INTEGER);
			$aux=new Usuario;
			$aux->setId($usuario_id);

			if(!$aux->delete()) {
				$message='Failed to delete.';
			}else {
				$message="Deleted successfully.";
			}$this->returnResponse(SUCCESS_RESPONSE, $message);
		}

        // adicionar uma rota
        public function addRota(){
            $nomeRota=$this->validateParameter('rota',$this->param['rota'],STRING,false);
            $veiculo=$this->validateParameter('veiculo',$this->param['veiculo'],STRING,false);
            $motorista=$this->validateParameter('motorista',$this->param['motorista'],STRING,false);
            $datas=$this->validateParameter('datas',$this->param['datas'],STRING,false);
            $horarios=$this->validateParameter('horarios',$this->param['horarios'],STRING,false);
            $rota_status=$this->validateParameter('rota_status',$this->param['rota_status'],STRING,false);

            $aux=new Rota;
            $aux->setRota($nomeRota);
            $aux->setVeiculo($veiculo);
            $aux->setMotorista($motorista);
            $aux->setDatas($datas);
            $aux->setHorarios($horarios);
            $aux->setStatus($rota_status);
            $aux->setCreatedOn(date('Y-m-d'));
            if(!$aux->insert()){
                $message='Failed to insert.';
            }else{
                $message="Inserted successfully.";                
            }$this->returnResponse(SUCCESS_RESPONSE, $message);
        }

        // pegar detalhes da rota a partir do id
        public function getRotaDetails() {
			$rotaId = $this->validateParameter('rota_id', $this->param['rota_id'], INTEGER);

			$aux = new Rota;
			$aux->setId($rotaId);
			$rota = $aux->getRotaById();
			if(!is_array($rota)) {
				$this->returnResponse(SUCCESS_RESPONSE, ['message' => 'Route details not found.']);
			}

			$response['rota_id']=$rota['rota_id'];
			$response['rota']=$rota['rota'];
			$response['veiculo']=$rota['veiculo'];
			$response['motorista']=$rota['motorista'];
			$response['datas']=$rota['datas'];
			$response['horarios']=$rota['horarios'];
			$response['rota_status']=$rota['rota_status'];
			$response['created_on']=$rota['created_on'];
			$this->returnResponse(SUCCESS_RESPONSE, $response);
		}

          // atualizar mensagem
          public function updateRota() {
			$rotaId = $this->validateParameter('rota_id', $this->param['rota_id'], INTEGER);
			$rotaNome = $this->validateParameter('rota', $this->param['rota'], STRING, false);
			$veiculo = $this->validateParameter('veiculo', $this->param['veiculo'], STRING, false);
			$motorista = $this->validateParameter('motorista', $this->param['motorista'], INTEGER, false);
            $datas = $this->validateParameter('datas', $this->param['datas'], STRING, false);
            $horarios = $this->validateParameter('horarios', $this->param['horarios'], STRING, false);
            $rota_status = $this->validateParameter('rota_status', $this->param['rota_status'], STRING, false);

			$aux = new Rota;
			$aux->setId($rotaId);
			$aux->setRota($rotaNome);
			$aux->setVeiculo($veiculo);
			$aux->setMotorista($motorista);
			$aux->setDatas($datas);
			$aux->setHorarios($horarios);
			$aux->setStatus($rota_status);

			if(!$aux->update()) {
				$message = 'Failed to update.';
			} else {
				$message = "Updated successfully.";
			}

			$this->returnResponse(SUCCESS_RESPONSE, $message);
		}

        // deletar uma rota
        public function deleteRota() {
			$rotaId = $this->validateParameter('rota_id', $this->param['rota_id'], INTEGER);
			$rota=new Rota;
			$rota->setId($rotaId);

			if(!$rota->delete()) {
				$message='Failed to delete.';
			}else {
				$message="Deleted successfully.";
			}$this->returnResponse(SUCCESS_RESPONSE, $message);
		}

        // adicionar uma mensagem
        public function addMensagem(){
            $usuario=$this->validateParameter('usuario',$this->param['usuario'],STRING,false);
            $rota=$this->validateParameter('rota',$this->param['rota'],STRING,false);
            //$mensagem_data=$this->validateParameter('mensagem_data',$this->param['mensagem_data'],STRING,false);
            //$hora=$this->validateParameter('hora',$this->param['hora'],STRING,false);
            $descricao=$this->validateParameter('descricao',$this->param['descricao'],STRING,false);
            $mensagem_status=$this->validateParameter('mensagem_status',$this->param['mensagem_status'],STRING,false);

            $aux=new Mensagem;
            $aux->setUsuario($usuario);
            $aux->setRota($rota);
            //$aux->setData($mensagem_data);
            $aux->setData(date('Y-m-d'));
            // $aux->setHora($hora);
            $aux->setHora(date('H:i:s'));
            $aux->setDescricao($descricao);
            $aux->setStatus($mensagem_status);
            $aux->setCreatedOn(date('Y-m-d'));
            if(!$aux->insert()){
                $message='Failed to insert.';
            }else{
                $message="Inserted successfully.";                
            }$this->returnResponse(SUCCESS_RESPONSE, $message);
        }

        // pegar detalhes de uma mensagem a partir do id
        public function getMensagemDetails() {
			$mensagemId = $this->validateParameter('mensagem_id', $this->param['mensagem_id'], INTEGER);

			$aux = new Mensagem;
			$aux->setId($mensagemId);
			$mensagem = $aux->getMensagemById();
			if(!is_array($mensagem)) {
				$this->returnResponse(SUCCESS_RESPONSE, ['message' => 'Message details not found.']);
			}

			$response['mensagem_id']=$mensagem['mensagem_id'];
			$response['usuario']=$mensagem['usuario'];
			$response['rota']=$mensagem['rota'];
			$response['mensagem_data']=$mensagem['mensagem_data'];
			$response['hora']=$mensagem['hora'];
			$response['descricao']=$mensagem['descricao'];
			$response['mensagem_status']=$mensagem['mensagem_status'];
			$response['created_on']=$mensagem['created_on'];
			$this->returnResponse(SUCCESS_RESPONSE, $response);
		}

        // atualizar mensagem
        public function updateMensagem() {
			$mensagemId = $this->validateParameter('mensagem_id', $this->param['mensagem_id'], INTEGER);
			$usuario = $this->validateParameter('usuario', $this->param['usuario'], STRING, false);
			$rota = $this->validateParameter('rota', $this->param['rota'], STRING, false);
			$mensagem_data = $this->validateParameter('mensagem_data', $this->param['mensagem_data'], STRING, false);
            $hora = $this->validateParameter('hora', $this->param['hora'], STRING, false);
            $descricao = $this->validateParameter('descricao', $this->param['descricao'], STRING, false);
            $mensagem_status = $this->validateParameter('mensagem_status', $this->param['mensagem_status'], STRING, false);

			$aux = new Mensagem;
			$aux->setId($mensagemId);
			$aux->setUsuario($usuario);
			$aux->setRota($rota);
			$aux->setData($mensagem_data);
			$aux->setHora($hora);
			$aux->setDescricao($descricao);
			$aux->setStatus($mensagem_status);

			if(!$aux->update()) {
				$message = 'Failed to update.';
			} else {
				$message = "Updated successfully.";
			}

			$this->returnResponse(SUCCESS_RESPONSE, $message);
		}

        // deletar mensagem
        public function deleteMensagem() {
			$mensagemId = $this->validateParameter('mensagem_id', $this->param['mensagem_id'], INTEGER);
			$mensagem=new Mensagem;
			$mensagem->setId($mensagemId);

			if(!$mensagem->delete()) {
				$message='Failed to delete.';
			}else {
				$message="Deleted successfully.";
			}$this->returnResponse(SUCCESS_RESPONSE, $message);
		}
    }
