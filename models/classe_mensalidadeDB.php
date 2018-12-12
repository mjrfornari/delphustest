<?php
  /**
   * Classe de manipulação da tabela de classe mensalidade
   */
  class classe_mensalidadeDB extends model
  {
    //QUERIES DE LEITURA
    public function getclasse_mensalidade(){
      $returner = array();
      $query = "SELECT LPAD(pk_cme,3,'0') AS cod_cme, cme.* FROM classe_mensalidade cme ORDER BY cme.descricao ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

   //QUERIES DE MODIFICAÇÃO
    public function novoRegistro($descricao, $valor_mensalidade){
      $query = "SELECT * FROM classe_mensalidade WHERE descricao = :descricao";
      $query = $this->db->prepare($query);
      $query->bindValue(":descricao", $descricao);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "ERRO";
	      echo json_encode($query);
      } else {
        $query = "INSERT INTO classe_mensalidade SET descricao = :descricao, valor_mensalidade = :valor_mensalidade";
        $query = $this->db->prepare($query);
        $query->bindValue(":descricao", $descricao);
        $query->bindValue(":valor_mensalidade", $valor_mensalidade);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function editarRegistro($pk_cme, $descricao, $valor_mensalidade){
      $query = "SELECT * FROM classe_mensalidade WHERE descricao = :descricao AND pk_cme != :pk_cme";
      $query = $this->db->prepare($query);
      $query->bindValue(":descricao", $descricao);
      $query->bindValue(":pk_cme", $pk_cme);
      $query->execute();
      if ($query->rowCount() > 0) {
          $query = "ERRO";
          echo json_encode($query);
      } else {
        $query = "UPDATE classe_mensalidade SET descricao = :descricao, valor_mensalidade = :valor_mensalidade WHERE pk_cme = :pk_cme";
        $query = $this->db->prepare($query);
        $query->bindValue(":descricao", $descricao);
        $query->bindValue(":valor_mensalidade", $valor_mensalidade);
        $query->bindValue(":pk_cme", $pk_cme);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function deletarRegistro($pk_cme){
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      try {
        $query = "DELETE FROM classe_mensalidade WHERE pk_cme = '$pk_cme'";
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