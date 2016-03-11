<div class="jumbotron">
<h1>ajout d'une nouvelle API WooCommerce</h1>
	<br>
	<form action="?controler=api&action=add" method="POST" class="form-horizontal">

		<div class="form-group">
			<label for="url" class="col-sm-2 control-label">url</label>
			<div class="col-sm-10">
			<input type="text" id="url" name="url" class="form-control">
			</div>
			</div>
		
		<div class="form-group">
			<label for="ck" class="col-sm-2 control-label">ck</label>
			<div class="col-sm-10">
			<input type="text" id="ck" name="ck" class="form-control">
			</div>
			</div>
			
		<div class="form-group">
			<label for="cs" class="col-sm-2 control-label">cs</label>
			<div class="col-sm-10">
			<input type="text" id="cs" name="cs" class="form-control">
			</div>
			</div>
			
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <div class="checkbox">
		        <label>
		          <input type="checkbox" id='sslverify' name='sslverify' checked="checked" value="1"> Verification SSL
		        </label>
		      </div>
		    </div>
		  </div>

			<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" class="btn btn-default" value="Ajouter">
			</div>
			</div>
			</form>
			</div>