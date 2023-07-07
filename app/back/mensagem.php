<?php
    class Mensagem{
        private $mensagem_id;
        private $usuario;
        private $veiculo;
        private $rota;
        private $mensagem_data;
        private $hora;
        private $descricao;
        private $mensagem_status;
        private $createdOn;
        private $tableName='tab_mensagens';
        private $dbConn;

        function setId($mensagem_id){$this->mensagem_id=$mensagem_id;}
        function getId(){return $this->mensagem_id;}
        function setUsuario($usuario){$this->usuario=$usuario;}
        function getUsuario(){return $this->usuario;}
        function setVeiculo($veiculo){$this->veiculo=$veiculo;}
        function getVeiculo(){return $this->veiculo;}
        function setRota($rota){$this->rota=$rota;}
        function getRota(){return $this->rota;}
        function setData($mensagem_data){$this->mensagem_data=$mensagem_data;}
        function getData(){return $this->mensagem_data;}
        function setDescricao($descricao){$this->descricao=$descricao;}
        function getDescricao(){return $this->descricao;}
        function setHora($hora){$this->hora=$hora;}
        function getHora(){return $this->hora;}
        function setStatus($mensagem_status){$this->mensagem_status=$mensagem_status;}
        function getStatus(){return $this->mensagem_status;}
        function setCreatedOn($createdOn){$this->createdOn=$createdOn;}
        function getCreatedOn(){return $this->createdOn;}
        function setTableName($tableName){$this->tableName=$tableName;}
        function getTableName(){return $this->tableName;}
        function setDbConn($dbConn){$this->dbConn=$dbConn;}
        function getDbConn(){return $this->dbConn;}

        public function __construct(){
            $db=new DbConnect;
            $this->dbConn=$db->connect();
        }

        // listar todas as mensagens
        public function getAllMensagens(){
            $stmt=$this->dbConn->prepare('SELECT * FROM '.$this->tableName.' WHERE mensagem_status = :mensagem_status');
            $stmt->bindParam(':mensagem_status',$this->mensagem_status);
            $stmt->execute();
            $mensagens=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $mensagens;
        }

        // listar uma mensagem
        public function getMensagemById(){
            $stmt=$this->dbConn->prepare('SELECT * FROM '.$this->tableName.' WHERE mensagem_id = :mensagem_id');
            $stmt->bindParam(':mensagem_id',$this->mensagem_id);
            $stmt->execute();
            $mensagem=$stmt->fetch(PDO::FETCH_ASSOC);
            return $mensagem;
        }

        // inserir no banco
        public function insert(){
            $sql='INSERT INTO '.$this->tableName.'(mensagem_id, usuario, rota, mensagem_data, hora, descricao, mensagem_status, created_on) VALUES(null, :usuario, :rota, :mensagem_data, :hora, :descricao, :mensagem_status, :created_on)';
            $stmt=$this->dbConn->prepare($sql);
            $stmt->bindParam(':usuario',$this->usuario);
            $stmt->bindParam(':rota',$this->rota);
            $stmt->bindParam(':mensagem_data',$this->mensagem_data);
            $stmt->bindParam(':hora',$this->hora);
            $stmt->bindParam(':descricao',$this->descricao);
            $stmt->bindParam(':mensagem_status',$this->mensagem_status);
            $stmt->bindParam(':created_on',$this->createdOn);

            if($stmt->execute()){
                return true;
            }else {
                return false;
            }
        }

        // atualizar no banco
        public function update(){
            $sql="UPDATE $this->tableName SET";
            // caso nao informar, nao deixar em branco
            if(null!=$this->getUsuario()){
                $sql.= " usuario = '".$this->getUsuario()."',";
            }
            if(null!=$this->getRota()){
                $sql.= " rota = '".$this->getRota()."',";
            }
            if(null!=$this->getData()){
                $sql.= " mensagem_data = '".$this->getData()."',";
            }
            if(null!=$this->getHora()){
                $sql.= " hora = '".$this->getHora()."',";
            }
            if(null!=$this->getDescricao()){
                $sql.= " descricao = '".$this->getDescricao()."',";
            }
            if(null!=$this->getStatus()){
                $sql.= " mensagem_status = '".$this->getStatus()."' ";// retirar virgula
            }
            if(null!=$this->getCreatedOn()){
                $sql.= " created_on = '".$this->getCreatedOn()."' ";// retirar virgula
            }
            $sql.=" WHERE mensagem_id = :mensagem_id";

            $stmt=$this->dbConn->prepare($sql);
            $stmt->bindParam(':mensagem_id',$this->mensagem_id);

            if($stmt->execute()){
                return true;
            }else {
                return false;
            }
        }
        
        // deletar no banco
        public function delete(){
            $stmt= $this->dbConn->prepare('DELETE FROM '.$this->getTableName().' WHERE mensagem_id = :mensagem_id');
            $stmt->bindParam(':mensagem_id',$this->mensagem_id);
            
            if($stmt->execute()){
                return true;
            }else {
                return false;
            }
        }
    }
?>