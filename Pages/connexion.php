<?php
    //Démarrage de la session
    session_start();
    
    //Vérification de l'envoi du formulaire
    if(!empty($_POST)){
        //Formulaire bien envoyé

        //Vérification pour s'assurer que tous les champs ont été bien remplis
        if(isset($_POST["email"], $_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])){

            //Vérification de l'email
            if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
                //Message d'erreur
                die("Email invalide");

            //Connexion à la BD
            require_once "db-connection.php";

            $sql = "SELECT * FROM `utilisateurs` WHERE `email_utilisateur` = :email";
            $query = $PDO->prepare($sql);
            $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
            $query->execute();

            $user = $query->fetch();

            if(!$user){
                //Message d'erreur
                die("Utilisateur et/ou mot de passe incorrect");
            }

            //Vérification du mot de passe correspondant à l'utilisateur
            if(!password_verify($_POST["password"], $user["mot_de_passe_utilisateur"])){
                //Message d'erreur
                die("Utilisateur et/ou mot de passe incorrect");
            }

        }else{
            //Message d'erreur
            die("Formulaire incomplet");
        }
    }