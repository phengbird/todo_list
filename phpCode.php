<?php
	//intialize 
	$errors = "input some thing";

	//connect database
	$db = mysqli_connect("localhost" , "root" ,"", "todo");

	// insert a quote if submit button is clicked
	if (isset($_POST['add'])) {
		if (empty($_POST['task_input']) || ctype_space($_POST['task_input'])) {
			echo "<script>alert('$errors');</script>";
			//fix alert message with reload page
			echo "<script>window.location.replace('index.php');</script>";
		}else{
			$tasks = $_POST['task_input'];
			$sql = "INSERT INTO tasks (name) VALUES ('$tasks')";
			mysqli_query($db, $sql);
			header('location: index.php');	
		}
	}

	if(isset($_POST['save'])){
		if(empty($_POST['edit_input']) || ctype_space($_POST['edit_input']))
		{	
			echo "<script>alert('$errors');</script>";
			//fix alert message with reload page
			echo "<script>window.location.replace('index.php');</script>";
		} else {
			$id = $_POST['save'];
			$task = $_POST['edit_input'];
			$sql = "UPDATE tasks SET name= '" . $task . "' WHERE id= '" . $id ."'";
			mysqli_query($db,$sql);
			// echo '<script>alert("success")</script>';
			header('location: index.php');
		}
	}

	if(isset($_GET['del_task'])){
		$id = $_GET['del_task'];
		mysqli_query($db,"DELETE FROM tasks WHERE id=".$id);
		header('location: index.php');
	 }

 	if(isset($_GET['done'])){
		$id = $_GET['done'];
		mysqli_query($db,"DELETE FROM tasks WHERE id=".$id);
		header('location: index.php');
	 }
?>