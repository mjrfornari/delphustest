<?php foreach($associado as $ass): ?>
<h3 style="background-color:#286090;color:#FFFFFF;padding:7px;">Cadastro de associados > Editar: <strong><?php echo $ass['nome']; ?></strong></h3>
<form method="POST" name="alterarRegistro">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#a">Principal</a></li>
        <li><a data-toggle="tab" href="#b">End. Comercial</a></li>
        <li><a data-toggle="tab" href="#c">End. Residêncial</a></li>
        <li><a href="#d" data-toggle="tab">Cobrança</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="a">
            <div class="row">
                <div class="col-sm-3">
                    <label for="matricula">Matrícula:</label>
                    <input type="text" name="matricula" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['matricula']; ?>" onkeypress="return SomenteNumero(event)" maxlength="10" />
                </div>
                <div class="col-sm-9">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['nome']; ?>" />
                </div>
                <div class="col-sm-2">
                <label for="rg">RG:</label>
                    <input type="text" name="rg" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['rg']; ?>" onkeypress="return SomenteNumero(event)" maxlength="10" />
                </div>
                <div class="col-sm-3">
                    <label for="data_rg">Data expedição:</label>
                    <input type="date"  name="data_rg" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['data_rg']; ?>" />
                </div>
                <div class="col-sm-4">
                    <label for="orgao_expedidor">Orgão expedidor:</label>
                    <input type="text" name="orgao_expedidor" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['orgao_expedidor']; ?>" />
                </div>
                <div class="col-sm-3">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['cpf']; ?>" onkeypress="return SomenteNumero(event)" maxlength="11" />
                </div>
                <div class="col-sm-6">
                    <label for="nome_pai">Nome pai:</label>
                    <input type="text" name="nome_pai" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['nome_pai']; ?>" />
                </div>
                <div class="col-sm-6">
                    <label for="nome_mae">Nome mãe:</label>
                    <input type="text" name="nome_mae" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['nome_mae']; ?>" />
                </div>
                <div class="col-sm-4">
                    <label for="sexo">Sexo:</label>
                    <select name="sexo" class="form-control">
                        <option value="N">Selecione</option>
                        <option value="M" <?php echo ($ass['sexo'] == 'M')?'selected="selected"':''; ?>>Masculino</option>
                        <option value="F" <?php echo ($ass['sexo'] == 'F')?'selected="selected"':''; ?>>Feminino</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="estado_civil">Estado civil:</label>
                    <select name="estado_civil" id="estado_civil" class="form-control">
                        <option value="N">Selecione</option>
                        <option value="S" <?php echo ($ass['estado_civil'] == 'S')?'selected="selected"':''; ?>>Solteiro</option>
                        <option value="C" <?php echo ($ass['estado_civil'] == 'C')?'selected="selected"':''; ?>>Casado</option>
                        <option value="P" <?php echo ($ass['estado_civil'] == 'P')?'selected="selected"':''; ?>>Separado</option>
                        <option value="D" <?php echo ($ass['estado_civil'] == 'D')?'selected="selected"':''; ?>>Divorciado</option>
                        <option value="V" <?php echo ($ass['estado_civil'] == 'V')?'selected="selected"':''; ?>>Viúvo</option>
                    </select>
                </div>
                <div class="col-sm-4">
                <label for="data_nasc">Data nascimento:</label>
                    <input type="date" name="data_nasc" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['data_nasc']; ?>" />
                </div>
                <div class="col-sm-3">
                    <label for="nro_oab">Nr. OAB:</label>
                    <input type="text" name="nro_oab" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['nro_oab']; ?>" onkeypress="return SomenteNumero(event)" />
                </div>
                <div class="col-sm-3">
                    <label for="fk_lot">Lotação:</label>
                    <select id="fk_lot" class="form-control" style="width: 100%;">
                        <option value="N">Selecione</option>
                        <?php foreach($lotacoes as $lot): ?>
                        <option value="<?php echo $lot['pk_lot']; ?>" <?php echo $ass['fk_lot'] == $lot['pk_lot']?'selected':''; ?>>
                            <?php echo $lot['descricao']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="fk_cat">Categoria:</label>
                    <select id="fk_cat" class="form-control" style="width: 100%;">
                        <option value="N">Selecione</option>
                        <?php foreach($categorias as $cat): ?>
                        <option value="<?php echo $cat['pk_cat']; ?>" <?php echo $ass['fk_cat'] == $cat['pk_cat']?'selected':''; ?>>
                            <?php echo $cat['descricao']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="fk_sit">Situação:</label>
                    <select id="fk_sit" class="form-control" style="width: 55%;">
                        <option value="N">Selecione</option>
                        <?php foreach($situacoes as $sit): ?>
                        <option value="<?php echo $sit['pk_sit']; ?>" <?php echo $ass['fk_sit'] == $sit['pk_sit']?'selected':''; ?>>
                            <?php echo $sit['descricao']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-12">
                  <label for="observacoes">Observações:</label>
                  <input type="text" name="observacoes" class="form-control" value="<?php echo $ass['observacoes']; ?>" style="text-transform:uppercase;" />
                </div>
            </div>
        </div>
        <div class="tab-pane" id="b">
            <div class="row">
                <div class="col-sm-12">
                    <label for="logradouro_comerc">Endereço:</label>
                    <input type="text" name="logradouro_comerc" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['logradouro_comerc']; ?>" />
                </div>
                <div class="col-sm-4">
                    <label for="bairro_comerc">Bairro:</label>
                    <input type="text" name="bairro_comerc" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['bairro_comerc']; ?>" />
                </div>
                <div class="col-sm-3">
                    <label for="cep_comerc">CEP:</label>
                    <input type="text" name="cep_comerc" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['cep_comerc']; ?>" onkeypress="return SomenteNumero(event)" />
                </div>
                <div class="col-sm-5">
                    <label for="fk_cid_comerc">Cidade:</label>
                    <select id="fk_cid_comerc" class="form-control" required="required" style="width: 50%;">
                        <option value="N">Selecione</option>
                        <?php foreach($cidades as $cid): ?>
                        <option value="<?php echo $cid['pk_cid']; ?>" <?php echo $ass['fk_cid_comerc'] == $cid['pk_cid']?'selected':''; ?>>
                            <?php echo $cid['nome']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="telefone_comerc">Telefone comercial:</label>
                    <input type="text" name="telefone_comerc" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['telefone_comerc']; ?>" onkeypress="return SomenteNumero(event)" />
                </div>
                <div class="col-sm-6">
                    <label for="email_comerc">Email comercial:</label>
                    <input type="email" name="email_comerc" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['email_comerc']; ?>" />
                </div>
            </div>
        </div>
        <div class="tab-pane" id="c">
            <div class="row">
                <div class="col-sm-12">
                    <label for="endereco_resid">Endereço:</label>
                    <input type="text" name="endereco_resid" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['endereco_resid']; ?>" />
                </div>
                <div class="col-sm-4">
                    <label for="bairro_resid">Bairro:</label>
                    <input type="text" name="bairro_resid" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['bairro_resid']; ?>" />
                </div>
                <div class="col-sm-3">
                    <label for="cep_resid">CEP:</label>
                    <input type="text" name="cep_resid" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['cep_resid']; ?>" onkeypress="return SomenteNumero(event)" />
                </div>
                <div class="col-sm-5">
                    <label for="fk_cid_resid">Cidade:</label>
                    <select id="fk_cid_resid" class="form-control" required="required" style="width: 50%;">
                      <option value="N">Selecione</option>
                      <?php foreach($cidades as $cid): ?>
                        <option value="<?php echo $cid['pk_cid']; ?>" <?php echo $ass['fk_cid_resid'] == $cid['pk_cid']?'selected':''; ?>>
                            <?php echo $cid['nome']; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="telefone_resid">Telefone residencial:</label>
                    <input type="number" name="telefone_resid" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['telefone_resid']; ?>" onkeypress="return SomenteNumero(event)" />
                </div>
                <div class="col-sm-6">
                    <label for="email_resid">Email residencial:</label>
                    <input type="email" name="email_resid" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['email_resid']; ?>" />
                </div>
            </div>
        </div>
        <div class="tab-pane" id="d" style="background-color: #FFFFFF; padding:10px;">
            <div class="row">
                <div class="col-sm-12">
                        <fieldset class="col-sm-4">
                            <legend>Dados bancários:</legend>
                            <label for="fk_bco">Banco:</label>
                            <select id="fk_bco" class="form-control">
                                <option value="N">Selecione</option>
                                <?php foreach($bancos as $bco): ?>
                                <option value="<?php echo $bco['pk_bco']; ?>" <?php echo $ass['fk_bco'] == $bco['pk_bco']?'selected':''; ?>>
                                <?php echo $bco['nome']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <label for="agencia">Agência:</label>
                            <input type="text" name="agencia" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['agencia']; ?>" />
                            <label for="conta">Conta:</label>
                            <input type="text" name="conta" class="form-control" style="text-transform:uppercase;" value="<?php echo $ass['conta']; ?>" />
                            <hr />
                            <label for="cobranca_mensalidade">Forma de cobrança Mensalidades:</label>
                            <br />
                            <input type="radio" name="cobranca_mensalidade" value="B" <?php echo $ass['cobranca_mensalidade'] == "B" ? 'checked':''; ?>> Banco
                            <input type="radio" name="cobranca_mensalidade" value="T" <?php echo $ass['cobranca_mensalidade'] == "T" ? 'checked':''; ?>> Tesouro
                            <hr />
                            <input type="checkbox" name="anape" value="S" <?php echo $ass['anape'] == "S" ? 'checked':''; ?>> ANAPE
                        </fieldset>
                        <fieldset class="col-sm-4">
                            <legend>Unimed:</legend>
                            <input type="checkbox" name="unimed_hospitalar" value="S" <?php echo $ass['unimed_hospitalar'] == "S" ? 'checked':''; ?>> Hospitalar
                            <input type="checkbox" name="unimed_ambulatorial" value="S" <?php echo $ass['unimed_ambulatorial'] == "S" ? 'checked':''; ?>> Ambulatorial
                            <input type="checkbox" name="unimed_global" value="S" <?php echo $ass['unimed_global'] == "S" ? 'checked':''; ?>> Global
                            <br />
                            <input type="checkbox" name="unimed_sos" value="S" <?php echo $ass['unimed_sos'] == "S" ? 'checked':''; ?>> SOS
                            <input type="checkbox" name="unimed_odonto" value="S" <?php echo $ass['unimed_odonto'] == "S" ? 'checked':''; ?>> Odonto
                            <hr />
                            <label for="forma_cobranca">Forma de cobrança Unimed:</label>
                            <br />
                            <input type="radio" name="cobranca_unimed" value="B" <?php echo $ass['cobranca_unimed'] == "B" ? 'checked':''; ?>> Banco
                            <input type="radio" name="cobranca_unimed" value="T" <?php echo $ass['cobranca_unimed'] == "T" ? 'checked':''; ?>> Tesouro
                        </fieldset>
                        <fieldset class="col-sm-4">
                            <legend>Telefonia:</legend>
                            <input type="checkbox" name="telefonia_vivo" value="S" <?php echo $ass['telefonia_vivo'] == "S" ? 'checked':''; ?>> Vivo
                            <input type="checkbox" name="telefonia_claro" value="S" <?php echo $ass['telefonia_claro'] == "S" ? 'checked':''; ?>> Claro
                            <hr />
                            <label for="forma_cobranca">Forma de cobrança Telefonia:</label>
                            <br />
                            <input type="radio" name="cobranca_telefonia" value="B" <?php echo $ass['cobranca_telefonia'] == "B" ? 'checked':''; ?>> Banco
                            <input type="radio" name="cobranca_telefonia" value="T" <?php echo $ass['cobranca_telefonia'] == "T" ? 'checked':''; ?>> Tesouro
                        </fieldset>
                        <fieldset class="col-sm-6">
                            <label for="forma_cobranca">Forma de cobrança Outros serviços:</label>
                            <br />
                            <input type="radio" name="cobranca_servicos" value="B" <?php echo $ass['cobranca_servicos'] == "B" ? 'checked':''; ?>> Banco
                            <input type="radio" name="cobranca_servicos" value="T" <?php echo $ass['cobranca_servicos'] == "T" ? 'checked':''; ?>> Tesouro
                        </fieldset>
                        <hr />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <hr class="col-sm-10"/>
        <div class="col-sm-12">
            <input type="button" value="Atualizar" onclick="editarRegistro(<?php echo $ass['pk_ass']; ?>)" class="btn btn-primary" />
            <a href="<?php echo BASEURL; ?>associados" class="btn btn-default">Voltar</a>
        </div>
    </div>
