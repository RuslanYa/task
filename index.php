<?php  


	include 'elems/init.php';


  	function showItemTable($link) 
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

				
			</tr>';
			foreach ($data as $items) {
				$content .= "<tr>
					<td>{$items['id']}</td>
					<td>{$items['name']} </td>
					<td>{$items['email']} </td>
					<td>{$items['text']} </td>
					<td>{$items['status']}</td>

					
			</tr>";
			}
			$content .= '<br><br><a href="add.php">Добавить задачу</a><br><br>';
			include 'elems/menu.php';
			include 'layout.php';


			for ($i = 1; $i<= $pagesCount; $i++) {
	echo "<a href=\"?page=$i\">$i</a>";
}
  	}




		showItemTable($link);


?>







