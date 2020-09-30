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
    <!-- <script src="assets/js/google-map.js')?>;"></script> -->
    <script src="<?=base_url('assets/js/main.js');?>"></script>
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