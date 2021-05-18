 <?php 
	// Get content from index.php if not using form.post directly input is the previous page that pass the data in
	$file = file_get_contents("php://input"); 

	if(!empty($file)){
		
		//decode the value from string into array
		$ids = json_decode($file, true);

		$db = mysqli_connect("localhost","root","","todo");
		$ids = implode(",",$ids);//from array read each value and massage to string like the "," < is add comma after each array
		$get = "UPDATE tasks SET `is_completed` = true WHERE `id` IN (". $ids .")";

		$lala = mysqli_query($db,$get);

		echo 'successfully updated';
	}
 ?>	