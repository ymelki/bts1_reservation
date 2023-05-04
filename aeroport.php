<?php include "header.php" ?>
<?php 
$value="";
if ( isset($_POST['aeroport'])  ){
    $ville=$_POST['aeroport'];
    $value=" value='$ville'";
 }
?>
<form method="POST" action="aeroport.php">
  <div class="col-md-4">
    <input type="text" <?=$value?> class="form-control" name="aeroport" placeholder="ENTREZ UN NOM DE VILLE">
  </div>
  <div class="col-md-4">
    <input type="submit"  class="form-control">
  </div>
</form>

<br />
 
<body>
 
<?php
// 1 connexion à la B.D.
$dsn = 'mysql:dbname=reservation;host=127.0.0.1';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);

$info="";
if (isset($_POST['aeroport'])) {
  $aeroport=$_POST['aeroport'];
  $info="where ville='$aeroport' ";
}

   //2. RECUPERER LES DONNEES 
   $resultat = $dbh->query("select * from aeroports $info")->fetchAll();
// 3. AFFICHAGE DES DONNES
// var_dump($resultat);

?>
<div class="row row-cols-1 row-cols-md-3 g-4">
<?php foreach ($resultat as $unaeroport) {  ?>

    <div class="col">
        <div class="card h-100">
        <div class="card-body">
            <h5 class="card-title"><?=$unaeroport['Name'] ?></h5>
            <p class="card-text">
                <?=$unaeroport['ICAO'] ?>  - 
                <?=$unaeroport['Country'] ?> - 
                <?=$unaeroport['Ville'] ?>
        </div>
        </div>
    </div> 

  

<?php } ?>
</div>
</body>
</html>