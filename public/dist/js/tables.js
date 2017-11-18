var row;

$('tr').on('click', function(e) {
    $('tr').removeClass("success");
    row = $(this).attr('id');
    var id = "#" + row;
    $(id).addClass("success");
});


$("#table1").dataTable({

    "sPaginationType": "full_numbers",
    "oLanguage": {
        "sEmptyTable": "Nenhum registro encontrado na tabela",
        "sInfo": "_START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
        "sInfoFiltered": "(Filtrar de _MAX_ total registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "Mostrar _MENU_ registros por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar",
        "oPaginate": {
            "sNext": "Proximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Ultimo"
        }
    },
    "aoColumnDefs": [{
        "bSortable": true,
        "aTargets": ["_all"]
    }],
    "aaSorting": []
});