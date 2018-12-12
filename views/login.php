<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE-edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="imagetoolbar" content="no" />
        <meta name="google" content="notranslate">
        <title>APERGS - Assoc. dos Procuradores do RS | login</title>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASEURL; ?>assets/img/icon.png">
        <link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>assets/css/template.css">
        <link href="<?php echo BASEURL; ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body oncontextmenu="return false">
        <div class="container">
            <div class="login_design">
                <p>APERGS:</p>
                <form method="POST">
                    <div class="form-group">
                        <label for="login">Login:</label>
                        <input type="text" name="login" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" class="form-control" />
                    </div>
                    <input type="button" value="Entrar" class="btn btn-success form-control" onclick="logarSistema()" />
                </form>
                <!-- <a href="#" data-toggle="modal" data-target="#senhaNova" class="btn btn-dark" title="Esqueceu a senha">Esqueceu a senha?</a>
                <a href="#" data-toggle="modal" data-target="#novoRegistro" class="btn btn-white" title="Novo usuário?">Novo usuário?</a> -->
                <!-- MODAL NOVA SENHA INICIO -->
                <div id="senhaNova" class="modal fade bd-example-modal-sm" id="new" tabindex="-1" role="dialog" aria-labelledby="NovoRegistro" data-backdrop="static">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <h3>Nova senha de Usuário</h3>
                                        <label for="login">Login:</label>
                                        <input type="text" name="login_editar" class="form-control" />
                                        <label for="senha">Senha:</label>
                                        <input type="password" name="senha_editar" class="form-control" />
                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="editarSenha()">Atualizar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MODAL NOVA SENHA FIM -->
                <!-- MODAL NOVO INICIO -->
                <div id="novoRegistro" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="NovoRegistro" data-backdrop="static">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <p>Novo registro de Usuário</p>
                                        <label for="nome">Nome:</label>
                                        <input type="text" name="nome_novo" class="form-control" style="text-transform:uppercase;" />
                                        <label for="login">Login:</label>
                                        <input type="text" name="login_novo" class="form-control" />
                                        <label for="senha">Senha:</label>
                                        <input type="password" name="senha_novo" class="form-control" />
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
        </div>
        <script type="text/javascript" src="<?php echo BASEURL; ?>assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASEURL; ?>assets/js/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo BASEURL; ?>assets/js/datatables/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo BASEURL; ?>assets/js/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo BASEURL; ?>assets/js/axios-master/dist/axios.min.js"></script>
        <script type="text/javascript" src="<?php echo BASEURL; ?>assets/js/sweetalert2.js"></script>
        <script type="text/javascript" src="<?php echo BASEURL; ?>assets/js/script.js"></script>
        <script type="text/javascript">
            //lOGAR NO SISTEMA
            function logarSistema(){
                var login = $('input[name="login"]').val();
                var senha = $('input[name="senha"]').val();

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
                items.append("login", login);
                items.append("senha", senha);

                axios({
                    method: "POST",
                    url: "login/logarSistema",
                    data: items
                }).then(res => {
                    var data_return = res.data;
                    console.log(res);
                    if (data_return == "OK") {
                        window.location.href = "home";
                    } else if (data_return == "ERRO EMAIL") {
                        swal("", "Usuário incorreto!", "error");
                        return false;
                    } else if (data_return == "ERRO SENHA"){
                        swal("", "Senha incorreta!", "error");
                        return false;
                    }
                }).catch(function(error){
                    console.log(error);
                });
            }

            //EDITAR SENHA
            function editarSenha(){
                var login = $('input[name="login_editar"]').val();
                var senha = $('input[name="senha_editar"]').val();
                
                if (login == "" || typeof(login) == "undefined") {
                    $('input[name="login_editar"]').focus();
                    swal("", "Campo LOGIN é obrigatório!", "error");
                    return false;
                }

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
                    url: "login/editarSenha",
                    data: items
                }).then(res =>{
                    var data_return = res.data;
                    console.log(res);
                    if (data_return == "SUCCESS") {
                        $("#senhaNova").modal("hide");
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

            //SALVAR REGISTRO
            function salvarRegistro(){
                var nome = $('input[name="nome_novo"]').val();
                var login = $('input[name="login_novo"]').val();
                var senha = $('input[name="senha_novo"]').val();

                if (nome == "" || typeof(nome) == "undefined") {
                    $('input[name="nome_novo"]').focus();
                    swal("", "Campo NOME é obrigatório!", "error");
                    return false;
                }

                if (login == "" || typeof(login) == "undefined") {
                    $('input[name="login_novo"]').focus();
                    swal("", "Campo LOGIN é obrigatório!", "error");
                    return false;
                }

                if (senha == "" || typeof(senha) == "undefined") {
                    $('input[name="senha_novo"]').focus();
                    swal("", "Campo SENHA é obrigatório!", "error");
                    return false;
                }

                let items = new URLSearchParams();
                items.append("nome", nome);
                items.append("login", login);
                items.append("senha", senha);

                axios({
                    method: "POST",
                    url: "login/novoRegistro",
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
        </script>
    </body>
</html>
