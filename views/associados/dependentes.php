<h3 style="background-color:#286090;color:#FFFFFF;padding:7px;">Cadastro de dependentes</h3>
<?php if(count($dependentes) > 0): ?>
    <div class="row">
        <div class="col-sm-12">
          <?php foreach($associado as $ass): ?>
            <h4>Associado: <strong><?php echo $ass['nome']; ?></strong></h4>
          <?php endforeach; ?>
          <a href="#" data-toggle="modal" data-target="#novoRegistro" class="btn btn-primary" title="Novo registro">
            <span class="glyphicon glyphicon-tag"></span>
            Novo resgistro
          </a>
          <a href="<?php echo BASEURL; ?>associados" class="btn btn-default">Voltar</a>
        <p></p>
        <table id="tbRegistros" class="display" cellspacing="0" width="100%">
            <thead>
                <td class="header_treat" style="width:5%;">Código:</td>
                <td class="header_treat">Nome:</td>
                <td class="header_treat">Aniversário:</td>
                <td class="header_treat">Cód. Unimed:</td>
                <td class="header_treat">Cart. Unimed:</td>
                <td class="header_treat" style="text-align:right;width:15%;">Opções</td>
            </thead>
            <tbody>
                <?php foreach($dependentes as $dep): ?>
                <?php
                    $date_set = date_create($dep['data_nasc']);
                    $data_act = date_format($date_set, 'd-m-Y');
                ?>
                <tr>
                    <td style="width:1%;text-align:center;"><?php echo $dep['pk_dep']; ?></td>
                    <td style="width:50%;text-align:left;"><?php echo $dep['nome']; ?></td>
                    <td style="width:9%;text-align:center;"><?php echo implode('/', explode('-', $data_act)); ?></td>
                    <td style="width:5%;text-align:center;"><?php echo $dep['codigo_unimed']; ?></td>
                    <td style="width:5%;text-align:center;"><?php echo $dep['carteira_unimed']; ?></td>
                    <td style="text-align:right">
                      <a href="#" data-toggle="modal" data-target="#editRegistro<?php echo $dep['pk_dep']; ?>" title="Editar registro" style="text-decoration:none;color:green;cursor:pointer;"><span class="glyphicon glyphicon-edit"></span>Editar</a>&nbsp;
	                    <a class="" title="Excluir registro" onclick="delRegistro(<?php echo $dep['pk_dep']; ?>)" style="text-decoration:none;color:red;cursor:pointer;"><span class="glyphicon glyphicon-remove"></span>Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php foreach($dependentes as $dep): ?>
        <!-- MODAL EDITAR INICIO -->
        <div id="editRegistro<?php echo $dep['pk_dep']; ?>" class="modal fade editarRegistro" tabindex="-1" role="dialog" aria-labelledby="NovoRegistro" data-backdrop="static">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-body">
                      <form method="POST" name="atualizarRegistro<?php echo $dep['pk_dep']; ?>" onsubmit="return submitLock()">
                          <div class="form-group">
                              <p>Novo registro de dependente</p>
                              <label for="nome">Nome:</label>
                              <input type="text" name="nome_edit" class="form-control nome_edit" style="text-transform:uppercase;" value="<?php echo $dep['nome']; ?>" />
                              <label for="data_nasc">Data nascimento:</label>
                              <input type="date" name="data_nasc_edit" class="form-control" style="text-transform:uppercase;" value="<?php echo $dep['data_nasc']; ?>" />
                              <label for="codigo_unimed">Cód. Unimed:</label>
                              <input type="text" name="codigo_unimed_edit" class="form-control" style="text-transform:uppercase;" value="<?php echo $dep['codigo_unimed']; ?>" />
                              <label for="carteira_unimed">Cart. Unimed:</label>
                              <input type="text" name="carteira_unimed_edit" class="form-control" style="text-transform:uppercase;" value="<?php echo $dep['carteira_unimed']; ?>" />
                              <label for="observacoes">Observações:</label>
                              <input type="text" name="observacoes_edit" class="form-control" style="text-transform:uppercase;" value="<?php echo $dep['observacoes']; ?>" />
                              <label for="fk_tde">Tipo de dependente:</label>
                              <select name="fk_tde_edit" id="fk_tde_edit" class="form-control" required="required" style="width: 50%;">
                                <option value="NNN">Selecione</option>
                                <?php foreach($tipos_dependentes as $tdes): ?>
                                  <option value="<?php echo $tdes['pk_tde']; ?>" <?php echo $dep['fk_tde'] == $tdes['pk_tde']?'selected':''; ?>>
                                      <?php echo $tdes['descricao']; ?>
                                  </option>
                                <?php endforeach; ?>
                              </select>
                          </div>
                          <button type="button" class="btn btn-success" onclick="editarRegistro(<?php echo $_GET['id']; ?>, <?php echo $dep['pk_dep']; ?>)">Salvar</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      </form>
                  </div>
              </div>
          </div>
        </div>
        <!-- MODAL EDITAR FIM -->
        <?php endforeach; ?>
      </div>
    </div>
    <hr />
