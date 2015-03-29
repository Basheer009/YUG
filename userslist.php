<?php 
include_once 'usersconfig.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>YUG</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	

	<link rel="stylesheet" href="_/css/jquery.mobile-1.4.5.min.css" />
	<script src="_/js/jquery.js"></script>
	<script src="_/js/jquery.mobile-1.4.5.min.js"></script>

	<script src="_/js/myscript.js"></script>
	<link rel="stylesheet" href="_/css/mystyles.css" />
	
	
<script type="text/javascript">
function ConfirmDelete(){
	var d = confirm('Do you really want to delete data?');
	if(d == false){
		return false;
	}
}
</script>
</head>
<body>
	
	<div id="users" data-role="page" data-title="YUG: Users Console">
    	<div data-role="header" data-position="fixed" data-id="header">
        	<h1>Users Console</h1>
            <a href="admin.php" data-role="button" data-iconpos="notext" data-icon="star">Admin</a>
        </div><!--admin header-->
		<h2 class="head1" align="center">Users Table</h2>
		

		<div data-role="main" class="ui-content" >

		<table data-role="table" class="ui-responsive" data-mode="columntoggle" id="myTable">
				<thead>
					<tr>
						<th>Name</td>
						<th data-priority="1">Username</th>
						<th data-priority="2">Email</th>
						<th data-priority="3">Password</th>
						<th>Edit</th><th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users_list as $user) : ?>
						<tr>
							<td>
								<?php echo $user["name"]; ?>
							</td>
							<td>
								<?php echo $user["username"]; ?>
							</td>
							<td>
								<?php echo $user["email"]; ?>
							</td>
							<td>
								<?php echo $user["password"]; ?>
							</td>
							<td>
								<form method="post" action="usersconfig.php">
									<input type="hidden" name="ci" 
									value="<?php echo $user["id"]; ?>" />
									<input type="hidden" name="action" value="edit" />
									<input data-ajax="false" type="submit" value="Edit" />
								</form> 
							</td>
							<td>
								<form method="POST" action="usersconfig.php" 
								onSubmit="return ConfirmDelete();">
									<input type="hidden" name="ci" 
									value="<?php echo $user["id"]; ?>" />
									<input type="hidden" name="action" value="delete" />
									<input type="submit" value="Delete" />
								</form>
							</td>
						<tr>
					<?php endforeach; ?>
				</tbody>
			</table><br/>
			<a href="addusers.php" data-ajax="false" class="link-btn">Add User</a>
		</div>
			<div data-role="footer" data-position="fixed" data-id="footer">
        	<div data-role="navbar">
            	<ul>
                    <li><a id="logout" href="admin.php?q=logout" data-role="button" data-icon="alert" data-mini="true">Logout</a></li>
                    <li><a href="index.php#about" data-role="button" data-rel="dialog" data-ajax="false" data-icon="info" data-mini="true">About</a></li>
                </ul>
            </div><!--footer navbar-->
        </div><!--footer buttons-->
		</div>
</body>
</html>