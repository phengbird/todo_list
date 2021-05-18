<?php include 'phpCode.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Pheng Web</title>
	<script type="text/javascript" src="jscode.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>
	<div class="split left">

		<h2 style="font-style: 'Hervetica';" class="text-info">Todo_List</h2>

		<form method="post" action="index.php">
			<div class="input-group mb-3">
  				<div class="input-group-prepend task_input" >
  					<input type="text" name="task_input" class="form-control" placeholder="Text here...">
					<button type="submit" name="add" id="add_btn" class="input-group-text">Add Task</button>
  				</div>
  			</div>
			<button type="button" name="comfirm" class="btn btn-secondary comfirm_btn" onclick="passData()" style="border:none">Comfirm</button>
		</form>

		<table class="table table-bordered">
			<thead >
				<tr >
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
								<div class = "btn-groupabc btnwidth">
									<div class = "before" style = "display:block">
											<button class="edit btn" name="edit" style="border:none" onclick="EditStyle(this)" id="<?php echo $i; ?>">Edit</button>
										<a href = "index.php?del_task=<?php echo $row['id'] ?>">
											<button class ="delete btn" style="border:none">Delete</button>
										</a>
									</div>
								</div>
							</div>			
						</td>
						<td class="editT" style="display:none">
							<div class = "btn-group2" >
								<form method="post" action="index.php" class="input_form">
									<input type="text" name="edit_input" class=" form-control edit_input" style="border:none">
									<button class="edit btn" name="save" id="save" style="border:none" value="<?php echo $row['id']; ?>">Save</button>
									<button class="delete btn" style="border:none">Cancel</button>
								</form>
							</div>
						</td>
					</tr>
				<?php $i++; }?>

			</tbody>
		</table>
	</div>

	<div class = "split right">
		<h2 style="font-style: 'Hervetica'" class="text-info">Comfirm-List</h2>
		<h1 class="form-control" style="border:none"></h1>
		<table class="table table-bordered">
			<thead >
				<tr >
					<th >List</th>
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
										<button class='btn btn-danger done' style="border:none">Done</button>
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