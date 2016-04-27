<div class="jumbotron">
<form action="?controler=import&action=add method="post">

	    <div class="form-group">
			<label for="api" class="control-label">Selectionner une api</label>
			<div>
				<select class="form-control" name="api">
<?php foreach ($tabApi as $api) {?>
					<option value="<?php echo $api->id()?>"><?php echo $api->url()?></option>
<?php }?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="api" class="control-label">Selectionner une api</label>
			<div>
				<select class="form-control" name="csv">
<?php foreach ($tabApi as $api) {?>
					<option value="<?php echo $api->id()?>"><?php echo $api->url()?></option>
<?php }?>
				</select>
			</div>
		</div>
 	<button type="submit" name="submit" class="btn btn-default">Envoyer</button>
</form>
</div>