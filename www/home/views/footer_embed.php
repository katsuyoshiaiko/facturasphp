</div>


<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>


<?php
# busqueda en vivo en un select
# https://developer.snapappointments.com/bootstrap-select/examples/#live-search
/* <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>


  <script src="includes/jquery/3-4-1/jquery-3-4-1-min.js" type="text/javascript"></script>




  <script src="includes/chosen/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="includes/chosen/chosen.jquery.js" type="text/javascript"></script>
  <script src="includes/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  <script src="includes/chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 */
?>


<script>
    function showPasswordNp() {
        var x = document.getElementById("np");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function showPasswordRp() {
        var x = document.getElementById("rp");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<?php 
// esto me permite desactivar botones al enviar 
// poner id = btn_send
// <button type="submit" id="btn_send" class="btn btn-default">Send</button>
?>
        <script>
            function disableButton() {
                var btn = document.getElementById('btn_send');
                btn.disabled = true;
                btn.innerText = 'Sending.....'
            }
        </script>

</body>
</html>
