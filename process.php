<?php
session_start();

if(isset($_POST['submit'])){
    if ($_POST['jawaban'] == ($_COOKIE['x'] + $_COOKIE['y'])){
        $_SESSION['welc'] = "<p>Hello ".$_COOKIE['name'].", selamat jawaban anda benar...</p>";
        $_SESSION['scores'] += 10;
    
        echo "<script>window.location.href='mathgamenum'</script>";
    }
    else if ($_POST['jawaban'] != ($_COOKIE['x'] + $_COOKIE['y'])){
        $_SESSION['welc'] = "<p>Hello ".$_COOKIE['name'].", sayang jawaban anda salah... tetap semangat ya!!!</p>";
        if ($_SESSION['scores'] >= 2){
            $_SESSION['scores'] -= 2;
        }
        $_SESSION['lives'] -= 1;
    
        echo "<script>window.location.href='mathgamenum'</script>";
    }
}

?>