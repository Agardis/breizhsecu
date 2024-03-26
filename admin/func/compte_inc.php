<?php
function   getInfoCompte($bdd,$idcompte){
                                                         if (file_exists("../images/comptes/$idcompte.jpg")){return $idcompte;}
                                                         else { return "None";}
                  }
                  
                  
                  
                  $USER=getInfoCompte($bdd,$_SESSION['iduser']);
                  ?>