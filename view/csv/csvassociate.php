<div class="jumbotron">
<form action="?controler=csv&action=associate&id=<?php echo  $csv->id();?>" method="post">
<?php foreach ($csvRow as $key => $value) {?>
	    <div class="form-group">
			<label for="url" class="control-label"><?php echo $value;?></label>
			<div>
				<select class="form-control" name="<?php echo $key?>">
					<optgroup label="Products Properties">
					  <option value="title">title(string)</option>
					  <option value="name">name(string)</option>
					  <option value="type">type(string)</option>
					  <option value="title">status(string)</option>
					  <option value="type">downloadable(boolean)</option>
					  <option value="virtual">virtual(boolean)</option>
					  <option value="regular_price">regular_price(float)</option>
					  <option value="sale_price">sale_price(float)</option>
					  <option value="sale_price_dates_from">sale_price_dates_from</option>
					  <option value="stock_quantity">stock_quantity(integer)</option>
					  <option value="in_stock">in_stock(boolean)</option>
					  <option value="weight">weight(string)</option>
					  <option value="dimensions">dimensions(array)</option>
					  <option value="description">description(string)</option>
					  <option value="enable_html_description">enable_html_description(boolean)</option>
					  <option value="short_description">short_description(string)</option>
					  <option value="enable_html_short_description">enable_html_short_description(boolean)</option>
					  <option value="categories">categories(array)</option>
					  <option value="tags">tags(array)</option>
					  <option value="images">images(array)</option>
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
<?php }?>
 	<button type="submit" name="submit" class="btn btn-default">Envoyer</button>
</form>
</div>