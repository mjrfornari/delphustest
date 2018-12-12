<?php
  /**
   * Classe de manipulação da tabela de bancos
   */
  class bancosDB extends model
  {
    //QUERIES DE LEITURA
    public function getBancos(){
      $returner = array();
      $query = "SELECT LPAD(pk_bco,3,'0') AS cod_bco, bco.* FROM bancos bco ORDER BY bco.nome ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

   //QUERIES DE MODIFICAÇÃO
    public function novoRegistro($nome){
      $query = "SELECT * FROM bancos WHERE nome = :nome";
      $query = $this->db->prepare($query);
      $query->bindValue(":nome", $nome);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "ERRO";
	      echo json_encode($query);
      } else {
        $query = "INSERT INTO bancos SET nome = :nome";
        $query = $this->db->prepare($query);
        $query->bindValue(":nome", $nome);
        $query->execute();
        $query = "SUCCESS";
				echo json_encode($query);
      }
    }

    public function editarRegistro($pk_bco, $nome){
      $query = "SELECT * FROM bancos WHERE nome = :nome AND pk_bco != :pk_bco";
      $query = $this->db->prepare($query);
      $query->bindValue(":nome", $nome);
      $query->bindValue(":pk_bco", $pk_bco);
      $query->execute();
      if ($query->rowCount() > 0) {
          $query = "ERRO";
          echo json_encode($query);
      } else {
        $query = "UPDATE bancos SET nome = :nome WHERE pk_bco = :pk_bco";
        $query = $this->db->prepare($query);
        $query->bindValue(":nome", $nome);
        $query->bindValue(":pk_bco", $pk_bco);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function deletarRegistro($pk_bco){
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      try {
        $query = "DELETE FROM bancos WHERE pk_bco = '$pk_bco'";
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