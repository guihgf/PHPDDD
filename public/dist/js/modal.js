function alerta(titulo,mensagem){
    $("#alerta .modal-title").html(titulo);
    $("#alerta .modal-body").html(mensagem);
    $("#alerta .modal-footer").html('<button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>');
    $("#alerta").modal('show');
    return false;
}

function questao(titulo,mensagem,funcao_sim){
    $("#alerta .modal-title").html(titulo);
    $("#alerta .modal-body").html(mensagem);
    $("#alerta .modal-footer").html('<button type="button" class="btn btn-default" data-dismiss="modal">Não</button>'+
                                    '<button type="button" class="btn btn-primary" data-dismiss="modal" onclick='+funcao_sim+'>Sim</button>');
    $("#alerta").modal('show');
    return false;
}