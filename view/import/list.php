<h1>Liste de vos fichiers csv</h1>
<a href="?controler=csv&action=upload"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un nouveau import</a>

 <br><br>
 <table class="table table-bordered" style="background-color: white;">
  <tr>
    <th>id</th>
    <th>csvid</th>
    <th>apiid</th>
    <th>opt</th>
  </tr>
  <?php
  foreach ($imports as $import) {?>
  <tr>
    <td> <?php echo $import->id()?> 	<a href="?controler=import&action=del&id=<?php echo $import->id()?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Suprimer</a> 
    								<a href="?controler=import&action=verify&id=<?php echo $import->id()?>"><span class="glyphicon glyphicon-play" aria-hidden="true"></span> Verifier</a>
    								<a href="?controler=import&action=importassociatelist&id=<?php echo $import->id()?>"><span class="glyphicon glyphicon-transfer" aria-hidden="true"></span> Associer</a>
    </td>
    <td><?php echo $import->csvid()?></td>
    <td><?php echo $import->apiid()?></td>
	<td><?php echo $import->opt()?></td>
  </tr>
  <?php 
  } 
  ?>
</table> 
