<?php
include "header.php"; 
var_dump($_GET);
echo $_GET['id'];
$id= $_GET['id'];
?><br />
<?php
// 1 connexion à la B.D.
$dsn = 'mysql:dbname=reservation;host=127.0.0.1';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);


// 2.SELECT * FROM `compagnies_aeriennes` WHERE `ID_compagnie`=IDENTIFIANT DE LA COMPAGNIE;

   //2. RECUPERER LES DONNEES 
   $resultat = $dbh->query("
   SELECT * FROM `compagnies_aeriennes` WHERE ID_compagnie=$id
   
   ")->fetch();
// 3. AFFICHAGE DES DONNES
 var_dump($resultat);
?>
// 3. affichage visualisation
<div class="row row-cols-1 row-cols-md-3 g-4">

    <div class="col">
        <div class="card h-100">
        <div class="card-body">
            <h5 class="card-title"><?=$resultat['Nom_compagnie'] ?></h5>
            <p class="card-text">
                <?=$resultat['Code_compagnie'] ?>  - 
                <?=$resultat['Pays_origine'] ?>
        </div>
        </div>
    </div> 

  

</div>
</body>
</html>