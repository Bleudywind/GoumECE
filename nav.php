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
        <nav class="navbar navbar-expand-md" style=" background: #FFCE2B">
                            <div class="container ml-5">
                                <div class="col-lg-1">
                                    <a class="nav_logo" href=""><img src="Panier.png" style=" height: 50px;width: auto;"></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="nav_logo" href=""><img src="logo.png" style=" height: 50px;width: auto;"></a>
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
        
</body>
</html>