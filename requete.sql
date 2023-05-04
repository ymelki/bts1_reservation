SELECT a.Ville as Ville_depart,
 a2.Ville as Ville_arrivee, v.ID_vol ,
  c.Nom_compagnie 
  FROM vols as v 
  left join aeroports as a on v.Ville_depart = a.ID_aeroport 
  left join aeroports as a2 on v.Ville_arrivee = a2.ID_aeroport 
  left join compagnies_aeriennes as c on v.Compagnie_aerienne=c.ID_compagnie;
