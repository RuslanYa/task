<?php  
	include '../elems/init.php';

if (!empty($_SESSION['auth']))
{
	

  	function showItemTable($link, $info ='') 
  	{


  		if(isset($_GET['page'])){
  		$page = $_GET['page'];
  	}else {
  		$page = 1;
  	}
  		$notesOnPage = 3;
  		$from = ($page - 1) * $notesOnPage;

  		$query = "SELECT * FROM items WHERE id>0 limit $from, $notesOnPage";
	  	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	  	for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
  		


	$query = "SELECT COUNT(*) as count FROM items";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$count = mysqli_fetch_assoc($result)['count'];
	$pagesCount = ceil($count / $notesOnPage);


		



	  	// $query = "SELECT * FROM items";
	  	// $result = mysqli_query($link, $query) or die(mysqli_error($link));
	  	// for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);


		$content = '<table>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>email</th>
				<th>text</th>
				<th>status</th>
				<th>edit</th>
				<th>delete</th>
				
			</tr>';
			foreach ($data as $items) {
				$content .= "<tr>
					<td>{$items['id']}</td>
					<td>{$items['name']} </td>
					<td>{$items['email']} </td>
					<td>{$items['text']} </td>
					<td>{$items['status']}</td>
					<td><a href=\"edit.php?id={$items['id']}\">edit</a></td>
					<td><a href=\"?delete={$items['id']}\">delete</a></td>
					
			</tr>";
			}
			$content .= '<a href="add.php">Добавить задачу</a>';
			include '../elems/admin_menu.php';
			include 'layout.php';

			echo '<br>';
	for ($i = 1; $i<= $pagesCount; $i++) {
	echo "<a href=\"?page=$i\">$i</a>";
}

  	}


  	function deleteItem($link) 
  	{
  		if(isset($_GET['delete']))
  		{
  			$id = $_GET['delete'];
		  	$query = "DELETE FROM items WHERE id=$id";
		  	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	  		return true;
	  	} else {
	  		return false;
	  	}
  	}
  	




  		$info = '';
  		if (deleteItem($link)) {
  			$info = '<p>Запись  удалена.</p>';
  		} 
		showItemTable($link, $info);
}	else {

header("Location: login.php"); die();
}
?>





