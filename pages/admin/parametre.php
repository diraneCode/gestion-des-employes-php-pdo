<?php
    $db = Database::Connect();

    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        $query = $db->query("SELECT * FROM utilisateur WHERE id = $id");
        $user = $query->fetch(PDO::FETCH_OBJ);

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
    
            header('location: index.php?p=parametre');
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
                        <h2>Vos informations</h2>
                        <?php if($_SESSION['status'] == 'employe'): ?>
                            <a href="index.php?p=userHome"><i class="bx bx-left-arrow"></i> Retour</a>
                        <?php else: ?>
                            <a href="index.php?p=home"><i class="bx bx-left-arrow"></i> Retour</a>
                        <?php endif; ?>
                    </div>
                    <div class="card">
                        <div class="card-profile">
                            <div class="card-image circle">
                                <img src="./public/pictures/<?= $user->photo ?>" alt="">
                            </div>
                            <input type="file" name="photo">
                        </div>
                        <div class="info">
                                <input type="text" name="nom" value="<?= $user->nom ?>" placeholder="Entrez le nom" required>
                                <input type="text" name="prenom" value="<?= $user->prenom ?>" placeholder="Entrez le prénom" required>
                                <input type="number" name="telephone" value="<?= $user->telephone ?>" placeholder="Entrez numéro téléphone" required>
                                <input type="text" name="adresse" value="<?= $user->adresse ?>" placeholder="Entrez l'adresse" required>
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