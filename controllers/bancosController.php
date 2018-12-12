<?php
  /**
   * CONTROLADOR DA TELA SITUAÇÕES DO SISTEMA.
   */
  class bancosController extends controller
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
      $bancos = new bancosDB();
      $data_set['bancos'] = $bancos->getBancos();
      $this->loadTemplate('bancos', $data_set);
    }

    public function novoRegistro(){
      $nome = strtoupper(addslashes(htmlspecialchars($_POST['nome'])));
      $bancos = new bancosDB();
      $bancos->novoRegistro($nome);
    }

    public function editarRegistro(){
      $pk_bco = $_POST['pk_bco'];
      $nome = strtoupper(addslashes(htmlspecialchars($_POST['nome'])));
      $bancos = new bancosDB();
      $bancos->editarRegistro($pk_bco, $nome);
    }

    public function deletarRegistro(){
      $pk_bco = $_POST['pk_bco'];
      $bancos = new bancosDB();
      $bancos->deletarRegistro($pk_bco);
    }

  }

?>