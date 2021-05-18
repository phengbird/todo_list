<?php include 'phpCode.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Pheng Web</title>
	<script type="text/javascript" src="jscode.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
	<div class="split left">

		<h2 style="font-style: 'Hervetica';">Todo_List</h2>

		<form method="post" action="index.php" class="input_form">

			<input type="text" name="task_input" class="task_input">
			<button type="submit" name="add" id="add_btn" class="add_btn">Add Task</button>
			<button type="button" name="comfirm" class="comfirm_btn" onclick="passData()" style="border:none">Comfirm</button>
		</form>

		

		<table>
			<thead >
				<tr>
					<th >Index</th>
					<th >List-To-Do</th>
				</tr>
			</thead>

			<tbody id="first">
				<?php 
				// select all tasks if page is visited or refreshed
				$tasks = mysqli_query($db, "SELECT * FROM tasks WHERE `is_completed` != true");

				$i = 1; 
				while ($row = mysqli_fetch_array($tasks)) { ?>
					<tr>
						<td class="nocheck" onclick="checked(this)" id = "<?php echo $row['id']; ?>"> <?php echo $i; ?> </td>
						<td class="layposition" > <?php echo $row['name']; ?>
							<div class = "overlay">
								<div class = "btn-group">
									<div class = "before" style = "display:block">
											<button type="submit" class="edit" name="edit" style="border:none" onclick="EditStyle(this)" id="<?php echo $i; ?>">Edit</button>
										<a href = "index.php?del_task=<?php echo $row['id'] ?>">
											<button class = "delete" style="border:none">Delete</button>
										</a>
									</div>
								</div>
							</div>			
						</td>
						<td class="editT" style="display:none">
							<div class = "btn-group2" >
								<form method="post" action="index.php" class="input_form">
									<input type="text" name="edit_input" class="edit_input" style="border:none">
									<button class="edit" name="save" id="save" style="border:none" value="<?php echo $row['id']; ?>">Save</button>
									<button class="delete" style="border:none">Cancel</button>
								</form>
							</div>
						</td>
					</tr>
				<?php $i++; }?>

			</tbody>
		</table>
	</div>

	<div class = "split right">
		<table>
			<thead >
				<tr>
					<th >Comfirm-List</th>
				</tr>
			</thead>

			<tbody>
				<?php
				$tasks = mysqli_query($db,"SELECT * FROM tasks WHERE `is_completed` = true"); 
				if(!(empty($tasks))){ 
					// select all tasks if page is visited or refreshed
					
					while ($row = mysqli_fetch_array($tasks)) { ?>
						<tr>
							<td class = "layposition" > <?php echo $row['name']; ?> 
								<div class = overlay>
									<a href = "index.php?done=<?php echo $row['id'] ?>">
										<button class='done' style="border:none">Done</button>
									</a>
								</div>
							</td>
						</tr>
					<?php } 
				} ?>
			</tbody>
		</table>
	</div>
		
</body>
</html>