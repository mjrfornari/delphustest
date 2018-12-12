<div class="row">
  <h3 style="background-color:#286090;color:#FFFFFF;padding:7px;">Cadastro de Contas a receber</h3>
  <hr class="col-sm-12" />
  <div class="col-sm-12" style="border:1px solid #000000;padding:10px;">
    <label for="">Parâmetros de pesquisa:</label>
    <p></p>
    <div class="col-sm-10">
      <div class="col-sm-10">
        <label for="">Competência:</label>
        <input type="text" id="por_competencia" class="date-range-filter" style="width:55px;text-transform:uppercase;" onkeypress="return SomenteNumero(event)" maxlength="6" />&nbsp;
        <label for="por_situacao">Situação:</label>
        <select id="por_situacao" class="date-range-filter" style="width: 20%;">
            <option value="T">Todas</option>
            <option value="P">Pendentes</option>
            <option value="R">Recebidas</option>
        </select>&nbsp;
        <label for="">Associado:</label>
        <input type="text" id="por_associado" class="date-range-filter" style="width: 291px;text-transform:uppercase;" />
        <br /><br />
        <label for="">Venc. Incial:</label>
        <input type="date" id="min_venc" class="date-range-filter" style="width:132px;">
        <label for="">Venc. Final:</label>
        <input type="date" id="max_venc" class="date-range-filter" style="width:132px;">&nbsp;
        <label for="por_tipo_serv">Serviço:</label>
        <select id="por_tipo_serv" class="date-range-filter" required="required" style="width: 34%;">
            <option value="T">Selecione</option>
            <?php foreach($tipos_servicos as $tser): ?>
            <option value="<?php echo $tser['descricao']; ?>">
                <?php echo $tser['descricao']; ?>
            </option>
            <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="col-sm-2">
      <input type="button" id="processar" value="Processar" class="btn btn-warning" style="color: #000000;" />
      <br /><br />
      <input type="button" name="limpar" value="&nbsp;&nbsp;&nbsp;Limpar&nbsp;&nbsp;&nbsp;" onclick="limparTudo()" class="btn btn-default">
    </div>
  </div>
  <hr class="col-sm-12"/>
  <div class="col-sm-12">
    <button href="#" data-toggle="modal" data-target="#novoRegistro" class="btn btn-primary" title="Novo registro">
        <span class="glyphicon glyphicon-tag"></span>
        Novo registro
    </button>
    <p></p>
    <!-- MODAL NOVO INICIO -->
    <div id="novoRegistro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="NovoRegistro" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <label>Novo registro de contas a receber</label>
                    <form method="POST" name="salvarRegistro" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="ano_comp">Ano competência:</label>
                                <select name="ano_comp_novo" id="ano_comp_novo" class="form-control">
                                    <option value="NNN">Selecione</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label for="mes_comp">Mês competência:</label>
                                <select name="mes_comp_novo" id="mes_comp_novo" class="form-control">
                                    <option value="NNN">Selecione</option>
                                    <option value="12">12</option>
                                    <option value="11">11</option>
                                    <option value="10">10</option>
                                    <option value="09">09</option>
                                    <option value="08">08</option>
                                    <option value="07">07</option>
                                    <option value="06">06</option>
                                    <option value="05">05</option>
                                    <option value="04">04</option>
                                    <option value="03">03</option>
                                    <option value="02">02</option>
                                    <option value="01">01</option>
                                </select>
                            </div>
                            <p class="col-sm-10"></p>
                            <div class="col-sm-6">
                                <label for="tipo_serv_novo">Serviço:</label>
                                <select id="tipo_serv_novo" name="tipo_serv_novo" class="date-range-filter form-control" required="required" >
                                <!-- onchange="popularValor()" -->
                                    <option value="NNN">Selecione</option>
                                    <?php foreach($tipos_servicos as $tser): ?>
                                    <option value="<?php echo $tser['pk_ser']; ?>">
                                        <?php echo $tser['descricao'] . ' (' . 'R$' . number_format($tser['valor'], 2, ',', '.') . ')'; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- <div class="col-sm-3">
                                <label for="valor_visualizar_novo">Valor:</label>   
                                <input type="text" id="valor_visualizar_novo" class="form-control" readonly="readonly" disabled style="width:100px;" />
                            </div> -->
                            <div class="col-sm-10">
                                <label for="associado_novo">Associado:</label>
                                <input type="text" name="associado_novo" id="associado_novo" class="form-control addresspicker" style="text-transform:uppercase;"  />
                            </div>
                            <div class="col-sm-5">
                                <label for="">Data emissão:</label>
                                <input type="date" name="data_emissao_novo" class="form-control" style="width:165px;">
                            </div>
                            <div class="col-sm-5">
                                <label for="">Data Vencimento:</label>
                                <input type="date" name="data_vencimento_novo" class="form-control" style="width:165px;">
                            </div>
                            <div class="col-sm-5">
                                <label for="valor_novo">Valor:</label>
                                <input type="text" name="valor_novo" class="form-control" style="text-transform:uppercase;" onkeypress="return SomenteValor(this, event)" maxlength="10" />
                            </div>
                            <div class="col-sm-10">
                                <label for="observacao">Observação:</label>
                                <input type="text" name="observacao_novo" class="form-control" style="text-transform:uppercase;" />
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="inserirRegistro()">Salvar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL NOVO FIM -->
      <div class="tabelario" style="display:none;">
        <table id="tbRegistros" class="table table-striped table-bordered" cellspacing="0" width="100%" style="display:none;">
              <thead>
                  <td class="header_treat">Associado:</td>
                  <td class="header_treat" style="width:1%;">Comp:</td>
                  <td class="header_treat">Serviço:</td>
                  <td class="header_treat">Geração:</td>
                  <td class="header_treat">Emissão:</td>
                  <td class="header_treat">Vencto:</td>
                  <td class="header_treat">Valor:</td>
                  <td class="header_treat">Valor pago:</td>
                  <td class="header_treat">Dt. Pgto:</td>
                  <td class="header_treat">Valor Pend.:</td>
                  <td class="header_treat">Observação:</td>
                  <td class="header_treat" style="text-align:right;width:15%;">Opções</td>
              </thead>
              <tbody>
                  <?php foreach($contas_receber as $ctr): ?>
                  <?php
                      $date_ger = date_create($ctr['data_geracao']);
                      $data_ger = date_format($date_ger, 'd-m-Y');
                      $date_emis = date_create($ctr['data_emis']);
                      $data_emis = date_format($date_emis, 'd-m-Y');
                      $date_venc = date_create($ctr['data_venc']);
                      $data_venc = date_format($date_venc, 'd-m-Y');
                      $date_liq = date_create($ctr['data_liq']);
                      $data_liq = date_format($date_liq, 'd-m-Y');
                  ?>
                  <tr>
                      <td style="width:1%;text-align:center;"><?php echo $ctr['nomeass']; ?></td>
                      <td style="width:1%;text-align:center;"><?php echo $ctr['competencia']; ?></td>
                      <td style="width:15%;text-align:left;"><?php echo $ctr['nomeser']; ?></td>
                      <td style="width:3%;text-align:center;"><?php echo implode('/', explode('-', $data_ger)); ?></td>
                      <td style="width:3%;text-align:center;"><?php echo implode('/', explode('-', $data_emis)); ?></td>
                      <td style="width:3%;text-align:center;"><?php echo implode('/', explode('-', $data_venc)); ?></td>
                      <td style="width:2%;text-align:center;"><?php echo "R$" . number_format($ctr['valor'], 2, ",", "."); ?></td>
                      <td style="width:2%;text-align:center;"><?php echo "R$" . number_format($ctr['valor_recebido'], 2, ",", "."); ?></td>
                      <td style="width:3%;text-align:center;"><?php echo implode('/', explode('-', $data_liq)); ?></td>
                      <td style="width:1%;text-align:center;"><?php echo "R$" . number_format($ctr['valor_pendente'], 2, ",", "."); ?></td>
                      <td style="width:1%;text-align:center;"><?php echo $ctr['observacao']; ?></td>
                      <td style="text-align:right">
                        <a href="#" data-toggle="modal" data-target="#editarRegistro<?php echo $ctr['pk_ctr']; ?>" title="Editar registro" style="text-decoration:none;color:green;cursor:pointer;"><span class="glyphicon glyphicon-edit"></span>Editar</a>&nbsp;
                        <a class="" title="Excluir registro" onclick="delAssociado(<?php echo $ctr['pk_ctr']; ?>)" style="text-decoration:none;color:red;cursor:pointer;"><span class="glyphicon glyphicon-remove"></span>Excluir</a>
                      </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
          <!-- EDITAR REGISTRO INICIO -->
          <?php foreach($contas_receber as $ctr): ?>
          <?php
            $ano_comp = substr($ctr['competencia'], 0, -2);
            $mes_comp = substr($ctr['competencia'], -2, 2);
          ?>
          <div id="editarRegistro<?php echo $ctr['pk_ctr']; ?>" class="modal fade editarRegistro" tabindex="-1" role="dialog" aria-labelledby="EditarRegistro" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <label>Alterar registro de contas a receber</label>
                        <form method="POST" id="registroEditar<?php echo $ctr['pk_ctr']; ?>" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="ano_comp">Ano competência:</label>
                                    <select name="ano_comp_editar" id="ano_comp_editar" class="form-control">
                                        <option value="NNN">Selecione</option>
                                        <option value="2020" <?php echo $ano_comp == "2020" ? 'selected':''; ?>>2020</option>
                                        <option value="2019" <?php echo $ano_comp == "2019" ? 'selected':''; ?>>2019</option>
                                        <option value="2018" <?php echo $ano_comp == "2018" ? 'selected':''; ?>>2018</option>
                                        <option value="2017" <?php echo $ano_comp == "2017" ? 'selected':''; ?>>2017</option>
                                        <option value="2016" <?php echo $ano_comp == "2016" ? 'selected':''; ?>>2016</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="mes_comp">Mês competência:</label>
                                    <select name="mes_comp_editar" id="mes_comp_editar" class="form-control">
                                        <option value="NNN">Selecione</option>
                                        <option value="12" <?php echo $mes_comp == "12" ? 'selected':''; ?>>12</option>
                                        <option value="11" <?php echo $mes_comp == "11" ? 'selected':''; ?>>11</option>
                                        <option value="10" <?php echo $mes_comp == "10" ? 'selected':''; ?>>10</option>
                                        <option value="09" <?php echo $mes_comp == "09" ? 'selected':''; ?>>09</option>
                                        <option value="08" <?php echo $mes_comp == "08" ? 'selected':''; ?>>08</option>
                                        <option value="07" <?php echo $mes_comp == "07" ? 'selected':''; ?>>07</option>
                                        <option value="06" <?php echo $mes_comp == "06" ? 'selected':''; ?>>06</option>
                                        <option value="05" <?php echo $mes_comp == "05" ? 'selected':''; ?>>05</option>
                                        <option value="04" <?php echo $mes_comp == "04" ? 'selected':''; ?>>04</option>
                                        <option value="03" <?php echo $mes_comp == "03" ? 'selected':''; ?>>03</option>
                                        <option value="02" <?php echo $mes_comp == "02" ? 'selected':''; ?>>02</option>
                                        <option value="01" <?php echo $mes_comp == "01" ? 'selected':''; ?>>01</option>
                                    </select>
                                </div>
                                <p class="col-sm-10"></p>
                                <div class="col-sm-6">
                                    <label for="tipo_serv_editar">Serviço:</label>
                                    <select id="tipo_serv_editar" name="tipo_serv_editar" class="date-range-filter form-control" required="required" >
                                    <!-- onchange="popularValorEditado(<?php //echo $ctr['pk_ctr']; ?>)" -->
                                        <option value="NNN">Selecione</option>
                                        <?php foreach($tipos_servicos as $tser): ?>
                                        <option value="<?php echo $tser['pk_ser']; ?>" <?php echo $tser['pk_ser'] == $ctr['fk_ser'] ? 'selected':''; ?>>
                                            <?php echo $tser['descricao'] . ' (' . 'R$' . number_format($tser['valor'], 2, ',', '.') . ')'; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- <div class="col-sm-3">
                                    <label for="valor_visualizar_edicao">Valor:</label>   
                                    <input type="text" name="valor_visualizar_edicao" id="valor_visualizar_edicao" class="form-control" readonly="readonly" disabled style="width:100px;" />
                                </div> -->
                                <div class="col-sm-10">
                                    <label for="associado_editar">Associado:</label>
                                    <input type="text" name="associado_editar" id="associado_editar<?php echo $ctr['pk_ctr']; ?>" class="form-control addresspicker" style="text-transform:uppercase;" />
                                </div>
                                <div class="col-sm-5">
                                    <label for="">Data emissão:</label>
                                    <input type="date" name="data_emissao_editar" class="form-control" style="width:165px;" value="<?php echo $ctr['data_emis']; ?>" />
                                </div>
                                <div class="col-sm-5">
                                    <label for="">Data Vencimento:</label>
                                    <input type="date" name="data_vencimento_editar" class="form-control" style="width:165px;" value="<?php echo $ctr['data_venc']; ?>" />
                                </div>
                                <div class="col-sm-5">
                                    <label for="valor_novo">Valor:</label>
                                    <input type="text" name="valor_editar" class="form-control" style="text-transform:uppercase;" onkeypress="return SomenteValor(this, event)" maxlength="10" value="<?php echo str_replace(".", ",", $ctr['valor']); ?>" />
                                </div>
                                <div class="col-sm-10">
                                    <label for="observacao">Observação:</label>
                                    <input type="text" name="observacao_editar" class="form-control" style="text-transform:uppercase;" value="<?php echo $ctr['observacao']; ?>" />
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="atualizarRegistro(<?php echo $ctr['pk_ctr']; ?>)">Salvar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!-- EDITAR REGISTRO FIM -->
      </div>
  </div>
