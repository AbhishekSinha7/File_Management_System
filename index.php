<?php

session_start();
if (isset($_SESSION['user'])) {
  header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SIGN-IN & SIGN-UP PAGE</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <style>
    body {
      background-color: #efe2ba;
    }

    .container {
      margin-top: 1in;
      background-color: #fff;
      border-radius: 10px;
      margin-right: 2in;
      margin-left: 2in;
      box-shadow: 1px 5px 8px 8px #888888;
    }

    input[type=text],
    input[type=email],
    input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    .button1 {
      background-color: #333333;
      color: white;
      padding: 14px 20px;
      border: none;
      margin: 8px 15%;
      cursor: pointer;
      border-radius: 10px;
      width: 70%;
    }

    .button1:hover {
      opacity: 0.8;
    }

    .signup {
      float: right;
      background-color: #333333;
      color: white;
      border-radius: 10px;
      padding: 14px 20px;
      border: none;
      margin: 8px;
      cursor: pointer;
      width: 10%;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="" id="login-box">
      <div class="">
        <div class="">
          <div class="">
            <button class="signup" id="register-link">Sign Up</button>
            <h1 class="">Sign in to Account</h1>

            <hr class="" />
            <form action="#" method="post" class="px-3" id="login-form">
              <div id="loginAlert"></div>
              <div class="">
                <div class="">
                  <label for="email"><b>User Mail</b></label>
                </div>
                <input type="email" id="email" name="email" class="" placeholder="Enter email" required value="<?php if (isset($_COOKIE['email'])) {
                                                                                                                  echo $_COOKIE['email'];
                                                                                                                } ?>">
              </div>
              <div class="">
                <div class="">
                  <label for="password"><b>Password</b></label>
                </div>
                <input type="password" id="password" name="password" class="" minlength="5" placeholder="Enter Password" required autocomplete="off" value="<?php if (isset($_COOKIE['password'])) {
                                                                                                                                                              echo $_COOKIE['password'];
                                                                                                                                                            } ?>">
              </div>
              <div class="">
                <div class="">
                  <input type="checkbox" class="" id="customCheck" name="rem" <?php if (isset($_COOKIE['email'])) { ?> checked <?php } ?>>
                  <label class="" for="customCheck">Remember me</label>
                </div>
              </div>
              <div class="">
                <input type="submit" id="login-btn" value="Sign In" class="button1" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="" id="register-box" style="display: none;">
      <div class="">
        <div class="">
          <div class="">
            <button class="signup" id="login-link">Sign In</button>
            <h1 style="margin-top: 5%;" class="">Welcome Back!</h1>
            <p class="">To keep connected with us please login with your personal info.</p>
          </div>
          <hr class="" />
          <div class="">
            <h1 class="">Create Account</h1>
            <form action="#" method="post" class="" id="register-form">
              <div id="regAlert"></div>
              <div class="">
                <div class="">
                  <label for="name"><b>Name</b></label>
                </div>
                <input type="text" id="name" name="name" class="" placeholder="Enter Full Name" required />
              </div>
              <div class="">
                <div class="">
                  <label for="email"><b>Email</b></label>
                </div>
                <input type="email" id="remail" name="email" class="" placeholder=" Enter email" required />
              </div>
              <div class="">
                <div class="">
                  <label for="password"><b>Password</b></label>
                </div>
                <input type="password" id="rpassword" name="password" class="" minlength="5" placeholder="Enter Password" required />
              </div>
              <div class="">
                <div class="">
                  <label for="cpassword"><b>Confirm password</b></label>
                </div>
                <input type="password" id="cpassword" name="cpassword" class="" minlength="5" placeholder="Enter Password Again" required />
              </div>
              <div class="">
                <div id="passError" class=""></div>
              </div>
              <div class="">
                <input type="submit" id="register-btn" value="Sign Up" class="button1" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(function() {
        $("#register-link").click(function() {
          $("#login-box").hide();
          $("#register-box").show();
        });
        $("#login-link").click(function() {
          $("#login-box").show();
          $("#register-box").hide();
        });

        $("#register-btn").click(function(e) {
          if ($("#register-form")[0].checkValidity()) {
            e.preventDefault();
            $("#register-btn").val('please wait');
            if ($("#rpassword").val() != $("#cpassword").val()) {
              $("#passError").text('*Password did not matched');
              $("#register-btn").val('Sign up');
            } else {
              $("#passError").text('');
              $.ajax({
                url: 'assets/php/action.php',
                method: 'post',
                data: $("#register-form").serialize() + '&action=register',
                success: function(response) {
                  $("#register-btn").val('Sign up');
                  if (response === 'register') {
                    window.location = 'home.php';
                  } else {
                    $("#regAlert").html(response);
                  }
                }
              });
            }
          }
        });

        $("#login-btn").click(function(e) {
          if ($("#login-form")[0].checkValidity()) {
            e.preventDefault();
            $("#login-btn").val('please wait');
            $.ajax({
              url: 'assets/php/action.php',
              method: 'post',
              data: $("#login-form").serialize() + '&action=login',
              success: function(response) {
                console.log(response);
                $("#login-btn").val('Sign in');
                if (response === 'login') {
                  window.location = 'home.php';
                } else {
                  $("#loginAlert").html(response);
                }
              }
            });
          }
        });
      });
    </script>
</body>

</html>
