<?php 

try {
	$db=new PDO("mysql:host=localhost;dbname=eticaret;charset=utf8",'root','vagon999');
} catch (PDOException $e) {
	echo $e->getMessage();
	
}
?>

