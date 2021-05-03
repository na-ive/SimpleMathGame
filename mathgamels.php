<?php
session_start();

if(isset($_COOKIE['name']) & isset($_COOKIE['email'])){
    $_SESSION['lives'] = 5;
    $_SESSION['scores'] = 0;
    $_SESSION['welc'] = "<p>Hello ".$_COOKIE['name'].", tetap semangat ya... you can do the best!!!</p>";

    echo "<script>window.location.href='mathgamenum'</script>";
}

else{
    echo "<script>window.location.href='index'</script>";
}

?>