</div>
<hr />
<script type="text/javascript">
var fk_associado = 0;
var fk_associado_editar = {};

  $(document).ready(function(){
    var url = window.location.href;
    url = url.split("/");
    
    let filtro = JSON.parse(sessionStorage.getItem('filtro'));

    if (filtro !== null) {
        if (filtro.tela === url[4]){
            $("#por_competencia").val(filtro.campos.por_competencia);
            $("#min_venc").val(filtro.campos.min_venc);
            $("#max_venc").val(filtro.campos.max_venc);
            $("#por_associado").val(filtro.campos.por_associado);
            $("#por_situacao").val(filtro.campos.por_situacao);
            $("#por_tipo_serv").val(filtro.campos.por_tipo_serv);
            mostrarTabela();
        } else {
            sessionStorage.removeItem('filtro'); 
        }
    }

    $("#tbRegistros").css("display", "");

    $("#processar").click();

    var tabela = $("#tbRegistros").DataTable({
        "responsive": true,
        "paging": true,
        "pageLength": 10,
        "info": true,
        "searching": true,
        "stateSave": true,
        "sDom":"ltipr",
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtrado de _MAX_ registros no total)"
        }
    });

    $("#processar").click(function(){
        let filtro = {
            campos:{
                por_competencia:'',
                min_venc: '',
                max_venc: '',
                por_associado: '',
                por_situacao: '',
                por_tipo_serv: ''
            },
            tela: ''
        };

        filtro.tela = url[4];
        filtro.campos.por_competencia = $("#por_competencia").val();
        filtro.campos.min_venc = $("#min_venc").val();
        filtro.campos.max_venc = $("#max_venc").val();
        filtro.campos.por_associado = $("#por_associado").val();
        filtro.campos.por_situacao = $("#por_situacao").val();
        filtro.campos.por_tipo_serv = $("#por_tipo_serv").val();
        
        sessionStorage.setItem('filtro', JSON.stringify(filtro));
        
        if($.fn.DataTable.isDataTable( '#tbRegistros' )){
           mostrarTabela();
        } else {
          $("#tbRegistros").DataTable().destroy();
        }
    });

  });

  //BUSCA POR VENC INICIAL E FINAL
  function garanteDate(texto){
    let data = ''
    if (texto != null){
        data = texto.substr(6,4)+'-'+texto.substr(3,2)+'-'+texto.substr(0,2)
      }
      return data;
  }

  $.fn.dataTableExt.afnFiltering.push(
      function( settings, data, dataIndex ) {
          var min  = $('#min_venc').val() ? $('#min_venc').val()+'T00:00:00' : '';
          var max  = $('#max_venc').val() ? $('#max_venc').val()+'T23:59:59' : '';
          var createdAt = data[5] || 0; // Our date column in the table
          createdAt = garanteDate(createdAt);
          var startDate   = new Date(min);
          var endDate     = new Date(max);
          var diffDate    = new Date(createdAt);
          
          if (
            (min == "" && max == "") ||
            ( !moment(createdAt+'T12:00:00').isSameOrBefore(min) && !moment(createdAt+'T12:00:00').isSameOrAfter(max) )


          ) {  return true;  }
          return false;

      }
  );

  $(document).ready(function() {
      var table = $('#tbRegistros').DataTable();

      // Event listener to the two range filtering inputs to redraw on input
      $("#processar").click(function() {
          table.draw();
      } );
  } );

  //BUSCA POR COMPETÊNCIA
  $.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
      var nome = $('#por_competencia').val().toUpperCase();
      var campo = data[1] || 0; // coluna que será filtrada

      if ((nome == "") || (campo.includes(nome)))
      {
          return true;
      }
      return false;
      }
  );

  $(document).ready(function() {
      var tabela = $('#tbRegistros').DataTable();

      // Evento click que aciona o filtro
      $("#processar").click(function() {
          tabela.draw();
      });
  });

  //BUSCA POR ASSOCIADO
  $.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
      var associado = $('#por_associado').val().toUpperCase();
      var campo = data[0] || 0; // use data for the age column

      if ((associado == "") || (campo.includes(associado)))
      {
          return true;
      }
      return false;
      }
  );

  $(document).ready(function() {
      var table = $('#tbRegistros').DataTable();

      // Event listener to the two range filtering inputs to redraw on input
      $("#processar").click(function() {
          table.draw();
      } );
  });

  //BUSCA POR SITUAÇÃO
  function garanteValor(texto){
    let data = ''
    if (texto != null){
        data = parseFloat(texto.substr(2,12).replace(".", "").replace(",", "."));
      }
      return data;
  }

  $.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
      var situacao = $('#por_situacao').val().toUpperCase();
      var campo = data[9] || 0;
      campo = garanteValor(campo);
      
      if (situacao == "P") 
      {
        if (campo > 0) 
        {
            return true;
        } else 
            return false;
      } else if (situacao == "R") 
      {
        if (campo == 0) 
        {
            return true;
        } else 
            return false;
      }
      return true;
      }
  );

  $(document).ready(function() {
      var table = $('#tbRegistros').DataTable();

      // Event listener to the two range filtering inputs to redraw on input
      $("#processar").click(function() {
          table.draw();
      } );
  });

  //BUSCA POR TIPO SERVIÇO
  $.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
      var tipo_serv = $('#por_tipo_serv').val().toUpperCase();
      var campo = data[2] || 0; // use data for the age column
     
      if ((tipo_serv == "T") || (campo == tipo_serv))
      {
          return true;
      }
      return false;
      }
  );

  $(document).ready(function() {
      var table = $('#tbRegistros').DataTable();

      // Event listener to the two range filtering inputs to redraw on input
      $("#processar").click(function() {
          table.draw();
      } );
  });

  // Mostrar a tabela
  function mostrarTabela(){
    $(".tabelario").css("display", "");
  }

  //Limpar tela
  function limparTudo(){
    sessionStorage.removeItem('filtro');
    location.reload();
  }

  //Automaticamente popular o input valor conforme select do tipo de serviço
  //EDIT: Colocado o valor juntamente com a opção no select

