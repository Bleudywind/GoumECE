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
    <?php
        session_start();
        if (!isset($_SESSION['Connect']))
        {
            $_SESSION['Connect'] = 0;
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
        }
        else
        {
            document.getElementById('connect_btn_1').style.visibility = 'visible';
            document.getElementById('connect_btn_2').style.visibility = 'visible';
            document.getElementById('disconnect').style.visibility = 'hidden';
        }
        });
        
    </script>
        <nav class="navbar navbar-expand-md" style=" background: #FFCE2B">
            <div class="container ml-5">
                <div class="col-lg-1">
                    <a class="nav_logo" href=""><img src="Panier.png" style=" height: 50px;width: auto;"></a>
                </div>
                <div class="col-lg-1">
                    <a class="nav_logo" href=""><img src="logo.png" style=" height: 50px;width: auto;"></a>
                </div>
                <div class="col-lg-4" style="margin-left:250px">
                    <form class="recherche">
                        <input class="form-control mr-sm-2"  type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>               
                    </form>
                </div>
                <form method="post" action="Redirect.php">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-outline-secondary btn-primary btn-md" id="disconnect" name="deconnexion">Deconnexion</button>
                    </div>
                </form>
                <form method="post" action="Redirect.php">
                    <div class="col-md-2">
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
      <?php
            $database = "projetwd";
            $db_handle = mysqli_connect('localhost', 'root', '');
            $db_found = mysqli_select_db($db_handle, $database);
            $research = $_GET['rsh'];
            
            
                if($db_found)
                {
                    if ($research == "Ferraille_ou_Tresors" || $research == "Bon_pour_le_Musee" || $research == "Accessoire_VIP")
                    {
                        $sql = "SELECT * FROM objet WHERE categorie LIKE '$research'";
                        $result = mysqli_query($db_handle, $sql);
                    }
                    else
                    {
                        $sql = "SELECT * FROM objet WHERE nom LIKE '%$research%'";
                        $result = mysqli_query($db_handle, $sql);
                    }
                            
                        while ($data=mysqli_fetch_assoc($result))
                        {   
                            $id = $data['ID'];
                            $img_chemin = "image_objet/". $data['ID'] .".1";
                            $img_chemin .= substr($data['extension_img'], 0, -8);

                                echo'<div class="container">';
                                    echo '<div class="row" style="margin-top: 3%">';
                                        echo'<div class="col-md-4 d-flex justify-content-center">';
                                            echo'<img src="'.$img_chemin.'" alt="photo" style="width: 200px">';
                                        echo'</div>';
                                        echo'<div class="col-md-4">';
                                            echo'<h3>'.$data['Nom'].'</h3>'.'<br>';
                                            echo'<h5>'.$data['Description'] .'</h5>'.'<br>';
                                        echo'</div>';
                                        echo'<div class="col-md-4">';
                                            echo'<h2>'.$data['Prix'].'</h2>'.'<br>';
                                            echo '<a class="btn btn-secondary" href="http://goumece/page_objet.php?id='.$id.'" role="button">'.'Plus de détails'.'</a>';
                                        echo'</div>';
                                    echo'</div>';
                                echo'</div>' ;
                        }
                }
    ?>
</body>
</html>