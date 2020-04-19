<?php
    session_start();
    $ret = is_uploaded_file($_FILES['image_1']['tmp_name']);
    $taille[0] = getimagesize($_FILES['image_1']['tmp_name']);
    $ret2 = is_uploaded_file($_FILES['image_2']['tmp_name']);
    $taille[1] = getimagesize($_FILES['image_2']['tmp_name']);
    $ret3 = is_uploaded_file($_FILES['image_3']['tmp_name']);
    $taille[2] = getimagesize($_FILES['image_3']['tmp_name']);
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
            if (!$ret || !$ret2 || !$ret3)
            {
                echo "Problème de transfert";
            }
            else
            {   
                
                 
                    $sql = "INSERT INTO `objet` (`ID`, `Description`, `Nom`, `Categorie`, `Prix`, `vendeurID`) VALUES (NULL, '$description', '$nom', '$categorie', '$prix', '$vendeur_id')";
                    mysqli_query($db_handle, $sql);
                    $sql = "SELECT * FROM objet WHERE vendeurID LIKE '$vendeur_id' AND Nom LIKE '$nom';";
                    $result = mysqli_query($db_handle, $sql);
                    $data = mysqli_fetch_assoc($result);
                    
                    for ($i = 0; $i < 3; $i++)
                    {
                        if($taille[$i][2] == 0)
                        {
                            $type_image[$i] = ".gif";
                        }
                        elseif($taille[$i][2] == 1)
                        {
                            $type_image[$i] = ".jpg";
                        }
                        else
                        {
                            $type_image[$i] = ".png";
                        }
                    }





                    $chemin = "image_objet/". $data['ID']. ".1".$type_image[0];
                    $_FILES['image_1']['name'] = $chemin;
                    $retour = copy($_FILES['image_1']['tmp_name'], $_FILES['image_1']['name']);
                    $chemin = "image_objet/". $data['ID']. ".2" .$type_image[1];
                    $_FILES['image_2']['name'] = $chemin;
                    $retour = copy($_FILES['image_2']['tmp_name'], $_FILES['image_2']['name']);
                    $chemin = "image_objet/". $data['ID']. ".3".$type_image[2];
                    $_FILES['image_3']['name'] = $chemin;
                    $retour = copy($_FILES['image_3']['tmp_name'], $_FILES['image_3']['name']);
                    
                                       
                
            }
        }
        else
        {
            echo "problème de connexion à la base de donnée";
        }
    
    }
    
?>