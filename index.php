<?php include "header.php";
$info_dep="";
if (isset($_POST['depart'])) {
  $depart=$_POST['depart'];
  $info_dep=" value='$depart' ";
}
$info_arr="";
if (isset($_POST['arrive'])) {
    $arrivee=$_POST['arrive'];
    $info_arr=" value='$arrivee' ";
}
?>

    <form class="row g-3 needs-validation" novalidate method="POST" action="index.php">


        <div class="col-md-4">
            <select name="aller" class="form-select" aria-label="Default select example">
                <option value="1">Aller retour</option>
                <option value="2">Aller simple</option> 
            </select>
        </div>
        
        
            <div class="col-md-4">
            <input type="text" name="depart" <?=$info_dep?> class="form-control" id="validationCustom01" placeholder="Départ de " value="" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <input type="text" name="arrive" <?=$info_arr?> class="form-control" id="validationCustom02" placeholder="Arrivée à" value="" required>
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




    <?php   
    // si on a cliqué sur recherché alors : 
    if (isset($_POST['depart'])) { ?>
       Resultat de la recherche

<?php 
       // 1 connexion à la B.D.
$dsn = 'mysql:dbname=reservation;host=127.0.0.1';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
 var_dump($_POST);
$filtre="";
if (isset($_POST['depart'])) {
  $depart=$_POST['depart'];
  $filtre=" and  a.Ville='$depart' ";
}

   //2. RECUPERER LES DONNEES 
   $resultat = $dbh->query("
   SELECT 
   c.Nom_compagnie ,
   v.Numero_vol,
   v.Date_depart,
   v.Date_arrivee,
   v.Heure_depart,
   v.Heure_arrivee,
   v.Prix,
   v.Places_disponibles,
   a.Ville as ville_depart,
   a2.Ville as ville_arrivee 
   from vols v LEFT join aeroports as a on a.ID = v.Ville_depart
            LEFT join aeroports as a2 on a2.ID = v.Ville_arrivee
            left join compagnies_aeriennes as c on v.Compagnie_aerienne=c.ID_compagnie
    where 1=1 $filtre
    order by v.Date_depart asc
   ")->fetchAll();
// 3. AFFICHAGE DES DONNES
// var_dump($resultat);


?>

<div >
<?php foreach ($resultat as $unaeroport) {  ?>
<hr>  <b>           <p> Date de départ <?=$unaeroport['Date_depart'] ?> - <?=$unaeroport['Heure_depart'] ?> 
            =>  Date d'arrivée <?=$unaeroport['Date_arrivee'] ?> - <?=$unaeroport['Heure_arrivee'] ?>
</b>
    <div class="col">
        <div class="card w-100 h-100">
        <div class="card-body">
            <h5 class="card-title"></h5> 
            <p class="card-text">  
                <?=$unaeroport['ville_depart'] ?>  => 
                <?=$unaeroport['ville_arrivee'] ?> <p>  
                <b> <?=$unaeroport['Prix'] ?> € </b><p>
                Nombre places restantes :    
                 <?=$unaeroport['Places_disponibles'] ?> <p>
                 <a href="#" class="btn btn-primary">RESERVER</a>
                 <p>  NUMERO DE VOL : <?=$unaeroport['Numero_vol'] ?> 
                par <?=$unaeroport['Nom_compagnie'] ?><p>

        </div>
        </div>
    </div> 

  

<?php } ?>
     <?php } ?>



    </div>



</body>
</html>
 