<?php
  /**
   * Classe de manipulação da tabela de países
   */
  class categorias_associadosDB extends model
  {
    //QUERIES DE LEITURA
    public function getCategorias_associados(){
      $returner = array();
      $query = "SELECT LPAD(pk_cat,3,'0') AS cod_cat, cat.* FROM categorias_associados cat ORDER BY cat.descricao ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

   //QUERIES DE MODIFICAÇÃO
    public function novoRegistro($descricao){
      $query = "SELECT * FROM categorias_associados WHERE descricao = :descricao";
      $query = $this->db->prepare($query);
      $query->bindValue(":descricao", $descricao);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "ERRO";
	      echo json_encode($query);
      } else {
        $query = "INSERT INTO categorias_associados SET descricao = :descricao";
        $query = $this->db->prepare($query);
        $query->bindValue(":descricao", $descricao);
        $query->execute();
        $query = "SUCCESS";
		    echo json_encode($query);
      }
    }

    public function editarRegistro($pk_cat, $descricao){
      $query = "SELECT * FROM categorias_associados WHERE descricao = :descricao AND pk_cat != :pk_cat";
      $query = $this->db->prepare($query);
      $query->bindValue(":descricao", $descricao);
      $query->bindValue(":pk_cat", $pk_cat);
      $query->execute();
      if ($query->rowCount() > 0) {
          $query = "ERRO";
          echo json_encode($query);
      } else {
        $query = "UPDATE categorias_associados SET descricao = :descricao WHERE pk_cat = :pk_cat";
        $query = $this->db->prepare($query);
        $query->bindValue(":descricao", $descricao);
        $query->bindValue(":pk_cat", $pk_cat);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function deletarRegistro($pk_cat){
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      try {
        $query = "DELETE FROM categorias_associados WHERE pk_cat = '$pk_cat'";
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