<?php
  /**
   * Classe de manipulação da tabela de parametros
   */
  class parametrosDB extends model
  {
    //QUERIES DE LEITURA
    public function getParametros(){
      $returner = array();
      $query = "
            SELECT par.*,
            cid.nome nomecid 
            FROM parametros par
            LEFT JOIN cidades cid ON cid.pk_cid = par.fk_cid";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

    //QUERIES DE MODIFICAÇÃO
    public function editarRegistro($pk_par, $fk_cid, $nome_fantasia, $razao_social, $cnpj, $endereco, $bairro, $cep){
        $query = "UPDATE parametros SET
                  fk_cid = :fk_cid,
                  nome_fantasia = :nome_fantasia,
                  razao_social = :razao_social,
                  cnpj = :cnpj,
                  endereco = :endereco,
                  bairro = :bairro,
                  cep = :cep
                  ";
        $query = $this->db->prepare($query);
        $query->bindValue(":fk_cid", $fk_cid);
        $query->bindValue(":nome_fantasia", $nome_fantasia);
        $query->bindValue(":razao_social", $razao_social);
        $query->bindValue(":cnpj", $cnpj);
        $query->bindValue(":endereco", $endereco);
        $query->bindValue(":bairro", $bairro);
        $query->bindValue(":cep", $cep);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
    }

  }

?>