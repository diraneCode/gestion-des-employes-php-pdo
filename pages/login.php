<?php
    $db = Database::Connect();
    if(isset($_POST['connexion'])){
        $statut = $_POST['statut'];
        $password = $_POST['password'];

        $query = $db->query("SELECT * FROM utilisateur WHERE status = '$statut'");
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        // var_dump($result);
        foreach($result as $usr){
            if($usr){
                if(password_verify($password, $usr->password)){
                    $_SESSION['id'] = $usr->id;
                    $_SESSION['status'] = $usr->status;
                    if($usr->status == 'employe'){
                        header('location: index.php?p=userHome');
                    }else{
                        header('location: index.php?p=home');
                    }
                }
            }
        }

    }

?>


<body>
    <div class="container">
        <?php include('./partials/header.php') ?>
        <div class="main">
            <form method="post" class="loginForm" action="">
                <h2>Connexion</h2>
                <div class="form-group">
                    <label for="poste">Poste</label>
                    <select name="statut" id="poste" class="form-control">
                        <option value="admin">Administrateur</option>
                        <option value="employe">Employe</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password">
                </div>
                <button type="submit" name="connexion">Connexion</button>
            </form>
        </div>
    </div>
</body>
</html>