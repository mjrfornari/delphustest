<?php
  /**
   * Classe de manipulação da tabela de usuários
   */
  class usuariosDB extends model
  {
    //QUERIES DE LEITURA
    public function users_check_session(){
      if (!isset($_SESSION['apergs_session_log']) || (isset($_SESSION['apergs_session_log'])) && empty($_SESSION['apergs_session_log'])) {
        header("Location: " . BASEURL . "login");
        exit;
      }
    }

    public function getUsuarios(){
      $returner = array();
      $query = "SELECT LPAD(pk_usu,3,'0') AS cod_usu, usu.* FROM usuarios usu ORDER BY usu.nome ASC";
      $query = $this->db->query($query);
      if ($query->rowCount() > 0) {
        $returner = $query->fetchAll();
      }
      return $returner;
    }

    public function logarSistema($login, $senha){
      $query = "SELECT * FROM usuarios WHERE login = :login";
      $query = $this->db->prepare($query);
      $query->bindValue(":login", $login);
      $query->execute();

      if ($query->rowCount() > 0) {
        $query = $query->fetch();
        if (password_verify($senha, $query['senha'])) {
          $_SESSION['apergs_session_log'] = $query['pk_usu'];
          $query = "OK";
          echo json_encode($query);
        } else {
          unset($_SESSION['crud_session_log']);
          $query = "ERRO SENHA";
          echo json_encode($query);
        }
      } else {
        unset($_SESSION['crud_session_log']);
        $query = "ERRO EMAIL";
        echo json_encode($query);
      }
    }

    //QUERIES DE MODIFICAÇÃO
    public function novoRegistro($nome, $login, $senha){
      $query = "SELECT * FROM usuarios WHERE login = :login";
      $query = $this->db->prepare($query);
      $query->bindValue(":login", $login);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "ERRO";
	      echo json_encode($query);
      } else {
        $query = "INSERT INTO usuarios SET nome = :nome, login = :login, senha = :senha";
        $query = $this->db->prepare($query);
        $query->bindValue(":nome", $nome);
        $query->bindValue(":login", $login);
        $query->bindValue(":senha", $senha);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function editarRegistro($bloqueado, $nome, $login, $pk_usu){
      $query = "SELECT * FROM usuarios WHERE login = :login AND pk_usu != :pk_usu";
      $query = $this->db->prepare($query);
      $query->bindValue(":login", $login);
      $query->bindValue(":pk_usu", $pk_usu);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "ERRO";
        echo json_encode($query);
      } else {
        $query = "UPDATE usuarios SET bloqueado = :bloqueado, nome = :nome, login = :login WHERE pk_usu = :pk_usu";
        //echo $query;exit;
        $query = $this->db->prepare($query);
        $query->bindValue(":bloqueado", $bloqueado);
        $query->bindValue(":nome", $nome);
        $query->bindValue(":login", $login);
        $query->bindValue(":pk_usu", $pk_usu);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function editarSenha($login, $senha){
      $query = "SELECT * FROM usuarios WHERE login = :login";
      $query = $this->db->prepare($query);
      $query->bindValue(":login", $login);
      $query->execute();
      if ($query->rowCount() > 0) {
        $query = "UPDATE usuarios SET senha = :senha WHERE login = :login";
        $query = $this->db->prepare($query);
        $query->bindValue(":senha", $senha);
        $query->bindValue(":login", $login);
        $query->execute();
        $query = "SUCCESS";
        echo json_encode($query);
      } else {
        $query = "ERRO";
        echo json_encode($query);
      }
    }

    public function deletarRegistro($pk_usu){
      if ($_SESSION['apergs_session_log'] === $pk_usu) {
        $query = "DELETE FROM usuarios WHERE pk_usu = '$pk_usu'";
        $query = $this->db->query($query);
        unset($_SESSION['apergs_session_log']);
        $query = "BYE BYE";
        echo json_encode($query);
      } else {
        $query = "DELETE FROM usuarios WHERE pk_usu = '$pk_usu'";
        $query = $this->db->query($query);
        $query = "SUCCESS";
        echo json_encode($query);
      }
    }

    public function logOff(){
      unset($_SESSION['apergs_session_log']);
      header("Location: " . BASEURL);
    }

  }

?>
