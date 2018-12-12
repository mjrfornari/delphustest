<?php
  /**
   * CONTROLADOR DA TELA CONTAS A RECEBER DO SISTEMA.
   **/
  class contas_receberController extends controller
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
      $lotacoes = new lotacoesDB();
      $data_set['lotacoes'] = $lotacoes->getLotacoes();
      $situacoes = new situacoesDB();
      $data_set['situacoes'] = $situacoes->getSituacoes();
      $tipos_servicos = new tipos_servicosDB();
      $data_set['tipos_servicos'] = $tipos_servicos->gettipos_servicos();
      $contas_receber = new contas_receberDB();
      $data_set['contas_receber'] = $contas_receber->getContas_receber();

      $this->loadTemplate('contas_receber/listar', $data_set);
    }

    public function novo(){
      $data_set = array('erro' => '');
      $bancos = new bancosDB();
      $data_set['bancos'] = $bancos->getBancos();
      $classe_mensalidade = new classe_mensalidadeDB();
      $data_set['classe_mensalidade'] = $classe_mensalidade->getClasse_mensalidade();
      $lotacoes = new lotacoesDB();
      $data_set['lotacoes'] = $lotacoes->getLotacoes();
      $categorias_contas_receber = new categorias_contas_receberDB();
      $data_set['categorias'] = $categorias_contas_receber->getCategorias_contas_receber();
      $situacoes = new situacoesDB();
      $data_set['situacoes'] = $situacoes->getSituacoes();
      $cidades = new cidadesDB();
      $data_set['cidades'] = $cidades->getCidades();

      $this->loadTemplate('contas_receber/novo', $data_set);
    }

    public function editar(){
      $data_set = array('erro' => '');
      $bancos = new bancosDB();
      $data_set['bancos'] = $bancos->getBancos();
      $classe_mensalidade = new classe_mensalidadeDB();
      $data_set['classe_mensalidade'] = $classe_mensalidade->getClasse_mensalidade();
      $lotacoes = new lotacoesDB();
      $data_set['lotacoes'] = $lotacoes->getLotacoes();
      $categorias_contas_receber = new categorias_contas_receberDB();
      $data_set['categorias'] = $categorias_contas_receber->getCategorias_contas_receber();
      $situacoes = new situacoesDB();
      $data_set['situacoes'] = $situacoes->getSituacoes();
      $cidades = new cidadesDB();
      $data_set['cidades'] = $cidades->getCidades();
      $contas_receber = new contas_receberDB();
      $data_set['associado'] = $contas_receber->getcontas_receberporId($_GET['id']);
      $this->loadTemplate('contas_receber/editar', $data_set);
    }

    public function inserirRegistro(){
      $fk_associado         = $_POST['fk_associado'];
      $competencia          = $_POST['ano_comp_novo'] . $_POST['mes_comp_novo'];
      $tipo_serv_novo       = $_POST['tipo_serv_novo'];
      $data_emissao_novo    = $_POST['data_emissao_novo'];
      $data_vencimento_novo = $_POST['data_vencimento_novo'];
      $valor_novo           = str_replace(",", ".", $_POST['valor_novo']);
      $observacao_novo      = strtoupper(addslashes(htmlspecialchars($_POST['observacao_novo'])));

      $contas_receber = new contas_receberDB();
      $contas_receber->inserirRegistro($fk_associado, $competencia, $tipo_serv_novo, $data_emissao_novo, $data_vencimento_novo, $valor_novo, $observacao_novo);
    }

    public function editarRegistro(){
      $pk_ctr = $_POST['pk_ctr'];
      $fk_associado_editar         = $_POST['fk_associado_editar'];
      $competencia          = $_POST['ano_comp_editar'] . $_POST['mes_comp_editar'];
      $tipo_serv_editar       = $_POST['tipo_serv_editar'];
      $data_emissao_editar    = $_POST['data_emissao_editar'];
      $data_vencimento_editar = $_POST['data_vencimento_editar'];
      $valor_editar           = str_replace(",", ".", $_POST['valor_editar']);
      $observacao_editar      = strtoupper(addslashes(htmlspecialchars($_POST['observacao_editar'])));

      $contas_receber = new contas_receberDB();
      $contas_receber->editarRegistro($pk_ctr, $fk_associado_editar, $competencia, $tipo_serv_editar, $data_emissao_editar, $data_vencimento_editar, $valor_editar, $observacao_editar);
    }

    public function delAssociado(){
      $pk_ctr = $_POST['pk_ctr'];
      $contas_receber = new contas_receberDB();
      $contas_receber->delAssociado($pk_ctr);
    }

    public function getAssociados(){
      // $associado = $_GET['associado'];
      $associados = new associadosDB();
      $associados->getAssociadosJSON();
    }

    public function dependentes(){
      $data_set = array('erro' => '');
      $contas_receber = new contas_receberDB();
      $data_set['associado'] = $contas_receber->getcontas_receberporId($_GET['id']);
      $contas_receber = new contas_receberDB();
      $data_set['dependentes'] = $contas_receber->getDependentes($_GET['id']);
      $tipo_dependentes = new tipo_dependentesDB();
      $data_set['tipos_dependentes'] = $tipo_dependentes->getTipo_dependentes();
      $this->loadTemplate('contas_receber/dependentes', $data_set);
    }

    public function inserirRegistroDependente(){
      $fk_ass = $_POST['fk_ass'];
      $fk_tde = $_POST['fk_tde'];
      $nome = strtoupper(addslashes(htmlspecialchars($_POST['nome'])));
      $data_nasc = $_POST['data_nasc'];
      $codigo_unimed = strtoupper(addslashes(htmlspecialchars($_POST['codigo_unimed'])));
      $carteira_unimed = strtoupper(addslashes(htmlspecialchars($_POST['carteira_unimed'])));
      $observacoes = strtoupper(addslashes(htmlspecialchars($_POST['observacoes'])));

      $contas_receber = new contas_receberDB();
      $contas_receber->inserirRegistroDependente($fk_ass, $fk_tde, $nome, $data_nasc, $codigo_unimed, $carteira_unimed, $observacoes);
    }

    public function editarRegistroDependente(){
      $pk_dep = $_POST['pk_dep'];
      $fk_ass = $_POST['fk_ass'];
      $fk_tde = $_POST['fk_tde'];
      $nome = strtoupper(addslashes(htmlspecialchars($_POST['nome'])));
      $data_nasc = $_POST['data_nasc'];
      $codigo_unimed = strtoupper(addslashes(htmlspecialchars($_POST['codigo_unimed'])));
      $carteira_unimed = strtoupper(addslashes(htmlspecialchars($_POST['carteira_unimed'])));
      $observacoes = strtoupper(addslashes(htmlspecialchars($_POST['observacoes'])));

      $contas_receber = new contas_receberDB();
      $contas_receber->editarRegistroDependente($pk_dep, $fk_ass, $fk_tde, $nome, $data_nasc, $codigo_unimed, $carteira_unimed, $observacoes);
    }

    public function delRegistroDependente(){
      $pk_dep = $_POST['pk_dep'];
      $contas_receber = new contas_receberDB();
      $contas_receber->delRegistroDependente($pk_dep);
    }

    public function celulares(){
      $data_set = array('erro' => '');
      $contas_receber = new contas_receberDB();
      $data_set['associado'] = $contas_receber->getcontas_receberporId($_GET['id']);
      $contas_receber = new contas_receberDB();
      $data_set['celulares'] = $contas_receber->getCelulares($_GET['id']);
      $this->loadTemplate('contas_receber/celulares', $data_set);
    }

    public function inserirRegistroCelular(){
      $fk_ass = $_POST['fk_ass'];
      $numero = strtoupper(addslashes(htmlspecialchars($_POST['numero'])));
      $operadora = strtoupper(addslashes(htmlspecialchars($_POST['operadora'])));
      $observacao = strtoupper(addslashes(htmlspecialchars($_POST['observacao'])));

      $contas_receber = new contas_receberDB();
      $contas_receber->inserirRegistroCelular($fk_ass, $numero, $operadora, $observacao);
    }

    public function editarRegistroCelular(){
      $pk_ace = $_POST['pk_ace'];
      $fk_ass = $_POST['fk_ass'];
      $numero = strtoupper(addslashes(htmlspecialchars($_POST['numero'])));
      $operadora = strtoupper(addslashes(htmlspecialchars($_POST['operadora'])));
      $observacao = strtoupper(addslashes(htmlspecialchars($_POST['observacao'])));
      $inativo = strtoupper(addslashes(htmlspecialchars($_POST['inativo'])));

      $contas_receber = new contas_receberDB();
      $contas_receber->editarRegistroCelular($pk_ace, $fk_ass, $numero, $operadora, $observacao, $inativo);
    }

    public function delRegistroCelular(){
      $pk_ace = $_POST['pk_ace'];
      $contas_receber = new contas_receberDB();
      $contas_receber->delRegistroCelular($pk_ace);
    }

    public function popularValor(){
      $tipo_serv_novo = $_POST['tipo_serv_novo'];
      $contas_receber = new contas_receberDB();
      $contas_receber->popularValor($tipo_serv_novo);
    }

    public function popularValorEditar(){
      $tipo_serv_editar = $_POST['tipo_serv_editar'];
      $contas_receber = new contas_receberDB();
      $contas_receber->popularValor($tipo_serv_editar);
    }

  }

?>