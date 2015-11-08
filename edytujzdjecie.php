
<?php
//EDYCJA OPISU ZDJECIA
$edytuj = $_GET['edytuj'];
$album = $_GET['album'];
if( $edytuj ){
?>
<div class="page-header">
	<h1>Edycja opisu zdjęcia</h1>
</div>

<div class="row">
<div class="col-md-12">

<div class="media">
	<a class="media-left" href="#"><img src="img/<?php echo $edytuj; ?>.jpg" alt="..." style="width:200px;"></a>
  
	<div class="media-body">
	<form action="kokpit.php?p=edytujzdjecie&album=<?php echo $album; ?>" method="post">
		<div class="form-group">
			<label for="nazwa">Opisz krótko to zdjęcie</label>
   			<input type="text" id="nazwa" name="nazwa" class="form-control" required>
		</div>
	
		<input type="hidden" name="edytuj" value="<?php echo $edytuj; ?>">
		<button type="submit" class="btn btn-primary">Zaktualizuj</button>
	</form>
	</div>
</div>

<?php
}

//JESLI NIE WYBRANO albumu, CZYLI KROK 1/2...
if( !$album ){

?><div class="page-header">
	<h1>Edycja zdjęć <span class="label label-default">Krok 1/2: wybierz album</span></h1>
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
			echo '<td><a href="kokpit.php?p=edytujzdjecie&album='.$tabela['id'].'" type="button" class="btn btn-xs btn-primary">Wybierz album</a></td>';
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

<?php
//JESLI WYBRANO album, CZYLI KROK 2/2...
}else{
?>

<div class="page-header">
	<h1>Edycja zdjęć <span class="label label-default">Krok 2/2: wybierz zdjęcie</span></h1><a href="kokpit.php?p=edytujzdjecie" class="btn btn-xs btn-primary">Przejdź do innego albumu</a>
</div>

<div class="row">
<div class="col-md-12">

<?php
//USUWANIE ZDJECIA - WPROWADZENIE DO BAZY
//sprawdzenie, czy jest zmienna
$usun = $_GET['usun'];
if( $usun ){
	try
		  {
			$stmt = $DB_con->prepare("DELETE FROM zdjecia WHERE id = '$usun';");
			$stmt->execute();
			echo '<div class="alert alert-success" role="alert">Zdjęcie "'.$usun.'" zostało pomyślnie usunięte.</div>';  
		  }
		catch(PDOException $e)
		  {
			echo '<div class="alert alert-danger" role="alert">Błąd przy usuwaniu zdjęcia o identyfikatorze "'.$usun.'".</div>'; 
			echo $e->getMessage();
		  }
}
//ZMIANA OPISU ZDJECIA - WPROWADZENIE DO BAZY
//sprawdzenie, czy jest zmienna
$edytuj = $_POST['edytuj'];
$nazwa = $_POST['nazwa'];
if( $edytuj AND $nazwa ){
	try
		  {
			$stmt = $DB_con->prepare("UPDATE zdjecia SET nazwa = '$nazwa' WHERE id = '$edytuj';");
			$stmt->execute();
			echo '<div class="alert alert-success" role="alert">Opis do zdjęcia "'.$edytuj.'" został pomyślnie zmieniony.</div>'; 
		  }
		catch(PDOException $e)
		  {
			echo '<div class="alert alert-danger" role="alert">Błąd przy zmianie opisu do zdjęcia "'.$edytuj.'".</div>';  
			echo $e->getMessage();
		  }
}
?>

<table class="table">
<thead>
<tr>
	<th>Podgląd</th>
	<th>ID zdjęcia</th>
	<th>Nazwa zdjęcia</th>
	<th>ID albumu</th>
	<th>Opcje</th>
</tr>
</thead>
<tbody>
<?php
try
      {
		$stmt = $DB_con->prepare("SELECT * FROM zdjecia WHERE id_albumu = '$album';");
		$stmt->execute();
	     while ($tabela = $stmt->fetch()):
			echo '<tr>';
			echo '<td><img src="img/'.$tabela['id'].'.jpg" class="img-thumbnail" style="width:30px;height:30px;"></td>';
			echo '<td>'.$tabela['id'].'</td><td>'.$tabela['nazwa'].'</td><td>'.$tabela['id_albumu'].'</td>'; 
			echo '<td><a href="kokpit.php?p=edytujzdjecie&album='.$tabela['id_albumu'].'&edytuj='.$tabela['id'].'" type="button" class="btn btn-xs btn-warning">Edytuj zdjęcie</a> <a href="kokpit.php?p=edytujzdjecie&album='.$tabela['id_albumu'].'&usun='.$tabela['id'].'" type="button" class="btn btn-xs btn-danger">Usuń zdjęcie</a></td>';
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


<?php
}

?>

</div>
</div>