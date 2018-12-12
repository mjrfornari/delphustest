<?php
  /**
   * Classe de manipulação da tabela de países
   */
  class tipo_dependentesDB extends model
  {
    //QUERIES DE LEITURA
    public function getTipo_dependentes(){
      $returner = array();
      $query = "SELECT LPAD(pk_tde,3,'0') AS cod_tde, tde.* FROM tipo_dependentes tde ORDER BY tde.descricao ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

   //QUERIES DE MODIFICAÇÃO
    public function novoRegistro($descricao){
      $query = "SELECT * FROM tipo_dependentes WHERE descricao = :descricao";
      $query = $this->db->prepare($query);
      $query->bindValue(":descricao", $descricao);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "ERRO";
	      echo json_encode($query);
      } else {
        $query = "INSERT INTO tipo_dependentes SET descricao = :descricao";
        $query = $this->db->prepare($query);
        $query->bindValue(":descricao", $descricao);
        $query->execute();
        $query = "SUCCESS";
				echo json_encode($query);
      }
    }

    public function editarRegistro($pk_tde, $descricao){
      $query = "SELECT * FROM tipo_dependentes WHERE descricao = :descricao AND pk_tde != :pk_tde";
      $query = $this->db->prepare($query);
      $query->bindValue(":descricao", $descricao);
      $query->bindValue(":pk_tde", $pk_tde);
      $query->execute();
      if ($query->rowCount() > 0) {
          $query = "ERRO";
          echo json_encode($query);
      } else {
        $query = "UPDATE tipo_dependentes SET descricao = :descricao WHERE pk_tde = :pk_tde";
        $query = $this->db->prepare($query);
        $query->bindValue(":descricao", $descricao);
        $query->bindValue(":pk_tde", $pk_tde);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function deletarRegistro($pk_tde){
      $query = "SELECT * FROM dependentes WHERE fk_tde = :pk_tde";
      $query = $this->db->prepare($query);
      $query->bindValue(":pk_tde", $pk_tde);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "ERRO";
        echo json_encode($query);
      } else {
        $query = "DELETE FROM tipo_dependentes WHERE pk_tde = '$pk_tde'";
        $query = $this->db->query($query);
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

  }

?>
