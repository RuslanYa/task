<?php  
include '../elems/init.php';
include '../elems/admin_menu.php';
	
if (isset($_POST['password']) and isset($_POST['username']) and $_POST['password'] == '123' and $_POST['username'] == 'admin')
{
	
	$_SESSION['auth'] = true;


	header("Location: index.php"); die();
}	else {
	?>
	<br><br><br>
		<form method="POST">
			Имя:
			<input type="text" name="username"><br><br>
			Пароль:
			<input type="password" name="password"><br><br>
			<input type="submit" value="Отправить">
		</form>
	 <?php
}
?>





