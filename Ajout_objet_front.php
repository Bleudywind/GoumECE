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
        <link rel="stylesheet" type="text/css" href="Ajout_objet.css">
        <script src="nouveau_compte.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row"></div>
            <div class="row"></div>
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="nouveau_objet">
                        <h2 style="display: flex; justify-content: center;">Mais quelle est cet objet ?</h2>
                        <form id="my_form" class="was-validated" action="Ajout_objet_back.php" enctype="multipart/form-data" method="post" >
                            <div class="row"></div>
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-4">
                                    <div class="form-group">      
                                        <input type="text" class="form-control" id="nom_form" placeholder="Nom" pattern="{1,}" name="nom" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                            Veuillez saisir un nom.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1" name="categorie">
                                            <option>Aucune catégorie</option>
                                            <option>Ferraille ou Trésors</option>
                                            <option>Bon pour le Musée</option>
                                            <option>Accessoire VIP</option>
                                        </select>
                                        <label for="exampleFormControlSelect2">Catégorie</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group"> 
                                        <input type="text" class="form-control" id="prix_form" placeholder="Prix" pattern="[0-9]{1,}" name="prix" autocomplete="off" required>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">€</div>
                                        </div>   
                                        <div class="invalid-feedback">
                                            Veuillez saisir un Prix.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class ="form-row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" maxlength="300" minlength="30" name="description" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img_1" name="image_1">
                                        <label class="custom-file-label" for="customFile">Choisir l'image 1</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img_2" name="image_2">
                                        <label class="custom-file-label" for="customFile">Choisir l'image 2</label>
                                    </div>
                                </div> 
                                <div class="col-lg-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img_3" name="image_3">
                                        <label class="custom-file-label" for="customFile">Choisir l'image 3</label>
                                    </div>
                                </div>                               
                            </div>
                            <div class="row">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-warning" name="button1" id="btn1">Enregistrer cet objet</button>
                                </div>
                            </div>
                        </form>
                        <div class="row"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>