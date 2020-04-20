<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="navbar.css">
    </head>
    <body>
        <head>
            <title></title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <link rel="stylesheet" type="text/css" href="navbar.css">
        </head>
        <body>
        <?php session_start();
        if (!$_SESSION['Connect'] || $_SESSION['Role'])
        { 
            header("Location: http://goumece/Start_page.php");
        }
        ?>
        <script type="text/javascript">
                var connect = <?php echo $_SESSION['Connect'] ?>;
     
                
                $(document).ready(function() {
                if (connect)
                {
                    document.getElementById('connect_btn_1').style.visibility = 'hidden';
                    document.getElementById('connect_btn_2').style.visibility = 'hidden';
                    document.getElementById('disconnect').style.visibility = 'visible';
                    if(<?php echo $_SESSION['Role'] ?>)
                    {
                        document.getElementById('add_objet').style.visibility = 'visible';
                    }
                    else
                    {
                        document.getElementById('add_objet').style.visibility = 'hidden';
                    }
                }
                else
                {
                    document.getElementById('connect_btn_1').style.visibility = 'visible';
                    document.getElementById('connect_btn_2').style.visibility = 'visible';
                    document.getElementById('disconnect').style.visibility = 'hidden';
                    document.getElementById('add_objet').style.visibility = 'hidden';
                }

                });
                
            </script>
<nav class="navbar navbar-expand-md" style=" background: #FFCE2B">
            <div class="container ml-5">
                <div class="col-lg-1">
                    <a class="nav_logo" href="panier.php"><img src="Panier.png" style=" height: 50px;width: auto;"></a>
                </div>
                <div class="col-lg-1">
                    <a class="nav_logo" href="http://goumece/Start_page.php"><img src="logo.png" style=" height: 50px;width: auto;"></a>
                </div>
                <div class="col-lg-4" style="margin-left:250px">
                    <form class="recherche" method="post" action="Redirect.php">
                        <input class="form-control mr-sm-1" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" name="rechercher" type="submit">Search</button>               
                    </form>
                </div>
                <form method="post" action="Redirect.php">
                    <div class="col-md-2 mr-1">
                        <button type="submit" class="btn btn-outline-secondary btn-primary btn-md" id="disconnect" name="deconnexion">Deconnexion</button>
                    </div>
                </form>
                <form method="post" action="Redirect.php">
                    <div class="col-md-2 mr-1">
                        <button type="submit" class="btn btn-outline-secondary btn-primary btn-md" id="add_objet" name="ajouter_objet">Ajouter un Objet</button>
                    </div>
                </form>
                <form method="post" action="Redirect.php">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-outline-secondary btn-primary btn-md" id="connect_btn_1" name="connexion_a">connexion acheteur</button>
                    </div>
                </form>
                <form method="post" action="Redirect.php">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-outline-secondary btn-primary btn-md" id="connect_btn_2" name="connexion_v">connexion vendeur</button>
                    </div>
                </form>
                <div class="dropdown menu col-lg-1 mr-0" style="margin-left:100px;">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catégories
                    </a>
              
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="http://goumece/Trie.php?rsh=Ferraille_ou_Tresors">Ferraille ou Tresors</a>
                        <a class="dropdown-item" href="http://goumece/Trie.php?rsh=Bon_pour_le_Musee">Bon pour le Musee</a>
                        <a class="dropdown-item" href="http://goumece/Trie.php?rsh=Accessoire_VIP">Accessoire VIP</a>
                    </div>
                </div> 
            </div>            
        </nav>
            <div class="container">
              <div class="row"></div>
              <div class="row"></div>
                <div class="col-lg-3"></div>
                <?php

                    
                        $database = "projetwd";
                        $db_handle = mysqli_connect('localhost', 'root', '');
                        $db_found = mysqli_select_db($db_handle, $database);
                        $id = $_SESSION['ID'];
                    

                    
                        if($db_found)
                        {
                            $sql = "SELECT * FROM panier WHERE acheteurID LIKE '$id'";
                            $result = mysqli_query($db_handle, $sql);
                            $i = 0;
                            while ($data=mysqli_fetch_assoc($result))
                            {   $i++;
                                $objet_id = $data['objetID'];
                                $sql = "SELECT * FROM objet WHERE ID LIKE '$objet_id'";
                                $result_2 = mysqli_query($db_handle, $sql);
                                $data_objet = mysqli_fetch_assoc($result_2);

                                $id_objet = $data_objet['ID'];
                                $img_chemin = "image_objet/". $id_objet .".1";
                                $img_chemin .= substr($data_objet['extension_img'], 0, -8);
                
                                echo'<div class="container">';
                                    echo '<div class="row" style="margin-top: 3%">';
                                        echo'<div class="col-md-4 d-flex justify-content-center">';
                                            echo'<img src="'.$img_chemin.'" alt="photo" style="width: 200px">';
                                        echo'</div>';
                                        echo'<div class="col-md-4">';
                                            echo'<h3>'.$data_objet['Nom'].'</h3>'.'<br>';
                                            echo'<h5>'.$data_objet['Description'] .'</h5>'.'<br>';
                                        echo'</div>';
                                        echo'<div class="col-md-4">';
                                            echo'<h2>'.$data_objet['Prix'].'€'.'</h2>'.'<br>';
                                            echo '<a class="btn btn-secondary" href="http://goumece/page_objet.php?id='.$id_objet.'" role="button">'.'Plus de détails'.'</a>';
                                        echo'</div>';
                                    echo'</div>';
                                echo'</div>' ;

                                if ($data == NULL)
                                {
                                    echo "erreur lors du panier";
                                }
                            }
                            if ($i == 0)
                            {   
                                        echo '<h2 class="d-flex justify-content-center">'.'Votre panier est vide !'. '</h2>';
                                    
                            }
                        }
                    
                        
            ?>
            </div>
    </body>
</html>