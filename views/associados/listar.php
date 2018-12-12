<div class="row">
  <h3 style="background-color:#286090;color:#FFFFFF;padding:7px;">Cadastro de associados</h3>
  <hr class="col-sm-12" />
  <div class="col-sm-12" style="border:1px solid #000000;padding:10px;">
    <label for="">Parâmetros de pesquisa:</label>
    <p></p>
    <div class="col-sm-10">
      <div class="col-sm-5">
        <label for="">Nome:</label>
        <input type="text" id="por_nome" class="date-range-filter" style="width:308px;text-transform:uppercase;">
        <br /><br />
        <label for="">Dt. Nasc.:</label>
        <input type="date" id="min_date" class="date-range-filter" style="width:132px;"> até
        <input type="date" id="max_date" class="date-range-filter" style="width:132px;">
        <br /><br />
        <label for="">Matrícula:</label>
        <input type="text" id="por_matricula" class="date-range-filter" style="width: 153px;text-transform:uppercase;"  onkeypress="return SomenteNumero(event)" maxlength="10" />
      </div>
      <div class="col-sm-5">
        <label for="fk_lot">Lotação:</label>
        <select id="por_fk_lot" class="date-range-filter" style="width: 40%;">
            <option value="T">Todos</option>
            <?php foreach($lotacoes as $lot): ?>
            <option value="<?php echo $lot['descricao']; ?>">
                <?php echo $lot['descricao']; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br /><br />
        <label for="fk_sit">Situação:</label>
        <select id="por_fk_sit" class="date-range-filter" required="required" style="width: 39%;">
            <option value="T">Todos</option>
            <?php foreach($situacoes as $sit): ?>
            <option value="<?php echo $sit['descricao']; ?>">
                <?php echo $sit['descricao']; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br /><br />
        <label for="rg">RG:</label>
        <input type="text" id="por_rg" class="date-range-filter" style="width:95px;text-transform:uppercase;" onkeypress="return SomenteNumero(event)" maxlength="10" />
        <label for="">CPF:</label>
        <input type="text" id="por_cpf" class="date-range-filter" onkeypress="return SomenteNumero(event)" maxlength="11" style="width:95px;text-transform:uppercase;" />
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
      <a  href="<?php echo BASEURL; ?>associados/novo" class="btn btn-primary" title="Novo registro" @click.prevent="preparaInsert">
          <span class="glyphicon glyphicon-tag"></span>
          Novo registro
      </a>
      <p></p>
      <div class="tabelario" style="display:none;">
        <table id="tbRegistros" class="table display table-striped table-bordered" cellspacing="0" width="100%" style="display:none;">
              <thead>
                  <td class="header_treat" style="width:5%;">Matricula:</td>
                  <td class="header_treat">Associado:</td>
                  <td class="header_treat">CPF:</td>
                  <td class="header_treat">RG:</td>
                  <td class="header_treat">Lotação:</td>
                  <td class="header_treat">Dt. Nasc.:</td>
                  <td class="header_treat">Situação:</td>
                  <td class="header_treat" style="text-align:right;width:15%;">Opções</td>
              </thead>
              <tbody>
                  <?php foreach($associados as $ass): ?>
                  <?php
                      $date_set = date_create($ass['data_nasc']);
                      $data_act = date_format($date_set, 'd-m-Y');
                  ?>
                  <tr>
                      <td style="width:1%;text-align:center;"><?php echo $ass['matricula']; ?></td>
                      <td style="width:15%;text-align:left;"><?php echo $ass['nome']; ?></td>
                      <td style="width:3%;text-align:center;"><?php echo $ass['cpf']; ?></td>
                      <td style="width:2%;text-align:center;"><?php echo $ass['rg']; ?></td>
                      <td style="width:2%;text-align:center;"><?php echo $ass['nomelot']; ?></td>
                      <?php if($ass['data_nasc'] == null): ?>
                        <td style="width:9%;text-align:center;">00/00/0000</td>
                      <?php else: ?>
                        <td style="width:9%;text-align:center;"><?php echo implode('/', explode('-', $data_act)); ?></td>
                      <?php endif; ?>
                      <?php if($ass['nomesit'] == "INATIVO"): ?>
                        <td style="width:2%;text-align:center;background-color:#e60000;color:white;"><?php echo $ass['nomesit']; ?></td>
                      <?php else: ?>
                        <td style="width:2%;text-align:center;"><?php echo $ass['nomesit']; ?></td>
                      <?php endif; ?>
                      <td style="text-align:right">
                        <a href="<?php echo BASEURL; ?>associados/dependentes/?id=<?php echo $ass['pk_ass']; ?>" class="" title="Dependentes" style="text-decoration:none;color:blue;cursor:pointer;"><span class="glyphicon glyphicon-edit"></span>Dependentes</a>&nbsp;
                        <a href="<?php echo BASEURL; ?>associados/celulares/?id=<?php echo $ass['pk_ass']; ?>" class="" title="Telefones" style="text-decoration:none;color:black;cursor:pointer;"><span class="glyphicon glyphicon-edit"></span>Celulares</a>&nbsp;
                        <a href="<?php echo BASEURL; ?>associados/editar/?id=<?php echo $ass['pk_ass']; ?>" class="" title="Editar" style="text-decoration:none;color:green;cursor:pointer;"><span class="glyphicon glyphicon-edit"></span>Editar</a>&nbsp;
                        <a class="" title="Excluir registro" onclick="delAssociado(<?php echo $ass['pk_ass']; ?>)" style="text-decoration:none;color:red;cursor:pointer;"><span class="glyphicon glyphicon-remove"></span>Excluir</a>
                      </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
      </div>
  </div>
