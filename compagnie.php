
<?php include "header.php" ?>

 <FORM method="POST" action="compagnie.php">
    <input type="text" name="ville"  placeholder="VILLE">
    <input type="submit" class="text-primary" value="RECHERCHEZ">
 </FORM>

<?php
// 1 connexion à la B.D.
$dsn = 'mysql:dbname=reservation;host=127.0.0.1';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);

   //2. RECUPERER LES DONNEES 
   // on fait un filtre a vide dans le cas ou on est dans la page
   // compagnie sans avoir sur cliquer sur rechercher
   $filtre="";
   if ( isset($_POST['ville'])  ){
    //  isset est une fonction permettant de renvoyer vrai si la variable
    // existe
    // on est dans le cas ou on a cliquer sur recherche et on a 
    // une valeur $_POST['ville'] qui existe
      $pays_post=$_POST['ville'];
      $filtre=" where Pays_origine  = '$pays_post'";
   }
   $resultat = $dbh->query("select * from compagnies_aeriennes $filtre")->fetchAll();
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