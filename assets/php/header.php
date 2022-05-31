<?php

require_once 'assets/php/session.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')); ?> | FMS</title>
  <style>
    /*--------------------------------------------------------------
  # Navigation Menu
  --------------------------------------------------------------*/


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
  </style>
</head>

<body>
  <div class="navar">
    <a href="#home">Soft-D</a>
    <a class="right" href="#home"><?= $fname; ?></a>
    <a class="right" href="assets/php/logout.php">logout</a>
    <a class="right" href="https://www.ninjatechnik.com/p/about.html">About</a>
    <a <?= (basename($_SERVER['PHP_SELF']) == "home.php") ? "active" : ""; ?> class="right" href="home.php">Home</a>
  </div>