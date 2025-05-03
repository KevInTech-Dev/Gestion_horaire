<?php
    //Démarrage de la session
    session_start();
    
    //Vérification de l'envoi du formulaire
    if(!empty($_POST)){
        //Formulaire bien envoyé

        //Vérification pour s'assurer que tous les champs sont remplis
        if(isset($_POST["lastname"], $_POST["firstname"], $_POST["email"], $_POST["telephone"], $_POST["password"], $_POST["confirmation"]) && !empty($_POST["lastname"]) && !empty($_POST["firstname"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["confirmation"])){
            //Formulaire complet

            //Récupération des données tout en les protégeant
            $firstname = strip_tags($_POST["firstname"]);
            $lastname = strip_tags($_POST["lastname"]);
            $telephone = strip_tags($_POST["telephone"]);

            //Vérification de l'email
            if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
                //Message d'erreur
                die("Email invalide");          
            
            //Vérification de l'identité et hashage du mot de passe
            if($_POST["password"] == $_POST["confirmation"]){
                $password = password_hash($_POST["password"], PASSWORD_ARGON2ID);
            }else{
                //Message d'erreur
                die("Mot de passe et confirmation non-identiques");
            }

            //Enregistrement en BD
            require_once "db-connection.php";

            $sql = "INSERT INTO `utilisateurs`(`nom_utilisateur`, `prenoms_utilisateur`, `email_utilisateur`, `telephone_utilisateur`, `mot_de_passe_utilisateur`) VALUES (:lastname, :firstname, :email, :telephone, '$password')";
            $query = $PDO->prepare($sql);

            $query->bindValue(":lastname", $lastname, PDO::PARAM_STR);
            $query->bindValue(":firstname", $firstname, PDO::PARAM_STR);
            $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
            $query->bindValue(":telephone", $telephone, PDO::PARAM_STR);

            $query->execute();

            //Redirection de page

        }else {
            //Message d'erreur
            die("Formulaire incomplet");
        }
    }