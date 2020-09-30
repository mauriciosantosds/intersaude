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
            <div class="alert alert-warning"><?=$_SESSION["alert"];?></div>
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
</body>
</html>