<?php
session_start();
include("admin/config/bdd_config.inc");
include("admin/inc/bdd_connect.php");
include("inc/utils.php");

include("func/categorie_inc.php");
include("func/produit_inc.php");
include("func/panier_inc.php");



include("inc/top.php");
?>
	<div class="well well-small">
		  <h3>Contactez-nous
		  </h3>
		  <hr class="soften"/>
		 
		  
			<div class="row-fluid">
		<div class="span6 relative">
		<iframe style="width:100%; height:350px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Newbury+Street,+Boston,+MA,+United+States&amp;aq=1&amp;oq=NewBoston,+MA,+United+States&amp;sll=42.347238,-71.084011&amp;sspn=0.014099,0.033023&amp;ie=UTF8&amp;hq=Newbury+Street,+Boston,+MA,+United+States&amp;t=m&amp;ll=42.348994,-71.088248&amp;spn=0.001388,0.006276&amp;z=18&amp;iwloc=A&amp;output=embed"></iframe>

		<div class="absoluteBlk">
		<div class="well wellsmall">
		<h4>Notre adresse</h4>
		<h5>
			2601 Mission St.<br/>
			San Francisco, CA 94110<br/><br/>
			 
			
		</h5>
		</div>
		</div>
		</div>
		
		<div class="span4">
		<h4>Votre message</h4>
		<form class="form-horizontal">
        <fieldset>
          <div class="control-group">
           
              <input type="text" placeholder="name" class="input-xlarge"/>
           
          </div>
		   <div class="control-group">
           
              <input type="text" placeholder="email" class="input-xlarge"/>
           
          </div>
		
        
          <div class="control-group">
              <textarea rows="3" id="textarea" class="input-xlarge"></textarea>
           
          </div>

            <button class="shopBtn" type="submit">Envoyer</button>

        </fieldset>
      </form>
		</div>
	</div>

		  
	</div>
	
	
<?php
include("inc/bottom.php");
?>
	