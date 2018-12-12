<h3 style="background-color:#286090;color:#FFFFFF;padding:7px;">Cadastro de estados</h3>
<div class="row">
    <div class="col-sm-12">
      <button href="#" data-toggle="modal" data-target="#novoRegistro" class="btn btn-primary" title="Novo registro">
        <span class="glyphicon glyphicon-tag"></span>
        Novo registro
      </button>
      <p></p>
      <!-- MODAL NOVO INICIO -->
      <div id="novoRegistro" class="modal fade bd-example-modal-sm" id="new" tabindex="-1" role="dialog" aria-labelledby="NovoRegistro" data-backdrop="static">
          <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                  <div class="modal-body">
                      <form method="POST">
                          <div class="form-group">
                              <p>Novo registro de Estado</p>
                              <label for="sigla">Sigla:</label>
                              <input type="text" name="sigla" class="form-control sigla" maxlength="2" style="text-transform:uppercase;width:50px;" />
                              <label for="nome">Nome:</label>
                              <input type="text" name="nome" class="form-control" style="text-transform:uppercase;" />
                              <label for="fk_pai">País:</label>
                              <select name="fk_pai" id="fk_pai" class="form-control">
                                  <option value="NNN">Selecione</option>
                                  <?php foreach($paises as $pai): ?>
                                    <option value="<?php echo $pai['pk_pai']; ?>">
                                      <?php echo $pai['nome']; ?>
                                    </option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <button type="button" class="btn btn-primary" onclick="salvarRegistro()">Salvar</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <!-- MODAL NOVO FIM -->
      <table id="tbItems" class="display" cellspacing="0" width="100%">
        <thead>
            <td class="header_treat" style="width:2%;">Sigla:</td>
            <td class="header_treat">Nome:</td>
            <td class="header_treat" style="text-align:right;width:15%;">Opções</td>
        </thead>
        <tbody>
          <?php foreach($estados as $est): ?>
            <tr>
                <td style="width:2%;text-align:center;"><?php echo $est['sigla']; ?></td>
                <td><?php echo $est['nome']; ?></td>
                <td style="text-align:right">
                  <a href="#" data-toggle="modal" data-target="#editarRegistro<?php echo $est['pk_est']; ?>" title="Editar registro" style="text-decoration:none;color:green;cursor:pointer;"><span class="glyphicon glyphicon-edit"></span>Editar</a>&nbsp;
                  <a class="" title="Excluir registro" onclick="deletarRegistro(<?php echo $est['pk_est']; ?>)" style="text-decoration:none;color:red;cursor:pointer;"><span class="glyphicon glyphicon-remove"></span>Excluir</a>
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
    <?php foreach($estados as $est): ?>
    <!-- MODAL EDITAR INICIO -->
    <div id="editarRegistro<?php echo $est['pk_est']; ?>" class="modal fade bd-example-modal-sm editarRegistro" role="dialog" aria-labelledby="EditarRegistro" data-backdrop="static">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" id="registroEditar<?php echo $est['pk_est']; ?>">
                        <div class="form-group">
                            <p>Editar registro de Estado</p>
                            <label for="sigla">Sigla:</label>
                            <input type="text" name="sigla_editar" class="form-control sigla_editar" maxlength="2" style="text-transform:uppercase;width:50px;" value="<?php echo $est['sigla']; ?>" />
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome_editar" class="form-control" style="text-transform:uppercase;" value="<?php echo $est['nome']; ?>" />
                            <label for="fk_pai">País:</label>
                            <select name="fk_pai_editar" id="fk_pai_editar" class="form-control">
                              <option value="NNN">Selecione</option>
                              <?php foreach($paises as $pai): ?>
                                <option value="<?php echo $pai['pk_pai']; ?>" <?php echo $est['fk_pai'] == $pai['pk_pai']?'selected':''; ?>>
                                  <?php echo $pai['nome']; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="atualizarRegistro(<?php echo $est['pk_est']; ?>)">Atualizar</button>
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
<script type="text/javascript">
  $(document).ready(function() {
    tableCreate();
    $('#novoRegistro').on('shown.bs.modal', function () {
        $('.sigla').focus();
    }); 
    $('.editarRegistro').on('shown.bs.modal', function () {
        $('.sigla_editar').focus();
    });
  });

  function tableCreate(){
    $('#tbItems').DataTable({
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
    $('#tbItems')
    .removeClass( 'display' )
    .addClass('table table-striped table-bordered');
  }

  //NOVO REGISTRO
  function salvarRegistro(){
    var sigla = $('input[name="sigla"]').val();
    var nome = $('input[name="nome"]').val();
    var fk_pai = document.getElementById("fk_pai").value;

    if (sigla == "" || typeof(sigla) == "undefined") {
        $('input[name="sigla"]').focus();
        swal("", "Campo SIGLA é obrigatório!", "error");
        return false;
    }

    if (nome == "" || typeof(nome) == "undefined") {
        $('input[name="nome"]').focus();
        swal("", "Campo NOME é obrigatório!", "error");
        return false;
    }

    if (fk_pai == "NNN" || fk_pai == "" || typeof(fk_pai) == "undefined") {
        document.getElementById("fk_pai").focus();
        swal("", "Campo PAÍS é obrigatório!", "error");
        return false;
    }

    let items = new URLSearchParams();
    items.append("sigla", sigla);
    items.append("nome", nome);
    items.append("fk_pai", fk_pai);

    axios({
        method: "POST",
        url: "estados/novoRegistro",
        data: items
    }).then(res => {
        var data_return = res.data;
        console.log(res);
        if (data_return == "SUCCESS") {
            $("#novoRegistro").modal("hide");
            swal({
                title: "",
                text: "Registro inserido com sucesso!",
                type: "success"
            }).then(function(){
                location.reload();
            });
        } else {
            swal("", "Este registro já existe no sistema!", "error");
            return false;
        }
    }).catch(function(error){
        console.log(error);
    });
  }

  //ATUALIZAR REGISTRO
  function atualizarRegistro(pk_est){
    var sigla = $("#registroEditar" + pk_est).serializeArray()[0].value;
    var nome = $("#registroEditar" + pk_est).serializeArray()[1].value;
    var fk_pai = $("#registroEditar" + pk_est).serializeArray()[2].value;

    if (sigla == "" || typeof(sigla) == "undefined") {
        $('input[name="sigla_editar"]').focus();
        swal("", "Campo SIGLA é obrigatório!", "error");
        return false;
    }

    if (nome == "" || typeof(nome) == "undefined") {
        $('input[name="nome_editar"]').focus();
        swal("", "Campo NOME é obrigatório!", "error");
        return false;
    }

    if (fk_pai == "NNN" || fk_pai == "" || typeof(fk_pai) == "undefined") {
        document.getElementById("fk_pai_editar").focus();
        swal("", "Campo PAÍS é obrigatório!", "error");
        return false;
    }

    let items = new URLSearchParams();
    items.append("pk_est", pk_est);
    items.append("sigla", sigla);
    items.append("nome", nome);
    items.append("fk_pai", fk_pai);

    axios({
        method: "POST",
        url: "estados/editarRegistro",
        data: items
    }).then(res =>{
        var data_return = res.data;
        console.log(res);
        if (data_return == "SUCCESS") {
            $(".editarRegistro").modal("hide");
            swal({
                title: "",
                text: "Registro editado com sucesso!",
                type: "success"
            }).then(function(){
                location.reload();
            });
        } else {
            swal("", "Este registro já existe no sistema!", "error");
            return false;
        }
    }).catch(function(error){
        console.log(error);
    });

  }

  //DELETAR REGISTRO
  function deletarRegistro(pk_est){
    let items = new URLSearchParams();
    items.append("pk_est", pk_est);

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
                url: "estados/deletarRegistro",
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
