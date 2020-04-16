<?php    

    $email = isset($_POST["email"])? $_POST["email"] : "";
    $password = isset($_POST["password"])? $_POST["password"] : "";
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $password_c = isset($_POST["password_c"])? $_POST["password_c"] : "";

    $database = "projetwd";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);


    echo $email;
    echo $nom;
    echo $prenom;
    
    if (isset($_POST["button1"]))
    {
        if($db_found)
        {
            if ($email =! "" || $password =! "" || $nom =! "" || $prenom =! "" || $password_c =! "")
            {
                if ($password =! $password_c)
                {
                    echo "les mots de passe ne sont pas les mêmes";
                }
                else
                {
                    $sql = "SELECT * FROM acheteur WHERE Email LIKE '%$email% AND MotDePasse LIKE '%$password%";
                    $result = mysqli_query($db_handle, $sql);
                    
                    if(!$result)
                    {
                        $sql = "INSERT INTO `acheteur` (`ID`, `Nom`, `Prenom`, `Email`, `MotDePasse`) VALUES (NULL, '$nom', '$prenom', '$email', '$password') ";
                        mysqli_query($db_handle, $sql);
                        $sql = "SELECT * FROM acheteur WHERE Email LIKE '%$email% AND MotDePasse LIKE '%$password%";
                        if ($result)
                        {
                            echo "erreur lors de la création du compte";
                        }
                        else
                        {
                            header("Location: http://goumece/connexion.html");
                        }
                    }
                    else 
                    {
                        echo "ce compte existe déjà !";
                    }

                    
                }
                
            }
            else
            {
                echo "Un ou plusieurs champs sont vides";
            }
        }
    }
?>