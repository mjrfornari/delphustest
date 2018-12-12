<h3 style="background-color:#286090;color:#FFFFFF;padding:7px;">Cadastro de usuários</h3>
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
                                <p>Novo registro de Usuário</p>
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" class="form-control nome" style="text-transform:uppercase;" />
                                <label for="login">Login:</label>
                                <input type="text" name="login" class="form-control" />
                                <label for="senha">Senha:</label>
                                <input type="password" name="senha" class="form-control" />
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
                <td class="header_treat" style="width:2%">Código:</td>
                <td class="header_treat">Nome:</td>
                <td class="header_treat">Login:</td>
                <td class="header_treat" style="width:2%">Bloqueado:</td>
                <td class="header_treat" style="text-align:right">Opções</td>
            </thead>
            <tbody>
                <?php foreach($usuarios as $usu): ?>
                    <tr>
                        <td style="width:2%;text-align:center;"><?php echo $usu['pk_usu']; ?></td>
                        <td><?php echo $usu['nome']; ?></td>
                        <td><?php echo $usu['login']; ?></td>
                        <?php if($usu['bloqueado'] == "S"): ?>
                            <td style="width:2%;text-align:center;background-color:red;color:white">Sim</td>
                        <?php else: ?>
                            <td style="width:2%;text-align:center;">Não</td>
                        <?php endif; ?>
                        <td style="text-align:right">
                            <a href="#" data-toggle="modal" data-target="#editarSenha<?php echo $usu['pk_usu']; ?>" title="Editar senha" style="text-decoration:none;color:blue;cursor:pointer;"><span class="glyphicon glyphicon-check"></span>Senha</a>&nbsp;
                            <a href="#" data-toggle="modal" data-target="#editarRegistro<?php echo $usu['pk_usu']; ?>" title="Editar registro" style="text-decoration:none;color:green;cursor:pointer;"><span class="glyphicon glyphicon-edit"></span>Editar</a>&nbsp;
	                        <a class="" title="Excluir registro" onclick="deletarRegistro(<?php echo $usu['pk_usu']; ?>)" style="text-decoration:none;color:red;cursor:pointer;"><span class="glyphicon glyphicon-remove"></span>Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php foreach($usuarios as $usu): ?>
        <!-- MODAL EDITAR INICIO -->
        <div id="editarRegistro<?php echo $usu['pk_usu']; ?>" class="modal fade bd-example-modal-sm editarRegistro" id="new" tabindex="-1" role="dialog" aria-labelledby="NovoRegistro" data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="POST" id="registroEditar<?php echo $usu['pk_usu']; ?>">
                            <div class="form-group">
                                <p>Editar registro de Usuário</p>
                                <label for="bloqueado">Bloqueado:</label>
                                <select name="bloqueado_editar" id="bloqueado_editar" class="form-control">
                                    <option value="NNN">Selecione</option>
                                    <option value="S" <?php echo $usu['bloqueado'] == "S" ? 'selected':''; ?>>Sim</option>
                                    <option value="N" <?php echo $usu['bloqueado'] == "N" ? 'selected':''; ?>>Não</option>
                                </select>
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome_editar" class="form-control nome_editar" style="text-transform:uppercase;" value="<?php echo $usu['nome']; ?>" />
                                <label for="login">Login:</label>
                                <input type="text" name="login_editar" class="form-control" value="<?php echo $usu['login']; ?>" />
                            </div>
                            <button type="button" class="btn btn-primary" onclick="atualizarRegistro(<?php echo $usu['pk_usu']; ?>)">Atualizar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL EDITAR FIM -->
        <!-- MODAL EDITAR SENHA INICIO -->
        <div id="editarSenha<?php echo $usu['pk_usu']; ?>" class="modal fade bd-example-modal-sm editarSenha" id="new" tabindex="-1" role="dialog" aria-labelledby="NovoRegistro" data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="POST" id="senhaEditar<?php echo $usu['pk_usu']; ?>">
                            <div class="form-group">
                                <p>Editar senha de Usuário</p>
                                <label for="nome">Login:</label>
                                <input type="text" name="login_editar" class="form-control" style="text-transform:uppercase;" value="<?php echo $usu['login']; ?>" readonly />
                                <label for="senha">Nova senha:</label>
                                <input type="password" name="senha_editar" class="form-control senha_editar" />
                            </div>
                            <button type="button" class="btn btn-primary" onclick="atualizarSenha(<?php echo $usu['pk_usu']; ?>)">Atualizar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL EDITAR SENHA FIM -->
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
        $('.editarSenha').on('shown.bs.modal', function () {
            $('.senha_editar').focus();
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
        var login = $('input[name="login"]').val();
        var senha = $('input[name="senha"]').val();

        if (nome == "" || typeof(nome) == "undefined") {
            $('input[name="nome"]').focus();
            swal("", "Campo NOME é obrigatório!", "error");
            return false;
        }

        if (login == "" || typeof(login) == "undefined") {
            $('input[name="login"]').focus();
            swal("", "Campo LOGIN é obrigatório!", "error");
            return false;
        }

        if (senha == "" || typeof(senha) == "undefined") {
            $('input[name="senha"]').focus();
            swal("", "Campo SENHA é obrigatório!", "error");
            return false;
        }

        let items = new URLSearchParams();
        items.append("nome", nome);
        items.append("login", login);
        items.append("senha", senha);

        axios({
            method: "POST",
            url: "usuarios/novoRegistro",
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
                swal("", "Este login já existe no sistema!", "error");
                return false;
            }
        }).catch(function(error){
            console.log(error);
        });
    }

    //EDITAR REGISTRO
    function atualizarRegistro(pk_usu){
        var bloqueado = $("#registroEditar" + pk_usu).serializeArray()[0].value;
        var nome = $("#registroEditar" + pk_usu).serializeArray()[1].value;
        var login = $("#registroEditar" + pk_usu).serializeArray()[2].value;
        
        if (bloqueado == "NNN" || bloqueado == "" || typeof(bloqueado) == "undefined") {
            document.getElementById("bloqueado_editar").focus();
            swal("", "Campo BLOQUEADO é obrigatório!", "error");
            return false;
        }

        if (nome == "" || typeof(nome) == "undefined") {
            $('input[name="nome_editar"]').focus();
            swal("", "Campo NOME é obrigatório!", "error");
            return false;
        }

        if (login == "" || typeof(login) == "undefined") {
            $('input[name="login_editar"]').focus();
            swal("", "Campo LOGIN é obrigatório!", "error");
            return false;
        }
        
        let items = new URLSearchParams();
        items.append("pk_usu", pk_usu);
        items.append("bloqueado", bloqueado);
        items.append("nome", nome);
        items.append("login", login);

        axios({
            method: "POST",
            url: "usuarios/editarRegistro",
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
                swal("", "Este login já existe no sistema!", "error");
                return false;
            }
        }).catch(function(error){
            console.log(error);
        });

    }

    //EDITAR SENHA
    function atualizarSenha(pk_usu){
        var login = $("#senhaEditar" + pk_usu).serializeArray()[0].value;
        var senha = $("#senhaEditar" + pk_usu).serializeArray()[1].value;
        
        if (senha == "" || typeof(senha) == "undefined") {
            $('input[name="senha_editar"]').focus();
            swal("", "Campo SENHA é obrigatório!", "error");
            return false;
        }
        
        let items = new URLSearchParams();
        items.append("login", login);
        items.append("senha", senha);

        axios({
            method: "POST",
            url: "usuarios/editarSenha",
            data: items
        }).then(res =>{
            var data_return = res.data;
            console.log(res);
            if (data_return == "SUCCESS") {
                $(".editarSenha").modal("hide");
                swal({
                    title: "",
                    text: "Registro editado com sucesso!",
                    type: "success"
                }).then(function(){
                    location.reload();
                });
            } else {
                swal("", "Erro ao tentar editar senha!", "error");
                return false;
            }
        }).catch(function(error){
            console.log(error);
        });
    }

    //DELETAR REGISTRO
    function deletarRegistro(pk_usu){
        let items = new URLSearchParams();
        items.append("pk_usu", pk_usu);

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
                    url: "usuarios/deletarRegistro",
                    data: items
                }).then(res => {
                    var data_return = res.data;
                    console.log(res);
                    if (data_return == "BYE BYE") {
                        window.location.href = "home";
                    } else if (data_return == "SUCCESS") {
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