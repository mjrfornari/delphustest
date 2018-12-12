<h3 style="background-color:#286090;color:#FFFFFF;padding:7px;">Cadastro de países</h3>
<div class="row">
    <div class="col-sm-12">
      <button href="#" data-toggle="modal" data-target="#novoRegistro" class="btn btn-primary" title="Novo registro">
        <span class="glyphicon glyphicon-tag"></span>
        Novo registro
      </button>
      <p></p>
      <!-- MODAL NOVO INICIO -->
      <div id="novoRegistro" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="NovoRegistro" data-backdrop="static">
          <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                  <div class="modal-body">
                      <form method="POST">
                          <div class="form-group">
                              <p>Novo registro de Pais</p>
                              <label for="nome">Nome:</label>
                              <input type="text" name="nome" class="form-control nome" style="text-transform:uppercase;" />
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
                <td class="header_treat" style="width:2%;">Código:</td>
                <td class="header_treat">Nome:</td>
                <td class="header_treat" style="text-align:right;width:15%;">Opções</td>
            </thead>
            <tbody>
              <?php foreach($paises as $pai): ?>
                <tr>
                    <td style="width:2%;text-align:center;"><?php echo $pai['pk_pai']; ?></td>
                    <td><?php echo $pai['nome']; ?></td>
                    <td style="text-align:right">
                        <a href="#" data-toggle="modal" data-target="#editarRegistro<?php echo $pai['pk_pai']; ?>" title="Editar registro" style="text-decoration:none;color:green;cursor:pointer;"><span class="glyphicon glyphicon-edit"></span>Editar</a>&nbsp;
	                    <a class="" title="Excluir registro" onclick="deletarRegistro(<?php echo $pai['pk_pai']; ?>)" style="text-decoration:none;color:red;cursor:pointer;"><span class="glyphicon glyphicon-remove"></span>Excluir</a>
                    </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
        <?php foreach($paises as $pai): ?>
        <!-- MODAL EDITAR INICIO -->
        <div id="editarRegistro<?php echo $pai['pk_pai']; ?>" class="modal fade bd-example-modal-sm editarRegistro" role="dialog" aria-labelledby="EditarRegistro" data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="POST" id="registroEditar<?php echo $pai['pk_pai']; ?>">
                            <div class="form-group">
                                <p>Editar registro de Pais</p>
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome_editar" class="form-control nome_editar" style="text-transform:uppercase;" value="<?php echo $pai['nome']; ?>" />
                            </div>
                            <button type="button" class="btn btn-primary" onclick="atualizarRegistro(<?php echo $pai['pk_pai']; ?>)">Atualizar</button>
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

  //SALVAR REGISTRO
  function salvarRegistro(){
    var nome = $('input[name="nome"]').val();

    if (nome == "" || typeof(nome) == "undefined") {
        $('input[name="nome"]').focus();
        swal("", "Campo nome é obrigatório!", "error");
        return false;
    }

    let items = new URLSearchParams();
    items.append("nome", nome);

    axios({
        method: "POST",
        url: "paises/novoRegistro",
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

  //EDITAR REGISTRO
  function atualizarRegistro(pk_pai){
    var nome = $("#registroEditar" + pk_pai).serializeArray()[0].value;

    if (nome == "" || typeof(nome) == "undefined") {
        $('input[name="nome_editar"]').focus();
        swal("", "Campo nome é obrigatório!", "error");
        return false;
    }

    let items = new URLSearchParams();
    items.append("pk_pai", pk_pai);
    items.append("nome", nome);

    axios({
        method: "POST",
        url: "paises/editarRegistro",
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
  function deletarRegistro(pk_pai){
    let items = new URLSearchParams();
    items.append("pk_pai", pk_pai);

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
                url: "paises/deletarRegistro",
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
