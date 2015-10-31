<?php include('naglowek.php'); ?>
<?php include('navbar2.php'); ?>
<?php include('sesja.php'); ?>

<div class="page-header">
	<h1>Dodaj zdjęcia</h1>
</div>


<?php 
//sprawdzenie, czy jest wysłany formularz
if(isset($_POST['send']))
{

//deklarowanie zmiennych
$album= $_POST['album'];

try
      {
		$stmt = $DB_con->prepare("SELECT MAX(id) FROM zdjecia;");
		$stmt->execute();
	     while ($row = $stmt->fetch()):
			$najwiekszeID = $row[0]+1; 	
		 endwhile;	
	  }
	catch(PDOException $e)
	  {
		echo $e->getMessage();
	  }
	  
	
//WYSYŁANIE PLIKU NA SERWER
for( $i=0; $i<count($_FILES['plik']['size']); $i++ ){ 

if( strstr($_FILES['plik']['type'][$i], 'image')!==false ){ 

	//zmienia nazwę pliku, by zgadzały się z ID w bazie danych
	$file = 'img/'.$najwiekszeID.'.jpg'; 
	//wysyła plik na serwer
	move_uploaded_file($_FILES['plik']['tmp_name'][$i], $file); 

try
   {
	//dodaje wpis do bazy danych
	$stmt = $DB_con->prepare("INSERT INTO zdjecia SET id_albumu = '$album';");
	$stmt->execute();
		echo '<div class="alert alert-success" role="alert">Zdjęcia zostały zapisane w bazie danych.</div>'; 
	} 
	catch(PDOException $e)
	  {
		echo '<div class="alert alert-danger" role="alert">Błąd przy zapisie zdjęć do bazy danych.</div>';
		echo $e->getMessage();
      }

	//wyświetla komunikat o powodzeniu
	echo '<div class="alert alert-success" role="alert">Zdjęcia zostały zapisane na serwerze.</div>';
	//zwiększa ID dla kolejnych zdjęć w pętli
	$najwiekszeID++;
} 
}


}
?>


<div class="row">
<div class="col-md-5">

<form action="dodajzdjecie.php" method="post" enctype="multipart/form-data">
<div class="form-group">
	<label for="album">Wybierz album</label>
    <select id="album" name="album" class="form-control">
<?php
	try
      {
		$stmt = $DB_con->prepare("SELECT id, nazwa FROM albumy;");
		$stmt->execute();
	     while ($tabela = $stmt->fetch()):
			echo '<option value="'.$tabela['id'].'">'.$tabela['nazwa'].'</option>'; 	
		 endwhile;	
	  }
	catch(PDOException $e)
	  {
		echo $e->getMessage();
	  }
?>
	</select>
</div>

<div class="form-group">
	<label for="pliki">Wybierz zdjęcia</label>
    <input type="file" id="pliki" multiple="multiple" name="plik[]">
</div>

  <button type="submit" name="send" class="btn btn-primary">Dodaj zdjęcia</button>
</form>

</div>
</div>