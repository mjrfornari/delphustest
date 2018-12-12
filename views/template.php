<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta name="google" content="notranslate">
    <title>APERGS - Assoc. dos Procuradores do RS</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASEURL; ?>assets/img/icon.png">
    <link href="<?php echo BASEURL; ?>assets/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="<?php echo BASEURL; ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo BASEURL; ?>assets/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>assets/css/template.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>assets/css/jquery-ui.min.css">
    <script type="text/javascript" src="<?php echo BASEURL; ?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo BASEURL; ?>assets/js/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo BASEURL; ?>assets/js/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo BASEURL; ?>assets/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo BASEURL; ?>assets/js/axios-master/dist/axios.min.js"></script>
    <script type="text/javascript" src="<?php echo BASEURL; ?>assets/js/sweetalert2.js"></script>
    <script type="text/javascript" src="<?php echo BASEURL; ?>assets/js/moment.js"></script>
    <script type="text/javascript" src="<?php echo BASEURL; ?>assets/js/autocomplete/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo BASEURL; ?>assets/js/script.js"></script>
  </head>
  <body oncontextmenu="return false">
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div id="navbar">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                         <a href="<?php echo BASEURL; ?>">
                            APERGS
                         </a>
                     </li>
                     <li class="dropdown">
                        <a class="dropdown-toggle" type="button" data-toggle="dropdown">
                            Cadastros
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="test" tabindex="-1" href="#">
                                    Gerais
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="<?php echo BASEURL; ?>paises">Países</a></li>
                                    <li><a tabindex="-1" href="<?php echo BASEURL; ?>estados">Estados</a></li>
                                    <li><a tabindex="-1" href="<?php echo BASEURL; ?>cidades">Cidades</a></li>
                                    <li><a tabindex="-1" href="<?php echo BASEURL; ?>parametros">Parâmetros</a></li>
                                </ul>
                                <a class="test" tabindex="-1" href="#">
                                    Associação
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu tweak1">
                                    <li><a tabindex="-1" href="<?php echo BASEURL; ?>associados">Associados</a></li>
                                    <li><a tabindex="-1" href="<?php echo BASEURL; ?>situacoes">Situações</a></li>
                                    <li><a tabindex="-1" href="<?php echo BASEURL; ?>lotacoes">Lotações</a></li>
                                    <li><a tabindex="-1" href="<?php echo BASEURL; ?>categorias_associados">Categorias de Associados</a></li>
                                    <li><a tabindex="-1" href="<?php echo BASEURL; ?>tipo_dependentes">Tipos de dependentes</a></li>
                                </ul>
                                <a class="test" tabindex="-1" href="#">
                                    Financeiro
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu tweak2">
                                    <li><a tabindex="-1" href="<?php echo BASEURL; ?>bancos">Bancos</a></li>
                                    <li><a tabindex="-1" href="<?php echo BASEURL; ?>tipos_servicos">Tipos de serviços</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" type="button" data-toggle="dropdown">
                            Lançamentos
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo BASEURL; ?>contas_receber">Contas a receber</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="#" data-toggle="modal" data-target="#users" name="print_users" title="Relação de usuários">Relatório de usuários</a></li> -->
                    <!-- <li class="dropdown">
                        <a class="dropdown-toggle" type="button" data-toggle="dropdown">
                            Atalhos
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php //echo BASEURL; ?>associados">
                                    <img src="<?php //echo BASEURL; ?>media/icons/associados.png" title="Associados" style="width: 20%;"> Associados
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" type="button" data-toggle="dropdown">
                            Funções especiais
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                        <li class="dropdown-submenu">
                            <a class="test" tabindex="-1" href="#">
                                Sistema
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo BASEURL; ?>usuarios">Usuários</a></li>
                            </ul>
                        </li>
                        </ul>
                    </li>
                    <li><a href="<?php echo BASEURL; ?>home/logout" title="Sair do sistema"><span class="glyphicon glyphicon-off" /></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- MODAL IMPRIMIR HISTÓRICO LIGAÇÕES INICIO -->
    <div class="modal fade" id="users" tabindex="-1" role="dialog" aria-labelledby="users">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title text-left">Relatório de usuários cadastrados</h4>
                </div>
                <div class="modal-body">
                    <form method="GET" name="usersPrint" id="usersPrint" action="<?php echo BASEURL; ?>rel/users.php" target="_blank">
                        <div class="form-group col-sm-12">
                            <label for="bloqueado">Bloqueado:</label>
                            <input type="radio" name="bloqueado" value="S" /> Sim
                            <input type="radio" name="bloqueado" value="N" /> Não
                            <input type="radio" name="bloqueado" value="A" checked="checked" /> Todos
                        </div>
                        <hr />
                        <input type="submit" name="print_ligacoes_enter" id="print_ligacoes_enter" value="Gerar relatório" class="btn btn-primary"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
		<!-- MODAL IMPRIMIR HISTÓRICO LIGAÇÕES FIM -->
    <div class="container">
      <?php $this->loadViewer($viewName, $viewData_set); ?>
    </div>
  </body>
</html>
