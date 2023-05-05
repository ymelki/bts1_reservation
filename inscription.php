<?php include "header.php"; 
$erreur="";

?>
<?php if (isset($_POST['prenom'])) {

 echo "vous avez cliqué sur inscription";  

// 0 recuperation des données du form
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$email=$_POST['email'];
$mdp=$_POST['mdp'];
$tel=$_POST['tel'];

if (($prenom=="") ||($nom=="") ||($email=="") ||($mdp=="") || ($tel=="")  ) {
  echo "test";
  $erreur="Un des champs n'a pas été remplie : ";
}
if (($prenom=="")){ $erreur=$erreur." Le champs prénom est vide ";  }
if ((strlen($prenom)<4)){ $erreur=$erreur." Le prénom doit faire plus que 3 caracteres ";  }
if (($nom=="")){ $erreur=$erreur." Le champs nom est vide ";  }
if (($email=="")){ $erreur=$erreur." Le champs email est vide ";  }
if (($mdp=="")){ $erreur=$erreur." Le champs mdp est vide ";  }
if (($tel=="")){ $erreur=$erreur." Le champs tel est vide ";  }
else {
 // 1 connexion à la B.D
 $dsn = 'mysql:dbname=reservation;host=127.0.0.1';
 $user = 'root';
 $password = '';
 $dbh = new PDO($dsn, $user, $password);
 

 // 2 INSERTION DES DONNES 


 $info=$dbh->query(
    "INSERT INTO utilisateurs (
       ID_utilisateur,
       Nom,
       Prenom, 
       Adresse_email,
       Mot_de_passe,
       Numero_telephone)
     VALUES (
        NULL,
        '$nom',
        '$prenom',
        '$email',
        '$mdp',
        '$tel'
     )"
);
}

}?>
<h1>INSCRIPTION</h1>



<?=$erreur?>
<form method="POST" action="inscription.php">
<div class="col-md-4">
  <input type="text" class="form-control" name="prenom" placeholder="ENTREZ UN PRENOM" >
</div>
<div class="col-md-4">
  <input type="text" class="form-control" name="nom" placeholder="ENTREZ UN NOM">
</div>
<div class="col-md-4">
  <input type="text" class="form-control" name="email" placeholder="ENTREZ UN EMAIL">
</div>
<div class="col-md-4">
  <input type="password" class="form-control" name="mdp" placeholder="ENTREZ UN MOT DE PASSE">
</div>
<div class="col-md-4">
  <input type="text" class="form-control" name="tel" placeholder="ENTREZ UN NUMERO DE TELEPHONE">
</div>
<div class="col-md-4">
  <input type="submit"  class="form-control" value="INSCRIPTION">
</div>
</form>