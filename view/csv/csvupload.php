<div class="jumbotron">
<form action="?controler=csv&action=upload" method="post" enctype="multipart/form-data">
	<div class="form-group">
	    <label for="file">Import Ficher de Questions</label>
	    <input type="file" id="file" name="file">
	    
	    <div class="form-group">
			<label for="url" class="control-label">séparateur de colonne csv</label>
			<div>
			<select class="form-control" name="separateur">
			  <option value=";">;</option>
			  <option value=",">,</option>
			  <option value="|">|</option>
			</select>
			</div>
		</div>
			
	    <p class="help-block">Veuillé selectioner votre fichier de produits au format csv.</p>
 	</div>
 	
 	<button type="submit" name="submit" class="btn btn-default">Envoyer</button>
</form>
</div>