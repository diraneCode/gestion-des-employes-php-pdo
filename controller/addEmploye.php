<?php

    $db = Database::Connect();
    if(isset($_POST['ajouter'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $telephone = $_POST['telephone'];
        $adresse = $_POST['adresse'];
        $pass = $_POST['password'];
        $photo = $_POST['photo'];

        $password = password_hash($pass, PASSWORD_DEFAULT);
        if(!empty($photo)){
            $query = $db->prepare("INSERT INTO utilisateur(nom, prenom, telephone, adresse, password, status, photo) VALUES(?,?,?,?,?,'employe',?)");
            $query->execute(array($nom,$prenom,$telephone,$adresse,$password,$photo));
        }else{
            $query = $db->prepare("INSERT INTO utilisateur(nom, prenom, telephone, adresse, password, status) VALUES(?,?,?,?,?,'employe')");
            $query->execute(array($nom,$prenom,$telephone,$adresse,$password));
        }

        header('location: index.php?p=employe');
    }