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
                <div class="col-lg-3"></div>
                <div class="col-lg-6" >
                    <div class="inscription">
                        <h2 style="display: flex; justify-content: center;">Dites nous en plus sur vous</h2> <br>
                        <form id="my_form" class="was-validated" action="nouveau_compte.php" method="post" >
                            <div class="form-row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-5">
                                    <div class="form-group">      
                                        <input type="text" class="form-control" id="nom_form" placeholder="Nom" pattern="[A-Za-z]{1,}" name="nom" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Veuillez saisir un nom.
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="prenom_form" placeholder="Prenom" name="prenom" pattern="[A-Za-z]{1,}" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Veuillez saisir un prenom.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <div class="form-group">      
                                        <input type="email" class="form-control" id="email_form" placeholder="Adresse mail" name="email" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Veuillez saisir un email valide.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="mdp_form" placeholder="mot de passe" pattern="{8,}" name="password" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Les mots de passes de correspondent pas.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="mdp_form_c" placeholder="confirmation mot de passe" pattern="{8,}" name="password_c" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-warning" name="button1" id="btn1" disabled>Suivant</button>
                                </div>
                            </div>
                            <div class="row"></div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#mdp_form_c').keyup(function() 
                {
                    if ($('#mdp_form').val() == $('#mdp_form_c').val())
                    {
                        $('#btn1').prop('disabled', false);
                    }
                });
            });
    
        </script>
    </body>
</html>