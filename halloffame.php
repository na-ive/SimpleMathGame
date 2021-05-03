<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/script.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall of Fame Math Game UTS | Pemrograman Web</title>
</head>

<body class="bg-light">

    <div>
        <div class="d-flex align-items-center">
            <div class="bg-white shadow-sm rounded px-4 pb-3 pt-4 mx-auto mt-5" style="width: 50rem;">
                <h1 class="text-center text-warning" style="text-shadow: 3px 3px #cfcfcf;">Hall of Fame Math Game</h1>
		<h6 class="text-center">Naufal Ammar | K3518047</h6>
                <table class="table table-bordered">
                    <tr>
                        <th>Rank</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Scores</th>
                    </tr>
                    <?php
                    $conn = mysqli_connect("fdb20.awardspace.net", "3830053_leaderboard", "mathgame123", "3830053_leaderboard");

                    $result = mysqli_query($conn, "SELECT userName, email, score FROM leaderboard ORDER BY score DESC LIMIT 10");

                    $ranking = 1;

                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $ranking . "</td>";
                            echo "<td>" . $row['userName'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['score'] . "</td>";
                            echo "</tr>";
                            $ranking++;
                        }
                    }
                    ?>
                </table>
                <p class="text-center"><a class="btn btn-warning text-white" href="reinput.php">Main lagi</a></p>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>