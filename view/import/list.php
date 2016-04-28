<h1>Liste de vos import</h1>
<a href="?controler=import&action=add"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un nouveau import</a>

 <br><br>
 <table class="table table-bordered" style="background-color: white;">
  <tr>
    <th>id(name)</th>
    <th>csvid</th>
    <th>apiid</th>
    <th>opt</th>
  </tr>
  <?php
  foreach ($imports as $import) {?>
  <tr>
    <td>
    <?php echo $import->id()?> (<?php echo $import->name()?>)<a href="?controler=import&action=del&id=<?php echo $import->id()?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Suprimer</a>
    </td>
    <td><?php echo $import->csvid()?></td>
    <td><?php echo $import->apiid()?></td>
	<td><?php echo $import->opt()?></td>
  </tr>
  <?php 
  } 
  ?>
</table> 
