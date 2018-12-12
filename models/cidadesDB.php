<?php
  /**
   * Classe de manipulação da tabela de Cidades
   */
  class cidadesDB extends model
  {
    //QUERIES DE LEITURA
    public function getCidades(){
      $returner = array();
      $query = "
            SELECT LPAD(pk_cid,3,'0') AS cod_cid, cid.*, est.sigla nomeest
            FROM cidades cid
            JOIN estados est ON est.pk_est = cid.fk_est
            ORDER BY cid.nome ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

   //QUERIES DE MODIFICAÇÃO
    public function novoRegistro($fk_est, $nome){
      $query = "SELECT * FROM cidades WHERE nome = :nome";
      $query = $this->db->prepare($query);
      $query->bindValue(":nome", $nome);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "ERRO";
	      echo json_encode($query);
      } else {
        $query = "INSERT INTO cidades SET nome = :nome, fk_est = :fk_est";
        $query = $this->db->prepare($query);
        $query->bindValue(":nome", $nome);
        $query->bindValue(":fk_est", $fk_est);
        $query->execute();
        $query = "SUCCESS";
				echo json_encode($query);
      }
    }

    public function editarRegistro($pk_cid, $fk_est, $nome){
      $query = "SELECT * FROM cidades WHERE nome = :nome AND pk_cid != :pk_cid";
      $query = $this->db->prepare($query);
      $query->bindValue(":nome", $nome);
      $query->bindValue(":pk_cid", $pk_cid);
      $query->execute();
      if ($query->rowCount() > 0) {
          $query = "ERRO";
          echo json_encode($query);
      } else {
        $query = "UPDATE cidades SET nome = :nome, fk_est = :fk_est WHERE pk_cid = :pk_cid";
        $query = $this->db->prepare($query);
        $query->bindValue(":nome", $nome);
        $query->bindValue(":fk_est", $fk_est);
        $query->bindValue(":pk_cid", $pk_cid);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function deletarRegistro($pk_cid){
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      try {
        $query = "DELETE FROM cidades WHERE pk_cid = '$pk_cid'";
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
