<?php if(isset($_SESSION["alert"])) { ?>
    <!-- Modal -->
    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Aviso!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="alert alert-success"><?=$_SESSION["alert"];?></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
    </div>
    <script>$('#alertModal').modal('show');</script>
<?php unset($_SESSION["alert"]);}    ?>
<script src="<?=base_url('assets/js/jquery.mask.js');?>"></script>
    <script>
        $('input[name=pesquisacpf]').mask('000.000.000-00', {reverse: true});
    </script>
<script>
$(document).ready(function(){   
    $("input[name='pesquisa']").keyup(function(){
		str = $("input[name='pesquisa']").val();
        if (str.length==0) {
            $("#livesearch").html("");
            $("#livesearch").css("border","0px");
        } else if (str.length > 2) {
			$.post("<?=base_url('consultacadastro/pesqclien')?>",{clien:str}, function(data, status){
				if (data != "vazio") {
                    $("#livesearch").css("border","1px solid #A5ACB2");
                    $("#livesearch").html(data);
                }
			}); 
        }
    }); 

    $("#consulta").submit(function(e){
		str = $("input[name='pesquisa']").val();
        if (str.length==0) {
            $("#livesearch").html("");
            $("#livesearch").css("border","0px");
        } else if (str.length > 2) {
			$.post("<?=base_url('consultacadastro/pesqclien')?>",{clien:str}, function(data, status){
                console.log(data);
                if (data === "vazio") {
				    $("#livesearch").css("border","1px solid #A5ACB2");
                    $("#livesearch").html("<a href='#'>Nenhum cliente encontrado.</a>");
                } else {
                    $("#livesearch").css("border","1px solid #A5ACB2");
                    $("#livesearch").html(data);
                }
			}); 
        }
        e.preventDefault();
    }); 

    $("#cpf").click(function(e){
		str = $("input[name='pesquisacpf']").val();
        if (str.length==0) {
            $("#livesearch2").html("");
            $("#livesearch2").css("border","0px");
        } else if (str.length > 2) {
			$.post("<?=base_url('consultacadastro/pesqcpf')?>",{cpf:str}, function(data, status){
                console.log(data);
                if (data === "vazio") {
				    $("#livesearch2").css("border","1px solid #A5ACB2");
                    $("#livesearch2").html("<a href='#'>Nenhum cliente encontrado.</a>");
                } else {
                    $("#livesearch2").css("border","1px solid #A5ACB2");
                    $("#livesearch2").html(data);
                }
			}); 
        }
        e.preventDefault();
    }); 
});
</script>
</body>
</html>