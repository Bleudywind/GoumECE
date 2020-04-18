<?php
    session_start();
    $ret = is_uploaded_file($_FILES['image_1']['tmp_name']);
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
    $prix = isset($_POST["prix"])? $_POST["prix"] : "";
    $description = isset($_POST["description"])? $_POST["description"] : "";
    $vendeur_id = 1; // WARNING ATTENTION PA FINI

    $database = "projetwd";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if (isset($_POST["button1"]))
    {
        if ($db_found)
        {
            if (!$ret)
            {
                echo "Problème de transfert";
            }
            else
            {   
                $img_taille = $_FILES['image_1']['size'];
                echo $img_taille;
                if($img_taille > 100000)
                {
                    echo "image trop grosse :rage:";
                }
                else
                {   
                    $sql = "INSERT INTO `objet` (`ID`, `Description`, `Nom`, `Categorie`, `Prix`, `vendeurID`) VALUES (NULL, '$description', '$nom', '$categorie', '$prix', '$vendeur_id')";
                    mysqli_query($db_handle, $sql);
                    $sql = "SELECT * FROM objet WHERE vendeurID LIKE '$vendeur_id' AND Nom LIKE '$nom';";
                    $result = mysqli_query($db_handle, $sql);
                    $data = mysqli_fetch_assoc($result);
                    $chemin = "image_objet/". $data['ID']. ".png";
                    $_FILES['image_1']['name'] = $chemin;
                    $retour = copy($_FILES['image_1']['tmp_name'], $_FILES['image_1']['name']);
                    if($retour && $data != NULL) 
                    {
                        echo '<p>La photo a bien été envoyée.</p>';
                        echo '<img src="' . $_FILES['image_1']['name'] . '">';
                    }
                                       
                }
            }
        }
        else
        {
            echo "problème de connexion à la base de donnée";
        }
    
    }
    
?>