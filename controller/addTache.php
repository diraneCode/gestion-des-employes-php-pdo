<?php

    $db = Database::Connect();
    if(isset($_POST['ajouter'])){
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $duree = $_POST['duree'];
        $employe = $_POST['employe'];

        $query = $db->prepare("INSERT INTO tache(titre, description, duree, status, employe) VALUES(?,?,?,'En cours...',?)");
        $query->execute(array($titre,$description,$duree,$employe,));

        header('location: index.php?p=tache');
    }