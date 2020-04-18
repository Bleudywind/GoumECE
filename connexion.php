<?php
    session_start();
    $email = isset($_POST["email"])? $_POST["email"] : "";
    $password = isset($_POST["password"])? $_POST["password"] : "";

    $database = "projetwd";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if(isset($_POST["button1"])) 
    {
        if ($db_found)
        {
            if ($email !="" && $password !="")
            {
                if ($_SESSION['Role'])
                {
                    $sql = "SELECT * FROM vendeur ";
                    $sql .= "WHERE Email LIKE '%$email%' ";
                    $sql .= "AND MotDePasse LIKE '%$password%' ";
            
                    $result = mysqli_query($db_handle, $sql);

                    if (mysqli_num_rows($result) == 0) {
                    
                        echo "Account not found";
                    }  else {
                        $_SESSION['Connect'] = 1;
                        header("Location: http://goumece/Accueil.php");               
                    }
                }
                else
                {
                    $sql = "SELECT * FROM acheteur ";
                    $sql .= "WHERE Email LIKE '%$email%' ";
                    $sql .= "AND MotDePasse LIKE '%$password%' ";
            
                    $result = mysqli_query($db_handle, $sql);

                    if (mysqli_num_rows($result) == 0) {
                    
                        echo "Account not found";
                    }  else {
                        $_SESSION['Connect'] = 1;
                        header("Location: http://goumece/Accueil.php");               
                    }
                }
                
            }
            else {
                echo "champs non remplie";
            }
        }
        else
        {
            echo "database not found";
        }
        
    }
    if(isset($_POST["button2"]))
    {
        header("Location: http://goumece/nouveau_compte_front.php");
    }

?>