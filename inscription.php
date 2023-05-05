<?php include "header.php"; 
$erreur="";

?>
<?php if (isset($_POST['prenom'])) {


// 0 recuperation des données du form
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$email=$_POST['email'];
$mdp=$_POST['mdp'];
$tel=$_POST['tel'];

if (($prenom=="") ||($nom=="") ||($email=="") ||($mdp=="") || ($tel=="")  ) {
  $erreur="Un des champs n'a pas été remplie : ";
}
if (($prenom=="")){ $erreur=$erreur."<br /> Le champs prénom est vide ";  }
if ((strlen($prenom)<4)){ $erreur=$erreur."<br /> Le prénom doit faire plus que 3 caracteres ";  }
if (($nom=="")){ $erreur=$erreur."<br /> Le champs nom est vide ";  }
if (($email=="")){ $erreur=$erreur."<br /> Le champs email est vide ";  }
if (($mdp=="")){ $erreur=$erreur."<br /> Le champs mdp est vide ";  }
if (($tel=="")){ $erreur=$erreur."<br /> Le champs tel est vide ";  }

if ($erreur==""){
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
}

?>
<h1>INSCRIPTION</h1>

<div class="p-3 text-primary-emphasis bg-danger-subtle border border-primary-subtle rounded-3">
<?=$erreur?>
</div>


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