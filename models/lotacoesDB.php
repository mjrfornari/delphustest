<?php
  /**
   * Classe de manipulação da tabela de países
   */
  class lotacoesDB extends model
  {
    //QUERIES DE LEITURA
    public function getLotacoes(){
      $returner = array();
      $query = "SELECT LPAD(pk_lot,3,'0') AS cod_lot, lot.* FROM lotacoes lot ORDER BY lot.descricao ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

    public function getLotacoesAtivas(){
      $returner = array();
      $query = "SELECT lot.* FROM lotacoes lot WHERE inativo = 'N' ORDER BY lot.descricao ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      echo json_encode($returner);
    }

   //QUERIES DE MODIFICAÇÃO
    public function novoRegistro($descricao, $inativo){
      $query = "SELECT * FROM lotacoes WHERE descricao = :descricao";
      $query = $this->db->prepare($query);
      $query->bindValue(":descricao", $descricao);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "ERRO";
	      echo json_encode($query);
      } else {
        $query = "INSERT INTO lotacoes SET descricao = :descricao, inativo = :inativo";
        $query = $this->db->prepare($query);
        $query->bindValue(":descricao", $descricao);
        $query->bindValue(":inativo", $inativo);
        $query->execute();
        $query = "SUCCESS";
				echo json_encode($query);
      }
    }

    public function editarRegistro($pk_lot, $descricao, $inativo){
      $query = "SELECT * FROM lotacoes WHERE descricao = :descricao AND pk_lot != :pk_lot";
      $query = $this->db->prepare($query);
      $query->bindValue(":descricao", $descricao);
      $query->bindValue(":pk_lot", $pk_lot);
      $query->execute();
      if ($query->rowCount() > 0) {
          $query = "ERRO";
          echo json_encode($query);
      } else {
        $query = "UPDATE lotacoes SET descricao = :descricao, inativo = :inativo WHERE pk_lot = :pk_lot";
        $query = $this->db->prepare($query);
        $query->bindValue(":descricao", $descricao);
        $query->bindValue(":inativo", $inativo);
        $query->bindValue(":pk_lot", $pk_lot);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function deletarRegistro($pk_lot){
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      try {
        $query = "DELETE FROM lotacoes WHERE pk_lot = '$pk_lot'";
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