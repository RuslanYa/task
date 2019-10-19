<?php  

	include 'elems/init.php';
  include 'elems/menu.php';


	function getItem($info = '')
  	{
  		$content ='<br><br>
  		<form method="POST">
        Имя:<br>
        <input name="name"  placeholder="name"><br><br>
        Email:<br>
        <input name="email"  placeholder="email"><br><br>
        Текст задачи:<br>
        <textarea name="text"  placeholder="text"> </textarea><br><br>

        <input type="submit" value = "Добавить">
      </form>';

  		include 'layout.php';
  	}

  	function addItem($link)
  	{
  		if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['text'])) {
  			$name = $_POST['name'];
  			$email = $_POST['email'];
  			$text = $_POST['text'];
  			

  			$query = "INSERT INTO items (name, email, text) VALUES ('$name','$email','$text')";
  			mysqli_query($link, $query) or die(mysqli_error($link));

  			header('Location: index.php');

  			return 'Задача добавлена';

  		} else {
  			return '';
  		}
  	}
  	$info = addItem($link);
  	getItem($info);
  	



  	?>