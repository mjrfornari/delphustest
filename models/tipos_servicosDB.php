<?php
  /**
   * Classe de manipulação da tabela de países
   */
  class tipos_servicosDB extends model
  {
    //QUERIES DE LEITURA
    public function gettipos_servicos(){
      $returner = array();
      $query = "SELECT LPAD(pk_ser,3,'0') AS cod_lot, lot.* FROM tipos_servicos lot ORDER BY lot.descricao ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

    public function gettipos_servicosAtivas(){
      $returner = array();
      $query = "SELECT lot.* FROM tipos_servicos lot WHERE inativo = 'N' ORDER BY lot.descricao ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      echo json_encode($returner);
    }

   //QUERIES DE MODIFICAÇÃO
    public function novoRegistro($descricao, $valor, $inativo){
      $query = "SELECT * FROM tipos_servicos WHERE descricao = :descricao";
      $query = $this->db->prepare($query);
      $query->bindValue(":descricao", $descricao);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "ERRO";
	      echo json_encode($query);
      } else {
        $query = "INSERT INTO tipos_servicos SET descricao = :descricao, valor = :valor, inativo = :inativo";
        $query = $this->db->prepare($query);
        $query->bindValue(":descricao", $descricao);
        $query->bindValue(":valor", $valor);
        $query->bindValue(":inativo", $inativo);
        $query->execute();
        $query = "SUCCESS";
				echo json_encode($query);
      }
    }

    public function editarRegistro($pk_ser, $descricao, $valor, $inativo){
      $query = "SELECT * FROM tipos_servicos WHERE descricao = :descricao AND pk_ser != :pk_ser";
      $query = $this->db->prepare($query);
      $query->bindValue(":descricao", $descricao);
      $query->bindValue(":pk_ser", $pk_ser);
      $query->execute();
      if ($query->rowCount() > 0) {
          $query = "ERRO";
          echo json_encode($query);
      } else {
        $query = "UPDATE tipos_servicos SET descricao = :descricao, valor = :valor, inativo = :inativo WHERE pk_ser = :pk_ser";
        $query = $this->db->prepare($query);
        $query->bindValue(":descricao", $descricao);
        $query->bindValue(":valor", $valor);
        $query->bindValue(":inativo", $inativo);
        $query->bindValue(":pk_ser", $pk_ser);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function deletarRegistro($pk_ser){
      try {
        $query = "DELETE FROM tipos_servicos WHERE pk_ser = '$pk_ser'";
        $query = $this->db->query($query);
      } catch (PDOException $e) {
        if ($e->getCode()) {
          echo json_encode($e->getMessage());
        } else {
          $query = "Erro desconhecido";
          echo json_encode($query);
        }
      } finally {
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

  }

?>