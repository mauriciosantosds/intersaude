$(document).ready(function () {
    $("#medicep").blur(function () {
    
        $.getJSON("//viacep.com.br/ws/" + $("#medicep").val() + "/json", function (dados) {
            if (!("erro" in dados)) {
                $("#mediende").val(dados.logradouro);
                $("#medibair").val(dados.bairro);
                $("#medicida").val(dados.localidade);
                $("#mediuf").val(dados.uf);
            } else {
                console.log("CEP não encontrado.");
            }
        });
    });

    /* $('#cpf').mask('000.000.000-00', {
        reverse: true
    }); */
    $('#medicep').mask('00000-000', {
        reverse: true
    });
    /* $('#telefone').mask('(00)0000.0000', {
        reverse: true
    }); */
    /* $('#celular').mask('(00)00000.0000', {
        reverse: true
    }); */
    
});