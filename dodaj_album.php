<?php include('naglowek.php'); ?>
<?php include('navbar2.php'); ?>

<?php
include_once 'dbconfig.php';
if(!$user->is_loggedin())
{
	$user->redirect('index.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?><div class="page-header">
        <h1>Dodaj album</h1>
</div>
<?php
//sprawdzenie, czy jest wysłany formularz
if(isset($_POST['btn-addalbum']))
{
 $nazwa = trim($_POST['txt_nazwa']);
 
 if($nazwa=="")	{
		$error[] = "provide name !";	
	}
	else
	{
	try
			{
				$stmt = $DB_con->prepare("INSERT INTO albumy SET nazwa = '$nazwa';");
				$stmt->execute();
	            echo '<div class="alert alert-success" role="alert">Album "'.$nazwa.'" został pomyślnie dodany.</div>';    
				
			}
			catch(PDOException $e)
			{
				echo '<div class="alert alert-danger" role="alert">Błąd przy dodawaniu albumu "'.$nazwa.'".</div>';
				echo $e->getMessage();
			}
	}

}
?>

<div class="row">
<div class="col-md-5">

<form action="dodaj_album.php" method="post">
<div class="form-group">
        <label for="nazwa">Podaj nazwę nowego albumu</label>
    <input type="text" id="nazwa" name="txt_nazwa" class="form-control" required>
</div>

  <button type="submit" class="btn btn-primary" name="btn-addalbum">Dodaj album</button>
</form>

</div>
</div>