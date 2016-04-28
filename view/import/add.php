<div class="jumbotron">
<form action="?controler=import&action=add" method="post">

	    <div class="form-group">
			<label for="name" class="control-label">nom de l'import</label>
			<div>
				<input type="text" id="name" name="name" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="apiid" class="control-label">Selectionner une api</label>
			<div>
				<select class="form-control" name="apiid">
<?php foreach ($tabApi as $api) {?>
					<option value="<?php echo $api->id()?>"><?php echo $api->url()?></option>
<?php }?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="csvid" class="control-label">Selectionner un csv</label>
			<div>
				<select class="form-control" name="csvid">
<?php foreach ($tabCsv as $csv) {?>
					<option value="<?php echo $csv->id()?>"><?php echo $csv->name()?></option>
<?php }?>
				</select>
			</div>
		</div>
 		
 		<button type="submit" name="submit" class="btn btn-default">Envoyer</button>
</form>
</div>