<?php  
	include '../elems/init.php';

if (!empty($_SESSION['auth']))
{
	

  	function showItemTable($link, $info ='') 
  	{
	  	$query = "SELECT * FROM items";
	  	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	  	for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);


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
  	


 //  	while ($row = mysqli_fetch_assoc($result)) {
 //        var_dump($row) ;
 //    }




	// $page = $_GET['page'] ? $_GET['page'] : 'index';
	// $path = "pages/{$page}.php";


	// if (file_exists($path)){
	// $content = file_get_contents($path);
	// // header("HTTP/1.0 404 Not Found");
	// } else {
	// 	$content =  'file not found';
	// 	$title = 'File not found';
	// }
  		$info = '';
  		if (deleteItem($link)) {
  			$info = '<p>Запись  удалена.</p>';
  		} 
		showItemTable($link, $info);
}	else {

header("Location: login.php"); die();
}
?>





