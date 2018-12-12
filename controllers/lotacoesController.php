<?php
  /**
   * CONTROLADOR DA TELA PAÍSES DO SISTEMA.
   */
  class lotacoesController extends controller
  {

    public function __construct(){
        parent::__construct();
        $users = new usuariosDB();
        $users->users_check_session();
        global $user_in;
        $user_in = intval($_SESSION['apergs_session_log']);
    }

    public function index(){
      $data_set = array('erro' => '');
      $lotacoes = new lotacoesDB();
      $data_set['lotacoes'] = $lotacoes->getLotacoes();
      $this->loadTemplate('lotacoes', $data_set);
    }

    public function getLotacoesAtivas(){
      $lotacoes = new lotacoesDB();
      $lotacoes->getLotacoesAtivas();
    }

    public function novoRegistro(){
      $descricao = strtoupper(addslashes(htmlspecialchars($_POST['descricao'])));
      $inativo = strtoupper(addslashes(htmlspecialchars($_POST['inativo'])));
      $lotacoes = new lotacoesDB();
      $lotacoes->novoRegistro($descricao, $inativo);
    }

    public function editarRegistro(){
      $pk_lot = $_POST['pk_lot'];
      $descricao = strtoupper(addslashes(htmlspecialchars($_POST['descricao'])));
      $inativo = strtoupper(addslashes(htmlspecialchars($_POST['inativo'])));
      $lotacoes = new lotacoesDB();
      $lotacoes->editarRegistro($pk_lot, $descricao, $inativo);
    }

    public function deletarRegistro(){
      $pk_lot = $_POST['pk_lot'];
      $lotacoes = new lotacoesDB();
      $lotacoes->deletarRegistro($pk_lot);
    }

  }

?>