<?php
  /**
   * CONTROLADOR DA TELA ASSOCIDADOS DO SISTEMA.
   */
  class associadosController extends controller
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
      $associados = new associadosDB();
      $data_set['associados'] = $associados->getAssociados();

      $this->loadTemplate('associados/listar', $data_set);
    }

    public function novo(){
      $data_set = array('erro' => '');
      $bancos = new bancosDB();
      $data_set['bancos'] = $bancos->getBancos();
      $classe_mensalidade = new classe_mensalidadeDB();
      $data_set['classe_mensalidade'] = $classe_mensalidade->getClasse_mensalidade();
      $lotacoes = new lotacoesDB();
      $data_set['lotacoes'] = $lotacoes->getLotacoes();
      $categorias_associados = new categorias_associadosDB();
      $data_set['categorias'] = $categorias_associados->getCategorias_associados();
      $situacoes = new situacoesDB();
      $data_set['situacoes'] = $situacoes->getSituacoes();
      $cidades = new cidadesDB();
      $data_set['cidades'] = $cidades->getCidades();

      $this->loadTemplate('associados/novo', $data_set);
    }

    public function editar(){
      $data_set = array('erro' => '');
      $bancos = new bancosDB();
      $data_set['bancos'] = $bancos->getBancos();
      $classe_mensalidade = new classe_mensalidadeDB();
      $data_set['classe_mensalidade'] = $classe_mensalidade->getClasse_mensalidade();
      $lotacoes = new lotacoesDB();
      $data_set['lotacoes'] = $lotacoes->getLotacoes();
      $categorias_associados = new categorias_associadosDB();
      $data_set['categorias'] = $categorias_associados->getCategorias_associados();
      $situacoes = new situacoesDB();
      $data_set['situacoes'] = $situacoes->getSituacoes();
      $cidades = new cidadesDB();
      $data_set['cidades'] = $cidades->getCidades();
      $associados = new associadosDB();
      $data_set['associado'] = $associados->getAssociadosporId($_GET['id']);
      $this->loadTemplate('associados/editar', $data_set);
    }

    public function inserirRegistro(){
      $fk_sit = $_POST['fk_sit'];
      $fk_bco = $_POST['fk_bco'];
      $fk_lot = $_POST['fk_lot'];
      $fk_cat = $_POST['fk_cat'];
      $fk_cid_resid = $_POST['fk_cid_resid'];
      $fk_cid_comerc = $_POST['fk_cid_comerc'];
      $matricula = strtoupper(addslashes(htmlspecialchars($_POST['matricula'])));
      $nome = strtoupper(addslashes(htmlspecialchars($_POST['nome'])));
      $rg = strtoupper(addslashes(htmlspecialchars($_POST['rg'])));
      $data_rg = $_POST['data_rg'];
      $orgao_expedidor = strtoupper(addslashes(htmlspecialchars($_POST['orgao_expedidor'])));
      $cpf = strtoupper(addslashes(htmlspecialchars($_POST['cpf'])));
      $nome_pai = strtoupper(addslashes(htmlspecialchars($_POST['nome_pai'])));
      $nome_mae = strtoupper(addslashes(htmlspecialchars($_POST['nome_mae'])));
      $sexo = strtoupper(addslashes(htmlspecialchars($_POST['sexo'])));
      $estado_civil = strtoupper(addslashes(htmlspecialchars($_POST['estado_civil'])));
      $data_nasc = $_POST['data_nasc'];
      $agencia = strtoupper(addslashes(htmlspecialchars($_POST['agencia'])));
      $conta = strtoupper(addslashes(htmlspecialchars($_POST['conta'])));
      $observacoes = strtoupper(addslashes(htmlspecialchars($_POST['observacoes'])));
      $nro_oab = strtoupper(addslashes(htmlspecialchars($_POST['nro_oab'])));
      $endereco_resid = strtoupper(addslashes(htmlspecialchars($_POST['endereco_resid'])));
      $bairro_resid = strtoupper(addslashes(htmlspecialchars($_POST['bairro_resid'])));
      $cep_resid = strtoupper(addslashes(htmlspecialchars($_POST['cep_resid'])));
      $telefone_resid = strtoupper(addslashes(htmlspecialchars($_POST['telefone_resid'])));
      $email_resid = strtoupper(addslashes(htmlspecialchars($_POST['email_resid'])));
      $logradouro_comerc = strtoupper(addslashes(htmlspecialchars($_POST['logradouro_comerc'])));
      $bairro_comerc = strtoupper(addslashes(htmlspecialchars($_POST['bairro_comerc'])));
      $cep_comerc = strtoupper(addslashes(htmlspecialchars($_POST['cep_comerc'])));
      $email_comerc = strtoupper(addslashes(htmlspecialchars($_POST['email_comerc'])));
      $telefone_comerc = strtoupper(addslashes(htmlspecialchars($_POST['telefone_comerc'])));
      $cobranca_mensalidade = $_POST['cobranca_mensalidade'];
      $anape = $_POST['anape'];
      $unimed_hospitalar = $_POST['unimed_hospitalar'];
      $unimed_ambulatorial = $_POST['unimed_ambulatorial'];
      $unimed_global = $_POST['unimed_global'];
      $unimed_sos = $_POST['unimed_sos'];
      $unimed_odonto = $_POST['unimed_odonto'];
      $cobranca_unimed = $_POST['cobranca_unimed'];
      $telefonia_vivo = $_POST['telefonia_vivo'];
      $telefonia_claro = $_POST['telefonia_claro'];
      $cobranca_telefonia = $_POST['cobranca_telefonia'];
      $cobranca_servicos = $_POST['cobranca_servicos'];

      $associados = new associadosDB();
      $associados->inserirRegistro($fk_sit, $fk_bco, $fk_lot, $fk_cat, $fk_cid_resid, $fk_cid_comerc, $matricula, $nome, $rg, $data_rg, $orgao_expedidor, $cpf, $nome_pai, $nome_mae, $sexo, $estado_civil, $data_nasc, $agencia, $conta, $observacoes, $nro_oab, $endereco_resid, $bairro_resid, $cep_resid, $telefone_resid, $email_resid, $logradouro_comerc, $bairro_comerc, $cep_comerc, $email_comerc, $telefone_comerc, $cobranca_mensalidade, $anape, $unimed_hospitalar, $unimed_ambulatorial, $unimed_global, $unimed_sos, $unimed_odonto, $cobranca_unimed, $telefonia_vivo, $telefonia_claro, $cobranca_telefonia, $cobranca_servicos);
    }

    public function editarRegistro(){
      $pk_ass = $_POST['pk_ass'];
      $fk_sit = $_POST['fk_sit'];
      $fk_bco = $_POST['fk_bco'];
      $fk_lot = $_POST['fk_lot'];
      $fk_cat = $_POST['fk_cat'];
      $fk_cid_resid = $_POST['fk_cid_resid'];
      $fk_cid_comerc = $_POST['fk_cid_comerc'];
      $matricula = strtoupper(addslashes(htmlspecialchars($_POST['matricula'])));
      $nome = strtoupper(addslashes(htmlspecialchars($_POST['nome'])));
      $rg = strtoupper(addslashes(htmlspecialchars($_POST['rg'])));
      $data_rg = $_POST['data_rg'];
      $orgao_expedidor = strtoupper(addslashes(htmlspecialchars($_POST['orgao_expedidor'])));
      $cpf = strtoupper(addslashes(htmlspecialchars($_POST['cpf'])));
      $nome_pai = strtoupper(addslashes(htmlspecialchars($_POST['nome_pai'])));
      $nome_mae = strtoupper(addslashes(htmlspecialchars($_POST['nome_mae'])));
      $sexo = strtoupper(addslashes(htmlspecialchars($_POST['sexo'])));
      $estado_civil = strtoupper(addslashes(htmlspecialchars($_POST['estado_civil'])));
      $data_nasc = $_POST['data_nasc'];
      $agencia = strtoupper(addslashes(htmlspecialchars($_POST['agencia'])));
      $conta = strtoupper(addslashes(htmlspecialchars($_POST['conta'])));
      $observacoes = strtoupper(addslashes(htmlspecialchars($_POST['observacoes'])));
      $nro_oab = strtoupper(addslashes(htmlspecialchars($_POST['nro_oab'])));
      $endereco_resid = strtoupper(addslashes(htmlspecialchars($_POST['endereco_resid'])));
      $bairro_resid = strtoupper(addslashes(htmlspecialchars($_POST['bairro_resid'])));
      $cep_resid = strtoupper(addslashes(htmlspecialchars($_POST['cep_resid'])));
      $telefone_resid = strtoupper(addslashes(htmlspecialchars($_POST['telefone_resid'])));
      $email_resid = strtoupper(addslashes(htmlspecialchars($_POST['email_resid'])));
      $logradouro_comerc = strtoupper(addslashes(htmlspecialchars($_POST['logradouro_comerc'])));
      $bairro_comerc = strtoupper(addslashes(htmlspecialchars($_POST['bairro_comerc'])));
      $cep_comerc = strtoupper(addslashes(htmlspecialchars($_POST['cep_comerc'])));
      $email_comerc = strtoupper(addslashes(htmlspecialchars($_POST['email_comerc'])));
      $telefone_comerc = strtoupper(addslashes(htmlspecialchars($_POST['telefone_comerc'])));
      $cobranca_mensalidade = $_POST['cobranca_mensalidade'];
      $anape = $_POST['anape'];
      $unimed_hospitalar = $_POST['unimed_hospitalar'];
      $unimed_ambulatorial = $_POST['unimed_ambulatorial'];
      $unimed_global = $_POST['unimed_global'];
      $unimed_sos = $_POST['unimed_sos'];
      $unimed_odonto = $_POST['unimed_odonto'];
      $cobranca_unimed = $_POST['cobranca_unimed'];
      $telefonia_vivo = $_POST['telefonia_vivo'];
      $telefonia_claro = $_POST['telefonia_claro'];
      $cobranca_telefonia = $_POST['cobranca_telefonia'];
      $cobranca_servicos = $_POST['cobranca_servicos'];

      $associados = new associadosDB();
      $associados->editarRegistro($pk_ass, $fk_sit, $fk_bco, $fk_lot, $fk_cat, $fk_cid_resid, $fk_cid_comerc, $matricula, $nome, $rg, $data_rg, $orgao_expedidor, $cpf, $nome_pai, $nome_mae, $sexo, $estado_civil, $data_nasc, $agencia, $conta, $observacoes, $nro_oab, $endereco_resid, $bairro_resid, $cep_resid, $telefone_resid, $email_resid, $logradouro_comerc, $bairro_comerc, $cep_comerc, $email_comerc, $telefone_comerc, $cobranca_mensalidade, $anape, $unimed_hospitalar, $unimed_ambulatorial, $unimed_global, $unimed_sos, $unimed_odonto, $cobranca_unimed, $telefonia_vivo, $telefonia_claro, $cobranca_telefonia, $cobranca_servicos);
    }

    public function delAssociado(){
      $pk_ass = $_POST['pk_ass'];
      $associados = new associadosDB();
      $associados->delAssociado($pk_ass);
    }

    public function dependentes(){
      $data_set = array('erro' => '');
      $associados = new associadosDB();
      $data_set['associado'] = $associados->getAssociadosporId($_GET['id']);
      $associados = new associadosDB();
      $data_set['dependentes'] = $associados->getDependentes($_GET['id']);
      $tipo_dependentes = new tipo_dependentesDB();
      $data_set['tipos_dependentes'] = $tipo_dependentes->getTipo_dependentes();
      $this->loadTemplate('associados/dependentes', $data_set);
    }

    public function inserirRegistroDependente(){
      $fk_ass = $_POST['fk_ass'];
      $fk_tde = $_POST['fk_tde'];
      $nome = strtoupper(addslashes(htmlspecialchars($_POST['nome'])));
      $data_nasc = $_POST['data_nasc'];
      $codigo_unimed = strtoupper(addslashes(htmlspecialchars($_POST['codigo_unimed'])));
      $carteira_unimed = strtoupper(addslashes(htmlspecialchars($_POST['carteira_unimed'])));
      $observacoes = strtoupper(addslashes(htmlspecialchars($_POST['observacoes'])));

      $associados = new associadosDB();
      $associados->inserirRegistroDependente($fk_ass, $fk_tde, $nome, $data_nasc, $codigo_unimed, $carteira_unimed, $observacoes);
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

      $associados = new associadosDB();
      $associados->editarRegistroDependente($pk_dep, $fk_ass, $fk_tde, $nome, $data_nasc, $codigo_unimed, $carteira_unimed, $observacoes);
    }

    public function delRegistroDependente(){
      $pk_dep = $_POST['pk_dep'];
      $associados = new associadosDB();
      $associados->delRegistroDependente($pk_dep);
    }

    public function celulares(){
      $data_set = array('erro' => '');
      $associados = new associadosDB();
      $data_set['associado'] = $associados->getAssociadosporId($_GET['id']);
      $associados = new associadosDB();
      $data_set['celulares'] = $associados->getCelulares($_GET['id']);
      $this->loadTemplate('associados/celulares', $data_set);
    }

    public function inserirRegistroCelular(){
      $fk_ass = $_POST['fk_ass'];
      $numero = strtoupper(addslashes(htmlspecialchars($_POST['numero'])));
      $operadora = strtoupper(addslashes(htmlspecialchars($_POST['operadora'])));
      $observacao = strtoupper(addslashes(htmlspecialchars($_POST['observacao'])));

      $associados = new associadosDB();
      $associados->inserirRegistroCelular($fk_ass, $numero, $operadora, $observacao);
    }

    public function editarRegistroCelular(){
      $pk_ace = $_POST['pk_ace'];
      $fk_ass = $_POST['fk_ass'];
      $numero = strtoupper(addslashes(htmlspecialchars($_POST['numero'])));
      $operadora = strtoupper(addslashes(htmlspecialchars($_POST['operadora'])));
      $observacao = strtoupper(addslashes(htmlspecialchars($_POST['observacao'])));
      $inativo = strtoupper(addslashes(htmlspecialchars($_POST['inativo'])));

      $associados = new associadosDB();
      $associados->editarRegistroCelular($pk_ace, $fk_ass, $numero, $operadora, $observacao, $inativo);
    }

    public function delRegistroCelular(){
      $pk_ace = $_POST['pk_ace'];
      $associados = new associadosDB();
      $associados->delRegistroCelular($pk_ace);
    }

  }

?>
