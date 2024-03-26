<?php

function getAvis($bdd, $id){
	$sql="select * from avis where idproduit=$id order by date DESC";
    
    
	$reponse = $bdd->query($sql);

    while ($donnees = $reponse->fetch()){
		   
	    echo "	  <div class=\"row-fluid\">	  
				
                
					<div class=\"span12\">
						<h5>[".date("d/m/Y", strtotime($donnees['date']))."] ".$donnees['titre']."</h5>
						<p>
						".$donnees['texte']."
						</p>
					</div>
	</div>
			<hr class=\"soften\"/>";
	}
    

}

?>