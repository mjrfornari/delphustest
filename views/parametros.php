<h3 style="background-color:#286090;color:#FFFFFF;padding:7px;">Parâmetros do sistema:</h3>
<?php foreach($parametros as $par): ?>
<form method="POST" name="alterarRegistro">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#a">Principal</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="a" style="background-color: #FFFFFF; padding:10px;">
            <div class="row">
                <div class="col-sm-6">
                    <label for="nome_fantasia">Nome fantasia:</label>
                    <input type="text" name="nome_fantasia" class="form-control" style="text-transform:uppercase;" value="<?php echo $par['nome_fantasia']; ?>" />
                </div>
                <div class="col-sm-6">
                    <label for="razao_social">Razão social:</label>
                    <input type="text" name="razao_social" class="form-control" style="text-transform:uppercase;" value="<?php echo $par['razao_social']; ?>" />
                </div>
                <div class="col-sm-3">
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" name="cnpj" class="form-control" style="text-transform:uppercase;" value="<?php echo $par['cnpj']; ?>" onkeypress="return SomenteNumero(event)" maxlength="14" />
                </div>
                <div class="col-sm-12">
                    <label for="endereco">Endereço:</label>
                    <input type="text" name="endereco" class="form-control" style="text-transform:uppercase;" value="<?php echo $par['endereco']; ?>" />
                </div>
                <div class="col-sm-4">
                    <label for="bairro">Bairro:</label>
                    <input type="text" name="bairro" class="form-control" style="text-transform:uppercase;" value="<?php echo $par['bairro']; ?>" />
                </div>
                <div class="col-sm-4">
                    <label for="cep">CEP:</label>
                    <input type="text" name="cep" class="form-control" style="text-transform:uppercase;" value="<?php echo $par['cep']; ?>" onkeypress="return SomenteNumero(event)" />
                </div>
                <div class="col-sm-4">
                    <label for="fk_cid">Cidade:</label>
                    <select id="fk_cid" class="form-control" required="required" style="width: 50%;">
                        <option value="N">Selecione</option>
                        <?php foreach($cidades as $cid): ?>
                        <option value="<?php echo $cid['pk_cid']; ?>" <?php echo $par['fk_cid'] == $cid['pk_cid']?'selected':''; ?>>
                            <?php echo $cid['nome']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <hr class="col-sm-10"/>
        <div class="col-sm-12">
            <input type="button" value="Atualizar" onclick="editarRegistro(<?php echo $par['pk_par']; ?>)" class="btn btn-primary" />
            <a href="<?php echo BASEURL; ?>" class="btn btn-default">Fechar</a>
        </div>
    </div>
</form>
<script type="text/javascript">
  $(document).ready(function(){
    $('input[name="matricula"]').focus();
  });

  function editarRegistro(pk_par){
    var pk_par          = pk_par;
    var fk_cid          = document.getElementById("fk_cid").value;
    var nome_fantasia   = document.forms["alterarRegistro"]["nome_fantasia"].value;
    var razao_social    = document.forms["alterarRegistro"]["razao_social"].value;
    var cnpj            = document.forms["alterarRegistro"]["cnpj"].value;
    var endereco        = document.forms["alterarRegistro"]["endereco"].value;
    var bairro          = document.forms["alterarRegistro"]["bairro"].value;
    var cep             = document.forms["alterarRegistro"]["cep"].value;

    //VALIDAÇÃO DE CAMPOS OBRIGATÓRIOS
    if (nome_fantasia == "" || typeof(nome_fantasia) == "undefined") {
        $('input[name="nome_fantasia"]').focus();
        swal("", "Campo NOME FANTASIA é obrigatório!", "error");
        return false;
    }

    if (cnpj == "" || typeof(cnpj) == "undefined") {
        $('input[name="cnpj"]').focus();
        swal("", "Campo CNPJ é obrigatório!", "error");
        return false;
    } else {
        if (validarCNPJ(cnpj) == false) {
            $('input[name="cnpj"]').focus();
            swal("", "CNPJ inválido!", "error");
            return false;
        }
    }

    // if (fk_cid == "N" || fk_cid == "" || typeof(fk_cid) == "undefined") {
    //     document.getElementById("fk_cid").focus();
    //     swal("", "Campo CIDADE é obrigatório!", "error");
    //     return false;
    // }

    let items = new URLSearchParams();
    items.append("pk_par", pk_par);
    items.append("fk_cid", fk_cid);
    items.append("nome_fantasia", nome_fantasia);
    items.append("razao_social", razao_social);
    items.append("cnpj", cnpj);
    items.append("endereco", endereco);
    items.append("bairro", bairro);
    items.append("cep", cep);
    
    axios({
        method: "POST",
        url: "parametros/editarRegistro",
        data: items
    }).then(res => {
        var data_return = res.data;
        console.log(res);
        if (data_return == "SUCCESS") {
          swal({
              title: "",
              text: "Parâmetros editados com sucesso!",
              type: "success"
          }).then(function(){
            location.reload();
          });
        } else {
            swal("", "Ocorreu um problema!", "error");
        }
    }).catch(function(error){
        console.log(error);
    });

  } //Fim da função editarRegistro
</script>
<?php endforeach; ?>