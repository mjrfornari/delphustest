<?php
  /**
   * Classe de manipulação da tabela de Associados
   */
  class associadosDB extends model
  {
    //QUERIES DE LEITURA
    public function getAssociados(){
      $returner = array();
      $query = "
            SELECT LPAD(pk_ass,3,'0') AS cod_ass, ass.*,
            sit.descricao nomesit,
            bco.nome nomebco,
            lot.descricao nomelot
            FROM associados ass
            LEFT JOIN situacoes sit ON sit.pk_sit = ass.fk_sit
            LEFT JOIN bancos bco ON bco.pk_bco = ass.fk_bco
            LEFT JOIN lotacoes lot ON lot.pk_lot = ass.fk_lot
            ORDER BY ass.nome ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

    public function getAssociadosJSON(){
      $returner = array();
      $query = "SELECT pk_ass, nome FROM associados";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      $nome_selecionado = array();
      foreach ($returner as $nome) {
        $object = (object) [
          'label' =>  $nome['nome'],
          'value' => $nome['nome'],
          'pk' => $nome['pk_ass']  
        ];
        array_push($nome_selecionado, $object);
      }
      // echo $_GET['callback'] . '(' . json_encode($returner) . ')';
      echo json_encode($nome_selecionado);
    }

    public function getDependentes($fk_ass){
      $returner = array();
      $query = "
            SELECT dep.*,
            ass.nome nomeass
            FROM dependentes dep
            LEFT JOIN associados ass ON ass.pk_ass = dep.fk_ass
            WHERE fk_ass = '$fk_ass'
            ORDER BY dep.nome ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

    public function getAssociadosporId($pk_ass){
      $returner = array();
      $query = "
            SELECT ass.*,
            sit.descricao nomesit,
            bco.nome nomebco,
            lot.descricao nomelot
            FROM associados ass
            LEFT JOIN situacoes sit ON sit.pk_sit = ass.fk_sit
            LEFT JOIN bancos bco ON bco.pk_bco = ass.fk_bco
            LEFT JOIN lotacoes lot ON lot.pk_lot = ass.fk_lot
            WHERE pk_ass = '$pk_ass'
            ORDER BY ass.nome ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

   //QUERIES DE MODIFICAÇÃO
   public function inserirRegistro($fk_sit, $fk_bco, $fk_lot, $fk_cat, $fk_cid_resid, $fk_cid_comerc, $matricula, $nome, $rg, $data_rg, $orgao_expedidor, $cpf, $nome_pai, $nome_mae, $sexo, $estado_civil, $data_nasc, $agencia, $conta, $observacoes, $nro_oab, $endereco_resid, $bairro_resid, $cep_resid, $telefone_resid, $email_resid, $logradouro_comerc, $bairro_comerc, $cep_comerc, $email_comerc, $telefone_comerc, $cobranca_mensalidade, $anape, $unimed_hospitalar, $unimed_ambulatorial, $unimed_global, $unimed_sos, $unimed_odonto, $cobranca_unimed, $telefonia_vivo, $telefonia_claro, $cobranca_telefonia, $cobranca_servicos){
    $query = "SELECT * FROM associados WHERE rg = :rg OR cpf = :cpf";
    $query = $this->db->prepare($query);
    $query->bindValue(":rg", $rg);
    $query->bindValue(":cpf", $cpf);
    $query->execute();
    if ($query->rowCount() > 0) {
      $query = "ERROR";
      echo json_encode($query);
    } else {
      $query = "INSERT INTO associados SET
                fk_sit = :fk_sit,
                fk_bco = :fk_bco,
                fk_lot = :fk_lot,
                fk_cat = :fk_cat,
                fk_cid_resid = :fk_cid_resid,
                fk_cid_comerc = :fk_cid_comerc,
                nome = :nome,
                matricula = :matricula,
                data_nasc = :data_nasc,
                rg = :rg,
                data_rg = :data_rg,
                orgao_expedidor = :orgao_expedidor,
                cpf = :cpf,
                estado_civil = :estado_civil,
                nome_pai = :nome_pai,
                nome_mae = :nome_mae,
                sexo = :sexo,
                agencia = :agencia,
                conta = :conta,
                observacoes = :observacoes,
                nro_oab = :nro_oab,
                endereco_resid = :endereco_resid,
                bairro_resid = :bairro_resid,
                cep_resid = :cep_resid,
                telefone_resid = :telefone_resid,
                email_resid = :email_resid,
                logradouro_comerc = :logradouro_comerc,
                bairro_comerc = :bairro_comerc,
                cep_comerc = :cep_comerc,
                telefone_comerc = :telefone_comerc,
                email_comerc = :email_comerc, 
                cobranca_mensalidade = :cobranca_mensalidade, 
                anape = :anape, 
                unimed_hospitalar = :unimed_hospitalar, 
                unimed_ambulatorial = :unimed_ambulatorial, 
                unimed_global = :unimed_global, 
                unimed_sos = :unimed_sos, 
                unimed_odonto = :unimed_odonto, 
                cobranca_unimed = :cobranca_unimed, 
                telefonia_vivo = :telefonia_vivo, 
                telefonia_claro = :telefonia_claro, 
                cobranca_telefonia = :cobranca_telefonia, 
                cobranca_servicos = :cobranca_servicos
              ";
      $query = $this->db->prepare($query);
      $query->bindValue(":fk_sit", $fk_sit);
      $query->bindValue(":fk_bco", $fk_bco);
      $query->bindValue(":fk_lot", $fk_lot);
      $query->bindValue(":fk_cat", $fk_cat);
      $query->bindValue(":fk_cid_resid", $fk_cid_resid);
      $query->bindValue(":fk_cid_comerc", $fk_cid_comerc);
      $query->bindValue(":nome", $nome);
      $query->bindValue(":matricula", $matricula);
      $query->bindValue(":data_nasc", $data_nasc);
      $query->bindValue(":rg", $rg);
      $query->bindValue(":data_rg", $data_rg);
      $query->bindValue(":orgao_expedidor", $orgao_expedidor);
      $query->bindValue(":cpf", $cpf);
      $query->bindValue(":estado_civil", $estado_civil);
      $query->bindValue(":nome_pai", $nome_pai);
      $query->bindValue(":nome_mae", $nome_mae);
      $query->bindValue(":sexo", $sexo);
      $query->bindValue(":agencia", $agencia);
      $query->bindValue(":conta", $conta);
      $query->bindValue(":observacoes", $observacoes);
      $query->bindValue(":nro_oab", $nro_oab);
      $query->bindValue(":endereco_resid", $endereco_resid);
      $query->bindValue(":bairro_resid", $bairro_resid);
      $query->bindValue(":cep_resid", $cep_resid);
      $query->bindValue(":telefone_resid", $telefone_resid);
      $query->bindValue(":email_resid", $email_resid);
      $query->bindValue(":logradouro_comerc", $logradouro_comerc);
      $query->bindValue(":bairro_comerc", $bairro_comerc);
      $query->bindValue(":cep_comerc", $cep_comerc);
      $query->bindValue(":telefone_comerc", $telefone_comerc);
      $query->bindValue(":email_comerc", $email_comerc);
      $query->bindValue(":cobranca_mensalidade", $cobranca_mensalidade);
      $query->bindValue(":anape", $anape);
      $query->bindValue(":unimed_hospitalar", $unimed_hospitalar);
      $query->bindValue(":unimed_ambulatorial", $unimed_ambulatorial);
      $query->bindValue(":unimed_global", $unimed_global);
      $query->bindValue(":unimed_sos", $unimed_sos);
      $query->bindValue(":unimed_odonto", $unimed_odonto);
      $query->bindValue(":cobranca_unimed", $cobranca_unimed);
      $query->bindValue(":telefonia_vivo", $telefonia_vivo);
      $query->bindValue(":telefonia_claro", $telefonia_claro);
      $query->bindValue(":cobranca_telefonia", $cobranca_telefonia);
      $query->bindValue(":cobranca_servicos", $cobranca_servicos);
      
      $query->execute();
      $query = "SUCCESS";
      echo json_encode($query);
    }
  }

    public function editarRegistro($pk_ass, $fk_sit, $fk_bco, $fk_lot, $fk_cat, $fk_cid_resid, $fk_cid_comerc, $matricula, $nome, $rg, $data_rg, $orgao_expedidor, $cpf, $nome_pai, $nome_mae, $sexo, $estado_civil, $data_nasc, $agencia, $conta, $observacoes, $nro_oab, $endereco_resid, $bairro_resid, $cep_resid, $telefone_resid, $email_resid, $logradouro_comerc, $bairro_comerc, $cep_comerc, $email_comerc, $telefone_comerc, $cobranca_mensalidade, $anape, $unimed_hospitalar, $unimed_ambulatorial, $unimed_global, $unimed_sos, $unimed_odonto, $cobranca_unimed, $telefonia_vivo, $telefonia_claro, $cobranca_telefonia, $cobranca_servicos){
      $query = "SELECT * FROM associados WHERE cpf = :cpf AND pk_ass != :pk_ass";
      $query = $this->db->prepare($query);
      $query->bindValue(":pk_ass", $pk_ass);
      $query->bindValue(":cpf", $cpf);
      $query->execute();
      if ($query->rowCount() > 0) {
          $query = "ERROR";
          echo json_encode($query);
      } else {
        $query = "UPDATE associados SET
                  fk_sit = :fk_sit,
                  fk_bco = :fk_bco,
                  fk_lot = :fk_lot,
                  fk_cat = :fk_cat,
                  fk_cid_resid = :fk_cid_resid,
                  fk_cid_comerc = :fk_cid_comerc,
                  nome = :nome,
                  matricula = :matricula,
                  data_nasc = :data_nasc,
                  rg = :rg,
                  data_rg = :data_rg,
                  orgao_expedidor = :orgao_expedidor,
                  cpf = :cpf,
                  estado_civil = :estado_civil,
                  nome_pai = :nome_pai,
                  nome_mae = :nome_mae,
                  sexo = :sexo,
                  agencia = :agencia,
                  conta = :conta,
                  observacoes = :observacoes,
                  nro_oab = :nro_oab,
                  endereco_resid = :endereco_resid,
                  bairro_resid = :bairro_resid,
                  cep_resid = :cep_resid,
                  telefone_resid = :telefone_resid,
                  email_resid = :email_resid,
                  logradouro_comerc = :logradouro_comerc,
                  bairro_comerc = :bairro_comerc,
                  cep_comerc = :cep_comerc,
                  telefone_comerc = :telefone_comerc,
                  email_comerc = :email_comerc, 
                  cobranca_mensalidade = :cobranca_mensalidade, 
                  anape = :anape, 
                  unimed_hospitalar = :unimed_hospitalar, 
                  unimed_ambulatorial = :unimed_ambulatorial, 
                  unimed_global = :unimed_global, 
                  unimed_sos = :unimed_sos, 
                  unimed_odonto = :unimed_odonto, 
                  cobranca_unimed = :cobranca_unimed, 
                  telefonia_vivo = :telefonia_vivo, 
                  telefonia_claro = :telefonia_claro, 
                  cobranca_telefonia = :cobranca_telefonia, 
                  cobranca_servicos = :cobranca_servicos            
                  WHERE pk_ass = :pk_ass
                  ";
        $query = $this->db->prepare($query);
        $query->bindValue(":pk_ass", $pk_ass);
        $query->bindValue(":fk_sit", $fk_sit);
        $query->bindValue(":fk_bco", $fk_bco);
        $query->bindValue(":fk_lot", $fk_lot);
        $query->bindValue(":fk_cat", $fk_cat);
        $query->bindValue(":fk_cid_resid", $fk_cid_resid);
        $query->bindValue(":fk_cid_comerc", $fk_cid_comerc);
        $query->bindValue(":nome", $nome);
        $query->bindValue(":matricula", $matricula);
        $query->bindValue(":data_nasc", $data_nasc);
        $query->bindValue(":rg", $rg);
        $query->bindValue(":data_rg", $data_rg);
        $query->bindValue(":orgao_expedidor", $orgao_expedidor);
        $query->bindValue(":cpf", $cpf);
        $query->bindValue(":estado_civil", $estado_civil);
        $query->bindValue(":nome_pai", $nome_pai);
        $query->bindValue(":nome_mae", $nome_mae);
        $query->bindValue(":sexo", $sexo);
        $query->bindValue(":agencia", $agencia);
        $query->bindValue(":conta", $conta);
        $query->bindValue(":observacoes", $observacoes);
        $query->bindValue(":nro_oab", $nro_oab);
        $query->bindValue(":endereco_resid", $endereco_resid);
        $query->bindValue(":bairro_resid", $bairro_resid);
        $query->bindValue(":cep_resid", $cep_resid);
        $query->bindValue(":telefone_resid", $telefone_resid);
        $query->bindValue(":email_resid", $email_resid);
        $query->bindValue(":logradouro_comerc", $logradouro_comerc);
        $query->bindValue(":bairro_comerc", $bairro_comerc);
        $query->bindValue(":cep_comerc", $cep_comerc);
        $query->bindValue(":telefone_comerc", $telefone_comerc);
        $query->bindValue(":email_comerc", $email_comerc);
        $query->bindValue(":cobranca_mensalidade", $cobranca_mensalidade);
        $query->bindValue(":anape", $anape);
        $query->bindValue(":unimed_hospitalar", $unimed_hospitalar);
        $query->bindValue(":unimed_ambulatorial", $unimed_ambulatorial);
        $query->bindValue(":unimed_global", $unimed_global);
        $query->bindValue(":unimed_sos", $unimed_sos);
        $query->bindValue(":unimed_odonto", $unimed_odonto);
        $query->bindValue(":cobranca_unimed", $cobranca_unimed);
        $query->bindValue(":telefonia_vivo", $telefonia_vivo);
        $query->bindValue(":telefonia_claro", $telefonia_claro);
        $query->bindValue(":cobranca_telefonia", $cobranca_telefonia);
        $query->bindValue(":cobranca_servicos", $cobranca_servicos);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function delAssociado($pk_ass){
      try {
        $query = "DELETE FROM associados WHERE pk_ass = '$pk_ass'";
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

    public function inserirRegistroDependente($fk_ass, $fk_tde, $nome, $data_nasc, $codigo_unimed, $carteira_unimed, $observacoes){
      $query = "INSERT INTO dependentes SET
               fk_ass = :fk_ass,
               fk_tde = :fk_tde,
               nome = :nome,
               data_nasc = :data_nasc,
               codigo_unimed = :codigo_unimed,
               carteira_unimed = :carteira_unimed,
               observacoes = :observacoes
               ";
     $query = $this->db->prepare($query);
     $query->bindValue(":fk_ass", $fk_ass);
     $query->bindValue(":fk_tde", $fk_tde);
     $query->bindValue(":nome", $nome);
     $query->bindValue(":data_nasc", $data_nasc);
     $query->bindValue(":codigo_unimed", $codigo_unimed);
     $query->bindValue(":carteira_unimed", $carteira_unimed);
     $query->bindValue(":observacoes", $observacoes);
     $query->execute();
     $query = "SUCCESS";
     echo json_encode($query);
    }

    public function editarRegistroDependente($pk_dep, $fk_ass, $fk_tde, $nome, $data_nasc, $codigo_unimed, $carteira_unimed, $observacoes){
      $query = "UPDATE dependentes SET
                fk_ass = :fk_ass,
                fk_tde = :fk_tde,
                nome = :nome,
                data_nasc = :data_nasc,
                codigo_unimed = :codigo_unimed,
                carteira_unimed = :carteira_unimed,
                observacoes = :observacoes
                WHERE pk_dep = :pk_dep";
      $query = $this->db->prepare($query);
      $query->bindValue(":pk_dep", $pk_dep);
      $query->bindValue(":fk_ass", $fk_ass);
      $query->bindValue(":fk_tde", $fk_tde);
      $query->bindValue(":nome", $nome);
      $query->bindValue(":data_nasc", $data_nasc);
      $query->bindValue(":codigo_unimed", $codigo_unimed);
      $query->bindValue(":carteira_unimed", $carteira_unimed);
      $query->bindValue(":observacoes", $observacoes);
      $query->execute();
      $query = "SUCCESS";
      echo json_encode($query);
    }

    public function delRegistroDependente($pk_dep){
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      try {
        $query = "DELETE FROM dependentes WHERE pk_dep = '$pk_dep'";
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

    public function getCelulares($fk_ass){
      $returner = array();
      $query = "
            SELECT cel.*,
            ass.nome nomeass
            FROM associados_celulares cel
            LEFT JOIN associados ass ON ass.pk_ass = cel.fk_ass
            WHERE fk_ass = '$fk_ass'
            ORDER BY cel.numero ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

    public function inserirRegistroCelular($fk_ass, $numero, $operadora, $observacao){
      $query = "SELECT * FROM associados_celulares WHERE numero = :numero";
      $query = $this->db->prepare($query);
      $query->bindValue(":numero", $numero);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "ERRO";
	      echo json_encode($query);
      } else {
        $query = "INSERT INTO associados_celulares SET
                  fk_ass = :fk_ass,
                  numero = :numero,
                  operadora = :operadora,
                  observacao = :observacao
                  ";
        $query = $this->db->prepare($query);
        $query->bindValue(":fk_ass", $fk_ass);
        $query->bindValue(":numero", $numero);
        $query->bindValue(":operadora", $operadora);
        $query->bindValue(":observacao", $observacao);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function editarRegistroCelular($pk_ace, $fk_ass, $numero, $operadora, $observacao, $inativo){
      $query = "SELECT * FROM associados_celulares WHERE numero = :numero";
      $query = $this->db->prepare($query);
      $query->bindValue(":numero", $numero);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "ERRO";
	      echo json_encode($query);
      } else {
        $query = "UPDATE associados_celulares SET
                  fk_ass = :fk_ass,
                  numero = :numero,
                  operadora = :operadora,
                  observacao = :observacao,
                  inativo = :inativo
                  WHERE pk_ace = :pk_ace";
        $query = $this->db->prepare($query);
        $query->bindValue(":pk_ace", $pk_ace);
        $query->bindValue(":fk_ass", $fk_ass);
        $query->bindValue(":numero", $numero);
        $query->bindValue(":operadora", $operadora);
        $query->bindValue(":observacao", $observacao);
        $query->bindValue(":inativo", $inativo);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function delRegistroCelular($pk_ace){
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      try {
        $query = "DELETE FROM associados_celulares WHERE pk_ace = '$pk_ace'";
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
