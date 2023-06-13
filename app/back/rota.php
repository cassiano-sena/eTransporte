<?php
    class Rota{
        private $rota_id;
        private $rota;
        private $veiculo;
        private $motorista;
        private $datas;
        private $horarios;
        private $rota_status;
        private $createdOn;
        private $tableName='tab_rotas';
        private $dbConn;

        function setId($rota_id){$this->rota_id=$rota_id;}
        function getId(){return $this->rota_id;}
        function setRota($rota){$this->rota=$rota;}
        function getRota(){return $this->rota;}
        function setVeiculo($veiculo){$this->veiculo=$veiculo;}
        function getVeiculo(){return $this->veiculo;}
        function setMotorista($motorista){$this->motorista=$motorista;}
        function getMotorista(){return $this->motorista;}
        function setDatas($datas){$this->datas=$datas;}
        function getDatas(){return $this->datas;}
        function setHorarios($horarios){$this->horarios=$horarios;}
        function getHorarios(){return $this->horarios;}
        function setStatus($rota_status){$this->rota_status=$rota_status;}
        function getStatus(){return $this->rota_status;}
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

        // listar todas as rotas
        public function getAllRotas(){
            $stmt=$this->dbConn->prepare("SELECT * FROM ".$this->tableName);
            $stmt->execute();
            $rotas=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rotas;
        }

        // listar uma rota
        public function getRotaById(){
            $stmt=$this->dbConn->prepare('SELECT * FROM '.$this->tableName.' WHERE rota_id = :rota_id');
            $stmt->bindParam(':rota_id',$this->rota_id);
            $stmt->execute();
            $rota=$stmt->fetch(PDO::FETCH_ASSOC);
            return $rota;
        }

        // inserir no banco
        public function insert(){
            $sql='INSERT INTO '.$this->tableName.'(rota_id, rota, veiculo, motorista, datas, horarios, rota_status, created_on) VALUES(null, :rota, :veiculo, :motorista, :datas, :horarios, :rota_status, :created_on)';
            $stmt=$this->dbConn->prepare($sql);
            $stmt->bindParam(':rota',$this->rota);
            $stmt->bindParam(':veiculo',$this->veiculo);
            $stmt->bindParam(':motorista',$this->motorista);
            $stmt->bindParam(':datas',$this->datas);
            $stmt->bindParam(':horarios',$this->horarios);
            $stmt->bindParam(':rota_status',$this->rota_status);
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
            if(null!=$this->getRota()){
                $sql.= " rota = '".$this->getRota()."',";
            }
            if(null!=$this->getVeiculo()){
                $sql.= " veiculo = '".$this->getVeiculo()."',";
            }
            if(null!=$this->getMotorista()){
                $sql.= " motorista = '".$this->getMotorista()."',";
            }
            if(null!=$this->getDatas()){
                $sql.= " datas = '".$this->getDatas()."',";
            }
            if(null!=$this->getHorarios()){
                $sql.= " horarios = '".$this->getHorarios()."',";
            }
            if(null!=$this->getStatus()){
                $sql.= " rota_status = '".$this->getStatus()."' ";// retirar virgula
            }
            if(null!=$this->getCreatedOn()){
                $sql.= " created_on = '".$this->getCreatedOn()."' ";// retirar virgula
            }
            $sql.=" WHERE rota_id = :rota_id";

            $stmt=$this->dbConn->prepare($sql);
            $stmt->bindParam(':rota_id',$this->rota_id);

            if($stmt->execute()){
                return true;
            }else {
                return false;
            }
        }
        
        // deletar no banco
        public function delete(){
            $stmt= $this->dbConn->prepare('DELETE FROM '.$this->getTableName().' WHERE rota_id = :rota_id');
            $stmt->bindParam(':rota_id',$this->rota_id);
            
            if($stmt->execute()){
                return true;
            }else {
                return false;
            }
        }
    }
?>