    <script src="<?=base_url('assets/js/jquery.min.js');?>"></script>
    <script src="<?=base_url('assets/js/jquery-migrate-3.0.1.min.js');?>"></script>
    <script src="<?=base_url('assets/js/popper.min.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?=base_url('assets/js/jquery.easing.1.3.js');?>"></script>
    <script src="<?=base_url('assets/js/jquery.waypoints.min.js');?>"></script>
    <script src="<?=base_url('assets/js/jquery.stellar.min.js');?>"></script>
    <script src="<?=base_url('assets/js/owl.carousel.min.js');?>"></script>
    <script src="<?=base_url('assets/js/jquery.magnific-popup.min.js');?>"></script>
    <script src="<?=base_url('assets/js/aos.js');?>"></script>
    <script src="<?=base_url('assets/js/jquery.animateNumber.min.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap-datepicker.js');?>"></script>
    <script src="<?=base_url('assets/js/jquery.timepicker.min.js');?>"></script>
    <script src="<?=base_url('assets/js/scrollax.min.js');?>"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
    <!-- <script src="assets/js/google-map.js"></script> -->
    <script src="<?=base_url('assets/js/main.js');?>"></script>
    <script>
      $("input:radio[name='options']").click(function() {
        var tipo = $(this).val();
        if (tipo == "pf") {
          //exibe
          $("input[name='cpf']").css("display","block");
          $("input[name='cpf']").prop("required",true);
          $("input[name='nome']").css("display","block");
          $("input[name='nome']").prop("required",true);
          //nao exibe
          $("input[name='cnpj']").css("display","none");
          $("input[name='cnpj']").prop("required",false);
          $("input[name='rsocial']").css("display","none");
          $("input[name='rsocial']").prop("required",false);
        } else {
          //exibe
          $("input[name='cnpj']").css("display","block");
          $("input[name='cnpj']").prop("required",true);
          $("input[name='rsocial']").css("display","block");
          $("input[name='rsocial']").prop("required",true);
          //nao exibe
          $("input[name='cpf']").css("display","none");
          $("input[name='cpf']").prop("required",false);
          $("input[name='nome']").css("display","none");
          $("input[name='nome']").prop("required",false);
        }
      });
    </script>
    <script>
      $("#newsletter").submit(function(e) {
            var formData = new FormData(this);
            $.ajax({
                url: '<?=base_url('home/newsletter')?>',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function( data ) {
                console.log(data);
                    if (data == '200') {
                        $('#newsletter').trigger("reset");
                        $('#alertnews').html('<div class="alert alert-success">Recebemos sua solicitação.</div>');
                    }
                },
                error: function (request, status, error) {
                    console.log(request+" error "+error);
                }
            }); 
            e.preventDefault();
        });
    </script>
  </body>
</html>