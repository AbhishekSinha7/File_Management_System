<?php

require_once 'assets/php/auth.php';
require_once 'assets/php/session.php';

$Ao = new Auth();
$conn = $Ao->connectme();

$id = $_GET['text'];
if (!$id) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>File Upload PHP Script - Pure Coding</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
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

        .file__upload {
            width: 1000px;
            background: #fbfbfb;
            text-align: center;
            border-radius: 10px;
            padding: 50px 35px 10px 35px;
            box-shadow: 5px 5px 10px 10px #aaaaaa;
        }

        .file__upload .header {
            width: 100%;
            height: 145px;
            background: #fbfbfb;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px 5px 0 0;
        }

        .file__upload .header p {
            font: 700 14px/40px "Roboto", sans-serif;

        }

        .file__upload .header p i.fa {
            margin-right: 10px;
        }

        .file__upload .header p span {
            font-size: 2rem;
            font-weight: 100;
        }

        .file__upload .header p span span {
            font-weight: 600;
        }

        .file__upload .body {
            background: #FFF;
            width: 100%;
            height: calc(100% - 145px);
            border-radius: 0 0 5px 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }

        .file__upload .body input[type="file"] {
            opacity: 0;
        }

        .file__upload .body i.fa {
            color: #d3d3d3;
            margin-bottom: 20px;
        }

        .file__upload .body p strong {
            color: #4db6ac;
        }

        .file__upload .body p span {
            color: #4db6ac;
            text-decoration: underline;
        }

        .btn {
            background: #4db6ac;
            border: none;
            outline: none;
            margin: 10px 10px 10px 35px;
            padding: .7rem 2rem;
            font-size: 1.3rem;
            color: #FFF;
            border-radius: 3px;
            opacity: .8;
            cursor: pointer;
            transition: .3s;
        }

        .btn:hover {
            opacity: 1;
        }

        #link_checkbox {
            display: none;
        }

        #link {
            border: 1px solid;
            color: #4db6ac;
            background: none;
            width: calc(100% - 20px);
            border-radius: 0;
            outline: none;
            padding: 10px;
            font-size: 1rem;
            margin: 10px 0;
            display: none;
        }

        #link_checkbox:checked~#link {
            display: block;
        }

        label[for="link_checkbox"] {
            padding: .5rem 2rem;
            background: #4db6ac;
            color: #FFF;
            outline: none;
            cursor: pointer;
        }

        .download .download_link {
            text-decoration: none;
            color: black;
            margin-bottom: 10%;
            padding: .5rem 2rem;
            border-radius: 3px;
            opacity: .8;
            transition: .3s;
            margin-left: 20px;
        }

        .download_link {
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

        .download_link:hover {
            opacity: 1;
            color: #ff7300;
        }
    </style>
</head>

<body>
    <div class="file__upload">
        <div class="header">
            <p><span><i class="fas fa-cloud-download-alt fa-2x"></i>The Below file is available to download.</span></p>
        </div>
        <form class="">
            <div class="download">

                <?php
                $sql = "SELECT * FROM let WHERE id='$id'";
                $result = mysqli_query($conn, $sql);
                if ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <a href="uploads/<?php echo $row['file_name']; ?>" download="<?php echo $row['file']; ?>" class="download_link"><?php echo $row['file']; ?></a>
                <?php
                }


                ?>
            </div>
        </form>
    </div>
</body>

</html>