var base_url = 'http://saudebucal.bentogoncalves.rs.gov.br/';
$(document).ready(function () {
    if ($("#id").val() != "") {
        $(".identificacaoEscola").removeAttr("hidden");
    }
    $("#adicionarEscola").on("click", function () {
        $.post(base_url + "insert-escola", {
            id_escola: $("#id_escola").val(),
            login: $("#login").val()
        }, function () {
            $('#tabelaEscola').dataTable().fnDestroy();
            criaTabela();
        });

    });
    criaTabela();
    function criaTabela() {
        $('#tabelaEscola').DataTable({
            "processing": true,
            "bDestroy": true,
            "paging": false,
            "ajax": "/admin/NovoUsuario/getEscolaUsuario/" + $("#login").val(),
            "order": [[1, "asc"]],
            "searching": false,
            deferRender: true,
            "fnRowCallback": function (nRow, aData) {
                $(this).on("click", "#deletaEscola" + aData[0], function () {
                    if (!confirm("Tem certeza que deseja excluir o acesso do usuário a esta escola ?")) {
                        return false;
                    } else {
                        var id = $(this).val();
                        $.post(base_url + "delete-escola", {
                            id: id
                        }, function () {
                            criaTabela();
                        });
                    }
                });
            },
            "aoColumnDefs": [
                {
                    "aTargets": [2],
                    "mRender": function (data, type, full) {
                        return '<button class="btn btn-danger" type="button" id="deletaEscola' + full[0] + '" name="deletar" value= "' + full[0] + '"><i class="fa fa-trash-o"></i></button>';
                    }
                },
                {
                    "targets": [0],
                    "visible": false
                }
            ]
        });
    }
});