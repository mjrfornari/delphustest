<?php
  /**
   * CONTROLADOR DA TELA DE LOGIN
   */
  class loginController extends controller
  {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
      $data_set = array('return' => '');
      $this->loadPage('login', $data_set);
    }

    public function logarSistema(){
      $login = strtolower(addslashes(htmlspecialchars($_POST['login'])));
      $senha = $_POST['senha'];
      $usuarios = new usuariosDB();
      $usuarios->logarSistema($login, $senha);
    }

    public function editarSenha(){
      $login = strtolower(addslashes(htmlspecialchars($_POST['login'])));
      $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
      $usuarios = new usuariosDB();
      $usuarios->editarSenha($login, $senha);
    }

    public function novoRegistro(){
      $nome = strtoupper(addslashes(htmlspecialchars($_POST['nome'])));
      $login = strtolower(addslashes(htmlspecialchars($_POST['login'])));
      $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
      $usuarios = new usuariosDB();
      $usuarios->novoRegistro($nome, $login, $senha);
    }

  }

?>
