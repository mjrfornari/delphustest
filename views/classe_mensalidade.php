<h3 style="background-color:#286090;color:#FFFFFF;padding:7px;">Cadastro de classes de mensalidade</h3>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-12" style="border:1px solid #000000;padding:10px;">
            <label for="">Parâmetros de pesquisa:</label>
            <p></p>
            <div class="col-sm-10">
            <div class="col-sm-5">
                <label for="">Por descrição:</label>
                <input type="text" id="por_descricao" class="date-range-filter" style="width:308px;text-transform:uppercase;">
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
        <div id="novoRegistro" class="modal fade bd-example-modal-sm" id="new" tabindex="-1" role="dialog" aria-labelledby="NovoRegistro" data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group">
                                <p>Novo registro de Classe de mensalidade</p>
                                <label for="descricao">Descrição:</label>
                                <input type="text" name="descricao" class="form-control descricao" style="text-transform:uppercase;" />
                                <label for="valor_mensalidade">Valor:</label>
                                <input type="text" name="valor_mensalidade" class="form-control" style="text-transform:uppercase;" onkeypress="return SomenteValor(this, event)" maxlength="10" />
                            </div>
                            <button type="button" class="btn btn-primary" onclick="salvarRegistro()">Salvar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL NOVO FIM -->
    </div>
    <p></p>
        <div class="tabelario" style="display:none;">
            <table id="tbItems" class="display" cellspacing="0" width="100%" style="display:none;">
                <thead>
                    <td class="header_treat" style="width:2%;">Código:</td>
                    <td class="header_treat">Descrição:</td>
                    <td class="header_treat">Valor:</td>
                    <td class="header_treat" style="text-align:right;width:15%;">Opções</td>
                </thead>
                <tbody>
                    <?php foreach($classe_mensalidade as $cme): ?>
                        <tr>
                            <td style="width:2%;text-align:center;"><?php echo $cme['pk_cme']; ?></td>
                            <td><?php echo $cme['descricao']; ?></td>
                            <td><?php echo "R$" . number_format($cme['valor_mensalidade'], 2, ",", "."); ?></td>
                            <td style="text-align:right">
                                <a href="#" data-toggle="modal" data-target="#editarRegistro<?php echo $cme['pk_cme']; ?>" title="Editar registro" style="text-decoration:none;color:green;cursor:pointer;"><span class="glyphicon glyphicon-edit"></span>Editar</a>&nbsp;
                                <a class="" title="Excluir registro" onclick="deletarRegistro(<?php echo $cme['pk_cme']; ?>)" style="text-decoration:none;color:red;cursor:pointer;"><span class="glyphicon glyphicon-remove"></span>Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php foreach($classe_mensalidade as $cme): ?>
        <!-- MODAL EDITAR INICIO -->
        <div id="editarRegistro<?php echo $cme['pk_cme']; ?>" class="modal fade bd-example-modal-sm editarRegistro" role="dialog" aria-labelledby="EditarRegistro" data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="POST" id="registroEditar<?php echo $cme['pk_cme']; ?>">
                            <div class="form-group">
                                <p>Editar registro de Classe de mensalidade</p>
                                <label for="descricao">Descrição:</label>
                                <input type="text" name="descricao_editar" class="form-control descricao_editar" style="text-transform:uppercase;" value="<?php echo $cme['descricao']; ?>" />
                                <label for="valor_mensalidade">Valor:</label>
                                <input type="text" name="valor_mensalidade_editar" class="form-control" style="text-transform:uppercase;" onkeypress="return SomenteValor(this, event)" maxlength="10" value="<?php echo str_replace(".", ",", $cme['valor_mensalidade']); ?>" />
                            </div>
                            <button type="button" class="btn btn-primary" onclick="atualizarRegistro(<?php echo $cme['pk_cme']; ?>)">Atualizar</button>
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
                    por_descricao:''
                },
                tela: ''
            };

            filtro.tela = url[4];

            filtro.campos.por_descricao = $("#por_descricao").val();
            
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

    //SALVAR REGISTRO
    function salvarRegistro(){
        var descricao = $('input[name="descricao"]').val();
        var valor_mensalidade = $('input[name="valor_mensalidade"]').val();

        if (descricao == "" || typeof(descricao) == "undefined") {
            $('input[name="descricao"]').focus();
            swal("", "Campo DESCRIÇÃO é obrigatório!", "error");
            return false;
        }

        if (valor_mensalidade == "" || typeof(valor_mensalidade) == "undefined") {
            $('input[name="valor_mensalidade"]').focus();
            swal("", "Campo VALOR é obrigatório!", "error");
            return false;
        }

        let items = new URLSearchParams();
        items.append("descricao", descricao);
        items.append("valor_mensalidade", valor_mensalidade);

        axios({
            method: "POST",
            url: "classe_mensalidade/novoRegistro",
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
    function atualizarRegistro(pk_cme){
        var descricao = $("#registroEditar" + pk_cme).serializeArray()[0].value;
        var valor_mensalidade = $("#registroEditar" + pk_cme).serializeArray()[1].value;
        
        if (descricao == "" || typeof(descricao) == "undefined") {
            $('input[name="descricao_editar"]').focus();
            swal("", "Campo DESCRIÇÃO é obrigatório!", "error");
            return false;
        }

        if (valor_mensalidade == "" || typeof(valor_mensalidade) == "undefined") {
            $('input[name="valor_mensalidade_editar"]').focus();
            swal("", "Campo VALOR é obrigatório!", "error");
            return false;
        }
        
        let items = new URLSearchParams();
        items.append("pk_cme", pk_cme);
        items.append("descricao", descricao);
        items.append("valor_mensalidade", valor_mensalidade);
        
        axios({
            method: "POST",
            url: "classe_mensalidade/editarRegistro",
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
    function deletarRegistro(pk_cme){
        let items = new URLSearchParams();
        items.append("pk_cme", pk_cme);

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
                    url: "classe_mensalidade/deletarRegistro",
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
                        swal("", "Não é possível excluir este registro! Associados com esta mensalidade.", "error");
                    }
                });
            }
        });
    }
</script>