<h3 style="background-color:#286090;color:#FFFFFF;padding:7px;">Cadastro de cidades</h3>
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
                                <p>Novo registro de Cidade</p>
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" class="form-control nome" style="text-transform:uppercase;" />
                                <label for="fk_est">Estado:</label>
                                <select name="fk_est" id="fk_est" class="form-control">
                                    <option value="NNN">Selecione</option>
                                    <?php foreach($estados as $est): ?>
                                      <option value="<?php echo $est['pk_est']; ?>">
                                        <?php echo $est['nome']; ?>
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
                <td class="header_treat" style="width:2%;">Estado:</td>
                <td class="header_treat">Nome:</td>
                <td class="header_treat" style="text-align:right;width:15%;">Opções</td>
            </thead>
            <tbody>
              <?php foreach($cidades as $cid): ?>
                <tr>
                    <td style="width:2%;text-align:center;"><?php echo $cid['nomeest']; ?></td>
                    <td><?php echo $cid['nome']; ?></td>
                    <td style="text-align:right">
                      <a href="#" data-toggle="modal" data-target="#editarRegistro<?php echo $cid['pk_cid']; ?>" title="Editar registro" style="text-decoration:none;color:green;cursor:pointer;"><span class="glyphicon glyphicon-edit"></span>Editar</a>&nbsp;
                      <a class="" title="Excluir registro" onclick="deletarRegistro(<?php echo $cid['pk_cid']; ?>)" style="text-decoration:none;color:red;cursor:pointer;"><span class="glyphicon glyphicon-remove"></span>Excluir</a>
                    </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
        <?php foreach($cidades as $cid): ?>
        <!-- MODAL EDITAR INICIO -->
        <div id="editarRegistro<?php echo $cid['pk_cid']; ?>" class="modal fade bd-example-modal-sm editarRegistro" role="dialog" aria-labelledby="EditarRegistro" data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="POST" id="registroEditar<?php echo $cid['pk_cid']; ?>">
                            <div class="form-group">
                                <p>Editar registro de Cidade</p>
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome_editar" class="form-control nome_editar" style="text-transform:uppercase;" value="<?php echo $cid['nome']; ?>" />
                                <label for="fk_est">Estado:</label>
                                <select name="fk_est_editar" id="fk_est_editar" class="form-control">
                                  <option value="NNN">Selecione</option>
                                  <?php foreach($estados as $est): ?>
                                    <option value="<?php echo $est['pk_est']; ?>" <?php echo $cid['fk_est'] == $est['pk_est']?'selected':''; ?>>
                                      <?php echo $est['nome']; ?>
                                    </option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="atualizarRegistro(<?php echo $cid['pk_cid']; ?>)">Atualizar</button>
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
        $('.nome').focus();
    }); 
    $('.editarRegistro').on('shown.bs.modal', function () {
        $('.nome_editar').focus();
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
    var nome = $('input[name="nome"]').val();
    var fk_est = document.getElementById("fk_est").value;

    if (nome == "" || typeof(nome) == "undefined") {
        $('input[name="nome"]').focus();
        swal("", "Campo NOME é obrigatório!", "error");
        return false;
    }

    if (fk_est == "NNN" || fk_est == "" || typeof(fk_est) == "undefined") {
        document.getElementById("fk_est").focus();
        swal("", "Campo ESTADO é obrigatório!", "error");
        return false;
    }

    let items = new URLSearchParams();
    items.append("nome", nome);
    items.append("fk_est", fk_est);

    axios({
        method: "POST",
        url: "cidades/novoRegistro",
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
  function atualizarRegistro(pk_cid){
    var nome = $("#registroEditar" + pk_cid).serializeArray()[0].value;
    var fk_est = $("#registroEditar" + pk_cid).serializeArray()[1].value;

    if (nome == "" || typeof(nome) == "undefined") {
        $('input[name="nome_editar"]').focus();
        swal("", "Campo NOME é obrigatório!", "error");
        return false;
    }

    if (fk_est == "NNN" || fk_est == "" || typeof(fk_est) == "undefined") {
        document.getElementById("fk_est_editar").focus();
        swal("", "Campo ESTADO é obrigatório!", "error");
        return false;
    }

    let items = new URLSearchParams();
    items.append("pk_cid", pk_cid);
    items.append("nome", nome);
    items.append("fk_est", fk_est);

    axios({
        method: "POST",
        url: "cidades/editarRegistro",
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
  function deletarRegistro(pk_cid){
    let items = new URLSearchParams();
    items.append("pk_cid", pk_cid);

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
                url: "cidades/deletarRegistro",
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
                    swal("", "Não é possível excluir este registro! Associados nesta cidade", "error");
                }
            });
        }
    });
  }
</script>
