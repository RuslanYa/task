<?php  
	include '../elems/init.php';


  if (!empty($_SESSION['auth']))
{

  	function getItem($link, $info = '')
  	{
      $id = $_GET['id'];
      $query = "SELECT * FROM items WHERE id=$id";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
      $item = mysqli_fetch_assoc($result);
    

      $name = $item['name'];
      $email = $item['email'];
      $text = $item['text'];
      $status = $item['status'];

  		$content ='
  		<form method="POST">
        Имя:<br>
  			<input name="name" value="'. $name .'" placeholder="name"><br><br>
        Email:<br>
  			<input name="email" value="'. $email .'" placeholder="email"><br><br>
        Текст задачи:<br>
  			<textarea name="text"  placeholder="text"> '. $text .'</textarea><br><br>
        Статус задачи:<br>
        <input name="status" value="'. $status .'"  readonly><br>
       
        <input type="checkbox" name="status" value="Выполнено">Отметить как выполненое<br><br>

  			<input type="submit" value = "Изменить">
  		</form>';

      include '../elems/admin_menu.php';
  		include 'layout.php';
  	}

  	function addItem($link)
  	{
  		if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['text']) and isset($_POST['status'])) {
        $id = $_GET['id'];
  			$name = $_POST['name'];
  			$email = $_POST['email'];
  			$text = $_POST['text'];
  			$status = $_POST['status'];

         // var_dump($_POST['name']);


  			$query = "UPDATE items SET name ='$name', email ='$email', text ='$text', status ='$status' WHERE id='$id'";
  			mysqli_query($link, $query) or die(mysqli_error($link));

  			// header('Location: index.php');

  			return 'Сообщение обновлено';

  		} else {
  			return '';
  		}
  	}
  	$info = addItem($link);
  	getItem($link, $info);

  }else {
   header("Location: login.php"); die();
   }

  	?>