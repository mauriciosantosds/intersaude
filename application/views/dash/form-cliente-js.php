<script src="<?=base_url('assets/js/bootstrap-datepicker.js');?>"></script>
<script src="<?=base_url('assets/js/jquery.mask.js');?>"></script>
<script>
    var totdeps = new Array();
    var id = 1;

    <?php if(isset($cliente->cliendepe)) { ?> 
            var i = $("#totdeps").val();;
            var arr1 = i.split(',');
            totdeps = arr1;
            for (i = 0; i < totdeps.length; i++) {
                console.log(totdeps[i]);
                $("#depen").append(
                '<div class="input-group mb-2" id="'+id+'">'+
                    '<input type="text" placeholder="Nome Dependente" class="form-control" disabled'
                    +' name="'+id+'" value="'+totdeps[i]+'">'
                    +'<span class="input-group-btn">'+
                        '<button class="btn btn-danger" onclick="remove('+id+')"><i class="icon-cancel"></i></button>'
                    +'</span>'+
                '</div>');
                id++;
            }
          <?php } ?>

    function remove(id) {
        var dep = $("input[name='"+id+"']").val();
        $("#"+id).remove();
        for (i = 0; i < totdeps.length; i++) {
            console.log(totdeps);
            if (totdeps[i] === dep) {
                totdeps.splice(i, 1);
            }
        }
        $("#totdeps").val(totdeps);
    }
    $("#addepen").click(function(e) {
        var dependente = $("#depenprin").val();
        totdeps.push(dependente);
        //totdeps[totdeps.length] = dependente;
        $("#totdeps").val(totdeps);
        //console.log(dependente);
        //console.log(totdeps);
        $("#depen").append(
            '<div class="input-group mb-2" id="'+id+'">'+
                '<input type="text" placeholder="Nome Dependente" class="form-control" disabled'
                +' name="'+id+'" value="'+dependente+'">'
                +'<span class="input-group-btn">'+
                    '<button class="btn btn-danger" onclick="remove('+id+')"><i class="icon-cancel"></i></button>'
                +'</span>'+
            '</div>');
        id++;
        $("#depenprin").val("");
        e.preventDefault();
    });
    !function(a){a.fn.datepicker.dates["pt-BR"]={days:["Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sábado"],daysShort:["Dom","Seg","Ter","Qua","Qui","Sex","Sáb"],daysMin:["Do","Se","Te","Qu","Qu","Se","Sa"],months:["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],monthsShort:["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"],today:"Hoje",monthsTitle:"Meses",clear:"Limpar",format:"dd/mm/yyyy"}}(jQuery);
    $("input[name=dtnasc]").datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        todayHighlight: true,
        autoclose: true
    });

    $('input[name=cpf]').mask('000.000.000-00', {reverse: true});
    $('input[name=dtnasc]').mask('00/00/0000');
    $('input[name=tel]').mask('(00) 0000-00000');
    $('input[name=cel]').mask('(00) 0000-00000');

    $("input[name=cep]").blur(function(){
        $.getJSON("https://viacep.com.br/ws/"+ $("input[name=cep]").val() +"/json", function(dados) {
            console.log(dados);
            if (!("erro" in dados)) {
                $("input[name=ende]").val(dados.logradouro);
                $("input[name=bairro]").val(dados.bairro);
                $("input[name=cidade]").val(dados.localidade);
                $("input[name=uf]").val(dados.uf);
                $("input[name=numero]").val(dados.numero);
            }
            else {
                console.log("CEP não encontrado.");
            }
        });
    }); 
</script>
</body>
</html>