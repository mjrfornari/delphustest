<?php
  /**
   * CONTROLADOR DA TELA USUÁRIOS DO SISTEMA.
   */
  class usuariosController extends controller
  {

    public function __construct(){
        parent::__construct();
        $usuarios = new usuariosDB();
        $usuarios->users_check_session();
        global $user_in;
        $user_in = intval($_SESSION['apergs_session_log']);
    }

    public function index(){
      $data_set = array('erro' => '');
      $usuarios = new usuariosDB();
      $data_set['usuarios'] = $usuarios->getUsuarios();
      $this->loadTemplate('usuarios', $data_set);
    }

    public function novoRegistro(){
      $nome = strtoupper(addslashes(htmlspecialchars($_POST['nome'])));
      $login = strtolower(addslashes(htmlspecialchars($_POST['login'])));
      $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
      $usuarios = new usuariosDB();
      $usuarios->novoRegistro($nome, $login, $senha);
    }

    public function editarRegistro(){
      $bloqueado = $_POST['bloqueado'];
      $nome = strtoupper(addslashes(htmlspecialchars($_POST['nome'])));
      $login = strtolower(addslashes(htmlspecialchars($_POST['login'])));
      $pk_usu = $_POST['pk_usu'];
      $usuarios = new usuariosDB();
      $usuarios->editarRegistro($bloqueado, $nome, $login, $pk_usu);
    }

    public function editarSenha(){
      $login = strtolower(addslashes(htmlspecialchars($_POST['login'])));
      $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
      $usuarios = new usuariosDB();
      $usuarios->editarSenha($login, $senha);
    }

    public function deletarRegistro(){
      $pk_usu = $_POST['pk_usu'];
      $usuarios = new usuariosDB();
      $usuarios->deletarRegistro($pk_usu);
    }

  }

?>
