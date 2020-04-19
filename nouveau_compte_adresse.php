<?php    
    session_start();
    $rue = isset($_POST["rue"])? $_POST["rue"] : "";
    $ville = isset($_POST["ville"])? $_POST["ville"] : "";
    $etat = isset($_POST["etat"])? $_POST["etat"] : "";
    $cp = isset($_POST["cp"])? $_POST["cp"] : "";
    $pays = isset($_POST["pays"])? $_POST["pays"] : "";
    $num = isset($_POST["num"])? $_POST["num"] : "";
    $nom = $_SESSION['Nom'];
    $prenom = $_SESSION['Prenom'];
    $id = $_SESSION['ID'];

    $database = "projetwd";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    

    if (isset($_POST["button1"]))
    {
        if($db_found)
        {
            if ($_SESSION['Role'])
            {
                $sql = "INSERT INTO `adresse` (`ID`, `Nom`, `Prenom`, `Rue`, `Ville`, `CodePostal`, `Pays`, `Numero`, `Roles`, `IDacheteur`, `IDvendeur`) VALUES (NULL, '$nom', '$prenom', '$rue', '$ville', '$cp', '$pays', '$num', '1', '0', '$id')";
                mysqli_query($db_handle, $sql);
                header("Location: http://goumece/connexion_front.php");
            }
            else
            {
                $sql = "INSERT INTO `adresse` (`ID`, `Nom`, `Prenom`, `Rue`, `Ville`, `CodePostal`, `Pays`, `Numero`, `Roles`, `IDacheteur`, `IDvendeur`) VALUES (NULL, '$nom', '$prenom', '$rue', '$ville', '$cp', '$pays', '$num', '0', '$id', '0')";
                mysqli_query($db_handle, $sql);
                header("Location: http://goumece/connexion_front.php");
            }
            
        }
    }
?>