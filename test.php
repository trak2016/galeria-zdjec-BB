<?php
require_once 'dbconfig.php';

$stmt = $DB_con->prepare("SELECT id, nazwa FROM albumy");
				$stmt->execute();
				
				while ($tabela = $stmt->fetch()):
					echo '<option value="'.$tabela['id'].'">'.$tabela['nazwa'].'</option>'; 	
			   endwhile;