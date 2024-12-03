<?php
    $db = Database::Connect();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = $db->query("SELECT tache.*, nom, prenom FROM tache INNER JOIN utilisateur ON utilisateur.id = tache.employe WHERE tache.id = $id");
        $tache = $query->fetch(PDO::FETCH_OBJ);
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
                        <h2>Information sur la tache</h2>
                        <?php if($_SESSION['status'] == 'employe'): ?>
                            <a href="index.php?p=mesTaches"><i class="bx bx-left-arrow"></i> Retour</a>
                        <?php else: ?>
                            <a href="index.php?p=tache"><i class="bx bx-left-arrow"></i> Retour</a>
                        <?php endif; ?>
                    </div>
                    <div class="card">
                        <div class="info">
                            <div class="card-detail">
                                <div>
                                    <h4>Titre</h4> : <span> <?= $tache->titre ?> </span>
                                </div>
                                <div>
                                    <h4>Description</h4> : <span> <?= $tache->description ?> </span>
                                </div>
                                <div>
                                    <h4>Durée</h4> : <span> <?= $tache->duree ?>H </span>
                                </div>
                                <div>
                                    <h4>Status</h4> : <span> <?= $tache->status ?> </span>
                                </div>
                                <div>
                                    <h4>Employe en charge </h4> : <span> <?= $tache->nom.' '.$tache->prenom ?> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('./partials/right-side.php') ?>
        </div>
    </div>
</body>
</html>