<?php

    $db = Database::Connect();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if(isset($_POST['delete'])){
            $query = $db->query("DELETE FROM utilisateur WHERE id = $id");
            header('location: index.php?p=employe');
        }
    }

?>


<body>
    <div class="container">
        <?php include('./partials/header.php') ?>
        <div class="main">
            <?php include('./partials/left-side.php') ?>
            <div class="content">
                <div class="card-responsive">
                    <div class="title">
                        <h2>Supprimer l'employe</h2>
                        <a href="index.php?p=employe"><i class="bx bx-left-arrow"></i> Retour</a>
                    </div>
                    <div class="question">
                        <h3>Voulez-vous vraiment supprimer cet employe ?</h3>
                        <div class="btn-group">
                            <a href="index.php?p=employe">Non</a>
                            <form method="post">
                                <input type="hidden" value="<?= $id ?>">
                                <button type="submit" name="delete">Oui</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('./partials/right-side.php') ?>
        </div>
    </div>
</body>
</html>