<?php else: ?>
  <?php foreach($associado as $ass): ?>
    <h4>Associado <strong><?php echo $ass['nome']; ?></strong> não tem depententes!</h4>
  <?php endforeach; ?>
  <a href="#" data-toggle="modal" data-target="#novoRegistro" class="btn btn-primary" title="Novo registro">
    <span class="glyphicon glyphicon-tag"></span>
    Novo resgistro
  </a>
  <a href="<?php echo BASEURL; ?>associados" class="btn btn-default">Voltar</a>
<?php endif; ?>
<!-- MODAL NOVO INICIO -->
<div id="novoRegistro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="NovoRegistro" data-backdrop="static">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-body">
              <form method="POST" name="salvarRegistro" onsubmit="return submitLock()">
                  <div class="form-group">
                      <p>Novo registro de dependente</p>
                      <label for="nome">Nome:</label>
                      <input type="text" name="nome" class="form-control nome" style="text-transform:uppercase;" />
                      <label for="data_nasc">Data nascimento:</label>
                      <input type="date" name="data_nasc" class="form-control" style="text-transform:uppercase;" />
                      <label for="codigo_unimed">Cód. Unimed:</label>
                      <input type="text" name="codigo_unimed" class="form-control" style="text-transform:uppercase;" />
                      <label for="carteira_unimed">Cart. Unimed:</label>
                      <input type="text" name="carteira_unimed" class="form-control" style="text-transform:uppercase;" />
                      <label for="observacoes">Observações:</label>
                      <input type="text" name="observacoes" class="form-control" style="text-transform:uppercase;" />
                      <label for="fk_tde">Tipo de dependente:</label>
                      <select name="fk_tde" id="fk_tde" class="form-control" required="required" style="width: 50%;">
                        <option value="NNN">Selecione</option>
                        <?php foreach($tipos_dependentes as $tdes): ?>
                          <option value="<?php echo $tdes['pk_tde']; ?>">
                              <?php echo $tdes['descricao']; ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                  </div>
                  <button type="button" class="btn btn-success" onclick="inserirRegistro(<?php echo $_GET['id']; ?>)">Salvar</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              </form>
          </div>
      </div>
  </div>
