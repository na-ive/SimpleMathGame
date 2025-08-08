<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
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
                    require_once '../config/db.php';

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
                <p class="text-center"><a class="btn btn-warning text-white" href="../logic/reinput.php">Main lagi</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>