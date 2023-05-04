<?php

// 1. se connecter à la B.D.
// 1 connexion à la B.D.
$dsn = 'mysql:dbname=reservation;host=127.0.0.1';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);

// 2. Boucle pour inserer 1000 lignes
for ($i=3;$i<100000;$i++){
    $prix=rand(100,1000);
    $nb_place=rand(50,1000);
 
    $num_vol=rand(300,50000);
    $compagnie_alea=rand(1,511);
    $ville_depart_alea=rand(1,2819);
    $ville_arrive_alea=rand(1,2819);
    $nb_day=rand(1,300);
    $nb_day_arrive=$nb_day+rand(0,1);
    $nb_hour=rand(1,10);
    $nb_hour_arrive=$nb_hour+rand(0,5);
       
    $info=$dbh->query(
        "INSERT INTO vols (
            ID_vol,
             Compagnie_aerienne,
        Numero_vol,
         Ville_depart,
          Ville_arrivee,
           Date_depart,
        Date_arrivee,
         Heure_depart,
         Heure_arrivee,
          Prix, 
          Places_disponibles)
         VALUES (
            NULL,
         '$compagnie_alea',
         '$num_vol',
         '$ville_depart_alea',
         '$ville_arrive_alea',
         DATE_ADD(DATE( NOW()), INTERVAL $nb_day DAY),
         DATE_ADD(DATE( NOW()), INTERVAL $nb_day_arrive DAY),
         DATE_ADD(current_time(),interval $nb_hour hour),
         DATE_ADD(current_time(),interval $nb_hour_arrive hour),
         '$prix',
         '$nb_place'         
         )"
    );

    echo $i."insertion de la ligne ! <br /> ";


}

// a chaque tour de boucle on insere une ligne
// dans values on mettra des variables aelatoire
/*
INSERT INTO `vols` (`ID_vol`, `Compagnie_aerienne`,
 `Numero_vol`, `Ville_depart`, `Ville_arrivee`, `Date_depart`,
 `Date_arrivee`, `Heure_depart`,
  `Heure_arrivee`, `Prix`, `Places_disponibles`)
 VALUES (1, '1', NULL, '13', '227', '2023-05-03', '2023-05-03',
 '16:49:58', '21:49:58', '500', '300');

*/



?>