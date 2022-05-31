<?php
require_once 'auth.php';
require_once 'session.php';
$Ao = new Auth();
$conn = $Ao->connectme();

if (isset($_POST['action']) && $_POST['action'] == 'display_notes') {
    $output = '';
    $base_url = "http://localhost/gdrive/";
    $notes = $cuser->get_notes($cid);

    if ($notes) {
        $output .= '<table id="t1" class="table table-stripped text-center">
        <thread>
          <tr>
            <th>#id</th>
            <th>file</th>
            
            <th>Action</th>
          </tr>
        </thread>
        <tbody>';

        foreach ($notes as $row) {
            $id = $row['id'];
            $sql = "SELECT * FROM let WHERE id='$id'";
            $result = mysqli_query($conn, $sql);
            $open = "http://docs.google.com/gview?url=http://localhost/paradox/uploads/" . $row['file_name'];
            $link = $base_url . "download.php?text=" . $row['id'];
            $output .= '<tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['file'] . '</td>
            <td>
            <form action="download.php" method="get">
            <input type="hidden" value="' .
                htmlentities($id) . '" name="text">
            <input type="button" value="Copy link" onclick="copyText(\'' . $link . '\')" name="copy" />
            <input type="submit" value="open" onclick="opening(\'' . $open . '\')" name="open" >
            <input type="submit" value="Download" name="submit" >
            </td>
            </form>
          </tr>';
        }
        $output .= ' </tbody> </table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( you have not written any note yet! write your first note now</h3>';
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

    function opening(open) {
        window.open(open);
    }
</script>