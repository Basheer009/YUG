<?php 
include_once 'universitiesconfig.php';
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
	
	<div id="universities" data-role="page" data-title="YUG: Universities Console">
    	<div data-role="header" data-position="fixed" data-id="header">
        	<h1>Universities Console</h1>
            <a href="admin.php" data-role="button" data-ajax="false" data-iconpos="notext" data-icon="star">Admin</a>
        </div><!--admin header-->
		<h2 class="head1" align="center">Universities Table</h2>
		

		<div data-role="main" class="ui-content" >

		<table data-role="table" class="ui-responsive" data-mode="columntoggle" id="myTable">
				<thead>
					<tr>
						<th>Name</td>
						<th data-priority="1">Address</th>
						<th data-priority="2">Contact</th>
						<th data-priority="3">Desc.</th>
                        <th data-priority="4">Href</th>
						<th>Edit</th><th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($universities_list as $university) : ?>
						<tr>
							<td>
								<?php echo $university["name"]; ?>
							</td>
							<td>
								<?php echo $university["address"]; ?>
							</td>
							<td>
								<?php echo $university["contact"]; ?>
							</td>
							<td>
								<?php echo $university["de"]; ?>
							</td>
                            <td>
								<?php echo $university["href"]; ?>
							</td>
							<td>
								<form method="post" action="universitiesconfig.php">
									<input type="hidden" name="ci" 
									value="<?php echo $university["id"]; ?>" />
									<input type="hidden" name="action" value="edit" />
									<input data-ajax="false" type="submit" value="Edit" />
								</form> 
							</td>
							<td>
								<form method="POST" action="universitiesconfig.php" 
								onSubmit="return ConfirmDelete();">
									<input type="hidden" name="ci" 
									value="<?php echo $university["id"]; ?>" />
									<input type="hidden" name="action" value="delete" />
									<input type="submit" value="Delete" />
								</form>
							</td>
						<tr>
					<?php endforeach; ?>
				</tbody>
			</table><br/>
			<a href="adduniversities.php" data-ajax="false" class="link-btn">Add University</a>
		</div>
			<div data-role="footer" data-position="fixed" data-id="footer">
        	<div data-role="navbar">
            	<ul>
                    <li><a id="logout" href="admin.php?q=logout" data-role="button" data-icon="alert" data-mini="true">Logout</a></li>
                    <li><a href="#about" data-role="button" data-rel="dialog" data-icon="info" data-mini="true">About</a></li>
                </ul>
            </div><!--footer navbar-->
        </div><!--footer buttons-->
		</div>
         <!--about page-->
    <div id="about" data-role="page" data-title="YUG: About">
    	<div data-role="header" data-id="header">
        	<h1>About</h1>
        </div><!--about header-->
        <div data-role="content">
        	<h2 align="center">Developers</h2>
            <p>kjhsk jvhsdavsdh fkjhabs dvybvoasdhb vhdsbvh jsadbv</p>
        </div>
        
    </div><!--about page-->
</body>
</html>