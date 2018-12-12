<?php
  /**
   * Classe de manipulação da tabela de estados
   */
  class estadosDB extends model
  {
    //QUERIES DE LEITURA
    public function getEstados(){
      $returner = array();
      $query = "
            SELECT LPAD(pk_est,3,'0') AS cod_est, est.*, pai.nome nomepais
            FROM estados est
            JOIN paises pai ON pai.pk_pai = est.fk_pai
            ORDER BY est.nome ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

   //QUERIES DE MODIFICAÇÃO
    public function novoRegistro($fk_pai, $sigla, $nome){
      $query = "SELECT * FROM estados WHERE sigla = :sigla";
      $query = $this->db->prepare($query);
      $query->bindValue(":sigla", $sigla);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "ERRO";
	      echo json_encode($query);
      } else {
        $query = "INSERT INTO estados SET sigla = :sigla, nome = :nome, fk_pai = :fk_pai";
        $query = $this->db->prepare($query);
        $query->bindValue(":sigla", $sigla);
        $query->bindValue(":nome", $nome);
        $query->bindValue(":fk_pai", $fk_pai);
        $query->execute();
        $query = "SUCCESS";
				echo json_encode($query);
      }
    }

    public function editarRegistro($pk_est, $fk_pai, $sigla, $nome){
      $query = "SELECT * FROM estados WHERE sigla = :sigla AND pk_est != :pk_est";
      $query = $this->db->prepare($query);
      $query->bindValue(":sigla", $sigla);
      $query->bindValue(":pk_est", $pk_est);
      $query->execute();
      if ($query->rowCount() > 0) {
          $query = "ERRO";
          echo json_encode($query);
      } else {
        $query = "UPDATE estados SET sigla = :sigla, nome = :nome, fk_pai = :fk_pai WHERE pk_est = :pk_est";
        $query = $this->db->prepare($query);
        $query->bindValue(":nome", $nome);
        $query->bindValue(":sigla", $sigla);
        $query->bindValue(":fk_pai", $fk_pai);
        $query->bindValue(":pk_est", $pk_est);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function deletarRegistro($pk_est){
      $query = "SELECT * FROM cidades WHERE fk_est = :pk_est";
      $query = $this->db->prepare($query);
      $query->bindValue(":pk_est", $pk_est);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "ERRO";
        echo json_encode($query);
      } else {
        $query = "DELETE FROM estados WHERE pk_est = '$pk_est'";
        $query = $this->db->query($query);
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

  }

?>
