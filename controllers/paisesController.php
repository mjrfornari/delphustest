<?php
  /**
   * CONTROLADOR DA TELA PAÍSES DO SISTEMA.
   */
  class paisesController extends controller
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
      $paises = new paisesDB();
      $data_set['paises'] = $paises->getPaises();
      $this->loadTemplate('paises', $data_set);
    }

    public function novoRegistro(){
      $nome = strtoupper(addslashes(htmlspecialchars($_POST['nome'])));
      $paises = new paisesDB();
      $paises->novoRegistro($nome);
    }

    public function editarRegistro(){
      $pk_pai = $_POST['pk_pai'];
      $nome = strtoupper(addslashes(htmlspecialchars($_POST['nome'])));
      $paises = new paisesDB();
      $paises->editarRegistro($pk_pai, $nome);
    }

    public function deletarRegistro(){
      $pk_pai = $_POST['pk_pai'];
      $paises = new paisesDB();
      $paises->deletarRegistro($pk_pai);
    }

  }

?>
