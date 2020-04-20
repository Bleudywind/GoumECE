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
        $_SESSION['ID'] = 0;
        $_SESSION['Connect'] = 0;
        $_SESSION['Role'] = 0;
        header("Location: http://goumece/Start_page.php");
    }
    if(isset($_POST["ajouter_objet"]))
    {
        header("Location: http://goumece/Ajout_objet_front.php");
    }
    if(isset($_POST["rechercher"]))
    {
        $search = $_POST['search'];
        header("Location: http://goumece/Trie.php?rsh=$search");
    }
    
?>