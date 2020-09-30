<script>
var upload = document.getElementById("mediimg");
upload.addEventListener("change", function(e) {
    var size = upload.files[0].size;
    if(size > 8388605) { //1MB                   
      alert('Imagem muito grande a imagem deve conter no máximo 8mb'); //Acima do limite         
      upload.value = ""; //Limpa o campo
    } else {
        if (upload.files && upload.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(upload.files[0]);
        }
    }
});
</script>
</body>
</html>