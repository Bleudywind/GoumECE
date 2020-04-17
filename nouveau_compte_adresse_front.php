<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="nouveau_compte.css">
        <script src="nouveau_compte.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-md">
            <a class="nav_logo" href=""><img src="logo.png" class="logo"></a>          
        </nav>
        <div class="container">
            <div class="row"></div>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8" >
                    <div class="inscription">
                        <h2 style="display: flex; justify-content: center;">Qu'importe le chemin pourvu qu'on ait l'adresse !</h2> <br>
                        <form id="my_form" class="was-validated" action="nouveau_compte_adresse.php" method="post" >
                            <div class="form-row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <div class="form-group">      
                                        <input type="text" class="form-control" id="rue_form" placeholder="Rue" name="rue" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Veuillez saisir une rue.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="ville_form" placeholder="Ville" name="ville"  autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Veuillez saisir une ville.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">      
                                        <input type="text" class="form-control" id="etat_form" placeholder="État/Province/Région" name="etat" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Veuillez saisir un État/Province/Région.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="cp_form" placeholder="Code postal" name="cp" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Veuillez saisir un Code postal.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="pays_form" placeholder="Pays" name="pays" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Veuillez saisir un Pays.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <div class="form-group">      
                                        <input type="text" class="form-control" id="num_form" placeholder="Numéro" name="num" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Veuillez saisir un numéro.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-warning" name="button1" id="btn1">Suivant</button>
                                </div>
                            </div>
                            <div class="row"></div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </body>
</html>