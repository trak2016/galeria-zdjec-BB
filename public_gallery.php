<?php include('naglowek.php'); ?>
<?php include('navbar.php'); ?>
<?php include ('dbconfig.php'); ?>
<?php
//error_reporting(0);
?>

<div class="page-header">
	<h1>Galeria publiczna</h1>
</div>

<?php
try
  {
  $stmt = $DB_con->prepare("SELECT * FROM zdjecia;");
  $stmt->execute();
  while ($tabela = $stmt->fetch()):
	echo '<div class="col-xs-6 col-md-3" id="ramka">
	<a href="img/'.$tabela['id'].'.jpg" class="highslide" onclick="return hs.expand(this)" class="thumbnail" title="Zdjęcie: '.$tabela['nazwa'].'">
	<img width="200" height="133" src="img/'.$tabela['id'].'.jpg" alt='.$tabela['nazwa'].' ></a>
	<button class="btn btn-default">0 <span class="glyphicon glyphicon-thumbs-up"></span></button></div>';
  endwhile;
	   }
	   catch(PDOException $e)
	   {
		  echo $e->getMessage(); 
	   }

?>


