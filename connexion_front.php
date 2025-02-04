<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="connexion.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-md">
            <a class="nav_logo" href=""><img src="logo.png" class="logo"></a>  
                      
        </nav>
        <div id="login_contour"> 
            <div id="login_bloc">
                <div id="connexion_text"> Connexion </div>
                <form action="connexion.php" method="post" class="form-inline">
                    
                    <table>
                        <tr>
                            <td>
                                <div class="form-group d-flex justify-content-center">
                                    <label class="sr-only" for="text">Texte</label>
                                    <input type="text" class="form-control" id="text" placeholder="Adresse mail" name="email" autocomplete="off"><br>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group d-flex justify-content-center">
                                    <label class="sr-only" for="text">Texte</label>
                                    <input type="password" class="form-control" id="text" placeholder="Password" name="password"><br>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-secondary" name="button1">Connexion</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group d-flex justify-content-center">
                                    <button  class="btn btn-outline-secondary" name="button2">Céation d'un nouveau compte</button>
                                </div>
                            </td>
                        </tr>
                    </table>  
                </form>              
            </div>
        </div>
    </body>
</html>