</div>
<hr />
<script type="text/javascript">
  $(document).ready(function(){
    var url = window.location.href;
    url = url.split("/");
    
    let filtro = JSON.parse(sessionStorage.getItem('filtro'));

    if (filtro !== null) {
        if (filtro.tela === url[4]){
            $("#por_nome").val(filtro.campos.por_nome);
            $("#min_date").val(filtro.campos.min_date);
            $("#max_date").val(filtro.campos.max_date);
            $("#por_matricula").val(filtro.campos.por_matricula);
            $("#por_cpf").val(filtro.campos.por_cpf);
            $("#por_fk_lot").val(filtro.campos.por_fk_lot);
            $("#por_fk_sit").val(filtro.campos.por_fk_sit);
            $("#por_rg").val(filtro.campos.por_rg);
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
                por_nome:'',
                min_date: '',
                max_date: '',
                por_matricula: '',
                por_cpf: '',
                por_fk_lot: '',
                por_fk_sit: '',
                por_rg: ''
            },
            tela: ''
        };

        filtro.tela = url[4];
        filtro.campos.por_nome = $("#por_nome").val();
        filtro.campos.min_date = $("#min_date").val();
        filtro.campos.max_date = $("#max_date").val();
        filtro.campos.por_matricula = $("#por_matricula").val();
        filtro.campos.por_cpf = $("#por_cpf").val();
        filtro.campos.por_fk_lot = $("#por_fk_lot").val();
        filtro.campos.por_fk_sit = $("#por_fk_sit").val();
        filtro.campos.por_rg = $("#por_rg").val();
        
        sessionStorage.setItem('filtro', JSON.stringify(filtro));
        
        if($.fn.DataTable.isDataTable( '#tbRegistros' )){
           mostrarTabela();
        } else {
          $("#tbRegistros").DataTable().destroy();
        }
    });

  });

  //BUSCA POR DATA INICIAL E FINAL
  function garanteDate(texto){
    let data = ''
    if (texto != null){
        data = texto.substr(6,4)+'-'+texto.substr(3,2)+'-'+texto.substr(0,2)
      }
      return data;
  }

  $.fn.dataTableExt.afnFiltering.push(
      function( settings, data, dataIndex ) {
          var min  = $('#min_date').val() ? $('#min_date').val()+'T00:00:00' : '';
          var max  = $('#max_date').val() ? $('#max_date').val()+'T23:59:59' : '';
          var createdAt = data[5] || 0; // Our date column in the table
          createdAt = garanteDate(createdAt);
          var startDate   = new Date(min);
          var endDate     = new Date(max);
          var diffDate = new Date(createdAt);
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

  //BUSCA POR NOME
  $.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
      var nome = $('#por_nome').val().toUpperCase();
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

  //BUSCA POR MATRÍCULA
  $.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
      var matricula = $('#por_matricula').val().toUpperCase().toString();
      var campo = data[0] || 0; // use data for the age column

      if ((matricula == "") || (campo.includes(matricula)))
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

  //BUSCA POR CPF
  $.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
      var cpf = $('#por_cpf').val().toUpperCase().toString();
      var campo = data[2] || 0; // use data for the age column

      if ((cpf == "") || (campo.includes(cpf)))
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

  //BUSCA POR LOTAÇÃO
  $.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
      var lotacao = $('#por_fk_lot').val().toUpperCase();
      var campo = data[4] || 0; // use data for the age column

      if ((lotacao == "T") || (campo == lotacao))
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
  $.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
      var situacao = $('#por_fk_sit').val().toUpperCase();
      var campo = data[6] || 0; // use data for the age column

      if ((situacao == "T") || (campo == situacao))
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

  //BUSCA POR RG
  $.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
      var rg = $('#por_rg').val().toUpperCase();
      var campo = data[3] || 0; // use data for the age column

      if ((rg == "") || (campo == rg))
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

  //BUSCA POR XXXXX
  // $.fn.dataTable.ext.search.push(
  // function( settings, data, dataIndex ) {
  //     var min = parseInt( $('#min').val(), 10 );
  //     var max = parseInt( $('#max').val(), 10 );
  //     var age = parseFloat( data[5] ) || 0; // use data for the age column
  //
  //     if ( ( isNaN( min ) && isNaN( max ) ) ||
  //          ( isNaN( min ) && age <= max ) ||
  //          ( min <= age   && isNaN( max ) ) ||
  //          ( min <= age   && age <= max ) )
  //     {
  //         return true;
  //     }
  //     return false;
  //     }
  // );
  //
  // $(document).ready(function() {
  //     var table = $('#tbRegistros').DataTable();
  //
  //     // Event listener to the two range filtering inputs to redraw on input
  //     $('#min, #max').keyup( function() {
  //         table.draw();
  //     } );
  // } );

  // Mostrar a tabela
  function mostrarTabela(){
    $(".tabelario").css("display", "");
  }

  //Limpar tela
  function limparTudo(){
    sessionStorage.removeItem('filtro');
    location.reload();
  }

  //Deletar registro
  function delAssociado(pk_ass){
      let items = new URLSearchParams();
      items.append("pk_ass", pk_ass);

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
                  url: "associados/delAssociado",
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
                      swal("", "Associados com depedentes e/ou celulares cadastrados! Impossível excluir.", "error");
                  }
              });
          }
      });
    }
</script>
