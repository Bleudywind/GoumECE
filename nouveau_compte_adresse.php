<?php    

    $rue = isset($_POST["rue"])? $_POST["rue"] : "";
    $ville = isset($_POST["ville"])? $_POST["ville"] : "";
    $etat = isset($_POST["etat"])? $_POST["etat"] : "";
    $cp = isset($_POST["cp"])? $_POST["cp"] : "";
    $pays = isset($_POST["pays"])? $_POST["pays"] : "";
    $num = isset($_POST["num"])? $_POST["num"] : "";


    $database = "projetwd";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    
     


    if (isset($_POST["button1"]))
    {
        if($db_found)
        {
            $sql = "SELECT * FROM acheteur WHERE Email LIKE '%$email% AND MotDePasse LIKE '%$password%";
            $result = mysqli_query($db_handle, $sql);
                    
            if(!$result)
            {
                $sql = "INSERT INTO `acheteur` (`ID`, `Nom`, `Prenom`, `Email`, `MotDePasse`) VALUES (NULL, '$nom', '$prenom', '$email', '$password') ";
                mysqli_query($db_handle, $sql);
                $sql = "SELECT * FROM acheteur WHERE Email LIKE '%$email% AND MotDePasse LIKE '%$password%";
                if ($result)
                {
                    echo "erreur lors de la création du compte";
                }
                else
                {
                         header("Location: http://goumece/connexion.html");
                }
            }
            else 
            {
                        echo "ce compte existe déjà !";
            }
        }
    }
?>