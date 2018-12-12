<?php
  /**
   * CONTROLADOR DA TELA CIDADES DO SISTEMA.
   */
  class cidadesController extends controller
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
      $cidades = new cidadesDB();
      $data_set['cidades'] = $cidades->getCidades();
      $estados = new estadosDB();
      $data_set['estados'] = $estados->getEstados();
      $this->loadTemplate('cidades', $data_set);
    }

    public function novoRegistro(){
      $fk_est = $_POST['fk_est'];
      $nome = strtoupper(addslashes(htmlspecialchars($_POST['nome'])));
      $cidades = new cidadesDB();
      $cidades->novoRegistro($fk_est, $nome);
    }

    public function editarRegistro(){
      $pk_cid = $_POST['pk_cid'];
      $fk_est = $_POST['fk_est'];
      $nome = strtoupper(addslashes(htmlspecialchars($_POST['nome'])));
      $cidades = new cidadesDB();
      $cidades->editarRegistro($pk_cid, $fk_est, $nome);
    }

    public function deletarRegistro(){
      $pk_cid = $_POST['pk_cid'];
      $cidades = new cidadesDB();
      $cidades->deletarRegistro($pk_cid);
    }

  }

?>
