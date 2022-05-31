<?php
require_once 'auth.php';
require_once 'session.php';
$Ao = new Auth();
$conn = $Ao->connectme();

if (isset($_POST['action']) && $_POST['action'] == 'display_notes') {
  $output = '';
  $base_url = "http://localhost/he/";
  $notes = $cuser->get_notes($cid);
  function getimage($str)
  {
    $path = " ";
    if (!strcmp($str, "docx") || !strcmp($str, "odt")) {
      $path = "images/doc.png";
    } else if (!strcmp($str, "xlsx")) {
      $path = "images/xlsx.png";
    } else if (!strcmp($str, "ppt") || !strcmp($str, "pptx")) {
      $path = "images/ppt.png";
    } else  if (!strcmp($str, "pdf")) {
      $path = "images/pdfx.png";
    } else if (!strcmp($str, "mp3") || !strcmp($str, "wav")  || !strcmp($str, "aac")) {
      $path = "images/wav.png";
    } else if (!strcmp($str, "zip")) {
      $path = "images/zip.png";
    } else if (!strcmp($str, "mkv") || !strcmp($str, "mov") || !strcmp($str, "mp4") || !strcmp($str, "avi")) {
      $path = "images/Video.png";
    } else if (!strcmp($str, "png") || !strcmp($str, "jpg") || !strcmp($str, "jpeg") || !strcmp($str, "gif") || !strcmp($str, "tiff")) {
      $path = "images/Jpgx.png";
    } else {
      $path = "images/unknown.png";
    }
    return $path;
  }
  if ($notes) {
    foreach ($notes as $row) {
      $id = $row['id'];
      $sql = "SELECT * FROM let WHERE id='$id'";
      $result = mysqli_query($conn, $sql);
      $open = "http://localhost/he/uploads/" . $row['file_name'];
      $link = $base_url . "download.php?text=" . $row['id'];
      $temp = $row['file'];
      $shortname = (strlen($temp) >= 19) ? substr($temp, 0, 16) . '...' : $temp;
      $extension = pathinfo($temp);
      $imgname = getimage($extension['extension']);
      $output .= '<div onclick=" "class="card">
      <div  class="card-header">
          <img src="' . $imgname . '" height="80%" width="80%" draggable="false">
          <div class="dropdown" style="float:right;">
              <button class="dropbtn"><i style=" color: black;" class="fa fa-align-justify"></i>
              </button>
              <div class="dropdown-content">
                  <a href="download.php?text=' .
        htmlentities($id) . '"><i style=" color: black;" class="fas fa-download"></i></a>
                  <a onclick="copyText(\'' . $link . '\')" href="#"><i style=" color: black;" class="fas fa-copy"></i></a> 
                  <a  href="' . $open . '"><i style=" color: black;" class="fa fa-dot-circle-o"></i></a>

              </div>
          </div>
      </div>
      <hr>
      <div class="card-body">
          <h5 id="filename">' . $shortname . '</h5>
      </div>
  </div>';
    }
    $output .= ' </tbody> </table>';
    echo $output;
  } else {
    echo '<h3 class="text-center text-secondary">You dont have any files uploaded</h3>';
  }
}
?>


<script>
  function copyText(link1) {
    this.copied = false;
    const textarea = document.createElement('textarea');
    textarea.value = link1;
    textarea.setAttribute('readonly', '');
    textarea.style.position = 'absolute';
    textarea.style.left = '-9999px';
    document.body.appendChild(textarea);
    textarea.select()
    try {
      var successful = document.execCommand('copy');
      this.copied = true;
    } catch (err) {
      this.copied = false;
    }
    textarea.remove();
    alert("link copied");
  }

  function openfile(open) {
    window.open(open);
  }
</script>