<h3 style="background-color:#286090;color:#FFFFFF;padding:7px;">Cadastro de celulares</h3>
<?php if(count($celulares) > 0): ?>
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
                <td class="header_treat">Número:</td>
                <td class="header_treat">Operadora:</td>
                <td class="header_treat">Inativo:</td>
                <td class="header_treat" style="text-align:right;width:15%;">Opções</td>
            </thead>
            <tbody>
                <?php foreach($celulares as $cel): ?>
                <tr>
                    <td style="width:10%;text-align:left;"><?php echo $cel['numero']; ?></td>
                    <?php if($cel['operadora'] == "O"): ?>
                      <td style="width:5%;text-align:center;">Oi</td>
                    <?php elseif($cel['operadora'] == "T"): ?>
                      <td style="width:5%;text-align:center;">Tim</td>
                    <?php elseif($cel['operadora'] == "C"): ?>
                      <td style="width:5%;text-align:center;">Claro</td>
                    <?php else: ?>
                      <td style="width:5%;text-align:center;">Vivo</td>
                    <?php endif; ?>
                    <?php if($cel['inativo'] == "S"): ?>
                      <td style="width:5%;text-align:center;background-color:#e60000;color:white;">Sim</td>
                    <?php else: ?>
                      <td style="width:5%;text-align:center;">Não</td>
                    <?php endif; ?>
                    <td style="text-align:right; width:5%;">
                      <a href="#" data-toggle="modal" data-target="#editRegistro<?php echo $cel['pk_ace']; ?>" title="Editar registro" style="text-decoration:none;color:green;cursor:pointer;"><span class="glyphicon glyphicon-edit"></span>Editar</a>&nbsp;
	                    <a class="" title="Excluir registro" onclick="delRegistro(<?php echo $cel['pk_ace']; ?>)" style="text-decoration:none;color:red;cursor:pointer;"><span class="glyphicon glyphicon-remove"></span>Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php foreach($celulares as $cel): ?>
        <!-- MODAL EDITAR INICIO -->
        <div id="editRegistro<?php echo $cel['pk_ace']; ?>" class="modal fade bd-example-modal-sm editarRegistro" tabindex="-1" role="dialog" aria-labelledby="NovoRegistro" data-backdrop="static">
          <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                  <div class="modal-body">
                      <form method="POST" name="atualizarRegistro<?php echo $cel['pk_ace']; ?>" onsubmit="return submitLock()">
                          <div class="form-group">
                            <p>Novo registro de celular</p>
                            <label for="operadora">Operadora:</label>
                            <select name="operadora_edit" id="operadora_edit" class="form-control" style="width: 50%;">
                              <option value="N" <?php echo $cel['operadora'] == "N"?'selected':''; ?>>Selecione</option>
                              <option value="C" <?php echo $cel['operadora'] == "C"?'selected':''; ?>>Claro</option>
                              <option value="T" <?php echo $cel['operadora'] == "T"?'selected':''; ?>>Tim</option>
                              <option value="O" <?php echo $cel['operadora'] == "O"?'selected':''; ?>>Oi</option>
                              <option value="V" <?php echo $cel['operadora'] == "V"?'selected':''; ?>>Vivo</option>
                            </select>
                            <label for="numero">Número:</label>
                            <input type="text" name="numero_edit" class="form-control numero_edit" style="text-transform:uppercase;" onkeypress="return SomenteNumero(event)" maxlength="11" value="<?php echo $cel['numero']; ?>" />
                            <label for="observacao">Observação:</label>
                            <input type="text" name="observacao_edit" class="form-control" style="text-transform:uppercase;" value="<?php echo $cel['observacao']; ?>" />
                            <label for="inativo">Inativo:</label>
                            <select name="inativo_edit" class="form-control" style="width: 50%;">
                              <option value="P">Selecione</option>
                              <option value="S" <?php echo $cel['inativo'] == "S"?'selected':''; ?>>Sim</option>
                              <option value="N" <?php echo $cel['inativo'] == "N"?'selected':''; ?>>Não</option>
                            </select>
                          </div>
                          <button type="button" class="btn btn-success" onclick="editarRegistro(<?php echo $_GET['id']; ?>, <?php echo $cel['pk_ace']; ?>)">Salvar</button>
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
    <h4>Associado <strong><?php echo $ass['nome']; ?></strong> não tem celulares!</h4>
  <?php endforeach; ?>
  <a href="#" data-toggle="modal" data-target="#novoRegistro" class="btn btn-primary" title="Novo registro">
    <span class="glyphicon glyphicon-tag"></span>
    Novo resgistro
  </a>
  <a href="<?php echo BASEURL; ?>associados" class="btn btn-default">Voltar</a>
