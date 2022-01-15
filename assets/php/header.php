<?php

require_once 'assets/php/session.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')); ?> | Project Hub</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @import url("https://fonts.googleapis.com/css?family=Maven+Pro:400,500,600,700,800,900&display=swap");

    * {
      font-family: 'Maven Pro', sans-serif;
    }

    .fh {
      background: url(https://abhisheksinha007.000webhostapp.com/images/background.jpg);
      font-family: "Open Sans", sans-serif;
      min-height: 800px;
      background-position: center;
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;
    }

    a {
      color: #18d26e;
      transition: 0.5s;
      text-decoration: none;
    }

    a:hover,
    a:active,
    a:focus {
      color: #18d36e;
      outline: none;
      text-decoration: none;
    }

    p {
      padding: 0;
      margin: 0 0 30px 0;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Montserrat", sans-serif;
      font-weight: 400;
      margin: 0 0 20px 0;
      padding: 0;
    }

    #header {
      transition: all 0.5s;
      z-index: 997;
      height: 80px;
      color: black;
      background: #1a2426;
    }

   
    #header.header-scrolled {
      background: rgba(0, 0, 0, 0.9);
      height: 60px;
    }

    #header .logo {
      font-size: 34px;
      margin: 0;
      padding: 0;
      font-family: "Montserrat", sans-serif;
      font-weight: 700;
      letter-spacing: 3px;
      padding-left: 10px;
      padding-right: 10px;
      border: 4px solid #18d26e;
    }

    #header .logo a {
      color: #fff;
    }

    #header .logo img {
      max-height: 40px;
    }

    @media (max-width: 992px) {
      #header .logo {
        font-size: 28px;
      }
    }

    /*--------------------------------------------------------------
  # Navigation Menu
  --------------------------------------------------------------*/
    /**
  * Desktop Navigation 
  */
    .navbar {
      padding: 0;
    }

    .navbar ul {
      margin: 0;
      padding: 0;
      display: flex;
      list-style: none;
      align-items: center;
    }

    .navbar li {
      position: relative;
    }

    .navbar a {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 0 10px 30px;
      font-family: 'Ubuntu', sans-serif;
      font-size: 17px;
      font-weight: 600;
      color: #fff;
      white-space: nowrap;
      text-transform: uppercase;
      transition: 0.3s;
    }

    .navbar a i {
      font-size: 12px;
      line-height: 0;
      margin-left: 5px;
    }

    .navbar a:hover,
    .navbar .active,
    .navbar li:hover>a {
      color: #18d26e;
    }

    .navbar .dropdown ul {
      display: block;
      position: absolute;
      left: 14px;
      top: calc(100% + 30px);
      margin: 0;
      padding: 10px 0;
      z-index: 99;
      opacity: 0;
      visibility: hidden;
      background: #fff;
      box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
      transition: 0.3s;
    }

    .navbar .dropdown ul li {
      min-width: 200px;
    }

    .navbar .dropdown ul a {
      padding: 10px 20px;
      text-transform: none;
      color: #666666;
    }

    .navbar .dropdown ul a i {
      font-size: 12px;
    }

    .navbar .dropdown ul a:hover,
    .navbar .dropdown ul .active:hover,
    .navbar .dropdown ul li:hover>a {
      color: #18d26e;
    }

    .navbar .dropdown:hover>ul {
      opacity: 1;
      top: 100%;
      visibility: visible;
    }

    .navbar .dropdown .dropdown ul {
      top: 0;
      left: calc(100% - 30px);
      visibility: hidden;
    }

    .navbar .dropdown .dropdown:hover>ul {
      opacity: 1;
      top: 0;
      left: 100%;
      visibility: visible;
    }

    @media (max-width: 1366px) {
      .navbar .dropdown .dropdown ul {
        left: -90%;
      }

      .navbar .dropdown .dropdown:hover>ul {
        left: -100%;
      }
    }

  </style>
</head>

<body>
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid">
      <div class="row justify-content-center align-items-center">
        <div class="col-xl-11 d-flex align-items-center justify-content-between">
          <h1 class="logo"><a href="index.php">DRIVE</a></h1>
          <nav id="navbar" class="navbar">
            <ul>
              <li><a <?= (basename($_SERVER['PHP_SELF']) == "home.php") ? "active" : ""; ?>class="active" href="home.php">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="upload.php">Upload</a></li>
              <li><a href="assets/php/logout.php">logout</a></li>
              <li><a href="#"><?= $fname; ?></a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
        </div>
      </div>
    </div>
  </header>
  