<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
            <div class="container">
                <div class="col-lg-1">
                    <a class="nav_logo" href=""><img src="Panier.png" style=" height: 50px;width: auto;"></a>
                </div>
                <div class="col-lg-1">
                    <a class="nav_logo" href=""><img src="logo.png" style=" height: 50px;width: auto;"></a>
                </div>
                <div class="col-lg-4">
                    <form class="recherche">
                        <input class="form-control mr-sm-2"  type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>               
                    </form>
                </div>
                <form method="post" action="Redirect.php">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-outline-secondary btn-primary btn-md" id="disconnect" name="deconnexion"> Deconnexion</button>
                    </div>
                </form>
                <form method="post" action="Redirect.php">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-outline-secondary btn-primary btn-md" id="connect_btn_1" name="connexion_a"> connexion acheteur</button>
                    </div>
                </form>
                <form method="post" action="Redirect.php">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-outline-secondary btn-primary btn-md" id="connect_btn_2" name="connexion_v"> connexion vendeur</button>
                    </div>
                </form>
                <div class="dropdown menu col-lg-1">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catégories
                    </a>
              
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">scrzfnw</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div> 
            </div>            
        </nav>
      <?php
        session_start();
            $database = "projetwd";
            $db_handle = mysqli_connect('localhost', 'root', '');
            $db_found = mysqli_select_db($db_handle, $database);
            $categories= /*get la categorie dans le dropdown menu*/
            
            if (isset($_POST["????"]))/* relier àcatégorie*/
            {
                if($db_found)
                {
                    $sql = "SELECT * FROM objet WHERE categorie LIKE '%$categorie%'";
                    $result = mysqli_query($db_handle, $sql);
                    $data = mysqli_fetch_assoc($result); 
                    if($data == NULL)
                    {
                        mysqli_query($db_handle, $sql);
                        $sql = "SELECT * FROM objet WHERE categorie LIKE '%$categories%' AND MotDePasse LIKE '%$password%';";
                        $result = mysqli_query($db_handle, $sql);
                        $data = mysqli_fetch_assoc($result);
                            
                        while ($data=mysqli_fetch_assoc($result))
                        {
                                echo'<div class="container">';
                                     echo'<div class="col-md-4">';
                                         echo'<img src="'.$data['chemin'].'" alt="photo">';
                                     echo'</div>';
                                     echo'<div class="col-md-4">';
                                         echo'<h3>'.$data[nom].'</h3>'.'<br>';
                                         echo'<h5>'.$data[description] .'</h5>';
                                    echo'</div>';
                                    echo'<div class="col-md-4">';
                                         echo'<h2>'.$data[prix].'</h2>'.'<br>';
                                     echo'</div>';   
                                echo'</div>'    
                        }

                        if ($data == NULL)
                        {
                            echo "erreur lors du tri";
                        }
                    }
                }
            }
    ?>
</body>
</html>