</div>
<!-- MODAL NOVO FIM -->
<script type="text/javascript">
  $("#tbRegistros").DataTable({
      "paging": true,
      "pageLength": 10,
      "info": true,
      "searching": true,
      "stateSave": true,
      "language": {
          "lengthMenu": "Mostrando _MENU_ registros por página",
          "zeroRecords": "Nada encontrado",
          "info": "Mostrando página _PAGE_ de _PAGES_",
          "infoEmpty": "Nenhum registro disponível",
          "infoFiltered": "(filtrado de _MAX_ registros no total)"
      }
  });
  $('#tbRegistros')
  .removeClass( 'display' )
  .addClass('table table-striped table-bordered');

  $(document).ready(function(){
    $('#novoRegistro').on('shown.bs.modal', function () {
        $('.nome').focus();
    }); 
    $('.editarRegistro').on('shown.bs.modal', function () {
        $('.nome_edit').focus();
    });
  });

  function inserirRegistro(fk_ass){
    var fk_ass = fk_ass;
    var nome            = document.forms["salvarRegistro"]["nome"].value;
    var data_nasc       = document.forms["salvarRegistro"]["data_nasc"].value;
    var codigo_unimed   = document.forms["salvarRegistro"]["codigo_unimed"].value;
    var carteira_unimed = document.forms["salvarRegistro"]["carteira_unimed"].value;
    var observacoes     = document.forms["salvarRegistro"]["observacoes"].value;
    var fk_tde          = document.forms["salvarRegistro"]["fk_tde"].value;

    if (nome == "" || typeof(nome) == "undefined") {
        $('input[name="nome"]').focus();
        swal("", "Campo NOME é obrigatório!", "error");
        return false;
    }

    if (data_nasc == "" || typeof(data_nasc) == "undefined") {
        $('input[name="data_nasc"]').focus();
        swal("", "Campo DATA NASCIMENTO é obrigatório!", "error");
        return false;
    }

    if (fk_tde == "NNN" || fk_tde == "" || typeof(fk_tde) == "undefined") {
        document.getElementById("fk_tde").focus();
        swal("", "Campo TIPO DE DEPENDENTE é obrigatório!", "error");
        return false;
    }

    let items = new URLSearchParams();
    items.append("fk_ass", fk_ass);
    items.append("nome", nome);
    items.append("data_nasc", data_nasc);
    items.append("codigo_unimed", codigo_unimed);
    items.append("carteira_unimed", carteira_unimed);
    items.append("observacoes", observacoes);
    items.append("fk_tde", fk_tde);

    axios({
        method: "POST",
         url: "/apergsweb/associados/inserirRegistroDependente",
        //url: "https://danerscode.com/associados/inserirRegistroDependente",
        data: items
    }).then(res => {
        var data_return = res.data;
        console.log(res);
        if (data_return == "SUCCESS") {
          swal({
              title: "",
              text: "Registro inserido com sucesso!",
              type: "success"
          }).then(function(){
              location.reload();
          });
        } else {
            swal("", "Este associado já existe no sistema!", "error");
        }
    }).catch(function(error){
        console.log(error);
    });
  }

  function editarRegistro(fk_ass, pk_dep){
    var pk_dep = pk_dep;
    var fk_ass = fk_ass;
    var nome            = document.forms["atualizarRegistro" + pk_dep]["nome_edit"].value;
    var data_nasc       = document.forms["atualizarRegistro" + pk_dep]["data_nasc_edit"].value;
    var codigo_unimed   = document.forms["atualizarRegistro" + pk_dep]["codigo_unimed_edit"].value;
    var carteira_unimed = document.forms["atualizarRegistro" + pk_dep]["carteira_unimed_edit"].value;
    var observacoes     = document.forms["atualizarRegistro" + pk_dep]["observacoes_edit"].value;
    var fk_tde          = document.forms["atualizarRegistro" + pk_dep]["fk_tde_edit"].value;

    if (nome == "" || typeof(nome) == "undefined") {
        $('input[name="nome_edit"]').focus();
        swal("", "Campo NOME é obrigatório!", "error");
        return false;
    }

    if (data_nasc == "" || typeof(data_nasc) == "undefined") {
        $('input[name="data_nasc_edit"]').focus();
        swal("", "Campo DATA NASCIMENTO é obrigatório!", "error");
        return false;
    }

    if (fk_tde == "NNN" || fk_tde == "" || typeof(fk_tde) == "undefined") {
        document.getElementById("fk_tde_edit").focus();
        swal("", "Campo TIPO DE DEPENDENTE é obrigatório!", "error");
        return false;
    }

    let items = new URLSearchParams();
    items.append("pk_dep", pk_dep);
    items.append("fk_ass", fk_ass);
    items.append("nome", nome);
    items.append("data_nasc", data_nasc);
    items.append("codigo_unimed", codigo_unimed);
    items.append("carteira_unimed", carteira_unimed);
    items.append("observacoes", observacoes);
    items.append("fk_tde", fk_tde);

    axios({
        method: "POST",
         url: "/apergsweb/associados/editarRegistroDependente",
        //url: "https://danerscode.com/associados/editarRegistroDependente",
        data: items
    }).then(res => {
        var data_return = res.data;
        console.log(res);
        if (data_return == "SUCCESS") {
          swal({
              title: "",
              text: "Registro inserido com sucesso!",
              type: "success"
          }).then(function(){
              location.reload();
          });
        } else {
            swal("", "Este associado já existe no sistema!", "error");
        }
    }).catch(function(error){
        console.log(error);
    });

  }

  function delRegistro(pk_dep){
    let items = new URLSearchParams();
    items.append("pk_dep", pk_dep);

    swal({
        text: "Tem certeza que deseja deletar este registro?",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Cancelar!",
        confirmButtonColor: '#FF0000',
        confirmButtonText: 'Sim, excluir!'
    }).then((result) => {
        if (result.value) {
            axios({
                method: "POST",
                url: "/apergsweb/associados/delRegistroDependente",
                //url: "https://danerscode.com/associados/delRegistroDependente",
                data: items
            }).then(res => {
                var data_return = res.data;
                console.log(res);
                if (data_return == "SUCCESS") {
                    swal({
                        title: "",
                        text: "Registro deletado com sucesso!",
                        type: "success"
                    }).then(function(){
                        location.reload();
                    });
                } else {
                    swal("", "Não é possível excluir este registro!", "error");
                }
            });
        }
    });
  }

</script>
