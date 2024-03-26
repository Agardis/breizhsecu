<?php

function insertCompte($bdd,$nom, $prenom, $identifiant, $password, $adresse, $statut){
$sql="insert into compte values ('','".addslashes($nom)."', '".addslashes($prenom)."', '".addslashes($identifiant)."', '".addslashes($password)."','".addslashes($adresse)."','".addslashes($statut)."')";
$reponse = $bdd->query($sql);
if($reponse==true){ $infomsg="<font color=\"green\">Compte cr&eacute;&eacute;</font>";} else { $infomsg="<font color=\"red\">Erreur lors de la cr&eacute;ation du compte</font>";}
return $infomsg;	
}


function getAttributCompte($bdd,$idcompte,$attribut){
$sql="select $attribut from compte where id=".$idcompte;
                
	            $reponse = $bdd->query($sql);
	          
                while ($donnees = $reponse->fetch()){
                     return $donnees[$attribut];
                }
                
                return "";
               }
               
               
function getIdentite($bdd, $idcompte){
                $sql="select * from compte where id=".$idcompte;
                
	            $reponse = $bdd->query($sql);
	          
                while ($donnees = $reponse->fetch()){
                     return $donnees['prenom']." ".$donnees['nom']."<br/>".$donnees['adresse'];
                }
                
                return "";
               }
               
               
function   getInfoCompte($bdd,$idcompte){
                                                         if (file_exists("images/comptes/$idcompte.jpg")){return $idcompte;}
                                                         else { return "0";}
                  }
                  
                  
                  
                  $USER=getInfoCompte($bdd,$_SESSION['iduser']);
                  ?>