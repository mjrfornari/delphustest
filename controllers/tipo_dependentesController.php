<?php
  /**
   * CONTROLADOR DA TELA PAÍSES DO SISTEMA.
   */
  class tipo_dependentesController extends controller
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
      $tipo_dependentes = new tipo_dependentesDB();
      $data_set['tipos_dependentes'] = $tipo_dependentes->getTipo_dependentes();
      $this->loadTemplate('tipo_dependentes', $data_set);
    }

    public function novoRegistro(){
      $descricao = strtoupper(addslashes(htmlspecialchars($_POST['descricao'])));
      $tipo_dependentes = new tipo_dependentesDB();
      $tipo_dependentes->novoRegistro($descricao);
    }

    public function editarRegistro(){
      $pk_tde = $_POST['pk_tde'];
      $descricao = strtoupper(addslashes(htmlspecialchars($_POST['descricao'])));
      $tipo_dependentes = new tipo_dependentesDB();
      $tipo_dependentes->editarRegistro($pk_tde, $descricao);
    }

    public function deletarRegistro(){
      $pk_tde = $_POST['pk_tde'];
      $tipo_dependentes = new tipo_dependentesDB();
      $tipo_dependentes->deletarRegistro($pk_tde);
    }

  }

?>
