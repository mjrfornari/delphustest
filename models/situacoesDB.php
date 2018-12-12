<?php
  /**
   * Classe de manipulação da tabela de situacoes
   */
  class situacoesDB extends model
  {
    //QUERIES DE LEITURA
    public function getSituacoes(){
      $returner = array();
      $query = "
            SELECT LPAD(pk_sit,3,'0') AS cod_sit, sit.* FROM situacoes sit ORDER BY sit.descricao ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

   //QUERIES DE MODIFICAÇÃO
    public function novoRegistro($descricao){
      $query = "SELECT * FROM situacoes WHERE descricao = :descricao";
      $query = $this->db->prepare($query);
      $query->bindValue(":descricao", $descricao);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "ERRO";
	      echo json_encode($query);
      } else {
        $query = "INSERT INTO situacoes SET descricao = :descricao";
        $query = $this->db->prepare($query);
        $query->bindValue(":descricao", $descricao);
        $query->execute();
        $query = "SUCCESS";
				echo json_encode($query);
      }
    }

    public function editarRegistro($pk_sit, $descricao){
      $query = "SELECT * FROM situacoes WHERE descricao = :descricao AND pk_sit != :pk_sit";
      $query = $this->db->prepare($query);
      $query->bindValue(":descricao", $descricao);
      $query->bindValue(":pk_sit", $pk_sit);
      $query->execute();
      if ($query->rowCount() > 0) {
          $query = "ERRO";
          echo json_encode($query);
      } else {
        $query = "UPDATE situacoes SET descricao = :descricao WHERE pk_sit = :pk_sit";
        $query = $this->db->prepare($query);
        $query->bindValue(":descricao", $descricao);
        $query->bindValue(":pk_sit", $pk_sit);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function deletarRegistro($pk_sit){
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      try {
        $query = "DELETE FROM situacoes WHERE pk_sit = '$pk_sit'";
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