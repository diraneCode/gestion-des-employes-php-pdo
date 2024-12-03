<?php
    $db = Database::Connect();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = $db->query("SELECT * FROM tache WHERE id = $id");
        $employe = $query->fetch(PDO::FETCH_OBJ);


        if(isset($_POST['modifier'])){
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $duree = $_POST['duree'];
            $status = $_POST['status'];

            $update = $db->prepare('UPDATE tache SET titre = ?, description = ?, duree = ?, status = ?');
            $update->execute(array($titre, $description, $duree, $status));

            header('location: index.php?p=tache');
        }
    }
    

?>


<body>
    <div class="container">
        <form method="post">
        <?php include('./partials/header.php') ?>
        <div class="main">
            <?php include('./partials/left-side.php') ?>
            <div class="content">
                <div class="card-responsive">
                    <div class="title">
                        <h2>Modifier la tache</h2>
                        <a href="index.php?p=tache"><i class="bx bx-left-arrow"></i> Retour</a>
                    </div>
                    <div class="card">
                        <!-- <div class="card-profile">
                            <div class="card-image circle">
                                <img src="./public/pictures/<?= $employe->photo ?>" alt="">
                            </div>
                            <input type="file" value="<?= $employe->photo ?>">
                        </div> -->
                        <div class="info">
                            <input type="text" name="titre" value="<?= $employe->titre ?>" placeholder="Entrez le titre" required>
                            <textarea name="description" cols="30" rows="10"><?= $employe->description ?></textarea>
                            <input type="number" name="duree" value="<?= $employe->duree ?>" placeholder="Entrez la durée" required>
                            <input type="text" name="status" value="<?= $employe->status ?>" placeholder="Entrez le status" required>
                            <button name="modifier">Modifier <i class="bx bx-edit"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('./partials/right-side.php') ?>
            </form>
        </div>
    </div>
</body>
</html>