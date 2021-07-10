<?php

require_once 'assets/php/auth.php';
require_once 'assets/php/session.php';


$Ao=new Auth();
$conn=$Ao->connectme();
if (isset($_POST['upload'])) { 
  $location = "uploads/";

  $file_name = date("dmy") . time() . $_FILES["file1"]["name"]; 
  $file = $_FILES["file1"]["name"]; 
  $file_temp = $_FILES["file1"]["tmp_name"]; 
  $file_size = $_FILES["file1"]["size"];

  if ($file_size > 10485760 ) {
    echo "<script>alert('Woops! File is too big. Maximum file size allowed for upload 10 MB.')</script>";
  } else {
    $sql = "INSERT INTO let (uid,file, file_name)VALUES ($cid,'$file', '$file_name')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      move_uploaded_file($file_temp, $location . $file_name);
      
      echo "<script>alert('Wow! File uploaded successfully.')</script>";
      $sql = "SELECT id FROM let ORDER BY id DESC";
      $result = mysqli_query($conn, $sql);
      header('location:home.php');
    } else {
      echo "<script>alert('Woops! Something wong went.')</script>";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

    * {
      margin: 0;
      padding: 0;
      outline: none;
      font-family: 'Poppins', sans-serif;
    }

    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      overflow: hidden;
      background: #f3f3fb;
      background-position: center;
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;
    }

    ::selection {
      color: #fff;
      background: #006eff;
    }

    .container {
      width: 1000px;
      background: #fbfbfb;
      text-align: center;
      border-radius: 10px;
      padding: 50px 35px 10px 35px;
      box-shadow: 5px 5px 10px 10px #aaaaaa;
    }

    .container header {
      font-size: 35px;
      font-weight: 600;
      margin: 0 0 30px 0;
    }

    .container .form-outer {
      width: 100%;
      overflow: hidden;
    }

    .container .form-outer form {
      display: flex;
      width: 400%;
    }

    .form-outer form .page {
      width: 25%;
      transition: margin-left 0.3s ease-in-out;
    }

    .form-outer form .page .title {
      text-align: center;
      font-size: 25px;
      font-weight: 500;
    }

    .form-outer form .page .field {
      width: 1000px;
      height: 45px;
      margin: 45px 0;
      display: flex;
      position: relative;
    }

    form .page .field .label {
      position: absolute;
      top: -30px;
      font-weight: 500;
    }

    form .page .field input {
      height: 100%;
      width: 100%;
      border: 1px solid lightgrey;
      border-radius: 5px;
      padding-left: 15px;
      font-size: 18px;
    }

    form .page .field select {
      width: 100%;
      padding-left: 10px;
      font-size: 17px;
      font-weight: 500;
    }

    form .page .field button:hover {
      background: rgb(255, 230, 0);
    }

    form .page .btns button {
      margin-top: -20px !important;
    }

    form .page .btns button.prev {
      margin-right: 3px;
      font-size: 17px;
    }

    form .page .btns button.next {
      margin-left: 3px;
    }

    .container .progress-bar {
      display: flex;
      margin: 40px 0;
      user-select: none;
    }

    .container .progress-bar .step {
      text-align: center;
      width: 100px;
    }

    .p1 {
      margin-left: 2in;
    }

    .p2 {
      margin-left: 0.7in;

    }

    .p3 {
      margin-left: 0.7in;
    }

    .p4 {
      margin-left: 0.7in;

    }

    .container .progress-bar .step p {
      font-weight: 500;
      font-size: 24px;
      margin-bottom: 8px;
    }

    .progress-bar .step .bullet {
      height: 50px;
      width: 50px;
      border: 4px solid #000;
      display: inline-block;
      border-radius: 50%;
      position: relative;
      transition: 0.2s;
      font-weight: 500;
      font-size: 17px;
      line-height: 62px;
    }

    .progress-bar .step .b1.active {
      border-color: #103f91;
      background: Blue;
    }

    .progress-bar .step .b2.active {
      border-color: red;
      background: red;
    }

    .progress-bar .step .b3.active {
      border-color: #15ff00;
      background: limegreen;
    }

    .progress-bar .step .b4.active {
      border-color: #FF9800;
      background: OrangeRed;
    }

    .progress-bar .step .bullet span {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
    }

    .progress-bar .step .bullet:before,
    .progress-bar .step .bullet:after {
      position: absolute;
      content: '';
      top: 20px;
      right: -110px;
      height: 5px;
      width: 100px;
      background: #262626;
    }

    .progress-bar .step .bullet.active:after {
      background: #FFFF00;
      transform: scaleX(0);
      transform-origin: left;
      animation: animate 0.3s linear forwards;
    }

    @keyframes animate {
      100% {
        transform: scaleX(1);
      }
    }

    .progress-bar .step:last-child .bullet:before,
    .progress-bar .step:last-child .bullet:after {
      display: none;
    }

    .progress-bar .step p.active {
      color: #000000;
      transition: 0.2s linear;
    }

    .progress-bar .step .check {
      position: absolute;
      left: 50%;
      top: 70%;
      font-size: 15px;
      transform: translate(-50%, -50%);
      display: none;
    }

    .progress-bar .step .check.active {
      display: block;
      color: #fff;
    }

    [type="file"] {
      border: 0;
      clip: rect(0, 0, 0, 0);
      height: 1px;
      overflow: hidden;
      padding: 0;
      position: absolute !important;
      white-space: nowrap;
      width: 1px;
    }

    [type="file"]+label {
      width: 160px;
      border-radius: 5px;
      cursor: pointer;
      margin-left: 420px;
      font: 700 14px/40px "Roboto", sans-serif;
      border: 2px solid #99a2a8;
      text-align: center;
      transition: all 300ms linear 0s;
      color: #5f6771;
    }

    [type="file"]+label:hover {
      background: #ffffff;
      color: #ff7300;
    }

    a {
      text-decoration: none;
      display: inline-block;
      padding: 8px 16px;
    }

    a:hover {
      background-color: #ddd;
      color: black;
    }

    .next {
      background-color: #4CAF50;
      color: white;
    }

    .round {
      border-radius: 50%;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="form-outer">
		<form action="" method="POST" enctype="multipart/form-data" class="body">
        <div class="page slide-page">
          <div class="title">Upload report of the project:</div>
          <p><b style="color: red;">*</b>Report should contain the information about the project and a detailed analysis of the project.</p>
          <div class="field">
            <input class="buttons file1" name="file1" type="file" id="file1" required>
            <label class="custom-file-label" for="file1"><i class="fas fa-file-upload"></i>Choose file</label>
          </div>
            <button class="submit" name="upload" style="
              width: 80px;
              height: 80px;
              border: 1px dashed black;
              background: #e7e7e7;
              margin-top: -20px;
              border-radius: 50px;
              color: rgb(0, 0, 0);
              cursor: pointer;
              margin-left: 40px;
              font-size: 18px;
              font-weight: 500;
              letter-spacing: 1px;
              text-transform: uppercase;
              transition: 0.5s ease;
            ">&#x2714;</button>
          </div>
      </form>
      </div>
      </div>

  <script>
    const submitBtn = document.querySelector(".submit");

    submitBtn.addEventListener("click", function() {
      setTimeout(function() {
        alert("Fill field properly");
        location.reload();
      }, 800);
    });

   
    var inputf1 = document.getElementsByClassName('file1');
   
    inputf1.addEventListener('change', showFileName);

    function showFileName(event) {
      var input = event.srcElement;
      var fileName = input.files[0].name;
      alert("f1" + fileName);
    }
    function showFileName(event) {
      var input = event.srcElement;
      var fileName = input.files[0].name;
      alert(fileName);
    }
  </script>
</body>

</html>