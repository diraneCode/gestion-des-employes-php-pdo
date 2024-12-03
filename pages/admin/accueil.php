<?php
    $db = Database::Connect();
    $query1 = $db->query("SELECT count(*) FROM utilisateur WHERE status = 'employe'");
    $nbEmploye = $query1->fetch();

    $query2 = $db->query("SELECT count(*) FROM tache");
    $nbTache = $query2->fetch();

    $query3 = $db->query("SELECT count(*) FROM conge");
    $nbConge = $query3->fetch();

    $query = $db->query("SELECT utilisateur.*, COUNT(*) AS nbTache FROM utilisateur LEFT JOIN tache ON tache.employe = utilisateur.id WHERE utilisateur.status = 'employe' GROUP BY(utilisateur.id)");
    $employeList = $query->fetchAll(PDO::FETCH_OBJ);


    $query = $db->query("SELECT nom, prenom, tache.* FROM tache INNER JOIN utilisateur ON utilisateur.id = tache.employe");
    $tacheList = $query->fetchAll(PDO::FETCH_OBJ);

?>


<body>
    <div class="container">
        <?php include('./partials/header.php') ?>
        <div class="main">
            <?php include('./partials/left-side.php') ?>            
            <div class="content">
                <h3>Dashboard</h3>
                <div class="cards">
                    <div class="card">
                        <div>
                            <span>Employes</span>
                            <h3><?= $nbEmploye[0] ?></h3>
                        </div>
                        <div>
                            <div class="icon-circle blue">
                                <i class="bx bx-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <span>Congés</span>
                            <h3><?= $nbConge[0] ?></h3>
                        </div>
                        <div>
                            <div class="icon-circle green">
                                <i class="bx bx-send"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <span>Tâches</span>
                            <h3><?= $nbTache[0] ?></h3>
                        </div>
                        <div>
                            <div class="icon-circle red">
                                <i class="bx bx-task"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <h3>Employes</h3>
                <div class="users">
                    <div class="scroll">
                        <?php foreach($employeList as $employe): ?>
                            <div class="user-card">
                                <a href="index.php?p=detailEmploye&id=<?= $employe->id ?>">
                                    <div class="image-circle">
                                        <img src="./public/pictures/<?= $employe->photo ?>" alt="">
                                    </div>
                                    <h4><?= $employe->nom ?></h4>
                                    <span><?= $employe->nbTache ?> tâches</span>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="add">
                        <a href="index.php?p=employe">
                            <i class="bx bx-plus"></i>
                            <h4>Voir plus</h4>
                        </a>
                        <span>Ajouter</span>
                    </div>
                </div>
                <h3>Tâches en cours...</h3>
                <div class="users">
                    <table>
                        <thead>
                            <tr>
                                <td>Nom</td>
                                <td>Tache</td>
                                <td>Status</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($tacheList as $tache): ?>
                                <tr>
                                    <td><?= $tache->nom ?></td>
                                    <td><?= $tache->titre ?></td>
                                    <td><?= $tache->status ?></td>
                                    <td><a href="index.php?p=detailTache&id=<?= $tache->id ?>">Détail</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php include('./partials/right-side.php') ?>
        </div>
    </div>
</body>
</html>