</form>
<script type="text/javascript">
  $(document).ready(function(){
    $('input[name="matricula"]').focus();
  });

  function editarRegistro(pk_ass){
    var pk_ass            = pk_ass;
    // //Chaves estrangeiras
    var fk_bco            = document.getElementById("fk_bco").value;
    var fk_lot            = document.getElementById("fk_lot").value;
    var fk_cat            = document.getElementById("fk_cat").value;
    var fk_sit            = document.getElementById("fk_sit").value;
    var fk_cid_comerc     = document.getElementById("fk_cid_comerc").value;
    var fk_cid_resid      = document.getElementById("fk_cid_resid").value;
    //Campos normais
    var matricula         = document.forms["alterarRegistro"]["matricula"].value;
    var nome              = document.forms["alterarRegistro"]["nome"].value;
    var rg                = document.forms["alterarRegistro"]["rg"].value;
    var data_rg           = document.forms["alterarRegistro"]["data_rg"].value;
    var orgao_expedidor   = document.forms["alterarRegistro"]["orgao_expedidor"].value;
    var cpf               = document.forms["alterarRegistro"]["cpf"].value;
    var nome_pai          = document.forms["alterarRegistro"]["nome_pai"].value;
    var nome_mae          = document.forms["alterarRegistro"]["nome_mae"].value;
    var sexo              = document.forms["alterarRegistro"]["sexo"].value;
    var estado_civil      = document.forms["alterarRegistro"]["estado_civil"].value;
    var data_nasc         = document.forms["alterarRegistro"]["data_nasc"].value;
    var agencia           = document.forms["alterarRegistro"]["agencia"].value;
    var conta             = document.forms["alterarRegistro"]["conta"].value;
    var nro_oab           = document.forms["alterarRegistro"]["nro_oab"].value;
    var logradouro_comerc = document.forms["alterarRegistro"]["logradouro_comerc"].value;
    var bairro_comerc     = document.forms["alterarRegistro"]["bairro_comerc"].value;
    var cep_comerc        = document.forms["alterarRegistro"]["cep_comerc"].value;
    var telefone_comerc   = document.forms["alterarRegistro"]["telefone_comerc"].value;
    var email_comerc      = document.forms["alterarRegistro"]["email_comerc"].value;
    var endereco_resid    = document.forms["alterarRegistro"]["endereco_resid"].value;
    var bairro_resid      = document.forms["alterarRegistro"]["bairro_resid"].value;
    var cep_resid         = document.forms["alterarRegistro"]["cep_resid"].value;
    var telefone_resid    = document.forms["alterarRegistro"]["telefone_resid"].value;
    var email_resid       = document.forms["alterarRegistro"]["email_resid"].value;
    var observacoes       = document.forms["alterarRegistro"]["observacoes"].value;
    var cobranca_mensalidade = document.forms["alterarRegistro"]["cobranca_mensalidade"].value;
    var anape = document.getElementsByName("anape");
    var unimed_hospitalar = document.getElementsByName("unimed_hospitalar");  
    var unimed_ambulatorial = document.getElementsByName("unimed_ambulatorial");
    var unimed_global = document.getElementsByName("unimed_global");
    var unimed_sos = document.getElementsByName("unimed_sos");
    var unimed_odonto = document.getElementsByName("unimed_odonto");
    var cobranca_unimed = document.forms["alterarRegistro"]["cobranca_unimed"].value;
    var telefonia_vivo = document.getElementsByName("telefonia_vivo");
    var telefonia_claro = document.getElementsByName("telefonia_claro");
    var cobranca_telefonia = document.forms["alterarRegistro"]["cobranca_telefonia"].value;
    var cobranca_servicos = document.forms["alterarRegistro"]["cobranca_servicos"].value;

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
    
    //VALIDAÇÃO DE CAMPOS OBRIGATÓRIOS
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
    items.append("pk_ass", pk_ass);
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
        url: "/apergsweb/associados/editarRegistro",
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
              window.location.href = "/apergsweb/associados";
          });
        } else {
            swal("", "Este associado já existe no sistema!", "error");
        }
    }).catch(function(error){
        console.log(error);
    });

  } //Fim da função editarRegistro
</script>
<?php endforeach; ?>
