
<?php include "header.php" ?>

 

<?php
// 1 connexion à la B.D.
$dsn = 'mysql:dbname=reservation;host=127.0.0.1';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);

   //2. RECUPERER LES DONNEES 
   $resultat = $dbh->query("select * from compagnies_aeriennes")->fetchAll();
// 3. AFFICHAGE DES DONNES
// var_dump($resultat);

?>
<div class="row row-cols-1 row-cols-md-3 g-4">
<?php foreach ($resultat as $unecompagnie) {  ?>

    <div class="col">
        <div class="card h-100">
        <div class="card-body">
            <h5 class="card-title"><?=$unecompagnie['Nom_compagnie'] ?></h5>
            <p class="card-text">
                <?=$unecompagnie['Code_compagnie'] ?>  - 
                <?=$unecompagnie['Pays_origine'] ?> 
        </div>
        </div>
    </div> 

  

<?php } ?>
</div>
</body>
</html>