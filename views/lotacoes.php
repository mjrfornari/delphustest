<h3 style="background-color:#286090;color:#FFFFFF;padding:7px;">Cadastro de lotações</h3>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-12" style="border:1px solid #000000;padding:10px;">
            <label for="">Parâmetros de pesquisa:</label>
            <p></p>
            <div class="col-sm-10">
            <div class="col-sm-12">
                <label for="">Por descrição:</label>
                <input type="text" id="por_descricao" class="date-range-filter" style="width:308px;text-transform:uppercase;">&nbsp;&nbsp;
                <label for="por_situacao">Situação:</label>
                <select name="por_situacao" id="por_situacao" class="date-range-filter" style="width: 16%;">
                    <option value="T">Todos</option>
                    <option value="Não">Ativos</option>
                    <option value="Sim">Inativos</option>
                </select>
            </div>
            </div>
            <div class="col-sm-2">
            <input type="button" id="processar" value="Processar" class="btn btn-warning" style="color: #000000;" />
            <br /><br />
            <input type="button" name="limpar" value="&nbsp;&nbsp;&nbsp;Limpar&nbsp;&nbsp;&nbsp;" onclick="limparTudo()" class="btn btn-default">
            </div>
        </div>
        <hr class="col-sm-12" />
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
                                <p>Novo registro de Lotação</p>
                                <label for="nome">Descrição:</label>
                                <input type="text" name="descricao" class="form-control descricao" style="text-transform:uppercase;" />
                                <label for="inativo">Inativo:</label>
                                <select name="inativo" id="inativo" class="form-control">
                                    <option value="NNN">Selecione</option>
                                    <option value="S">Sim</option>
                                    <option value="N">Não</option>
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
        <div class="tabelario" style="display:none;">
            <table id="tbItems" class="display" cellspacing="0" width="100%" style="display:none;">
                <thead>
                    <td class="header_treat" style="width:2%;">Código:</td>
                    <td class="header_treat">Lotação:</td>
                    <td class="header_treat" style="width:2%;">Inativo:</td>
                    <td class="header_treat" style="text-align:right;width:15%;">Opções</td>
                </thead>
                <tbody>
                    <?php foreach($lotacoes as $lot): ?>
                        <tr>
                            <td style="width:2%;text-align:center;"><?php echo $lot['pk_lot']; ?></td>
                            <td><?php echo $lot['descricao']; ?></td>
                            <?php if($lot['inativo'] == "S"): ?>
                                <td style="width:2%;text-align:center;background-color:red;color:white;">Sim</td>
                            <?php else: ?>
                                <td style="width:2%;text-align:center;">Não</td>
                            <?php endif; ?>
                            <td style="text-align:right">
                                <a href="#" data-toggle="modal" data-target="#editarRegistro<?php echo $lot['pk_lot']; ?>" title="Editar registro" style="text-decoration:none;color:green;cursor:pointer;"><span class="glyphicon glyphicon-edit"></span>Editar</a>&nbsp;
                                <a class="" title="Excluir registro" onclick="deletarRegistro(<?php echo $lot['pk_lot']; ?>)" style="text-decoration:none;color:red;cursor:pointer;"><span class="glyphicon glyphicon-remove"></span>Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php foreach($lotacoes as $lot): ?>
        <!-- MODAL EDITAR INICIO -->
        <div id="editarRegistro<?php echo $lot['pk_lot']; ?>" class="modal fade bd-example-modal-sm editarRegistro" role="dialog" aria-labelledby="EditarRegistro" data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="POST" id="registroEditar<?php echo $lot['pk_lot']; ?>">
                            <div class="form-group">
                                <p>Editar registro de Lotação</p>
                                <label for="nome">Descrição:</label>
                                <input type="text" name="descricao_editar" class="form-control descricao_editar" style="text-transform:uppercase;" value="<?php echo $lot['descricao']; ?>" />
                                <label for="inativo">Inativo:</label>
                                <select name="inativo_editar" id="inativo_editar" ref="inativo" class="form-control" required="required">
                                    <option value="NNN">Selecione</option>
                                    <option value="S" <?php echo $lot['inativo'] == "S" ? 'selected':''; ?>>Sim</option>
                                    <option value="N" <?php echo $lot['inativo'] == "N" ? 'selected':''; ?>>Não</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="atualizarRegistro(<?php echo $lot['pk_lot']; ?>)">Atualizar</button>
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
            $('.descricao').focus();
        }); 
        $('.editarRegistro').on('shown.bs.modal', function () {
            $('.descricao_editar').focus();
        });

        var url = window.location.href;
        url = url.split("/");
        
        let filtro = JSON.parse(sessionStorage.getItem('filtro'));

        if (filtro !== null) {
            if (filtro.tela === url[4]){
                $("#por_descricao").val(filtro.campos.por_descricao);
                $("#por_situacao").val(filtro.campos.por_situacao);
                $("#tbItems").css("display", "");
            } else {
                sessionStorage.removeItem('filtro'); 
            }
        }

        $("#tbItems").css("display", "");
        
        $("#processar").click();

        $("#processar").click(function(){
            let filtro = {
                campos:{
                    por_descricao:'',
                    por_situacao: ''
                },
                tela: ''
            };

            filtro.tela = url[4];

            filtro.campos.por_descricao = $("#por_descricao").val();
            filtro.campos.por_situacao = $("#por_situacao").val();
            
            sessionStorage.setItem('filtro', JSON.stringify(filtro));
            
            if($.fn.DataTable.isDataTable( '#tbItems' )){
            mostrarTabela();
            } else {
            $("#tbItems").DataTable().destroy();
            }
        });
    });

    function tableCreate(){
        $('#tbItems').DataTable({
            "paging": true,
            "pageLength": 10,
            "info": true,
            "searching": true,
            "stateSave": true,
            "sDom": "ltipr",
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

    function mostrarTabela(){
        $(".tabelario").css("display", "");
    }

    //Limpar tela
    function limparTudo(){
        sessionStorage.removeItem('filtro');
        location.reload();
    }

    //BUSCA POR NOME
    $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var por_descricao = $('#por_descricao').val().toUpperCase();
        var campo = data[1] || 0; // coluna que será filtrada

        if ((por_descricao == "") || (campo.includes(por_descricao)))
        {
            return true;
        }
        return false;
        }
    );

    $(document).ready(function() {
        var tabela = $('#tbItems').DataTable();

        // Evento click que aciona o filtro
        $("#processar").click(function() {
            tabela.draw();
        });
    });

    //BUSCA POR SITUAÇÃO
    $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var situacao = $('#por_situacao').val();
        var campo = data[2] || 0; // use data for the age column
        
        if ((situacao == "T") || (campo == situacao))
        {
            return true;
        }
        return false;
        }
    );

    $(document).ready(function() {
        var table = $('#tbItems').DataTable();

        // Event listener to the two range filtering inputs to redraw on input
        $("#processar").click(function() {
            table.draw();
        } );
    });

    //SALVAR REGISTRO
    function salvarRegistro(){
        var descricao = $('input[name="descricao"]').val();
        var inativo = document.getElementById("inativo").value;

        if (descricao == "" || typeof(descricao) == "undefined") {
            $('input[name="descricao"]').focus();
            swal("", "Campo DESCRIÇÃO é obrigatório!", "error");
            return false;
        }

        if (inativo == "NNN" || inativo == "" || typeof(inativo) == "undefined") {
            document.getElementById("inativo").focus();
            swal("", "Campo INATIVO é obrigatório!", "error");
            return false;
        }

        let items = new URLSearchParams();
        items.append("descricao", descricao);
        items.append("inativo", inativo);

        axios({
            method: "POST",
            url: "lotacoes/novoRegistro",
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
    function atualizarRegistro(pk_lot){
        var descricao = $("#registroEditar" + pk_lot).serializeArray()[0].value;
        var inativo = $("#registroEditar" + pk_lot).serializeArray()[1].value;
        
        if (descricao == "" || typeof(descricao) == "undefined") {
            $('input[name="descricao_editar"]').focus();
            swal("", "Campo DESCRIÇÃO é obrigatório!", "error");
            return false;
        }

        if (inativo == "NNN" || inativo == "" || typeof(inativo) == "undefined") {
            document.getElementById("inativo_editar").focus();
            swal("", "Campo INATIVO é obrigatório!", "error");
            return false;
        }
        
        let items = new URLSearchParams();
        items.append("pk_lot", pk_lot);
        items.append("descricao", descricao);
        items.append("inativo", inativo);

        axios({
            method: "POST",
            url: "lotacoes/editarRegistro",
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
    function deletarRegistro(pk_lot){
        let items = new URLSearchParams();
        items.append("pk_lot", pk_lot);

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
                    url: "lotacoes/deletarRegistro",
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
                        swal("", "Não é possível excluir este registro! Associados com esta lotação.", "error");
                    }
                });
            }
        });
    }

</script>