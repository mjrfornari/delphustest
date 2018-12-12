<?php
  /**
   * CONTROLADOR DA TELA CLASSE MENSALIDADE DO SISTEMA.
   */
  class classe_mensalidadeController extends controller
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
      $classe_mensalidade = new classe_mensalidadeDB();
      $data_set['classe_mensalidade'] = $classe_mensalidade->getClasse_mensalidade();
      $this->loadTemplate('classe_mensalidade', $data_set);
    }

    public function novoRegistro(){
      $descricao = strtoupper(addslashes(htmlspecialchars($_POST['descricao'])));
      $valor_cru = $_POST['valor_mensalidade'];
      $valor_mensalidade = str_replace(",", ".", $_POST['valor_mensalidade']);
      $classe_mensalidade = new classe_mensalidadeDB();
      $classe_mensalidade->novoRegistro($descricao, $valor_mensalidade);
    }

    public function editarRegistro(){
      $pk_cme = $_POST['pk_cme'];
      $descricao = strtoupper(addslashes(htmlspecialchars($_POST['descricao'])));
      $valor_mensalidade = str_replace(",", ".", $_POST['valor_mensalidade']);
      $classe_mensalidade = new classe_mensalidadeDB();
      $classe_mensalidade->editarRegistro($pk_cme, $descricao, $valor_mensalidade);
    }

    public function deletarRegistro(){
      $pk_cme = $_POST['pk_cme'];
      $classe_mensalidade = new classe_mensalidadeDB();
      $classe_mensalidade->deletarRegistro($pk_cme);
    }

  }

?>