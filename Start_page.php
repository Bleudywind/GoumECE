<?php

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

    header("Location: http://goumece/Accueil.php?imgext1='$objet_img[0]'&imgext2='$objet_img[1]'&imgext3='$objet_img[2]'");

?>