//   function popularValor(){
//     var tipo_serv_novo = document.forms["salvarRegistro"]["tipo_serv_novo"].value;

//     let items = new URLSearchParams();
//     items.append("tipo_serv_novo", tipo_serv_novo);
    
//     axios({
//         method: "POST",
//         url: "contas_receber/popularValor",
//         data: items
//     }).then(res => {
//         var data_return = res.data;
//         valor = Number(data_return[0].valor).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
//         document.getElementById("valor_visualizar_novo").value = valor;
//     }).catch(function(error){
//         console.log(error);
//     });
//   }

//   function popularValorEditado(pk_ctr){
//     var tipo_serv_editar = $("#registroEditar" + pk_ctr).serializeArray()[2].value;
//     let items = new URLSearchParams();
//     items.append("tipo_serv_editar", tipo_serv_editar);
    

//   }

  //AUTOCOMPLETE ASSOCIADO
    $( function() {
        var cache = {};
        $( "#associado_novo" ).autocomplete({
            minLength: 2,   
            source: function(request, response){
                axios.get("contas_receber/getAssociados")
                .then(res => {
                    var filter = request.term
                    var data_return = res.data.filter((item) => {
                        let value = item.label
                        console.log(item)
                        return value.includes(filter)
                    });
                    response(data_return);
                }).catch(function(error){
                    console.log(error);
                }); 
            },
            select: function(event, ui){
                fk_associado = ui.item.pk
            }
        });
        // $( "#associado_novo" ).autocomplete( "option", "appendTo", ".eventInsForm" );
        <?php foreach($contas_receber as $ctr): ?>
            // console.log(fk_associado_editar)
            $("#associado_editar<?php echo $ctr['pk_ctr']; ?>").autocomplete({
                minLength: 2,
                source: function(request, response){
                    axios.get("contas_receber/getAssociados")
                    .then(res => {
                        var filter = request.term
                        var data_return = res.data.filter((item) => {
                            let value = item.label
                            return value.includes(filter)
                        });
                        response(data_return);
                    }).catch(function(error){
                        console.log(error);
                    }); 
                },
                select: function(event, ui){
                    fk_associado_editar["<?php echo $ctr['pk_ctr']; ?>"] = ui.item.pk
                }
            });
        <?php endforeach; ?>

        //Popula autocompletes
        axios.get("contas_receber/getAssociados")
        .then(res => {
            let filtered = ''
            <?php foreach($contas_receber as $ctr): ?>
                filtered = res.data.filter((item) => {
                    return Number(item.pk) === Number(<?php echo $ctr['fk_ass']; ?>)
                })
                fk_associado_editar["<?php echo $ctr['pk_ctr']; ?>"] = filtered[0].pk
                $("#associado_editar<?php echo $ctr['pk_ctr']; ?>").val(filtered[0].label)
            <?php endforeach; ?>
        }).catch(function(error){
            console.log(error);
        }); 

        // $( "#associado_editar" ).autocomplete( "option", "appendTo", ".eventInsForm" );
    });



    function inserirRegistro(){
        var associado_novo = document.forms["salvarRegistro"]["associado_novo"].value;
        var ano_comp_novo = document.forms["salvarRegistro"]["ano_comp_novo"].value;
        var mes_comp_novo = document.forms["salvarRegistro"]["mes_comp_novo"].value;
        var tipo_serv_novo = document.forms["salvarRegistro"]["tipo_serv_novo"].value;
        var data_emissao_novo = document.forms["salvarRegistro"]["data_emissao_novo"].value;
        var data_vencimento_novo = document.forms["salvarRegistro"]["data_vencimento_novo"].value;
        var valor_novo = document.forms["salvarRegistro"]["valor_novo"].value;
        var observacao_novo = document.forms["salvarRegistro"]["observacao_novo"].value;
        
        if (ano_comp_novo == "NNN" || typeof(ano_comp_novo) == "undefined") {
            document.getElementById("ano_comp_novo").focus();
            swal("", "Campo ANO COMPETÊNCIA é obrigatório!", "error");
            return false;
        }

        if (mes_comp_novo == "NNN" || typeof(mes_comp_novo) == "undefined") {
            document.getElementById("mes_comp_novo").focus();
            swal("", "Campo MÊS COMPETÊNCIA é obrigatório!", "error");
            return false;
        }

        if (tipo_serv_novo == "NNN" || tipo_serv_novo == "" || typeof(tipo_serv_novo) == "undefined") {
            document.getElementById("tipo_serv_novo").focus();
            swal("", "Campo SERVIÇO é obrigatório!", "error");
            return false;
        }

        if (associado_novo == "" || typeof(associado_novo) == "undefined") {
            $('input[name="associado_novo"]').focus();
            swal("", "Campo ASSOCIADO é obrigatório!", "error");
            return false;
        }

        if (data_emissao_novo == "" || typeof(data_emissao_novo) == "undefined") {
            $('input[name="data_emissao_novo"]').focus();
            swal("", "Campo DATA EMISSÃO é obrigatório!", "error");
            return false;
        }

        if (data_vencimento_novo == "" || typeof(data_vencimento_novo) == "undefined") {
            $('input[name="data_vencimento_novo"]').focus();
            swal("", "Campo DATA VENCIMENTO é obrigatório!", "error");
            return false;
        }

        if (valor_novo == "" || typeof(valor_novo) == "undefined") {
            $('input[name="valor_novo"]').focus();
            swal("", "Campo VALOR é obrigatório!", "error");
            return false;
        }

        console.log("Associado: ", fk_associado, "Ano competência: ", ano_comp_novo, "Mês competência: ", mes_comp_novo, "Serviço: ", tipo_serv_novo, "Data emissão: ", data_emissao_novo, "Data vencimento: ", data_vencimento_novo, "Valor: ", valor_novo, "Observação: ", observacao_novo)

        let items = new URLSearchParams();
        items.append("fk_associado", fk_associado);
        items.append("ano_comp_novo", ano_comp_novo);
        items.append("mes_comp_novo", mes_comp_novo);
        items.append("tipo_serv_novo", tipo_serv_novo);
        items.append("data_emissao_novo", data_emissao_novo);
        items.append("data_vencimento_novo", data_vencimento_novo);
        items.append("valor_novo", valor_novo);
        items.append("observacao_novo", observacao_novo);

        axios({
            method: "POST",
            url: "contas_receber/inserirRegistro",
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
                window.location.href = "/apergsweb/contas_receber";
            });
            } else {
                swal("", "Este registro já existe no sistema!", "error");
            }
        }).catch(function(error){
            console.log(error);
        });
    }

    function atualizarRegistro(pk_ctr, fk_ass){
        var associado_editar = $("#registroEditar" + pk_ctr).serializeArray()[3].value;
        var ano_comp_editar = $("#registroEditar" + pk_ctr).serializeArray()[0].value;
        var mes_comp_editar = $("#registroEditar" + pk_ctr).serializeArray()[1].value;
        var tipo_serv_editar = $("#registroEditar" + pk_ctr).serializeArray()[2].value;
        var data_emissao_editar = $("#registroEditar" + pk_ctr).serializeArray()[4].value;
        var data_vencimento_editar = $("#registroEditar" + pk_ctr).serializeArray()[5].value;
        var valor_editar = $("#registroEditar" + pk_ctr).serializeArray()[6].value;
        var observacao_editar = $("#registroEditar" + pk_ctr).serializeArray()[7].value;
        
        if (ano_comp_editar == "NNN" || typeof(ano_comp_editar) == "undefined") {
            document.getElementById("ano_comp_editar").focus();
            swal("", "Campo ANO COMPETÊNCIA é obrigatório!", "error");
            return false;
        }

        if (mes_comp_editar == "NNN" || typeof(mes_comp_editar) == "undefined") {
            document.getElementById("mes_comp_editar").focus();
            swal("", "Campo MÊS COMPETÊNCIA é obrigatório!", "error");
            return false;
        }

        if (tipo_serv_editar == "NNN" || tipo_serv_editar == "" || typeof(tipo_serv_editar) == "undefined") {
            document.getElementById("tipo_serv_editar").focus();
            swal("", "Campo SERVIÇO é obrigatório!", "error");
            return false;
        }

        if (associado_editar == "" || typeof(associado_editar) == "undefined") {
            $('input[name="associado_editar"]').focus();
            swal("", "Campo ASSOCIADO é obrigatório!", "error");
            return false;
        }

        if (data_emissao_editar == "" || typeof(data_emissao_editar) == "undefined") {
            $('input[name="data_emissao_editar"]').focus();
            swal("", "Campo DATA EMISSÃO é obrigatório!", "error");
            return false;
        }

        if (data_vencimento_editar == "" || typeof(data_vencimento_editar) == "undefined") {
            $('input[name="data_vencimento_editar"]').focus();
            swal("", "Campo DATA VENCIMENTO é obrigatório!", "error");
            return false;
        }

        if (valor_editar == "" || typeof(valor_editar) == "undefined") {
            $('input[name="valor_editar"]').focus();
            swal("", "Campo VALOR é obrigatório!", "error");
            return false;
        }
        console.log(fk_associado_editar[pk_ctr])
        console.log("Associado: ", fk_associado_editar[pk_ctr], "Ano competência: ", ano_comp_editar, "Mês competência: ", mes_comp_editar, "Serviço: ", tipo_serv_editar, "Data emissão: ", data_emissao_editar, "Data vencimento: ", data_vencimento_editar, "Valor: ", valor_editar, "Observação: ", observacao_editar)
        // console.log($("#associado_editar" + pk_ctr).val())
        let items = new URLSearchParams();
        items.append("pk_ctr", pk_ctr);
        items.append("fk_associado_editar", fk_associado_editar[pk_ctr]);
        items.append("ano_comp_editar", ano_comp_editar);
        items.append("mes_comp_editar", mes_comp_editar);
        items.append("tipo_serv_editar", tipo_serv_editar);
        items.append("data_emissao_editar", data_emissao_editar);
        items.append("data_vencimento_editar", data_vencimento_editar);
        items.append("valor_editar", valor_editar);
        items.append("observacao_editar", observacao_editar);

        axios({
            method: "POST",
            url: "contas_receber/editarRegistro",
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
                window.location.href = "/apergsweb/contas_receber";
            });
            } else {
                swal("", "Este registro já existe no sistema!", "error");
            }
        }).catch(function(error){
            console.log(error);
        });
    }

  //Deletar registro
  function delAssociado(pk_ctr){
      let items = new URLSearchParams();
      items.append("pk_ctr", pk_ctr);

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
                  url: "contas_receber/delAssociado",
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
                      swal("", "contas_receber com depedentes! Impossível excluir.", "error");
                  }
              });
          }
      });
    };

    
</script>
