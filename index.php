<?php include "header.php";

?>

    <form class="row g-3 needs-validation" novalidate method="POST" action="index.php">


        <div class="col-md-4">
            <select name="aller" class="form-select" aria-label="Default select example">
                <option value="1">Aller retour</option>
                <option value="2">Aller simple</option> 
            </select>
        </div>
        
        
            <div class="col-md-4">
            <input type="text" name="depart" class="form-control" id="validationCustom01" placeholder="Départ de " value="" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <input type="text" name="arrive" class="form-control" id="validationCustom02" placeholder="Arrivée à" value="" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
 
        
        <div class="col-md-4"> 
        <input type="text" class="form-select" id="from" name="from" placeholder="date de départ">
        </div>
        <div class="col-md-4"> 
        <input type="text" class="form-select" id="to" name="to"  placeholder="date d'arrivée"> 
        </div>

        <div class="col-12">
        <button class="btn btn-primary"  type="submit">Rechercher les vols</button>
        </div>
            
        
        </form>




    <?php     if (isset($_POST['depart'])) { ?>
       Resultat de la recherche

<?php 
       // 1 connexion à la B.D.
$dsn = 'mysql:dbname=reservation;host=127.0.0.1';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);

   //2. RECUPERER LES DONNEES 
   $resultat = $dbh->query("select * from vols")->fetchAll();
// 3. AFFICHAGE DES DONNES
// var_dump($resultat);


?>

<div class="row row-cols-1 row-cols-md-3 g-4">
<?php foreach ($resultat as $unaeroport) {  ?>

    <div class="col">
        <div class="card h-100">
        <div class="card-body">
            <h5 class="card-title"><?=$unaeroport['Numero_vol'] ?></h5>
            <p class="card-text">
                <?=$unaeroport['Ville_depart'] ?>  - 
                <?=$unaeroport['Ville_arrivee'] ?> - 
                <?=$unaeroport['Date_depart'] ?>
        </div>
        </div>
    </div> 

  

<?php } ?>
     <?php } ?>



    </div>



</body>
</html>
 