<?php endif; ?>
<!-- MODAL NOVO INICIO -->
<div id="novoRegistro" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="NovoRegistro" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-body">
              <form method="POST" name="salvarRegistro" onsubmit="return submitLock()">
                  <div class="form-group">
                      <p>Novo registro de celular</p>
                      <label for="operadora">Operadora:</label>
                      <select name="operadora" id="operadora" class="form-control" style="width: 50%;">
                        <option value="N">Selecione</option>
                        <option value="C">Claro</option>
                        <option value="T">Tim</option>
                        <option value="O">Oi</option>
                        <option value="V">Vivo</option>
                      </select>
                      <label for="numero">Número:</label>
                      <input type="text" name="numero" class="form-control numero" style="text-transform:uppercase;" onkeypress="return SomenteNumero(event)" maxlength="11" />
                      <label for="observacao">Observação:</label>
                      <input type="text" name="observacao" class="form-control" style="text-transform:uppercase;" />
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
        $('.numero').focus();
    }); 
    $('.editarRegistro').on('shown.bs.modal', function () {
        $('.numero_edit').focus();
    });
  });

  function inserirRegistro(fk_ass){
    var fk_ass     = fk_ass;
    var numero     = document.forms["salvarRegistro"]["numero"].value;
    var operadora  = document.forms["salvarRegistro"]["operadora"].value;
    var observacao = document.forms["salvarRegistro"]["observacao"].value;

    if (numero == "" || typeof(numero) == "undefined") {
        $('input[name="numero"]').focus();
        swal("", "Campo NÚMERO é obrigatório!", "error");
        return false;
    }

    if (operadora == "N" || operadora == "" || typeof(operadora) == "undefined") {
        document.getElementById("operadora").focus();
        swal("", "Campo OPERADORA é obrigatório!", "error");
        return false;
    }

    let items = new URLSearchParams();
    items.append("fk_ass", fk_ass);
    items.append("numero", numero);
    items.append("operadora", operadora);
    items.append("observacao", observacao);

    axios({
        method: "POST",
        url: "/apergsweb/associados/inserirRegistroCelular",
        // url: "https://danerscode.com/associados/inserirRegistroCelular",
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
            swal("", "Este número já existe no sistema!", "error");
        }
    }).catch(function(error){
        console.log(error);
    });
  }

  function editarRegistro(fk_ass, pk_ace){
    var pk_ace = pk_ace;
    var fk_ass = fk_ass;
    var numero     = document.forms["atualizarRegistro" + pk_ace]["numero_edit"].value;
    var operadora  = document.forms["atualizarRegistro" + pk_ace]["operadora_edit"].value;
    var observacao = document.forms["atualizarRegistro" + pk_ace]["observacao_edit"].value;
    var inativo    = document.forms["atualizarRegistro" + pk_ace]["inativo_edit"].value;

    if (numero == "" || typeof(numero) == "undefined") {
        $('input[name="numero_edit"]').focus();
        swal("", "Campo NÚMERO é obrigatório!", "error");
        return false;
    }

    if (operadora == "N" || operadora == "" || typeof(operadora) == "undefined") {
        document.getElementById("operadora").focus();
        swal("", "Campo OPERADORA é obrigatório!", "error");
        return false;
    }

    let items = new URLSearchParams();
    items.append("pk_ace", pk_ace);
    items.append("fk_ass", fk_ass);
    items.append("numero", numero);
    items.append("operadora", operadora);
    items.append("observacao", observacao);
    items.append("inativo", inativo);

    axios({
        method: "POST",
        url: "/apergsweb/associados/editarRegistroCelular",
        // url: "https://danerscode.com/associados/editarRegistroCelular",
        data: items
    }).then(res => {
        var data_return = res.data;
        console.log(res);
        if (data_return == "SUCCESS") {
          swal({
              title: "",
              text: "Registro editado com sucesso!",
              type: "success"
          }).then(function(){
              location.reload();
          });
        } else {
            swal("", "Este registro já existe no sistema!", "error");
        }
    }).catch(function(error){
        console.log(error);
    });

  }

  function delRegistro(pk_ace){
    let items = new URLSearchParams();
    items.append("pk_ace", pk_ace);

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
                url: "/apergsweb/associados/delRegistroCelular",
                // url: "https://danerscode.com/associados/delRegistroCelular",
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
