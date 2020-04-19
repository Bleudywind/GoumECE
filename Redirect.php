<?php
    session_start();


    if(isset($_POST["connexion_a"]))
    {
        $_SESSION['Connect'] = 0;
        $_SESSION['Role'] = 0;
        header("Location: http://goumece/connexion_front.php");
    }
    if(isset($_POST["connexion_v"]))
    {
        $_SESSION['Connect'] = 0;
        $_SESSION['Role'] = 1;
        header("Location: http://goumece/connexion_front.php");
    }
    if(isset($_POST["deconnexion"]))
    {
        $_SESSION['Connect'] = 0;
        $_SESSION['Role'] = 0;
        header("Location: http://goumece/Start_page.php");
    }
    
?>