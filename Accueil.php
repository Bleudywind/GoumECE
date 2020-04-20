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
        var image_1 = <?php echo $_GET['imgext1']; ?>;
        var image_2 = <?php echo $_GET['imgext2']; ?>;
        var image_3 = <?php echo $_GET['imgext3']; ?>;
        
        
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
        }
        else
        {
            document.getElementById('connect_btn_1').style.visibility = 'visible';
            document.getElementById('connect_btn_2').style.visibility = 'visible';
            document.getElementById('disconnect').style.visibility = 'hidden';
            document.getElementById('add_objet').style.visibility = 'hidden';
        }

            document.getElementById('img_1').src = "image_objet/" + image_1;
            document.getElementById('img_2').src = "image_objet/" + image_2;
            document.getElementById('img_3').src = "image_objet/" + image_3;
            for (var i = 0; i < 3; ++i)
            {
                image_1 = image_1.charAt(0) + image_1.charAt(1);
                image_2 = image_2.charAt(0) + image_2.charAt(1);
                image_3 = image_3.charAt(0) + image_3.charAt(1);
            }
            document.getElementById('lien_objet_1').href = "http://goumece/page_objet.php?id=" + image_1;
            document.getElementById('lien_objet_2').href = "http://goumece/page_objet.php?id=" + image_2;
            document.getElementById('lien_objet_3').href = "http://goumece/page_objet.php?id=" + image_3;
        });
        
    </script>
<?php include("nav.php"); ?>
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
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <a id="lien_objet_1" target="_blank">
                        <img  id="img_1"  style="height: 200px">
                        <div class="caption">
                            <p id="text_img_1"></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a id="lien_objet_2" target="_blank">
                        <img id="img_2"  style="height: 200px">
                        <div class="caption">
                            <p id="text_img_1"></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a id="lien_objet_3" target="_blank">
                        <img id="img_3"  style="height: 200px">
                        <div class="caption">
                            <p id="text_img_1"></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>