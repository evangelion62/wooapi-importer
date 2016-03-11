<h1>Liste de vos fichiers csv</h1>
<a href="?controler=csv&action=upload"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un nouveau fichier csv</a>

 <br><br>
 <table class="table table-bordered" style="background-color: white;">
  <tr>
    <th>id</th>
    <th>nom</th>
    <th>colonnes</th>
    <th>separateur de colonne</th>
  </tr>
  <?php
  foreach ($csvtab as $csv) {?>
  <tr>
    <td> <?php echo $csv->id()?> <a href="?controler=csv&action=del&id=<?php echo $csv->id()?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Suprimer</a> <a href="?controler=csv&action=verify&id=<?php echo $csv->id()?>"><span class="glyphicon glyphicon-play" aria-hidden="true"></span> Verifier</a></td>
    <td><?php echo $csv->name()?></td>
    <td><?php echo $csv->row()?></td>
	<td><?php echo $csv->separateur()?></td>
  </tr>
  <?php 
  } 
  ?>
</table> 
