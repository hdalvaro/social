<form id="formConsulta" name="formConsulta" method="post">
    <legend>Consulta de Benefícios Concedidos</legend>
    <div class="row form-group">
        <div class="col-md-4 col-lg-3 col-sm-12 col-xs-12">
            <label for="nis">NIS</label>
            <input class="form-control" name="nis" id="nis" value="">
        </div>
        <div class="col-md-4 col-lg-3 col-sm-12 col-xs-12">
            <label for="cpf">CPF</label>
            <input class="form-control" name="cpf" id="cpf" value="">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4 col-lg-3 col-xs-12 col-sm-12">
            <button type="button" class="btn btn-info" id="btnConsultar" name="btnConsultar">
                <i class="material-icons">search</i> Consultar
            </button>
        </div>
    </div>
</form>
<div class="resultados">
    <div class="row form-group">
        <div class="col-md-12">
            <legend>Resultados da Consulta</legend>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
            <table hidden="" id="tabelaResultados" class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>Data de Concessão</th>
                        <th>Beneficiário</th>
                        <th>Nº Benefício</th>
                        <th>Valor</th>                        
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $("#btnConsultar").on("click", function () {
        $.getJSON("./consulta/getBeneficios/", function (data) {
            console.log(data);
            var cor = "";
            $("tbody").html("");
            $("#tabelaResultados").removeAttr("hidden");
            $.each(data, function (key, val) {
                if (val.status === '1') {
                    cor = '#f28e8c';
                } else {
                    cor = "#fafafa";
                }
                $('#tabelaResultados > tbody:last-child').append(
                        '<tr style="background-color:' + cor + '">'
                        + '<td>' + val.data_concessao + '</td>'
                        + '<td>' + val.nome_beneficiario + '</td>'
                        + '<td>' + val.numero_beneficio + '</td>'
                        + '<td>' + val.valor + '</td>'
                        + '</tr>');
            });
        });
    });

</script>