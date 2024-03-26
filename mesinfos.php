<?php
session_start();
include("admin/config/bdd_config.inc");
include("admin/inc/bdd_connect.php");
include("inc/utils.php");
if(isset($_POST['update'])){

$sql="update compte set nom='".addslashes($_POST['nom'])."', prenom='".addslashes($_POST['prenom'])."', identifiant='".addslashes($_POST['identifiant'])."', password='".addslashes($_POST['password'])."', adresse='".addslashes($_POST['adresse'])."', statut='".$_POST['statut']."'  where id=".$_SESSION['iduser']." ";


$reponse = $bdd->query($sql);
if($reponse==true){ $infomsg="<font color=\"green\">Compte modifi&eacute;</font>";
        $_SESSION['nom']=$_POST['nom'];
       $_SESSION['prenom']=$_POST['prenom'];       
       $_SESSION['identifiant']=$_POST['identifiant'] ;
       $_SESSION['password']=$_POST['password'];
       
     if (isset($_FILES['photo'])) {
    
      $nom = $_FILES['photo']['tmp_name'];
      
      
      
      $path_parts = pathinfo($_FILES['photo']['name']);

      $nomdestination = 'images/comptes/'.$_SESSION['iduser'].'.'.$path_parts['extension'];
      move_uploaded_file($nom, $nomdestination);
      
    } 
    
    
    
} else { $infomsg="<font color=\"red\">Erreur </font>";}
}


include("func/categorie_inc.php");
include("func/produit_inc.php");
include("func/panier_inc.php");
include("func/compte_inc.php");
include("inc/top.php");
?>
	<form class="form-horizontal" action="mesinfos.php" method="post" enctype="multipart/form-data">
		<h3>&nbsp; Mes infos</h3>
		
        <?php if(isset($_POST['update']) && isset($infomsg)){
        
            echo "<div class=\"control-group\">
			<label class=\"control-label\" for=\"inputFname\">".$infomsg."</label></div>";
        }?>
        
		<div class="control-group">
			<label class="control-label" for="inputFname">Nom<sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="nom" value="<?php if(isset($_SESSION['nom'])) echo $_SESSION['nom'];?>" placeholder="votre nom">
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLname">Pr&eacute;nom <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="prenom" value="<?php if(isset($_SESSION['prenom'])) echo $_SESSION['prenom'];?>" placeholder="votre pr&eacute;nom">
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="inputEmail">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="identifiant" value="<?php  if(isset($_SESSION['identifiant']))  echo $_SESSION['identifiant'];?>" placeholder="votre Email">
		</div>
	  </div>	  
		<div class="control-group">
		<label class="control-label">Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" name="password" value="<?php  if(isset($_SESSION['password']))  echo $_SESSION['password'];?>" placeholder="votre mot de passe">
		</div>
	  </div> 
      	<div class="control-group">
		<label class="control-label">Adresse <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="adresse" value="<?php echo getAttributCompte($bdd,$_SESSION['iduser'],'adresse');?>" placeholder="votre adresse">
		</div>
	  </div> 
      	<div class="control-group">
		<label class="control-label">Ma photo (.jpg)</label>
		<div class="controls">
		  <input type="file" name="photo" />
		</div>
	  </div>


	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="update" value="Mettre &agrave; jour" class="exclusive shopBtn">
		</div>
	</div>
	</form>
</div>




<?php
include("inc/bottom.php");
?>