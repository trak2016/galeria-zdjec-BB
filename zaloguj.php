<?php
require_once 'dbconfig.php';

if($user->is_loggedin()!="")
{
	$user->redirect('kokpit.php');
}

if(isset($_POST['btn-login']))
{
	$uname = $_POST['txt_uname_email'];
	$umail = $_POST['txt_uname_email'];
	$upass = $_POST['txt_password'];
		
	if($user->login($uname,$umail,$upass))
	{
		$user->redirect('kokpit.php');
	}
	else
	{
		$error = "Nieprawidłowy login lub hasło !";
	}	
}
?>

<?php include('naglowek.php'); ?>
<?php include('navbar.php'); ?>
<div class="page-header">
		<div class="form-container">
        <form method="post">
            <h2>Panel Logowania</h2><hr />
            <?php
			if(isset($error))
			{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                     </div>
                     <?php
			}
			?>
            <div class="form-group">
            	<input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
            </div>
            <div class="form-group">
            	<input type="password" class="form-control" name="txt_password" placeholder="Your Password" required />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
            	<button type="submit" name="btn-login" class="btn btn-block btn-primary">
                	<i class="glyphicon glyphicon-log-in"></i>&nbsp;Zaloguj się
                </button>
            </div>
            <br />
            <label>Nie masz konta? <a href="zarejestruj.php">Zarejestruj się</a></label>
        </form>
       </div>
</div>

</div>

<div class="row">
<div class="col-md-12">

<?php include('stopka.php'); ?>
