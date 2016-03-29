<div class="jumbotron">
<form action="?controler=csv&action=associate&id=<?php echo  $csv->id();?>" method="post">

	    <div class="form-group">
			<label for="url" class="control-label">Selectionner une colonne</label>
			<div>
				<select class="form-control" name="rowid">
<?php foreach ($csvRow as $key => $value) {?>
					<option value="<?php echo $key?>"><?php echo $value?></option>
<?php }?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="url" class="control-label">Champ Woo corespondant</label>
			<div>
				<select class="form-control" name="attribute">
					<optgroup label="Products Properties">
					  <option value="title|string">title(string)</option>
					  <option value="name|string">name(string)</option>
					  <option value="type|string">type(string)</option>
					  <option value="title|string">status(string)</option>
					  <option value="type|bool">downloadable(boolean)</option>
					  <option value="virtual|bool">virtual(boolean)</option>
					  <option value="regular_price|float">regular_price(float)</option>
					  <option value="sale_price|float">sale_price(float)</option>
					  <option value="sale_price_dates_from">sale_price_dates_from</option>
					  <option value="stock_quantity|integer">stock_quantity(integer)</option>
					  <option value="in_stock|bool">in_stock(boolean)</option>
					  <option value="weight|string">weight(string)</option>
					  <option value="dimensions|array">dimensions(array)</option>
					  <option value="description|string">description(string)</option>
					  <option value="enable_html_description|bool">enable_html_description(boolean)</option>
					  <option value="short_description|string">short_description(string)</option>
					  <option value="enable_html_short_description|bool">enable_html_short_description(boolean)</option>
					  <option value="categories|array">categories(array)</option>
					  <option value="tags|array">tags(array)</option>
					  <option value="images|array">images(array)</option>
					  <option value="attributes">attributes(array)</option>
					  <option value="default_attributes">default_attributes(array)</option>
					  <option value="downloads">downloads(array)</option>
					  <option value="variations">variations(array)</option>
					</optgroup>
					<optgroup label="Dimensions Properties">
					  <option value="length">length(string)</option>
					  <option value="width">width(string)</option>
					  <option value="height">height(string)</option>
					  <option value="unit">unit(string)</option>
					</optgroup>
					<optgroup label="Images Properties">
					  <option value="id">id(integer)</option>
					  <option value="created_at">created_at(string)</option>
					  <option value="updated_at">updated_at(string)</option>
					  <option value="src">src(string)</option>
					  <option value="title">title(string)</option>
					  <option value="alt">alt(string)</option>
					  <option value="position">position(integer)</option>
					</optgroup>
					
				</select>
			</div>
		</div>
 	<button type="submit" name="submit" class="btn btn-default">Envoyer</button>
</form>
</div>