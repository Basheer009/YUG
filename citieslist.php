<?php 
include_once 'citiesconfig.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>YUG</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<link rel="stylesheet" href="_/css/jquerymobile.nativedroid.css" />

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
	
	<div id="universities" data-role="page" data-theme="b" data-title="YUG: Cities Console">
    	<div data-role="header" data-position="fixed" data-id="header">
        	<h1>Cities Console</h1>
            <a href="admin.php" data-role="button" data-ajax="false" data-iconpos="notext" data-icon="star">Admin</a>
        </div><!--admin header-->
		<h2 class="head1" align="center">Cities Table</h2>
		

		<div data-role="main" class="ui-content" >

		<table data-role="table" class="ui-responsive table-stroke" data-mode="columntoggle" id="myTable">
				<thead>
					<tr>
						<th>Name</td>
                        <th data-priority="1">Href</th>
                        <th data-priority="2">id Name</th>
						<th>Edit</th><th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($cities_list as $row) : ?>
						<tr>
							<td>
								<?php echo $row["name"]; ?>
							</td>
                            <td>
								<?php echo $row["href"]; ?>
							</td>
                            <td>
								<?php echo $row["idname"]; ?>
							</td>
							<td>
								<form method="post" action="citiesconfig.php">
									<input type="hidden" name="ci" 
									value="<?php echo $row["id"]; ?>" />
									<input type="hidden" name="action" value="edit" />
									<input type="submit" value="Edit" />
								</form> 
							</td>
							<td>
								<form method="POST" action="citiesconfig.php" 
								onSubmit="return ConfirmDelete();">
									<input type="hidden" name="ci" 
									value="<?php echo $row["id"]; ?>" />
									<input type="hidden" name="action" value="delete" />
									<input type="submit" value="Delete" />
								</form>
							</td>
						<tr>
					<?php endforeach; ?>
				</tbody>
			</table><br/>
			<div align="left">
			<a href="addcities.php" data-ajax="false">Add user</a></div>
		</div>
			<div data-role="footer" data-position="fixed" data-id="footer" data-theme="b">
        	<div data-role="navbar">
            	<ul>
                    <li><a id="logout" href="admin.php?q=logout" data-role="button" data-icon="alert" data-mini="true">Logout</a></li>
                    <li><a href="#about" data-role="button" data-rel="dialog" data-icon="info" data-mini="true">About</a></li>
                </ul>
            </div><!--footer navbar-->
        </div><!--footer buttons-->
		</div>
         <!--about page-->
    <div id="about" data-role="page" data-theme="b" data-title="YUG: About">
    	<div data-role="header" data-id="header">
        	<h1>About</h1>
        </div><!--about header-->
        <div data-role="content">
        	<h2 align="center">This project was done by: </h2>
			
			<div>
			<div style="float:left;">
			<img src="images/basheer.png" width="100px" />   
			<h2><code>Basheer Adel</h2>
			</div>
			<div style="float:right;">    
			<img src="images/hisham.png" width="100px" />   
			<h2><code>Hisham Ali</h2> 
			</div>
			</div>​
			<br><br><br><br><br><br><br><br>
			<div class='showastabs center nobg'>
                            <a href="dialog/index.html" data-rel="back" data-icon="delete" data-iconpos="right" data-role="button" data-inline="true">Cancel</a>
                    </div>
        </div><!--about page-->
    <script src="_/js/nativedroid.script.js"></script>
</body>
</html>