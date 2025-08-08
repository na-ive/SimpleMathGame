<?php    
    // bagian submit name
    if (isset($_POST['submit'])) {
        setcookie("name", $_POST['name'], time() + 10800, "/");

        setcookie("email", $_POST['email'], time() + 10800, "/");

        echo "<script>window.location.href='index'</script>";

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Game UTS | Pemrograman Web</title>
</head>

<body class="bg-light">
    <?php

    // bagian cookie user
    if (isset($_COOKIE['name']) & isset($_COOKIE['email'])) {

        echo "<div class=\"mid\"><div class=\"p-5 bg-white rounded shadow-sm\"><h4>Hallo  " . $_COOKIE['name'] . ", selamat datang kembali di permainan ini!</h4>";

        echo "<p><a class=\"btn btn-warning text-white mt-2\" href=\"/logic/mathgamels\">Start Game</a> <a class=\"btn btn-danger text-white mt-2\" href=\"/pages/halloffame\">Hall of Fame</a></p>";

        echo "<p>Bukan anda? <a href=\"/logic/reinput\">klik disini</a></p></div></div>";
    } else {
        // jika cookie tidak ada maka muncul form
    ?>
        <div class="mid">
            <div class="card shadow-sm" style="width:25rem;">
                <div class="card-body">
		    <h1 class="text-center text-warning text-header" style="text-shadow: 3px 3px #cfcfcf;">Math Game!</h1>
                    <h6 class="text-center text-header">Naufal Ammar | K3518047</h6>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="usr">Nama:</label>
                            <input type="text" name="name" class="form-control" id="usr">
                        </div>
                        <div class="form-group">
                            <label for="eml">Email:</label>
                            <input type="email" name="email" class="form-control" id="eml">
                            </div>
                        <input class="btn btn-warning float-right text-white mt-2" type="submit" name="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>

    <?php
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>

</html>