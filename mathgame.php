<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/script.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Game UTS | Pemrograman Web</title>
</head>

<body class="bg-light">
    <?php

    if (!isset($_COOKIE['name']) & isset($_COOKIE['email'])) {
        echo "<script>window.location.href='index'</script>";
    }

    if ($_SESSION['lives'] > 0) {

    ?>

        <div class="mid">
            <div class="card shadow-sm" style="width:50rem;">
                <div class="card-body p-3">
                    <h5 class="text-header"><?php echo $_SESSION['welc']; ?></h5>
                    <form action="process.php" method="post">
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
        $conn = mysqli_connect("fdb20.awardspace.net", "3830053_leaderboard", "mathgame123", "3830053_leaderboard");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO leaderboard(userName, email, score) VALUES('" . $_COOKIE['name'] . "', '" . $_COOKIE['email'] . "', '" . $_SESSION['scores'] . "')";

        mysqli_query($conn, $sql);
        mysqli_close($conn);

        echo "<div class=\"mid\"><div class=\"p-5 bg-white rounded shadow-sm\"><h5>Hello " . $_COOKIE['name'] . "... Sayang permainan sudah selesai. Semoga lain kali bisa lebih baik.</h5>";
        echo "<p>Score anda: " . $_SESSION['scores'] . "</p>";
        echo "<p class=\"text-center\"><a class=\"btn btn-warning text-white mb-0\" href=\"reinput.php\">Main Lagi</a>  <a class=\"btn btn-danger text-white mb-0\" href=\"halloffame.php\">Hall of Fame</a></p></div></div>";

        session_destroy();
    }
    ?>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>