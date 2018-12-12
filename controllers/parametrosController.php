<?php
  /**
   * CONTROLADOR DA TELA PARÂMETROS DO SISTEMA.
   */
  class parametrosController extends controller
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
      $parametros = new parametrosDB();
      $data_set['parametros'] = $parametros->getParametros();

      $this->loadTemplate('parametros', $data_set);
    }

    public function editarRegistro(){
        $pk_par = $_POST['pk_par'];
        $fk_cid = $_POST['fk_cid'];
        $nome_fantasia = strtoupper(addslashes(htmlspecialchars($_POST['nome_fantasia'])));
        $razao_social = strtoupper(addslashes(htmlspecialchars($_POST['razao_social'])));
        $cnpj = strtoupper(addslashes(htmlspecialchars($_POST['cnpj'])));
        $endereco = strtoupper(addslashes(htmlspecialchars($_POST['endereco'])));
        $bairro = strtoupper(addslashes(htmlspecialchars($_POST['bairro'])));
        $cep = strtoupper(addslashes(htmlspecialchars($_POST['cep'])));
      
        $parametros = new parametrosDB();
        $parametros->editarRegistro($pk_par, $fk_cid, $nome_fantasia, $razao_social, $cnpj, $endereco, $bairro, $cep);
    }

  }

?>