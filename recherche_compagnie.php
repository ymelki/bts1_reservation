
<?php include "header.php" ?>

 <FORM method="POST" action="recherche_compagnie.php">
    <input type="text" name="ville" placeholder="VILLE">
    <input type="submit" class="text-primary" value="RECHERCHEZ">
 </FORM>

<?php
// $ville va etre affecté de la variable $_POST['ville']
$ville=$_POST['ville'];
echo $ville;
var_dump($_POST);
// 1 connexion à la B.D.
$dsn = 'mysql:dbname=reservation;host=127.0.0.1';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);

   //2. RECUPERER LES DONNEES 
   $resultat = $dbh->query("select * from compagnies_aeriennes 
   where Pays_origine =  '$ville' ")->fetchAll();
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