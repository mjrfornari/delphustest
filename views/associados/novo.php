<h3 style="background-color:#286090;color:#FFFFFF;padding:7px;">Cadastro de associados > <strong>Novo registro</strong></h3>
<form method="POST" name="salvarRegistro">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#a" data-toggle="tab">Principal</a></li>
        <li><a href="#b" data-toggle="tab">End. Comercial</a></li>
        <li><a href="#c" data-toggle="tab">End. Residêncial</a></li>
        <li><a href="#d" data-toggle="tab">Cobrança</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="a" style="background-color: #FFFFFF; padding:10px;">
            <div class="row">
                <div class="col-sm-3">
                    <label for="matricula">Matrícula:</label>
                    <input type="text" name="matricula" class="form-control" style="text-transform:uppercase;" onkeypress="return SomenteNumero(event)" maxlength="10" />
                </div>
                <div class="col-sm-9">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" class="form-control" style="text-transform:uppercase;" />
                </div>
                <div class="col-sm-2">
                  <label for="rg">RG:</label>
                    <input type="text" name="rg" class="form-control" style="text-transform:uppercase;" onkeypress="return SomenteNumero(event)" maxlength="10" />
                </div>
                <div class="col-sm-3">
                    <label for="data_rg">Data expedição:</label>
                    <input type="date"  name="data_rg" class="form-control" style="text-transform:uppercase;" />
                </div>
                <div class="col-sm-4">
                    <label for="orgao_expedidor">Orgão expedidor:</label>
                    <input type="text" name="orgao_expedidor" class="form-control" style="text-transform:uppercase;" />
                </div>
                <div class="col-sm-3">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" class="form-control" style="text-transform:uppercase;" onkeypress="return SomenteNumero(event)" maxlength="11" />
                </div>
                <div class="col-sm-6">
                    <label for="nome_pai">Nome pai:</label>
                    <input type="text" name="nome_pai" class="form-control" style="text-transform:uppercase;" />
                </div>
                <div class="col-sm-6">
                    <label for="nome_mae">Nome mãe:</label>
                    <input type="text" name="nome_mae" class="form-control" style="text-transform:uppercase;" />
                </div>
                <div class="col-sm-4">
                    <label for="sexo">Sexo:</label>
                    <select name="sexo" class="form-control">
                        <option value="N">Selecione</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="estado_civil">Estado civil:</label>
                    <select name="estado_civil" id="estado_civil" class="form-control">
                        <option value="N">Selecione</option>
                        <option value="S">Solteiro</option>
                        <option value="C">Casado</option>
                        <option value="P">Separado</option>
                        <option value="D">Divorciado</option>
                        <option value="V">Viúvo</option>
                    </select>
                </div>
                <div class="col-sm-4">
                  <label for="data_nasc">Data nascimento:</label>
                    <input type="date" name="data_nasc" class="form-control" style="text-transform:uppercase;" />
                </div>
                <div class="col-sm-3">
                    <label for="nro_oab">Nr. OAB:</label>
                    <input type="text" name="nro_oab" class="form-control" style="text-transform:uppercase;" onkeypress="return SomenteNumero(event)" />
                </div>
                <div class="col-sm-3">
                    <label for="fk_lot">Lotação:</label>
                    <select name="fk_lot" class="form-control" required="required" style="width: 100%;">
                        <option value="N">Selecione</option>
                        <?php foreach($lotacoes as $lot): ?>
                        <option value="<?php echo $lot['pk_lot']; ?>">
                            <?php echo $lot['descricao']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="fk_cat">Categoria:</label>
                    <select name="fk_cat" id="fk_cat" class="form-control" required="required" style="width: 100%;">
                        <option value="N">Selecione</option>
                        <?php foreach($categorias as $cat): ?>
                        <option value="<?php echo $cat['pk_cat']; ?>">
                            <?php echo $cat['descricao']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="fk_sit">Situação:</label>
                    <select name="fk_sit" class="form-control" required="required" style="width: 55%;">
                        <option value="N">Selecione</option>
                        <?php foreach($situacoes as $sit): ?>
                        <option value="<?php echo $sit['pk_sit']; ?>">
                            <?php echo $sit['descricao']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-12">
                    <label for="observacoes">Observações:</label>
                    <input type="text" name="observacoes" class="form-control" style="text-transform:uppercase;" />
                </div>
            </div>
        </div>
        <div class="tab-pane" id="b" style="background-color: #FFFFFF; padding:10px;">
            <div class="row">
                <div class="col-sm-12">
                    <label for="logradouro_comerc">Endereço:</label>
                    <input type="text" name="logradouro_comerc" class="form-control" style="text-transform:uppercase;" />
                </div>
                <div class="col-sm-4">
                    <label for="bairro_comerc">Bairro:</label>
                    <input type="text" name="bairro_comerc" class="form-control" style="text-transform:uppercase;" />
                </div>
                <div class="col-sm-3">
                    <label for="cep_comerc">CEP:</label>
                    <input type="text" name="cep_comerc" class="form-control" style="text-transform:uppercase;" onkeypress="return SomenteNumero(event)" />
                </div>
                <div class="col-sm-5">
                    <label for="fk_cid_comerc">Cidade:</label>
                    <select name="fk_cid_comerc" class="form-control" required="required" style="width: 50%;">
                        <option value="N">Selecione</option>
                        <?php foreach($cidades as $cid): ?>
                        <option value="<?php echo $cid['pk_cid']; ?>">
                            <?php echo $cid['nome']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="telefone_comerc">Telefone comercial:</label>
                    <input type="text" name="telefone_comerc" class="form-control" style="text-transform:uppercase;" onkeypress="return SomenteNumero(event)" />
                </div>
                <div class="col-sm-6">
                    <label for="email_comerc">Email comercial:</label>
                    <input type="email" name="email_comerc" class="form-control" style="text-transform:uppercase;" />
                </div>
            </div>
        </div>
        <div class="tab-pane" id="c" style="background-color: #FFFFFF; padding:10px;">
            <div class="row">
                <div class="col-sm-12">
                    <label for="endereco_resid">Endereço:</label>
                    <input type="text" name="endereco_resid" class="form-control" style="text-transform:uppercase;" />
                </div>
                <div class="col-sm-4">
                    <label for="bairro_resid">Bairro:</label>
                    <input type="text" name="bairro_resid" class="form-control" style="text-transform:uppercase;" />
                </div>
                <div class="col-sm-3">
                    <label for="cep_resid">CEP:</label>
                    <input type="text" name="cep_resid" class="form-control" style="text-transform:uppercase;" onkeypress="return SomenteNumero(event)" />
                </div>
                <div class="col-sm-5">
                    <label for="fk_cid_resid">Cidade:</label>
                    <select name="fk_cid_resid" class="form-control" required="required" style="width: 50%;">
                      <option value="N">Selecione</option>
                      <?php foreach($cidades as $cid): ?>
                        <option value="<?php echo $cid['pk_cid']; ?>">
                            <?php echo $cid['nome']; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="telefone_resid">Telefone residencial:</label>
                    <input type="text" name="telefone_resid" class="form-control" style="text-transform:uppercase;" onkeypress="return SomenteNumero(event)" />
                </div>
                <div class="col-sm-6">
                    <label for="email_resid">Email residencial:</label>
                    <input type="email" name="email_resid" class="form-control" style="text-transform:uppercase;" />
                </div>
            </div>
        </div>
        <div class="tab-pane" id="d" style="background-color: #FFFFFF; padding:10px;">
            <div class="row">
                <div class="col-sm-12">
                        <fieldset class="col-sm-4">
                            <legend>Dados bancários:</legend>
                            <label for="fk_bco">Banco:</label>
                            <select name="fk_bco" class="form-control">
                                <option value="N">Selecione</option>
                                <?php foreach($bancos as $bco): ?>
                                <option value="<?php echo $bco['pk_bco']; ?>">
                                <?php echo $bco['nome']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <label for="agencia">Agência:</label>
                            <input type="text" name="agencia" class="form-control" style="text-transform:uppercase;" />
                            <label for="conta">Conta:</label>
                            <input type="text" name="conta" class="form-control" style="text-transform:uppercase;" />
                            <hr />
                            <label for="cobranca_mensalidade">Forma de cobrança Mensalidades:</label>
                            <br />
                            <input type="radio" name="cobranca_mensalidade" value="B"> Banco
                            <input type="radio" name="cobranca_mensalidade" value="T"> Tesouro
                            <hr />
                            <input type="checkbox" name="anape" value="S"> ANAPE
                        </fieldset>
                        <fieldset class="col-sm-4">
                            <legend>Unimed:</legend>
                            <input type="checkbox" name="unimed_hospitalar" value="S"> Hospitalar
                            <input type="checkbox" name="unimed_ambulatorial" value="S"> Ambulatorial
                            <input type="checkbox" name="unimed_global" value="S"> Global
                            <br />
                            <input type="checkbox" name="unimed_sos" value="S"> SOS
                            <input type="checkbox" name="unimed_odonto" value="S"> Odonto
                            <hr />
                            <label for="forma_cobranca">Forma de cobrança Unimed:</label>
                            <br />
                            <input type="radio" name="cobranca_unimed" value="B"> Banco
                            <input type="radio" name="cobranca_unimed" value="T"> Tesouro
                        </fieldset>
                        <fieldset class="col-sm-4">
                            <legend>Telefonia:</legend>
                            <input type="checkbox" name="telefonia_vivo" value="S"> Vivo
                            <input type="checkbox" name="telefonia_claro" value="S"> Claro
                            <hr />
                            <label for="forma_cobranca">Forma de cobrança Telefonia:</label>
                            <br />
                            <input type="radio" name="cobranca_telefonia" value="B"> Banco
                            <input type="radio" name="cobranca_telefonia" value="T"> Tesouro
                        </fieldset>
                        <fieldset class="col-sm-6">
                            <label for="forma_cobranca">Forma de cobrança Outros serviços:</label>
                            <br />
                            <input type="radio" name="cobranca_servicos" value="B"> Banco
                            <input type="radio" name="cobranca_servicos" value="T"> Tesouro
                        </fieldset>
                        <hr />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <hr class="col-sm-10"/>
        <div class="col-sm-12">
            <input type="button" value="Salvar" onclick="inserirRegistro()" class="btn btn-primary" />
            <a href="<?php echo BASEURL; ?>associados" class="btn btn-default">Voltar</a>
        </div>
    </div>
