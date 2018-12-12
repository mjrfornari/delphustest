<?php
  /**
   * CONTROLADOR DA TELA SITUAÇÕES DO SISTEMA.
   */
  class situacoesController extends controller
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
      $situacoes = new situacoesDB();
      $data_set['situacoes'] = $situacoes->getSituacoes();
      $this->loadTemplate('situacoes', $data_set);
    }

    public function novoRegistro(){
      $descricao = strtoupper(addslashes(htmlspecialchars($_POST['descricao'])));
      $situacoes = new situacoesDB();
      $situacoes->novoRegistro($descricao);
    }

    public function editarRegistro(){
      $pk_sit = $_POST['pk_sit'];
      $descricao = strtoupper(addslashes(htmlspecialchars($_POST['descricao'])));
      $situacoes = new situacoesDB();
      $situacoes->editarRegistro($pk_sit, $descricao);
    }

    public function deletarRegistro(){
      $pk_sit = $_POST['pk_sit'];
      $situacoes = new situacoesDB();
      $situacoes->deletarRegistro($pk_sit);
    }

  }

?>