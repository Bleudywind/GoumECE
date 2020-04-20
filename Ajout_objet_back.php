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
    $enchere = isset($_POST["Enchere"])? $_POST["Enchere"] : "";
    $achat_imm = isset($_POST["achat_imm"])? $_POST["achat_imm"] : "";
    $best_offer = isset($_POST["best_offer"])? $_POST["best_offer"] : "";
    $date_fin_enchere = isset($_POST["date_fin_enchere"])? $_POST["date_fin_enchere"] : "";

    $vendeur_id = $_SESSION['ID']; 
    
    $database = "projetwd";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    date_default_timezone_set('Europe/Paris');
    $date = date('yy-m-d');

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
                    $extension = "";
                    for ($i = 0; $i < 3; $i++)
                    {
                        if($taille[$i][2] == 0)
                        {
                            $type_image[$i] = ".gif";
                            $extension .= $type_image[$i];
                        }
                        elseif($taille[$i][2] == 1)
                        {
                            $type_image[$i] = ".jpg";
                            $extension .= $type_image[$i];
                        }
                        else
                        {
                            $type_image[$i] = ".png";
                            $extension .= $type_image[$i];
                        }
                    }

                    $sql = "INSERT INTO `objet` (`ID`, `Description`, `Nom`, `Categorie`, `Prix`, `extension_img`, `vendeurID`) VALUES (NULL, '$description', '$nom', '$categorie', '$prix', '$extension', '$vendeur_id');";
                    mysqli_query($db_handle, $sql);
                    
                    echo $date_fin_enchere;
                    $heure_fin_enchere = substr($date_fin_enchere, 11);
                    $date_fin_enchere = substr($date_fin_enchere, 0, -6);
                    echo $date_fin_enchere;
                    echo $heure_fin_enchere;
                    $sql = "SELECT * FROM objet WHERE vendeurID LIKE '$vendeur_id' AND Nom LIKE '$nom';";
                    $result = mysqli_query($db_handle, $sql);
                    $data = mysqli_fetch_assoc($result);

                    $id_objet = $data['ID'];
                    $sql = "INSERT INTO enchere (`ID`, `Prix`, `Date`, `Heure`, `DateFin`, `objetID`, `acheteurID`) VALUES (NULL, '$prix', '$date', '$heure_fin_enchere', '$date_fin_enchere', '$id_objet', '0');";
                    $result = mysqli_query($db_handle, $sql);

                    $chemin = "image_objet/". $data['ID']. ".1".$type_image[0];
                    $_FILES['image_1']['name'] = $chemin;
                    $retour = copy($_FILES['image_1']['tmp_name'], $_FILES['image_1']['name']);
                    $chemin = "image_objet/". $data['ID']. ".2" .$type_image[1];
                    $_FILES['image_2']['name'] = $chemin;
                    $retour = copy($_FILES['image_2']['tmp_name'], $_FILES['image_2']['name']);
                    $chemin = "image_objet/". $data['ID']. ".3".$type_image[2];
                    $_FILES['image_3']['name'] = $chemin;
                    $retour = copy($_FILES['image_3']['tmp_name'], $_FILES['image_3']['name']);
                    $identifiant = $data['ID'];
                    header("Location: http://goumece/page_objet.php?id=$identifiant");
                                       
                
            }
        }
        else
        {
            echo "problème de connexion à la base de donnée";
        }
    
    }
    
?>