</form>
<script type="text/javascript">
  $(document).ready(function(){
    $('input[name="matricula"]').focus();
  });
  function inserirRegistro(){
    // //Chaves estrangeiras
    var fk_bco            = document.forms["salvarRegistro"]["fk_bco"].value;
    var fk_lot            = document.forms["salvarRegistro"]["fk_lot"].value;
    var fk_cat            = document.forms["salvarRegistro"]["fk_cat"].value;
    var fk_sit            = document.forms["salvarRegistro"]["fk_sit"].value;
    var fk_cid_comerc     = document.forms["salvarRegistro"]["fk_cid_comerc"].value;
    var fk_cid_resid      = document.forms["salvarRegistro"]["fk_cid_resid"].value;
    //Campos normais
    var matricula         = document.forms["salvarRegistro"]["matricula"].value;
    var nome              = document.forms["salvarRegistro"]["nome"].value;
    var rg                = document.forms["salvarRegistro"]["rg"].value;
    var data_rg           = document.forms["salvarRegistro"]["data_rg"].value;
    var orgao_expedidor   = document.forms["salvarRegistro"]["orgao_expedidor"].value;
    var cpf               = document.forms["salvarRegistro"]["cpf"].value;
    var nome_pai          = document.forms["salvarRegistro"]["nome_pai"].value;
    var nome_mae          = document.forms["salvarRegistro"]["nome_mae"].value;
    var sexo              = document.forms["salvarRegistro"]["sexo"].value;
    var estado_civil      = document.forms["salvarRegistro"]["estado_civil"].value;
    var data_nasc         = document.forms["salvarRegistro"]["data_nasc"].value;
    var agencia           = document.forms["salvarRegistro"]["agencia"].value;
    var conta             = document.forms["salvarRegistro"]["conta"].value;
    var nro_oab           = document.forms["salvarRegistro"]["nro_oab"].value;
    var logradouro_comerc = document.forms["salvarRegistro"]["logradouro_comerc"].value;
    var bairro_comerc     = document.forms["salvarRegistro"]["bairro_comerc"].value;
    var cep_comerc        = document.forms["salvarRegistro"]["cep_comerc"].value;
    var telefone_comerc   = document.forms["salvarRegistro"]["telefone_comerc"].value;
    var email_comerc          = document.forms["salvarRegistro"]["email_comerc"].value;
    var endereco_resid        = document.forms["salvarRegistro"]["endereco_resid"].value;
    var bairro_resid          = document.forms["salvarRegistro"]["bairro_resid"].value;
    var cep_resid             = document.forms["salvarRegistro"]["cep_resid"].value;
    var telefone_resid        = document.forms["salvarRegistro"]["telefone_resid"].value;
    var email_resid           = document.forms["salvarRegistro"]["email_resid"].value;
    var observacoes           = document.forms["salvarRegistro"]["observacoes"].value;
    var cobranca_mensalidade = document.forms["salvarRegistro"]["cobranca_mensalidade"].value;
    var anape = document.getElementsByName("anape"); 
    var unimed_hospitalar = document.getElementsByName("unimed_hospitalar"); 
    var unimed_ambulatorial = document.getElementsByName("unimed_ambulatorial"); 
    var unimed_global = document.getElementsByName("unimed_global"); 
    var unimed_sos = document.getElementsByName("unimed_sos"); 
    var unimed_odonto = document.getElementsByName("unimed_odonto");
    var cobranca_unimed = document.forms["salvarRegistro"]["cobranca_unimed"].value;
    var telefonia_vivo = document.getElementsByName("telefonia_vivo");
    var telefonia_claro = document.getElementsByName("telefonia_claro");
    var cobranca_telefonia = document.forms["salvarRegistro"]["cobranca_telefonia"].value;
    var cobranca_servicos = document.forms["salvarRegistro"]["cobranca_servicos"].value;
    
    //CHECAGEM DOS CHECKBOXES
    for (var i=0;i<anape.length;i++) {
        if (anape[i].checked == true) {
            anape = "S";
        } else {
            anape = "N";
        }
        
    }

    for (var i=0;i<unimed_hospitalar.length;i++) {
        if (unimed_hospitalar[i].checked == true) {
            unimed_hospitalar = "S";
        } else {
            unimed_hospitalar = "N";
        }
        
    }

    for (var i=0;i<unimed_ambulatorial.length;i++) {
        if (unimed_ambulatorial[i].checked == true) {
            unimed_ambulatorial = "S";
        } else {
            unimed_ambulatorial = "N";
        }
        
    }

    for (var i=0;i<unimed_global.length;i++) {
        if (unimed_global[i].checked == true) {
            unimed_global = "S";
        } else {
            unimed_global = "N";
        }
        
    }

    for (var i=0;i<unimed_sos.length;i++) {
        if (unimed_sos[i].checked == true) {
            unimed_sos = "S";
        } else {
            unimed_sos = "N";
        }
        
    }

    for (var i=0;i<unimed_odonto.length;i++) {
        if (unimed_odonto[i].checked == true) {
            unimed_odonto = "S";
        } else {
            unimed_odonto = "N";
        }
        
    }

    for (var i=0;i<telefonia_vivo.length;i++) {
        if (telefonia_vivo[i].checked == true) {
            telefonia_vivo = "S";
        } else {
            telefonia_vivo = "N";
        }
        
    }

    for (var i=0;i<telefonia_claro.length;i++) {
        if (telefonia_claro[i].checked == true) {
            telefonia_claro = "S";
        } else {
            telefonia_claro = "N";
        }
        
    }
    
    //VALIDAÇÕES DOS CAMPOS OBRIGATÓRIOS
    if (nome == "" || typeof(nome) == "undefined") {
        $('input[name="nome"]').focus();
        swal("", "Campo NOME é obrigatório!", "error");
        return false;
    }

    if (matricula == "" || typeof(matricula) == "undefined") {
        $('input[name="matricula"]').focus();
        swal("", "Campo MATRÍCULA é obrigatório!", "error");
        return false;
    }

    if (data_nasc == "" || typeof(data_nasc) == "undefined") {
        $('input[name="data_nasc"]').focus();
        swal("", "Campo DATA NASCIMENTO é obrigatório!", "error");
        return false;
    }

    if (rg == "" || typeof(rg) == "undefined") {
        $('input[name="rg"]').focus();
        swal("", "Campo RG é obrigatório!", "error");
        return false;
    }

    if (cpf == "" || typeof(cpf) == "undefined") {
        $('input[name="cpf"]').focus();
        swal("", "Campo CPF é obrigatório!", "error");
        return false;
    } else {
        if (validaCPF(cpf) == false) {
            $('input[name="cpf"]').focus();
            swal("", "CPF inválido!", "error");
            return false;
        }
    }

    if (estado_civil == "N" || estado_civil == "" || typeof(estado_civil) == "undefined") {
        document.getElementById("estado_civil").focus();
        swal("", "Campo ESTADO CIVIL é obrigatório!", "error");
        return false;
    }

    if (fk_cat == "N" || fk_cat == "" || typeof(fk_cat) == "undefined") {
        document.getElementById("fk_cat").focus();
        swal("", "Campo CATEGORIA é obrigatório!", "error");
        return false;
    }

    let items = new URLSearchParams();
    items.append("fk_sit", fk_sit);
    items.append("fk_bco", fk_bco);
    items.append("fk_lot", fk_lot);
    items.append("fk_cat", fk_cat);
    items.append("fk_cid_resid", fk_cid_resid);
    items.append("fk_cid_comerc", fk_cid_comerc);
    items.append("matricula", matricula);
    items.append("nome", nome);
    items.append("rg", rg);
    items.append("data_rg", data_rg);
    items.append("orgao_expedidor", orgao_expedidor);
    items.append("cpf", cpf);
    items.append("nome_pai", nome_pai);
    items.append("nome_mae", nome_mae);
    items.append("sexo", sexo);
    items.append("estado_civil", estado_civil);
    items.append("data_nasc", data_nasc);
    items.append("agencia", agencia);
    items.append("conta", conta);
    items.append("observacoes", observacoes);
    items.append("nro_oab", nro_oab);
    items.append("endereco_resid", endereco_resid);
    items.append("bairro_resid", bairro_resid);
    items.append("cep_resid", cep_resid);
    items.append("telefone_resid", telefone_resid);
    items.append("email_resid", email_resid);
    items.append("logradouro_comerc", logradouro_comerc);
    items.append("bairro_comerc", bairro_comerc);
    items.append("cep_comerc", cep_comerc);
    items.append("email_comerc", email_comerc);
    items.append("telefone_comerc", telefone_comerc);
    items.append("cobranca_mensalidade", cobranca_mensalidade);
    items.append("anape", anape);
    items.append("unimed_hospitalar", unimed_hospitalar);
    items.append("unimed_ambulatorial", unimed_ambulatorial);
    items.append("unimed_global", unimed_global);
    items.append("unimed_sos", unimed_sos);
    items.append("unimed_odonto", unimed_odonto);
    items.append("cobranca_unimed", cobranca_unimed);
    items.append("telefonia_vivo", telefonia_vivo);
    items.append("telefonia_claro", telefonia_claro);
    items.append("cobranca_telefonia", cobranca_telefonia);
    items.append("cobranca_servicos", cobranca_servicos);

    axios({
        method: "POST",
        url: "inserirRegistro",
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
              window.location.href = "/apergsweb/associados";
          });
        } else {
            swal("", "Este associado já existe no sistema!", "error");
        }
    }).catch(function(error){
        console.log(error);
    });

  } //Fim da função inserirRegistro


</script>
