<?php
    $db = Database::Connect();
    $query = $db->query("SELECT * FROM utilisateur WHERE status = 'employe' AND agenda != '' ");
    $employeList = $query->fetchAll(PDO::FETCH_OBJ);

?>


<body>
    <div class="container">
        <?php include('./partials/header.php') ?>
        <div class="main">
            <?php include('./partials/left-side.php') ?>
            <div class="content">
                <div class="card-responsive">
                    <div class="title">
                        <h2>Proramme de la semaine</h2>
                        <?php if($_SESSION['status'] == 'admin'): ?>
                          <a href="index.php?p=addAgenda" >Ajouter <i class="bx bx-user-plus"></i></a>
                        <?php endif; ?>
                        </div>
                    
                    <table>
                        <tr>
                            <th class="employee-header">Lundi</th>
                            <th class="employee-header">Mardi</th>
                            <th class="employee-header">Mercredi</th>
                            <th class="employee-header">Jeudi</th>
                            <th class="employee-header">Vendredi</th>
                            <th class="employee-header">Samedi</th>
                        </tr>
                        <?php foreach($employeList as $emp): ?>
                        <tr>
                            <?php if(str_contains($emp->agenda, 'lundi')){ echo "<th>".$emp->nom."</th>"; }else{ echo "<th>---</>"; } ?>
                            <?php if(str_contains($emp->agenda, 'mardi')){ echo "<th>".$emp->nom."</th>"; }else{ echo "<th>---</>"; } ?>
                            <?php if(str_contains($emp->agenda, 'mercredi')){ echo "<th>".$emp->nom."</th>"; }else{ echo "<th>---</>"; } ?>
                            <?php if(str_contains($emp->agenda, 'jeudi')){ echo "<th>".$emp->nom."</th>"; }else{ echo "<th>---</>"; } ?>
                            <?php if(str_contains($emp->agenda, 'vendredi')){ echo "<th>".$emp->nom."</th>"; }else{ echo "<th>---</>"; } ?>
                            <?php if(str_contains($emp->agenda, 'samedi')){ echo "<th>".$emp->nom."</th>"; }else{ echo "<th>---</>"; } ?>
                        </tr>
                        <?php endforeach; ?>
                        </table>
                </div>
            </div>
            <?php include('./partials/right-side.php') ?>
        </div>
    </div>
</body>
<style>
      table {
        border-collapse: collapse;
      }
      th,
      td {
        border: 1px solid black;
        padding: 10px 20px;
      }
      th {
        font-weight: bold;
        font-size: 14px;
      }
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
      .employee-header {
        background-color: #277de0;
        color: #fff;
      }
    </style>
</html>