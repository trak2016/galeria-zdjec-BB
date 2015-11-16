
<div class="page-header">
	<h1>Edytuj album</h1>
</div>

<div class="row">
<div class="col-md-12">

<table class="table">
<thead>
<tr>
	<th>ID</th>
	<th>Nazwa albumu</th>
	<th>Opcje</th>
</tr>
</thead>
<tbody>
<?php

try
      {
		$stmt = $DB_con->prepare("SELECT * FROM albumy where id_usera='$user_id';");
		$stmt->execute();
	     while ($tabela = $stmt->fetch()):
			echo '<tr>';
			echo '<td>'.$tabela['id'].'</td><td>'.$tabela['nazwa'].'</td>'; 
			echo '<td><a href="kokpit.php?p=usunalbum&nazwa='.$tabela['id'].'" type="button" class="btn btn-xs btn-danger">Usuń album</a></td>';
			echo '</tr>';
		 endwhile;	
	  }
	catch(PDOException $e)
	  {
		echo $e->getMessage();
	  }
?>
</tbody>
</table>