<?php
  /**
   * CONTROLADOR DA TELA TIPOS DE SERVIÇOS DO SISTEMA.
   */
  class tipos_servicosController extends controller
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
      $tipos_servicos = new tipos_servicosDB();
      $data_set['tipos_servicos'] = $tipos_servicos->gettipos_servicos();
      $this->loadTemplate('tipos_servicos', $data_set);
    }

    public function novoRegistro(){
      $descricao = strtoupper(addslashes(htmlspecialchars($_POST['descricao'])));
      $valor = str_replace(",", ".", $_POST['valor']);
      $inativo = strtoupper(addslashes(htmlspecialchars($_POST['inativo'])));
      $tipos_servicos = new tipos_servicosDB();
      $tipos_servicos->novoRegistro($descricao, $valor, $inativo);
    }

    public function editarRegistro(){
      $pk_ser = $_POST['pk_ser'];
      $descricao = strtoupper(addslashes(htmlspecialchars($_POST['descricao'])));
      $valor = str_replace(",", ".", $_POST['valor']);
      $inativo = strtoupper(addslashes(htmlspecialchars($_POST['inativo'])));
      $tipos_servicos = new tipos_servicosDB();
      $tipos_servicos->editarRegistro($pk_ser, $descricao, $valor, $inativo);
    }

    public function deletarRegistro(){
      $pk_ser = $_POST['pk_ser'];
      $tipos_servicos = new tipos_servicosDB();
      $tipos_servicos->deletarRegistro($pk_ser);
    }

  }

?>