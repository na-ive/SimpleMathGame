<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Game UTS | Pemrograman Web</title>
</head>

<body class="bg-light">
    <?php

    if (!isset($_COOKIE['name']) & isset($_COOKIE['email'])) {
        echo "<script>window.location.href='../index'</script>";
    }

    if ($_SESSION['lives'] > 0) {

    ?>

        <div class="mid">
            <div class="card shadow-sm" style="width:50rem;">
                <div class="card-body p-3">
                    <h5 class="text-header"><?php echo $_SESSION['welc']; ?></h5>
                    <form action="../logic/process.php" method="post">
                        <label for="jwb"><?php
                        echo "Berapakah " . $_COOKIE['x'] . " + " . $_COOKIE['y'] . " = ";
                        ?></label>
                        <input type="text" name="jawaban" class="form-control mb-2" id="jwb">
                        <input class="btn btn-warning text-white" type="submit" name="submit" value="Submit">
                    </form>
                </div>
                <div class="card-footer pb-1">
                    <p class="text-center small"><?php echo "Lives: " . $_SESSION['lives'] . " | Scores: " . $_SESSION['scores']; ?></p>
                </div>
            </div>
        </div>
    <?php
    } else {
        require_once '../config/db.php';

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO leaderboard(userName, email, score) VALUES('" . $_COOKIE['name'] . "', '" . $_COOKIE['email'] . "', '" . $_SESSION['scores'] . "')";

        mysqli_query($conn, $sql);
        mysqli_close($conn);

        echo "<div class=\"mid\"><div class=\"p-5 bg-white rounded shadow-sm\"><h5>Hello " . $_COOKIE['name'] . "... Sayang permainan sudah selesai. Semoga lain kali bisa lebih baik.</h5>";
        echo "<p>Score anda: " . $_SESSION['scores'] . "</p>";
        echo "<p class=\"text-center\"><a class=\"btn btn-warning text-white mb-0\" href=\"../logic/reinput.php\">Main Lagi</a>  <a class=\"btn btn-danger text-white mb-0\" href=\"/pages/halloffame\">Hall of Fame</a></p></div></div>";

        session_destroy();
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>

</html>