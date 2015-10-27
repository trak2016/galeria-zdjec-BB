<?php include('naglowek.php'); ?>
<?php include('navbar2.php'); ?>
<?php include('sesja.php'); ?>

<div class="page-header">
	<h1>Dodaj zdjęcia</h1>
</div>


<?php 

?>


<div class="row">
<div class="col-md-5">

<form action="dodajzdjecie.php" method="post" enctype="multipart/form-data">
<div class="form-group">
	<label for="kategoria">Wybierz album</label>
    <select id="kategoria" name="kategoria" class="form-control">
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

  <button type="submit" name="wyslij" class="btn btn-primary">Dodaj zdjęcia</button>
</form>

</div>
</div>