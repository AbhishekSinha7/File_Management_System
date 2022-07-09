<?php

require_once 'assets/php/header.php';

?>
<script src="https://kit.fontawesome.com/330c438135.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
  .navar {
    overflow: hidden;
    background-color: #333;
    position: fixed;
    top: 0;
    width: 100%;
  }

  .navar a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }

  .navar .right {
    float: right;
  }

  .navar a:hover {
    background: #ddd;
    color: black;
  }

  .main {
    padding: 16px;
    margin-top: 4%;
    height: 100%;
    margin-left: 200px;
    padding: 1px 16px;
    /* Used in this example to enable scrolling */
  }

  .sidbar {
    margin: 0;
    padding: 0;
    top: 6.5%;
    width: 200px;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
  }

  .sidbar a {
    display: block;
    color: black;
    padding: 16px;
    text-decoration: none;
  }

  .sidbar a:hover {
    background-color: #4a5a63;
  }

  /* */
  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }

  body {
    background: #fefefe;
    font-family: sans-serif;
  }

  .container1 {
    width: 70%;
    margin: 20px auto;
    margin-left: 30%;
  }

  .img {
    text-align: center;
    margin-bottom: 50px;
  }

  hr {
    border-top: 1px dashed rgb(0, 0, 0);

  }

  #filename {
    margin-left: 5%;
    font-size: 14px;
    padding-bottom: 5px;
    text-align: justify;

  }

  .row {
    margin-top: 0%;
    margin-left: 0%;
    display: flex;
    flex-direction: row;
    flex-flow: wrap;
  }

  .card {
    margin-top: 4%;
    border-radius: 4px;
    width: 15%;
    background: #fff;
    border: 1px solid #ccc;
    transition: 0.3s;
    margin-left: 5%;
  }

  .card-header {
    cursor: pointer;
    text-align: center;
    color: rgb(0, 0, 0);
    margin-left: 0%;
  }

  .card-body {
    margin-top: 8px;
    font-size: 18px;
  }

  .card-body .btn {
    display: block;
    color: #fff;
    text-align: center;
    background: linear-gradient(to right, #ff416c, #ff4b2b);
    margin-top: 5px;
    text-decoration: none;
    padding: 10px 5px;
  }

  .card:hover {
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
  }

  @media screen and (max-width: 1000px) {
    .card {
      width: 40%;
    }
  }

  @media screen and (max-width: 620px) {
    .container {
      width: 100%;
    }

    .heading {
      padding: 20px;
      font-size: 20px;
    }

    .card {
      width: 80%;
    }
  }


  /*  icons */

  .dropbtn {
    background-color: #d8d8d8;
    color: white;
    padding: 10px;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }

  .dropdown {
    position: inherit;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    border-radius: 4px;
    background-color: #f9f9f9;
    min-width: 30px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 10px 10px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {
    background-color: #f1f1f1;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  .dropdown:hover .dropbtn {
    background-color: #ff5900;
  }
</style>


<div class="sidbar">
  <a class="active" href="upload.php"><i style=" color: black; " class="fa fa-plus"></i>Add files</a>
  <!--<a href="#news"><i style=" color: black; " class="fa fa-align-justify"></i>News</a>
  <a href="#contact"><i style=" color: black;" class="fa fa-align-justify"></i>Contact</a>
  <a href="#about"><i style=" color: black;" class="fa fa-align-justify"></i>About</a>-->
</div>

<div class="container">
  <div class="main">
    <div class="row " id="showNote">
    </div>
  </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
