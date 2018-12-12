<?php
  /**
   * CONTROLADOR DA TELA estados DO SISTEMA.
   */
  class estadosController extends controller
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
      $estados = new estadosDB();
      $data_set['estados'] = $estados->getEstados();
      $paises = new paisesDB();
      $data_set['paises'] = $paises->getPaises();
      $this->loadTemplate('estados', $data_set);
    }

    public function novoRegistro(){
      $fk_pai = $_POST['fk_pai'];
      $sigla = strtoupper(addslashes(htmlspecialchars($_POST['sigla'])));
      $nome = strtoupper(addslashes(htmlspecialchars($_POST['nome'])));
      $estados = new estadosDB();
      $estados->novoRegistro($fk_pai, $sigla, $nome);
    }

    public function editarRegistro(){
      $pk_est = $_POST['pk_est'];
      $fk_pai = $_POST['fk_pai'];
      $sigla = strtoupper(addslashes(htmlspecialchars($_POST['sigla'])));
      $nome = strtoupper(addslashes(htmlspecialchars($_POST['nome'])));
      $estados = new estadosDB();
      $estados->editarRegistro($pk_est, $fk_pai, $sigla, $nome);
    }

    public function deletarRegistro(){
      $pk_est = $_POST['pk_est'];
      $estados = new estadosDB();
      $estados->deletarRegistro($pk_est);
    }

  }

?>
