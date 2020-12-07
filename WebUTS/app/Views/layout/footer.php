 <!-- Copyright -->
 <div class="footer-copyright text-center py-3">© 2020 Copyright: Bengal Uci JO
   
  </div>
  <!-- Copyright -->

</footer>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>  </body>
<script>
function previewImg(){
const cover = document.querySelector('#cover');
 const coverLabel = document.querySelector('.custom-file-label');
 const imgPreview = document.querySelector('.img-preview');
//ganti url
 coverLabel.textContent = cover.files[0].name;

//mengganti Preview
 const fileCover = new FileReader();
 fileCover.readAsDataURL(cover.files[0]);

 fileCover.onload = function(e) {

   imgPreview.src=e.target.result;
 }
}


 
</script>

</html>