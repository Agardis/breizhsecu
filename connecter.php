<?php
session_start();
include("admin/config/bdd_config.inc");
include("admin/inc/bdd_connect.php");
include("inc/utils.php");
if(isset($_SESSION['iduser'])){
header("Location:accueil.php");
}

if(isset($_GET['connecter'])){
  	$sql="select * from compte where identifiant='".addslashes($_GET['identifiant'])."' and password='".addslashes($_GET['password'])."' limit 1";
	$reponse = $bdd->query($sql);

    if($donnees = $reponse->fetch()){
       $_SESSION['nom']=$donnees['nom'];
       $_SESSION['iduser']=$donnees['id'];
       $_SESSION['prenom']=$donnees['prenom'];       
       $_SESSION['identifiant']=$donnees['identifiant'] ;
       $_SESSION['password']=$donnees['password'];
       header("Location:accueil.php");	
	} else {
      $infomsg="Erreur de connexion";
    }
}
include("func/categorie_inc.php");
include("func/produit_inc.php");
include("func/panier_inc.php");





include("inc/top.php");
?>
	<form class="form-horizontal" action="connecter.php" method="get">
		<h3>&nbsp; Mon compte</h3>
		
        <?php if(isset($infomsg)){
        
            echo "<div class=\"control-group\">
			<label class=\"control-label\" for=\"inputFname\">".$infomsg."</label></div>";
        }?>
        
	
    
		<div class="control-group">
		<label class="control-label" for="inputEmail">Identifiant <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="identifiant" placeholder="votre Email">
		</div>
	  </div>	  
		<div class="control-group">
		<label class="control-label">Mot de passe <sup>*</sup></label>
		<div class="controls">
		  <input type="password" name="password" placeholder="votre mot de passe">
		</div>
	  </div>


	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="connecter" value="Me connecter" class="exclusive shopBtn">
		</div>
	</div>
	</form>
</div>




<?php
include("inc/bottom.php");
?>