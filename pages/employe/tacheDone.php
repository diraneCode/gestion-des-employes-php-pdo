<?php
    $db = Database::Connect();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if(isset($_POST['update'])){
            $query = $db->query("UPDATE tache SET status = 'terminer' WHERE id = $id");
            header('location: index.php?p=mesTaches');
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
                        <h2>Tâche terminée ?</h2>
                        <a href="index.php?p=mesTaches"><i class="bx bx-left-arrow"></i> Retour</a>
                    </div>
                    <div class="question">
                        <h3>Avez-vous vraiment terminée cette tache ?</h3>
                        <div class="btn-group">
                            <a href="index.php?p=mesTaches">Non</a>
                            <form method="post">
                                <button type="submit" name="update">Oui</button>
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