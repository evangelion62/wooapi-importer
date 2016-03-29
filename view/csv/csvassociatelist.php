<h1>Liste des association du fichiers csv</h1>
<a href="?controler=csv&action=associate&id=<?php echo $_GET['id']?>"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter une nouvelle assiciation au fichier csv</a>

 <br><br>
 <table class="table table-bordered" style="background-color: white;">
  <tr>
    <th>rowid</th>
    <th>attribute</th>
    <th>type</th>
  </tr>
  <?php
  foreach ($csvassociates as $csv) {?>
  <tr>
    <td> <?php echo $csv->rowid().'('.$rows[$csv->rowid()].')'?> <a href="?controler=csv&action=associatedel&id=<?php echo $csv->id()?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Suprimer</a> </td>
    <td><?php echo $csv->attribute()?></td>
    <td><?php echo $csv->type()?></td>
  </tr>
  <?php 
  } 
  ?>
</table> 
