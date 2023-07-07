<?php
    class Usuario{
        private $usuario_id;
        private $nome;
        private $email;
        private $telefone;
        private $senha;
        private $isAdmin;
        private $isDriver;
        private $isActive;
        private $usuario_status;
        private $createdOn;
        private $cidade;
        private $rotas;
        private $imagem;
        private $tableName='tab_usuarios';
        private $dbConn;

        function setId($usuario_id){$this->usuario_id=$usuario_id;}
        function getId(){return $this->usuario_id;}
        function setNome($nome){$this->nome=$nome;}
        function getNome(){return $this->nome;}
        function setEmail($email){$this->email=$email;}
        function getEmail(){return $this->email;}
        function setTelefone($telefone){$this->telefone=$telefone;}
        function getTelefone(){return $this->telefone;}
        function setSenha($senha){$this->senha=$senha;}
        function getSenha(){return $this->senha;}
        function setIsAdmin($isAdmin){$this->isAdmin=$isAdmin;}
        function getIsAdmin(){return $this->isAdmin;}
        function setIsDriver($isDriver){$this->isDriver=$isDriver;}
        function getIsDriver(){return $this->isDriver;}
        function setIsActive($isActive){$this->isActive=$isActive;}
        function getIsActive(){return $this->isActive;}
        function setStatus($usuario_status){$this->usuario_status=$usuario_status;}
        function getStatus(){return $this->usuario_status;}
        function setCreatedOn($createdOn){$this->createdOn=$createdOn;}
        function getCreatedOn(){return $this->createdOn;}
        function setCidade($cidade){$this->cidade=$cidade;}
        function getCidade(){return $this->cidade;}
        function setRotas($rotas){$this->rotas=$rotas;}
        function getRotas(){return $this->rotas;}
        function setImagem($imagem){$this->imagem=$imagem;}
        function getImagem(){return $this->imagem;}
        function setTableName($tableName){$this->tableName=$tableName;}
        function getTableName(){return $this->tableName;}
        function setDbConn($dbConn){$this->dbConn=$dbConn;}
        function getDbConn(){return $this->dbConn;}

        public function __construct(){
            $db=new DbConnect;
            $this->dbConn=$db->connect();
        }

        // listar todos os usuarios
        public function getAllUsuarios(){
            $stmt=$this->dbConn->prepare('SELECT * FROM '.$this->tableName.' WHERE usuario_status = :usuario_status');
            $stmt->bindParam(':usuario_status',$this->usuario_status);
            $stmt->execute();
            $usuarios=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        }

        // listar um usuario
        public function getUsuarioById(){
            $stmt=$this->dbConn->prepare('SELECT * FROM '.$this->tableName.' WHERE usuario_id = :usuario_id');
            $stmt->bindParam(':usuario_id',$this->usuario_id);
            // print_r($stmt);exit;
            $stmt->execute();
            $usuario=$stmt->fetch(PDO::FETCH_ASSOC);
            // $usuario=fetch_assoc($stmt);
            return $usuario;
        }

        // inserir no banco
        public function insert(){
            $sql='INSERT INTO '.$this->tableName.' (usuario_id, nome, email, telefone, senha, is_admin, is_driver, is_active, usuario_status, created_on, cidade, rotas, imagem) VALUES(null, :nome, :email, :telefone, :senha, :is_admin, :is_driver, :is_active, :usuario_status, :created_on, :cidade, :rotas, :imagem) ';
            $stmt=$this->dbConn->prepare($sql);
            $stmt->bindParam(':nome',$this->nome);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':telefone',$this->telefone);
            $stmt->bindParam(':senha',$this->senha);
            $stmt->bindParam(':is_admin',$this->isAdmin);
            $stmt->bindParam(':is_driver',$this->isDriver);
            $stmt->bindParam(':is_active',$this->isActive);
            $stmt->bindParam(':usuario_status',$this->usuario_status);
            $stmt->bindParam(':created_on',$this->createdOn);
            $stmt->bindParam(':cidade',$this->cidade);
            $stmt->bindParam(':rotas',$this->rotas);
            $stmt->bindParam(':imagem',$this->imagem);

            if($stmt->execute()){
                return true;
            }else {
                return false;
            }
        }

        // atualizar no banco
        public function update(){
            // getId();
            $sql="UPDATE ".$this->tableName." SET ";
            // precisa necessariamente de usuario_id
            // caso nao informar, nao deixar em branco
            if(null!=$this->getNome()){
                $sql.= " nome = '".$this->getNome()."',";
            }
            if(null!=$this->getEmail()){
                $sql.= " email = '".$this->getEmail()."',";
            }
            if(null!=$this->getTelefone()){
                $sql.= " telefone = '".$this->getTelefone()."',";
            }
            if(null!=$this->getSenha()){
                $sql.= " senha = '".$this->getSenha()."',";
            }
            if(null!=$this->getIsAdmin()){
                $sql.= " is_admin = '".$this->getIsAdmin()."',";
            }
            if(null!=$this->getIsDriver()){
                $sql.= " is_driver = '".$this->getIsDriver()."',";
            }
            if(null!=$this->getIsActive()){
                $sql.= " is_active = '".$this->getIsActive()."',";
            }
            if(null!=$this->getCidade()){
                $sql.= " cidade = '".$this->getCidade()."',";
            }
            if(null!=$this->getRotas()){
                $sql.= " rotas = '".$this->getRotas()."',";
            }
            if(null!=$this->getImagem()){
                $sql.= " imagem = '".$this->getImagem()."',";
            }
            if(null!=$this->getStatus()){
                $sql.= " usuario_status = '".$this->getStatus()."'"; // retirar virgula
            }
            if(null!=$this->getCreatedOn()){
                $sql.= " created_on = '".$this->getCreatedOn()."'"; // retirar virgula
            }
            $sql.=" WHERE usuario_id = :usuario_id; ";

            $stmt=$this->dbConn->prepare($sql);
            $stmt->bindParam(':usuario_id',$this->usuario_id);
            
            // print_r($stmt);exit;
            if($stmt->execute()){
                return true;
            }else {
                return false;
            }
        }
        
        // deletar no banco
        public function delete(){
            $stmt= $this->dbConn->prepare('DELETE FROM '.$this->getTableName().' WHERE usuario_id = :usuario_id');
            $stmt->bindParam(':usuario_id',$this->usuario_id);

            if($stmt->execute()){
                return true;
            }else {
                return false;
            }
        }
    }
?>