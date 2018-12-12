<?php
  /**
   * Classe de manipulação da tabela de Contas a Receber
   **/
  class contas_receberDB extends model
  {
    //QUERIES DE LEITURA
    public function getContas_receber(){
      $returner = array();
      $query = "
            SELECT ctr.*,
            ass.nome nomeass,
            tser.descricao nomeser, 
            (ctr.valor - ctr.valor_recebido) valor_pendente  
            FROM contas_receber ctr
            LEFT JOIN associados ass ON ass.pk_ass = ctr.fk_ass
            LEFT JOIN tipos_servicos tser ON tser.pk_ser = ctr.fk_ser 
            ORDER BY ctr.pk_ctr ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

    public function getcontas_receberporId($pk_ctr){
      $returner = array();
      $query = "
            SELECT ass.*,
            sit.descricao nomesit,
            bco.nome nomebco,
            lot.descricao nomelot
            FROM contas_receber ass
            LEFT JOIN situacoes sit ON sit.pk_sit = ass.fk_sit
            LEFT JOIN bancos bco ON bco.pk_bco = ass.fk_bco
            LEFT JOIN lotacoes lot ON lot.pk_lot = ass.fk_lot
            WHERE pk_ctr = '$pk_ctr'
            ORDER BY ass.nome ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

   //QUERIES DE MODIFICAÇÃO
   public function inserirRegistro($fk_associado, $competencia, $tipo_serv_novo, $data_emissao_novo, $data_vencimento_novo, $valor_novo, $observacao_novo){
      $query = "INSERT INTO contas_receber SET
                fk_ass = :fk_associado,
                fk_ser = :tipo_serv_novo,
                competencia = :competencia,
                data_emis = :data_emissao_novo,
                data_venc = :data_vencimento_novo,
                data_geracao = NOW(), 
                valor = :valor_novo,
                observacao = :observacao_novo
              ";
      $query = $this->db->prepare($query);
      $query->bindValue(":fk_associado", $fk_associado);
      $query->bindValue(":tipo_serv_novo", $tipo_serv_novo);
      $query->bindValue(":competencia", $competencia);
      $query->bindValue(":data_emissao_novo", $data_emissao_novo);
      $query->bindValue(":data_vencimento_novo", $data_vencimento_novo);
      $query->bindValue(":valor_novo", $valor_novo);
      $query->bindValue(":observacao_novo", $observacao_novo);
      
      $query->execute();
      $query = "SUCCESS";
      echo json_encode($query);
  }

    public function editarRegistro($pk_ctr, $fk_associado_editar, $competencia, $tipo_serv_editar, $data_emissao_editar, $data_vencimento_editar, $valor_editar, $observacao_editar){
      $query = "SELECT * FROM contas_receber WHERE pk_ctr != :pk_ctr";
      $query = $this->db->prepare($query);
      $query->bindValue(":pk_ctr", $pk_ctr);
      $query->execute();
      if ($query->rowCount() > 0) {
          $query = "ERROR";
          echo json_encode($query);
      } else {
        $query = "UPDATE contas_receber SET
                  fk_ass = :fk_associado_editar,
                  fk_ser = :tipo_serv_editar,
                  competencia = :competencia,
                  data_emis = :data_emissao_editar,
                  data_venc = :data_vencimento_editar, 
                  valor = :valor_editar,
                  observacao = :observacao_editar
                  WHERE pk_ctr = :pk_ctr
                  ";
        $query = $this->db->prepare($query);
        $query->bindValue(":pk_ctr", $pk_ctr);
        $query->bindValue(":fk_associado_editar", $fk_associado_editar);
        $query->bindValue(":tipo_serv_editar", $tipo_serv_editar);
        $query->bindValue(":competencia", $competencia);
        $query->bindValue(":data_emissao_editar", $data_emissao_editar);
        $query->bindValue(":data_vencimento_editar", $data_vencimento_editar);
        $query->bindValue(":valor_editar", $valor_editar);
        $query->bindValue(":observacao_editar", $observacao_editar);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function delAssociado($pk_ctr){
      try {
        $query = "DELETE FROM contas_receber WHERE pk_ctr = '$pk_ctr'";
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

    public function popularValor($tipo_serv_novo){
      $returner = array();
      $query = "SELECT valor FROM tipos_servicos WHERE pk_ser = '$tipo_serv_novo'";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      echo json_encode($returner);
    }

  }

?>