<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="page_objet.css">
    </head>
    <body>
    <?php 
        session_start();
        if (!isset($_SESSION['Connect']))
        {
            $_SESSION['Connect'] = 0;
        }
        if ($_SESSION['Connect'])
        {
            $guest_id = $_SESSION ['ID'];
        }
        else
        {
            $guest_id = 0;
        }
        



        $id = $_GET['id'];
        $database = "projetwd";
        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);


        if (isset($_GET['enchere']))
        {
            $enchere = $_GET['enchere'];
        }
        else
        {
            $enchere = 0;
        }
        

        $sql = "SELECT * FROM objet WHERE ID LIKE '$id'";
        $result = mysqli_query($db_handle, $sql);
        $data = mysqli_fetch_assoc($result);
        $extension_img_1 = substr($data['extension_img'], 0 , -8);
        $extension_img_2 = substr($data['extension_img'], 4 , -4);
        $extension_img_3 = substr($data['extension_img'], 8 );

        $sql = "SELECT * FROM enchere WHERE objetID LIKE '$id'";
        $result = mysqli_query($db_handle, $sql);
        $data_enchere = mysqli_fetch_assoc($result);

        $vendeur_id = $data['vendeurID'];
        $sql = "SELECT * FROM vendeur WHERE ID LIKE '$vendeur_id'";
        $result = mysqli_query($db_handle, $sql);
        $data_vendeur = mysqli_fetch_assoc($result);

        $categorie = $data['Categorie'];
        $sql = "SELECT * FROM objet WHERE Categorie LIKE '$categorie'";
        $result = mysqli_query($db_handle, $sql);
        for ($i = 0; $i < 3; $i++)
        {
            if ($data_catégorie = mysqli_fetch_assoc($result))
            {
                if ($data_catégorie['ID'] != $id)
                {
                    $img_categorie[$i] = $data_catégorie['ID'];
                    $nom_categorie[$i] = $data_catégorie['Nom'];
                }
                else
                {
                    --$i;
                }
            }
            else
            {
                $nom_categorie[$i] = 0;
                $img_categorie[$i] = 0;
            }
        }

        if($enchere > $data['Prix'])
        {
            if($enchere > $data_enchere['Prix'])
            {
                $nouveau_prix = $data_enchere['Prix'] + 1;
                $nouveau_prix_enchere = $enchere; 
                echo $guest_id;
                $sql = "UPDATE `enchere` SET `Prix` = '$nouveau_prix_enchere' , `acheteurID` = '$guest_id'  WHERE `enchere`.`objetID` = '$id'";
                $result = mysqli_query($db_handle, $sql);       
            }
            else
            {
                $nouveau_prix = $enchere + 1;
            }

            $sql = "UPDATE `objet` SET `Prix` = '$nouveau_prix' WHERE `objet`.`ID` = '$id'";
            $result = mysqli_query($db_handle, $sql);

            
            header("Location: http://goumece/page_objet.php?id=$id");
        }

        if($data_enchere['acheteurID'] == $_SESSION ['ID'])
        {
            $id_enchere = "Vous êtes actuellement en tête de l'enchère !";
        }
        else
        {
            $id_enchere = "Vous n'êtes pas en tête de l'enchère.";
        }

        $img_categorie_size = sizeof($img_categorie);

        if(!$guest_id)
        {
            $autorisation = 0;
        }
        elseif ($_SESSION['Role'])
        {
            $sql = "SELECT * FROM vendeur WHERE ID LIKE '$guest_id'";
            $result = mysqli_query($db_handle, $sql);
            if(mysqli_num_rows($result) == 0)
            {
                $autorisation = 0;
            }
            else
            {
                $autorisation = 1;
            }
        }
        elseif ($_SESSION['Role'] == 2)
        {
            $autorisation = 1;
        }
        else
        {
            $autorisation = 0;
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
            
            if (<?php echo $autorisation ?>)
            {
                document.getElementById('Enregister').style.visibility = 'visible';
                document.getElementById('Retirer').style.visibility = 'visible';
                document.getElementById('description').disabled = false;
            }
            else
            {
                document.getElementById('Enregister').style.visibility = 'hidden';
                document.getElementById('Retirer').style.visibility = 'hidden';
                document.getElementById('description').disabled = true;
            }

        }
        else
        {
            document.getElementById('add_objet').style.visibility = 'hidden';
            document.getElementById('connect_btn_1').style.visibility = 'visible';
            document.getElementById('connect_btn_2').style.visibility = 'visible';
            document.getElementById('disconnect').style.visibility = 'hidden';
            document.getElementById('Enregister').style.visibility = 'hidden';
            document.getElementById('Retirer').style.visibility = 'hidden';
            
        }



        document.getElementById('1_img').src = "image_objet/" + <?php echo $_GET['id'] ?> + ".1";
        document.getElementById('2_img').src = "image_objet/" + <?php echo $_GET['id'] ?> + ".2";       ///// WARNING CA VA PAS DU TOUT DU TOUT
        document.getElementById('3_img').src = "image_objet/" + <?php echo $_GET['id'] ?> + ".3";

            
        
            document.getElementById('img_categorie_1').src = "image_objet/" + <?php echo $img_categorie[0] ?> + ".1";
            document.getElementById('img_categorie_2').src = "image_objet/" + <?php echo $img_categorie[1] ?> + ".1";
            document.getElementById('img_categorie_3').src = "image_objet/" + <?php echo $img_categorie[2] ?> + ".1";
            document.getElementById('img_categorie_1_ref').href = "http://goumece/page_objet.php?id=" + <?php echo $img_categorie[0] ?>;
            document.getElementById('img_categorie_2_ref').href = "http://goumece/page_objet.php?id=" + <?php echo $img_categorie[1] ?>;
            document.getElementById('img_categorie_3_ref').href = "http://goumece/page_objet.php?id=" + <?php echo $img_categorie[2] ?>;
            
            

            var img_categorie_1 = <?php echo $img_categorie[0]?>;
            var img_categorie_2 = <?php echo $img_categorie[1]?>;
            var img_categorie_3 = <?php echo $img_categorie[2]?>;
            
                if(img_categorie_1 == 0)
                { 
                    document.getElementById("img_categorie_1").style.visibility = 'hidden';
                    document.getElementById("img_categorie_1_text").style.visibility = 'hidden';
                }
                if(img_categorie_2 == 0)
                { 
                    document.getElementById("img_categorie_2").style.visibility = 'hidden';
                    document.getElementById("img_categorie_2_text").style.visibility = 'hidden';
                }
                if(img_categorie_3 == 0)
                { 
                    document.getElementById("img_categorie_3").style.visibility = 'hidden';
                    document.getElementById("img_categorie_3_text").style.visibility = 'hidden';
                }
                
            $('#Encherir').click(function(){
                
                if (<?php echo $_SESSION['Connect'] ?>)
                {
                    resultat_enchere = window.prompt("Veuillez entrer la valeur de votre enchère automatique :");
                    if(resultat_enchere > <?php echo $data['Prix'] ?>)
                    {
                        alert("Votre enchère a été comptabilisé");
                        window.location.href ="http://goumece/page_objet.php?id=" + <?php echo $data['ID'] ?> + "&enchere=" + resultat_enchere;
                    }
                    else
                    {
                        alert("Enchère trop basse !");
                    }
                }
                else
                {
                    alert ("connectez-vous pour continuer");
                }

            });
        
        });
    </script>
        <nav class="navbar navbar-expand-md" style=" background: #FFCE2B">
            <div class="container ml-5">
                <div class="col-lg-1">
                    <a class="nav_logo" href=""><img src="Panier.png" style=" height: 50px;width: auto;"></a>
                </div>
                <div class="col-lg-1">
                    <a class="nav_logo" href="http://goumece/Start_page.php"><img src="logo.png" style=" height: 50px;width: auto;"></a>
                </div>
                <div class="col-lg-4" style="margin-left:250px">
                    <form class="recherche" method="post" action="Redirect.php">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
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
        </div>           
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--galerie defillante-->

    
        <div id="carousel-example-2" class="carousel slide carousel-fade z-depth-1-half" data-ride="carousel" >
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-2" data-slide-to="1"></li>
                <li data-target="#carousel-example-2" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="view">
                        <img id="1_img" class="d-block w-100"  alt="First slide" style="max-height: 500px;">
                        <div class="mask rgba-black-light"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive"></h3>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                        <img id="2_img" class="d-block w-100"  alt="Second slide" style="max-height: 500px;">
                        <div class="mask rgba-black-light"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive"></h3>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                        <img id="3_img" class="d-block w-100"  alt="Third slide" style="max-height: 500px;">
                        <div class="mask rgba-black-light"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive"></h3>
                        <p></p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2" data-ride="carousel">
            <!--Controls-->
            <div class="controls-top">
                <a class="black-text" href="#multi-item-example" data-slide="prev"><i class="fas fa-angle-left fa-3x pr-3"></i></a>
                <a class="black-text" href="#multi-item-example" data-slide="next"><i class="fas fa-angle-right fa-3x pl-3"></i></a>
            </div>
            <!--/.Controls-->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <form>
                        <div class="form-group">
                            <textarea class="area_text form-control" id="description" name="nom" rows=7 cols=100 disabled><?php echo $data['Description'] ?></textarea>
                            <label for="description"></label>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div id="date-enchère" class="col-lg-12 d-flex justify-content-center">
                            <p>
                                Date de fin d'enchère le <?php echo $data_enchere['DateFin'] ?> à <?php echo $data_enchere['Heure']?> <br>
                                Prix actuelle = <?php echo $data['Prix'] ?> <br>
                                <?php echo $id_enchere ?>
                            </p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div id="Enchere" class="col-lg-12 d-flex justify-content-center">
                            <a class="btn btn-outline-primary btn-primary btn-md" id="Encherir" role="button">Encherère automatique</a>
                            <a class="btn btn-outline-info btn-primary btn-md" id="Achat_immediat" role="button">Achat immediat</a>
                            <a class="btn btn-outline-primary btn-primary btn-md" id="Meilleur_enchere" role="button">Meilleur enchère</a>
                        </div>
                    </div>
                    <div class="row">
                        <div id="Enregister" class="col-lg-12 d-flex justify-content-center">
                            <button type="button" class="btn btn-outline-success btn-primary btn-md">Enregister</button>
                        </div>
                    </div>
                    <div class="row">
                        <div id="Retirer" class="col-lg-12 d-flex justify-content-center">
                            <button type="button" class="btn btn-outline-danger btn-primary btn-md">Retirer</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"></div>
            <div class="row">
                <div class="col-lg-4 d-flex justify-content-center">
                    <p>
                        Information Vendeur : <br> <br>
                    <?php echo $data_vendeur['Prenom']?><br>
                    <?php echo $data_vendeur['Nom']?><br>
                    <?php echo $data_vendeur['Email']?><br>
                    </p>
                </div>
                <div class="col-lg-8">
                    <div class="row">  
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <a id="img_categorie_1_ref"  target="_blank">
                                    <img id="img_categorie_1"  alt="Lights" style="height: 200px">
                                    <div class="caption">
                                        <p id="img_categorie_1_text"><?php echo $nom_categorie[0] ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <a id="img_categorie_2_ref"  target="_blank">
                                    <img id="img_categorie_2"   alt="Nature" style="height: 200px">
                                    <div class="caption">
                                        <p id="img_categorie_2_text"><?php echo $nom_categorie[1] ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <a id="img_categorie_3_ref"  target="_blank">
                                    <img id="img_categorie_3"  alt="Fjords" style="height: 200px">
                                    <div class="caption">
                                        <p id="img_categorie_3_text"><?php echo $nom_categorie[2] ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </body>
</html>