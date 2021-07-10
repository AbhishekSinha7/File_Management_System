<?php

require_once 'assets/php/header.php';

?>
<div class="container">
  <div style="margin-top: 1in;" class="card border-primary">
    <h5 class="card-header bg-danger d-flex justify-content-between">
      <span class="text-light lead align-self-center">Files</span>
      <a href="upload.php" class="btn btn-light">Add Files</a>
    </h5>
    <div class="card-body">
      <div class="table-responsive" id="showNote">
      </div>
    </div>
  </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
  $(document).ready(function() {
    displayAllNotes();
    function displayAllNotes() {
      $.ajax({
        url: 'assets/php/process.php',
        method: 'post',
        data: {
          action: 'display_notes'
        },
        success: function(response) {
          $("#showNote").html(response);
        }
      });
    }

  });
</script>

</html>