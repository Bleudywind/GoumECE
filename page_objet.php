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
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-secondary btn-primary btn-md"> connexion acheteur</button>
                </div>  
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-secondary btn-primary btn-md"> connexion vendeur</button>
                </div>
  
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
                        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(105).jpg" alt="First slide">
                        <div class="mask rgba-black-light"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive">This is the first title</h3>
                        <p>First text</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(115).jpg" alt="Second slide">
                        <div class="mask rgba-black-light"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive">Thir is the second title</h3>
                        <p>Secondary text</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(108).jpg" alt="Third slide">
                        <div class="mask rgba-black-light"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive">This is the third title</h3>
                        <p>Third text</p>
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
                <div class="col-lg-8">
                    <form>
                        <div class="form-group">
                            <textarea class="area_text form-control" id="description" name="nom" rows=5 cols=150 disabled>Valeur par défaut</textarea>
                            <label for="description"></label>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                        <div class="row">
                            
                            <div class="col-lg-12 d-flex justify-content-center">
                                <button type="button" class="btn btn-outline-success btn-primary btn-md">Enregister</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <button type="button" class="btn btn-outline-danger btn-primary btn-md">Retirer</button>
                            </div>   
                        </div>
                </div>
            </div>
            <div class="row"></div>
            <div class="row">
                <div class="col-lg-4">
                    <form>
                        <textarea name="nom" rows=4 cols=40>Valeur</textarea>
                    </form>
                </div>
                <div class="col-lg-8">
                    <div class="row">  
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <a href="lights.jpg" target="_blank">
                                    <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(105).jpg" alt="Lights" style="width:100%">
                                    <div class="caption">
                                        <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <a href="nature.jpg" target="_blank">
                                    <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(105).jpg"  alt="Nature" style="width:100%">
                                    <div class="caption">
                                        <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <a href="fjords.jpg" target="_blank">
                                    <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(105).jpg" alt="Fjords" style="width:100%">
                                    <div class="caption">
                                        <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
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