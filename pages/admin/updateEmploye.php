<?php
    $db = Database::Connect();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = $db->query("SELECT * FROM utilisateur WHERE id = $id");
        $employe = $query->fetch(PDO::FETCH_OBJ);

        if(isset($_POST['modifier'])){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $telephone = $_POST['telephone'];
            $adresse = $_POST['adresse'];
            $pass = $_POST['password'];
            $photo = $_POST['photo'];
    
            $password = password_hash($pass, PASSWORD_DEFAULT);
            $query = $db->prepare("UPDATE utilisateur SET nom = ?, prenom = ?, telephone = ?, adresse = ?, password = ?, photo = ? WHERE id = $id");
            $query->execute(array($nom,$prenom,$telephone,$adresse,$password,$photo));
    
            header('location: index.php?p=employe');
        }
    }
    

?>


<body>
    <form method="post" action="">
    <div class="container">
        <?php include('./partials/header.php') ?>
        <div class="main">
            <?php include('./partials/left-side.php') ?>
            <div class="content">
                <div class="card-responsive">
                    <div class="title">
                        <h2>Modifier l'employe</h2>
                        <a href="index.php?p=employe"><i class="bx bx-left-arrow"></i> Retour</a>
                    </div>
                    <div class="card">
                        <div class="card-profile">
                            <div class="card-image circle">
                                <img src="./public/pictures/<?= $employe->photo ?>" alt="">
                            </div>
                            <input type="file" value="<?= $employe->photo ?>" name="photo">
                        </div>
                        <div class="info">
                            <input type="text" name="nom" value="<?= $employe->nom ?>" placeholder="Entrez le nom" required>
                            <input type="text" name="prenom" value="<?= $employe->prenom ?>" placeholder="Entrez le prénom" required>
                            <input type="number" name="telephone" value="<?= $employe->telephone ?>" placeholder="Entrez numéro téléphone" required>
                            <input type="text" name="adresse" value="<?= $employe->adresse ?>" placeholder="Entrez l'adresse" required>
                            <input type="password" name="password" placeholder="Entrez un mot de passe" required>
                            <input type="password" name="password_conf" placeholder="Confirmer le mot de passe" required>
                            <button type="submit" name="modifier">Modifier <i class="bx bx-edit"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('./partials/right-side.php') ?>
        </div>
    </div>
</form>
</body>
</html>