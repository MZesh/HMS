  <footer class="footer text-center"> 
     
    <?php echo date('Y');?> ©  <a href="#">HMS</a> 
  </footer> 
   </div> 
    </div> 
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
     <script>
        
    $(document).ready(function(){  
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });     
    });
      $('.img1').addClass('show');
      var src = $('.img1').attr('src');
      $('.display').attr('src',src);

      $('.image').click(function(){
        $(this).addClass('show');
        $(this).siblings().removeClass('show');
        var src1 = $(this).attr('src');
        $('.display').attr('src',src1);
      }); 
  </script>
</body> 
</html>