<?php include "header.php"; 
$erreur="";
if (isset($_POST['email'])) {
// recuperation des données en POST
$email=$_POST['email'];
$mdp=$_POST['mdp'];
// on traite les erreurs de saisie du POST
if (($email=="") ||($mdp=="")   ) {
    $erreur="Un des champs n'a pas été remplie : ";
  }
if (($email=="")){ $erreur=$erreur."<br /> Le champs email est vide ";  }
if (($mdp=="")){ $erreur=$erreur."<br /> Le champs mdp est vide ";  }
if ((strlen($email)<4)){ $erreur=$erreur."<br /> L'email doit faire plus que 3 caracteres ";  }
if ((strlen($mdp)<4)){ $erreur=$erreur."<br /> Le mdp doit faire plus que 3 caracteres "; 
 }
// si pas d'erreur de saisie on traite les erreurs de verification
// de mdp en B.D.
if ($erreur==""){
  echo "traitement sans erreur";

  // verification que le mdp et que l'email est correct

  // 1 connexion à la BD.
  $dsn = 'mysql:dbname=reservation;host=127.0.0.1';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);

  // 2 SELECT EN SQL qui va recuperer les user et le MDP correspondant à ce qui est posté
  // on recupere l'utilisateur correspondant à la saisie en POST
  $resultat = $dbh->query("select * from utilisateurs where Adresse_email='$email' ")->fetch();
  var_dump($resultat);
  // si ce user n'est pas présent en B.D.
   if (!(isset($resultat['Adresse_email']))) {
     $erreur="L'email n'est pas présent. Vous devez vous inscrire ";
  }
      // si ce user existe
       if ((isset($resultat['Adresse_email']))) {
         // on verifie le mot de passe si c'est ok 
         if ($resultat['Mot_de_passe']==$mdp){
            echo "Vous êtes bien connecté";
        }
        else {
            $erreur="Le mot de passe est faux ! ";
        } 

  }

}
}
?>


<h1>Connexion</h1>

<div class="p-3 text-primary-emphasis bg-danger-subtle border border-primary-subtle rounded-3">
<?=$erreur?>
</div>


<form method="POST" action="connexion.php">
 
<div class="col-md-4">
  <input type="text" class="form-control" name="email" placeholder="ENTREZ UN EMAIL">
</div>
<div class="col-md-4">
  <input type="password" class="form-control" name="mdp" placeholder="ENTREZ UN MOT DE PASSE">
</div>
 
<div class="col-md-4">
  <input type="submit"  class="form-control" value="CONNEXION">
</div>
</form>