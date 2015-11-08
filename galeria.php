<?php include('naglowek.php'); ?>
<?php include('navbar2.php'); ?>
<?php include('sesja.php'); ?>

<?php
//error_reporting(0);

//jeśli nie wybrano albumu, czyli krok 1/2 to...
 $album = $_GET['album'];
if( !$album ){
?>

<div class="page-header">
	<h1>Galeria zdjęć</h1>
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
 $stmt = $DB_con->prepare("SELECT * FROM albumy;");
 $stmt->execute();
 while ($tabela = $stmt->fetch()):
		echo '<tr>';
		echo '<td>'.$tabela['id'].'</td><td>'.$tabela['nazwa'].'</td>'; 
		echo '<td><a href="galeria.php?album='.$tabela['id'].'" type="button" class="btn btn-xs btn-primary">Przejdź do albumu</a></td>';
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

</div>
</div>

<?php
//jeśli wybrano album, czyli krok 2/2 to...
}else{
	try
	   {
	 $stmt = $DB_con->prepare("SELECT nazwa FROM albumy WHERE id = '$album';");
	 $stmt->execute();
	 while ($tabela = $stmt->fetch()):
		echo '<div class="page-header"><h1>Zdjęcia w albumie: "'.$tabela['nazwa'].'" </h1><a href="galeria.php" class="btn btn-xs btn-primary">Przejdź do innego albumu</a></div><div class="row"><div class="col-md-12">';
	endwhile;
	   }
	   catch(PDOException $e)
	   {
		  echo $e->getMessage(); 
	   }

try
  {
  $stmt = $DB_con->prepare("SELECT * FROM zdjecia WHERE id_albumu = '$album';");
  $stmt->execute();
  while ($tabela = $stmt->fetch()):
	echo '<div class="col-xs-6 col-md-3"><a href="img/'.$tabela['id'].'.jpg" class="thumbnail"><img src="img/'.$tabela['id'].'.jpg" alt="">&nbsp;'.$tabela['nazwa'].'</a></div>';
  endwhile;
	   }
	   catch(PDOException $e)
	   {
		  echo $e->getMessage(); 
	   }

?>
</tbody>
</table>

</div>
</div>

<?php  } ?>
