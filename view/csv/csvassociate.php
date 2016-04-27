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
					  <option value="Products Properties|title|string">title(string)</option>
					  <option value="Products Properties|name|string">name(string)</option>
					  <option value="Products Properties|type|string">type(string)</option>
					  <option value="Products Properties|title|string">status(string)</option>
					  <option value="Products Properties|type|bool">downloadable(boolean)</option>
					  <option value="Products Properties|virtual|bool">virtual(boolean)</option>
					  <option value="Products Properties|sku|string">sku(string)</option>
					  <option value="Products Properties|regular_price|float">regular_price(float)</option>
					  <option value="Products Properties|sale_price|float">sale_price(float)</option>
					  <option value="Products Properties|sale_price_dates_from|float">sale_price_dates_from(YYYY-MM-DD)</option>
					  <option value="Products Properties|sale_price_dates_to|float">sale_price_dates_to(YYYY-MM-DD)</option>
					  <option value="Products Properties|tax_status|string">tax_status(string:The options are: taxable, shipping (Shipping only) and none)</option>
					  <option value="Products Properties|tax_class|string">tax_class(string)</option>
					  <option value="Products Properties|managing_stock|boolean">managing_stock(boolean)</option>
					  <option value="Products Properties|stock_quantity|integer">stock_quantity(integer)</option>
					  <option value="Products Properties|in_stock|bool">in_stock(boolean)</option>
					  <option value="Products Properties|backorders|mixed">backorders(mixed)</option>
					  <option value="Products Properties|sold_individually|bool">sold_individually(boolean)</option>
					  <option value="Products Properties|featured|boolean">featured(boolean)</option>
					  <option value="Products Properties|catalog_visibility|bool">catalog_visibility(string)</option>
					  <option value="Products Properties|weight|string">weight(string)</option>
					  <option value="Products Properties|dimensions|array">dimensions(array)</option>
					  <option value="Products Properties|shipping_class|string">shipping_class(string)</option>
					  <option value="Products Properties|description|string">description(string)</option>
					  <option value="Products Properties|enable_html_description|bool">enable_html_description(boolean)</option>
					  <option value="Products Properties|short_description|string">short_description(string)</option>
					  <option value="Products Properties|enable_html_short_description|bool">enable_html_short_description(boolean)</option>
					  <option value="Products Properties|reviews_allowed|bool">reviews_allowed(boolean)</option>
					  <option value="Products Properties|upsell_ids|array">upsell_ids(array)</option>
					  <option value="Products Properties|cross_sell_ids|array">cross_sell_ids(array)</option>
					  <option value="Products Properties|parent_id|integer">parent_id(integer)</option>
					  <option value="Products Properties|categories|array">categories(array)</option>
					  <option value="Products Properties|tags|array">tags(array)</option>
					  <option value="Products Properties|images|array">images(array)</option>
					  <option value="Products Properties|attributes|array">attributes(array)</option>
					  <option value="Products Properties|default_attributes|array">default_attributes(array)</option>
					  <option value="Products Properties|downloads|array">downloads(array)</option>
					  <option value="Products Properties|download_limit|integer">download_limit(integer)</option>
					  <option value="Products Properties|download_expiry|integer">download_expiry(integer)</option>
					  <option value="Products Properties|download_type|string">download_type(string)</option>
					  <option value="Products Properties|purchase_note|string">purchase_note(string)</option>
					  <option value="Products Properties|variations|array">variations(array)</option>
					  <option value="Products Properties|product_url|string">product_url(string)</option>
					  <option value="Products Properties|button_text|string">button_text(string)</option>
					  <option value="Products Properties|menu_order|integer">menu_order(integer)</option>
					  
					</optgroup>
					<optgroup label="Dimensions Properties">
					  <option value="Dimensions Properties|length|string">length(string)</option>
					  <option value="Dimensions Properties|width|string">width(string)</option>
					  <option value="Dimensions Properties|height|string">height(string)</option>
					  <option value="Dimensions Properties|unit|string">unit(string)</option>
					</optgroup>
					<optgroup label="Images Properties">
					  <option value="Images Properties|id|integer">id(integer)</option>
					  <option value="Images Properties|created_at|string">created_at(string)</option>
					  <option value="Images Properties|updated_at|string">updated_at(string)</option>
					  <option value="Images Properties|src|string">src(string)</option>
					  <option value="Images Properties|title|string">title(string)</option>
					  <option value="Images Properties|alt|string">alt(string)</option>
					  <option value="Images Properties|position|integer">position(integer)</option>
					</optgroup>
					<optgroup label="Attributes Properties">
					  <option value="Attributes Properties|name|string">name(string)</option>
					  <option value="Attributes Properties|slug|string">slug(string)</option>
					  <option value="Attributes Properties|position|string">position(integer)</option>
					  <option value="Attributes Properties|visible|bool">visible(boolean)</option>
					  <option value="Attributes Properties|variation|boolean">variation(boolean)</option>
					  <option value="Attributes Properties|options|array">options(array)</option>
					</optgroup>
					<optgroup label="Default Attributes Properties">
					  <option value="Default Attributes Properties|name|string">name(string)</option>
					  <option value="Default Attributes Properties|slug|string">slug(string)</option>
					  <option value="Default Attributes Properties|option|string">option(string)</option>
					</optgroup>
					<optgroup label="Downloads Properties">
					  <option value="Downloads Properties|id|string">id(string)</option>
					  <option value="Downloads Properties|name|string">name(string)</option>
					  <option value="Downloads Properties|file|string">file(string)</option>
					</optgroup>
					<optgroup label="Variations Properties">
					  <option value="Variations Properties|downloadable|boolean">downloadable(boolean)</option>
					  <option value="Variations Properties|virtual|boolean">virtual(boolean)</option>
					  <option value="Variations Properties|sku|string">sku(string)</option>
					  <option value="Variations Properties|regular_price|float">regular_price(float)</option>
					  <option value="Variations Properties|sale_price|float">sale_price(float)</option>
					  <option value="Variations Properties|sale_price_dates_from|float">sale_price_dates_from(float)</option>
					  <option value="Variations Properties|sale_price_dates_to|float">sale_price_dates_to(float)</option>
					  <option value="Variations Properties|tax_status|string">tax_status(string)</option>
					  <option value="Variations Properties|tax_class|string">tax_class(string)</option>
					  <option value="Variations Properties|managing_stock|boolean">managing_stock(boolean)</option>
					  <option value="Variations Properties|stock_quantity|integer">stock_quantity(integer)</option>
					  <option value="Variations Properties|in_stock|boolean">in_stock(boolean)</option>
					  <option value="Variations Properties|weight|string">weight(string)</option>
					  <option value="Variations Properties|dimensions|array">dimensions(array)</option>
					  <option value="Variations Properties|shipping_class|string">shipping_class(string)</option>
					  <option value="Variations Properties|image|array">image(array)</option>
					  <option value="Variations Properties|shipping_class|array">attributes(array)</option>
					  <option value="Variations Properties|shipping_class|array">downloads(array)</option>
					  <option value="Variations Properties|shipping_class|integer">download_limit(integer)</option>
					  <option value="Variations Properties|shipping_class|integer">download_expiry(integer)</option>
					  
					</optgroup>
					
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<label for="separateur" class="control-label">séparateur optionel(utile si la colone doit étre inséré dans un array)</label>
			<div>
			<select class="form-control" name="separateur" >
			  <option value="">none</option>
			  <option value=";">;</option>
			  <option value=",">,</option>
			  <option value="|">|</option>
			  <option value="&gt;">&gt;</option>
			</select>
			</div>
		</div>
 	<button type="submit" name="submit" class="btn btn-default">Envoyer</button>
</form>
</div>