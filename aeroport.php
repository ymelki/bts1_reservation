
<?php include "header.php" ?>


<script>
  $(function() {
  $('#tags').autocomplete({
    source: function(request, response) {
      fetch('saisie_auto_aero.php')
        .then(response => response.json())
        .then(data => response(data))
        .catch(error => console.error(error));
    }
  });
});
  </script>
<body>

<div class="ui-widget">
  <label for="tags">Tags: </label>
  <input id="tags">
</div>


<?php
// 1 connexion à la B.D.
$dsn = 'mysql:dbname=reservation;host=127.0.0.1';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);

   //2. RECUPERER LES DONNEES 
   $resultat = $dbh->query("select * from aeroports")->fetchAll();
// 3. AFFICHAGE DES DONNES
// var_dump($resultat);

?>
<div class="row row-cols-1 row-cols-md-3 g-4">
<?php foreach ($resultat as $unaeroport) {  ?>

    <div class="col">
        <div class="card h-100">
        <div class="card-body">
            <h5 class="card-title"><?=$unaeroport['Nom_aeroport'] ?></h5>
            <p class="card-text">
                <?=$unaeroport['Code_aeroport'] ?>  - 
                <?=$unaeroport['Pays'] ?> - 
                <?=$unaeroport['Ville'] ?>
        </div>
        </div>
    </div> 

  

<?php } ?>
</div>
</body>
</html>