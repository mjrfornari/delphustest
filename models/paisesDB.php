<?php
  /**
   * Classe de manipulação da tabela de países
   */
  class paisesDB extends model
  {
    //QUERIES DE LEITURA
    public function getPaises(){
      $returner = array();
      $query = "SELECT LPAD(pk_pai,3,'0') AS cod_pai, pai.* FROM paises pai ORDER BY pai.nome ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

   //QUERIES DE MODIFICAÇÃO
    public function novoRegistro($nome){
      $query = "SELECT * FROM paises WHERE nome = :nome";
      $query = $this->db->prepare($query);
      $query->bindValue(":nome", $nome);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "ERRO";
	      echo json_encode($query);
      } else {
        $query = "INSERT INTO paises SET nome = :nome";
        $query = $this->db->prepare($query);
        $query->bindValue(":nome", $nome);
        $query->execute();
        $query = "SUCCESS";
				echo json_encode($query);
      }
    }

    public function editarRegistro($pk_pai, $nome){
      $query = "SELECT * FROM paises WHERE nome = :nome AND pk_pai != :pk_pai";
      $query = $this->db->prepare($query);
      $query->bindValue(":nome", $nome);
      $query->bindValue(":pk_pai", $pk_pai);
      $query->execute();
      if ($query->rowCount() > 0) {
          $query = "ERRO";
          echo json_encode($query);
      } else {
        $query = "UPDATE paises SET nome = :nome WHERE pk_pai = :pk_pai";
        $query = $this->db->prepare($query);
        $query->bindValue(":nome", $nome);
        $query->bindValue(":pk_pai", $pk_pai);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function deletarRegistro($pk_pai){
      $query = "SELECT * FROM estados WHERE fk_pai = :pk_pai";
      $query = $this->db->prepare($query);
      $query->bindValue(":pk_pai", $pk_pai);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "ERRO";
        echo json_encode($query);
      } else {
        $query = "DELETE FROM paises WHERE pk_pai = '$pk_pai'";
        $query = $this->db->query($query);
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

  }

?>
