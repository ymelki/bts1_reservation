<?php
// Connexion à la base de données

 
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "reservation";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Activation des erreurs PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
// Récupération des valeurs de la colonne "nom" de la table "maTable"
$sql = "SELECT Nom_aeroport, Pays, Ville FROM aeroports";
$result = $conn->query($sql);
$values = array();
if ($result->rowCount() > 0) {
    // Parcours des résultats de la requête
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // Ajout de chaque valeur à un tableau
        array_push($values, $row["Nom_aeroport"]." ".$row["Ville"]." ".$row["Pays"]);
    }
}
// Fermeture de la connexion à la base de données
$conn = null;
// Encodage du tableau en JSON et envoi au client
echo json_encode($values);
?>
