<div class="jumbotron">
<form action="?controler=import&action=start" method="post">


		<div class="form-group">
			<label for="importid" class="control-label">Selectionner un import</label>
			<div>
				<select class="form-control" name="importid">
<?php foreach ($imports as $import) {?>
					<option value="<?php echo $import->id()?>"><?php echo $import->name()?></option>
<?php }?>
				</select>
			</div>
		</div>
		 		
 		<button type="submit" name="submit" class="btn btn-default">Envoyer</button>
</form>
</div>