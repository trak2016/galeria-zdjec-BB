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
?>
<?php include('naglowek.php'); ?>
<?php include('navbar2.php'); ?>


 <div class="jumbotron">
	<h1>Witaj!</h1>
		<p>Znajdujesz się w panelu użytkownika?. Możesz tutaj dodawać/usuwać zdjęcia i kategorie. Wybierz pozycję z menu w prawym górnym rogu.</p>
 </div>


</div> 

</body>
</html>