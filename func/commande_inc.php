<?php

function displayCommandes($bdd,$iduser){
	$sql="select * from commande where idcompte=$iduser order by date desc";
	$reponse = $bdd->query($sql);
    while ($donnees = $reponse->fetch()){
	echo "<tr>
                  <td>".date("d/m/Y", strtotime($donnees['date']))."</td>
                  <td><a href=\"commande.php?commande=".$donnees['idcde']."\">Commande <b>".$donnees['idcde']."</b></a></td><td>".$donnees['statut']."</td>
             
             
                </tr>
                
                ";
	}

}


function statutCommande($bdd,$idcde){
	$sql="select * from commande where idcde=$idcde limit 1";
	$reponse = $bdd->query($sql);
    while ($donnees = $reponse->fetch()){
	return $donnees['statut'];
	}
     return "";
}
?>