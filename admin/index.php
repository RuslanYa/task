<?php  
	include '../elems/init.php';

if (!empty($_SESSION['auth']))
{
	
// Фу
  	function showItemTable($link, $info ='') 
  	{

	// Устанавливаем кол-во записей на каждой страницу пагинации

  	if(isset($_GET['page'])){
  		$page = $_GET['page'];
  	}else {
  		$page = 1;
  	}
  		$notesOnPage = 3;
  		$from = ($page - 1) * $notesOnPage;

  	//Функции сортировки

  	function ascId($a, $b) 
  	{
  		if ($a['id'] == $b['id']) return 0;
    	return ($a['id'] < $b['id']) ? -1 : 1;
	}
	function descId($a, $b) 
	{
	    if ($a['id'] == $b['id']) return 0;
		return ($a['id'] > $b['id']) ? -1 : 1;
	}

	function ascName($a, $b) 
  	{
  		if ($a['name'] == $b['name']) return 0;
    	return ($a['name'] < $b['name']) ? -1 : 1;
	}
	function descName($a, $b) 
	{
	    if ($a['name'] == $b['name']) return 0;
    	return ($a['name'] > $b['name']) ? -1 : 1;
	}

	function ascEmail($a, $b) 
  	{
  		if ($a['email'] == $b['email']) return 0;
    	return ($a['email'] < $b['email']) ? -1 : 1;
	}
	function descEmail($a, $b) 
	{
	    if ($a['email'] == $b['email']) return 0;
    	return ($a['email'] > $b['email']) ? -1 : 1;
	}

	function ascStatus($a, $b) 
  	{
  		if ($a['status'] == $b['status']) return 0;
    	return ($a['status'] < $b['status']) ? -1 : 1;
	}
	function descStatus($a, $b) 
	{
	    if ($a['status'] == $b['status']) return 0;
    	return ($a['status'] > $b['status']) ? -1 : 1;
	}

	function ascText($a, $b) 
  	{
  		if ($a['text'] == $b['text']) return 0;
    	return ($a['text'] < $b['text']) ? -1 : 1;
	}
	function descText($a, $b) 
	{
	    if ($a['text'] == $b['text']) return 0;
    	return ($a['text'] > $b['text']) ? -1 : 1;
	}

  	
// Запрос и сортировка результата в соответствии с гет-параметрами

  	if(isset($_GET['sort']) and isset($_GET['column'])){


  		$query = "SELECT * FROM items WHERE id>0  limit $from, $notesOnPage";
	  	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	  	for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

  		if ($_GET['sort'] == 'ASC' and $_GET['column'] == 'id') uasort($data, 'ascId');
  		if ($_GET['sort'] == 'DESC' and $_GET['column'] == 'id') uasort($data, 'descId');
  		
  		if ($_GET['sort'] == 'ASC' and $_GET['column'] == 'name') uasort($data, 'ascName');
  		if ($_GET['sort'] == 'DESC' and $_GET['column'] == 'name') uasort($data, 'descName');

  		if ($_GET['sort'] == 'ASC' and $_GET['column'] == 'email') uasort($data, 'ascEmail');
  		if ($_GET['sort'] == 'DESC' and $_GET['column'] == 'email') uasort($data, 'descEmail');

   		if ($_GET['sort'] == 'ASC' and $_GET['column'] == 'text') uasort($data, 'ascText');
  		if ($_GET['sort'] == 'DESC' and $_GET['column'] == 'text') uasort($data, 'descText');

   		if ($_GET['sort'] == 'ASC' and $_GET['column'] == 'status') uasort($data, 'ascStatus');
  		if ($_GET['sort'] == 'DESC' and $_GET['column'] == 'status') uasort($data, 'descStatus');
	  	

  	}else {
  		$query = "SELECT * FROM items WHERE id>0 limit $from, $notesOnPage";
	  	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	  	for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
  	}		

  	//Считаем страницы для пагинации

	$query = "SELECT COUNT(*) as count FROM items";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$count = mysqli_fetch_assoc($result)['count'];
	$pagesCount = ceil($count / $notesOnPage);



	// Выводим таблицу 

		$url = isset($_GET['page']) ? '&page='.$_GET['page']:'';

		$content = "<table>
				<tr>
				<th><a href=\"?sort=ASC&column=id".$url."\">ASC</a> / <a href=\"?sort=DESC&column=id".$url."\">DESC</a></th>
				<th><a href=\"?sort=ASC&column=name".$url."\">ASC</a> / <a href=\"?sort=DESC&column=name".$url."\">DESC</a></th>
				<th><a href=\"?sort=ASC&column=email".$url."\">ASC</a> / <a href=\"?sort=DESC&column=email".$url."\">DESC</a></th>
				<th><a href=\"?sort=ASC&column=text".$url."\">ASC</a> / <a href=\"?sort=DESC&column=text".$url."\">DESC</a></th>
				<th><a href=\"?sort=ASC&column=status".$url."\">ASC</a> / <a href=\"?sort=DESC&column=status".$url."\">DESC</a></th>
				<th></th>
				<th></th>
				
			</tr>
		
			<tr>
				<th>id</th>
				<th>name</th>
				<th>email</th>
				<th>text</th>
				<th>status</th>
				<th></th>
				<th></th>
				
			</tr>";
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

// Функция удаления записи

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
  	



  	// Выводим сообщение в случае удачного удаления записи
  		$info = '';
  		if (deleteItem($link)) {
  			$info = '<p>Запись  удалена.</p>';
  		} 
		showItemTable($link, $info);
}	else {

	header("Location: login.php"); die();
}
?>





