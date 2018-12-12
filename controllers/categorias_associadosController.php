<?php
  /**
   * CONTROLADOR DA TELA PAÍSES DO SISTEMA.
   */
  class categorias_associadosController extends controller
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
      $categorias_associados = new categorias_associadosDB();
      $data_set['categorias'] = $categorias_associados->getCategorias_associados();
      $this->loadTemplate('categorias_associados', $data_set);
    }

    public function novoRegistro(){
      $descricao = strtoupper(addslashes(htmlspecialchars($_POST['descricao'])));
      $categorias_associados = new categorias_associadosDB();
      $categorias_associados->novoRegistro($descricao);
    }

    public function editarRegistro(){
      $pk_cat = $_POST['pk_cat'];
      $descricao = strtoupper(addslashes(htmlspecialchars($_POST['descricao'])));
      $categorias_associados = new categorias_associadosDB();
      $categorias_associados->editarRegistro($pk_cat, $descricao);
    }

    public function deletarRegistro(){
      $pk_cat = $_POST['pk_cat'];
      $categorias_associados = new categorias_associadosDB();
      $categorias_associados->deletarRegistro($pk_cat);
    }

  }

?>