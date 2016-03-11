<h1>Liste de vos API Woo</h1>
<a href="?controler=api&action=add"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter une nouvelle Api</a>

 <br><br>
 <table class="table table-bordered" style="background-color: white;">
  <tr>
    <th>id</th>
    <th>url</th>
    <th>ck</th>
    <th>cs</th>
    <th>ssl</th>
  </tr>
  <?php
  foreach ($apitab as $api) {?>
  <tr>
    <td> <?php echo $api->id()?> <a href="?controler=api&action=edit&id=<?php echo $api->id()?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> Modifier</a> <a href="?controler=api&action=del&id=<?php echo $api->id()?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Suprimer</a> <a href="?controler=api&action=verify&id=<?php echo $api->id()?>"><span class="glyphicon glyphicon-play" aria-hidden="true"></span> Verifier</a></td>
    <td><?php echo $api->url()?></td>
    <td><?php echo $api->ck()?></td>
	<td><?php echo $api->cs()?></td>
	<td><?php echo $api->sslverify()?></td>
  </tr>
  <?php 
  } 
  ?>
</table> 
