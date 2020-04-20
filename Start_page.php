<?php

    session_start();
    date_default_timezone_set('Europe/Paris');
    $annee = date('Y');
    $mois = date('m');
    $jour = date('d');
    $heure = date('H');
    $minute = date('i');

    if (!isset($_SESSION['Connect']))
    {
        $_SESSION['Connect'] = 0;
    }
    
    $database = "projetwd";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    $sql = "SELECT * FROM objet;";
    $result = mysqli_query($db_handle, $sql);
    
    for ($i = 0; $i < 3; ++$i)
    {
        $data = mysqli_fetch_assoc($result);
        $objet_img[$i] = $data['ID'];
        $objet_img[$i] .= ".1";
        $extension[$i] = $data['extension_img'];
        $objet_img[$i] .= substr($extension[$i], 0 , -8);
    }

    $sql = "SELECT * FROM enchere;";
    $result = mysqli_query($db_handle, $sql);
    while ($data_objet = mysqli_fetch_assoc($result))
    {  
        $id_objet = $data_objet['objetID'];

        if(substr($data_objet['DateFin'], 0, -6) <= $annee)
        {          
            if(substr($data_objet['DateFin'], 5, -3) <= $mois)
            {               
                if(substr($data_objet['DateFin'], 8) <= $jour)
                {                   
                    if(substr($data_objet['Heure'], 0, -3) <= $heure)
                    {                       
                        if(substr($data_objet['Heure'], 3) <= $minute)
                        {
                            $sql = "DELETE FROM `objet` WHERE `objet`.`ID` = '$id_objet'";
                            mysqli_query($db_handle, $sql);
                            $sql = "DELETE FROM `enchere` WHERE `enchere`.`objetID` = '$id_objet'";
                            mysqli_query($db_handle, $sql);
                            $sql = "DELETE FROM `panier` WHERE `panier`.`objetID` = '$id_objet'";
                            mysqli_query($db_handle, $sql);
                        }
                    }
                }
            }
        }
    }
    


    header("Location: http://goumece/Accueil.php?imgext1='$objet_img[0]'&imgext2='$objet_img[1]'&imgext3='$objet_img[2]'");

?>