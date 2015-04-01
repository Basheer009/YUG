<!DOCTYPE html>
<html>
<head>
	<title>City - Update</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<link rel="stylesheet" href="_/css/jquery.mobile-1.4.5.min.css" />
	<script src="_/js/jquery.js"></script>
	<script src="_/js/jquery.mobile-1.4.5.min.js"></script>

	<script src="_/js/myscript.js"></script>
	<link rel="stylesheet" href="_/css/mystyles.css" />
	
</head>
<body>
	<div id="login" data-role="page" data-title="YUG: update">
	<div data-role="header" data-position="fixed" data-id="header">
        	<h1>Update</h1>
        </div><!--login header-->
		<div data-role="content" style="width: 500px !important;" class="updatePage">
			
			<br/>
			<div>
			<form id="frmContact" method="POST" action="admin.php" 		
					>
				<input type="hidden" name="ID" 
				value="<?php echo (isset($gresult) ? $gresult["id"] :  ''); ?>" />
				<table>
					<tr>
						<td>
							<label for="fname">First Name: </label>
						</td>
						<td>
							<input type="text" name="fname" 
							value="<?php echo (isset($gresult) ? $gresult["name"] :  ''); ?>" 
							id="fname" class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fname">Last Name: </label>
						</td>
						<td>
							<input type="text" name="lname" 
							value="<?php echo (isset($gresult) ? $gresult["username"] :  ''); ?>" 
							id="lname" class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fname">Contact #: </label>
						</td>
						<td>
							<input type="text" name="ContactNo" 
							value="<?php echo (isset($gresult) ? $gresult["email"] :  ''); ?>" 
							class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fname">Res. Address: </label>
						</td>
						<td>
							<input type="text" name="ResAddress" 
							value="<?php echo (isset($gresult) ? $gresult["password"] :  ''); ?>" 
							class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fname">Company: </label>
						</td>
						<td>
							<input type="text" name="Company" 
							value="<?php echo (isset($gresult) ? $gresult["href"] :  ''); ?>" 
							class="txt-fld"/>
						</td>
					</tr>
					
					
				</table>
				<input type="hidden" name="action_type" value="<?php echo (isset($gresult) ? 'edit' :  'add');?>"/>
				<div style="text-align: center; padding-top: 30px;">
					<input class="btn" type="submit" name="save" id="save" value="Save" />
					<input class="btn" type="submit" name="save" id="cancel" value="Cancel" 
					
					/>
				</div>
			</form>
			</div>
		</div>
		<div data-role="footer" data-position="fixed" data-id="footer">
        	<div data-role="navbar">
            	<ul>
                    <li><a href="index.php"  data-role="button" data-icon="home" data-mini="true">Home</a></li>
                    <li><a href="index.php#about" data-rel="dialog" data-role="button" data-icon="info" data-mini="true">About</a></li>
                </ul>
            </div><!--footer navbar-->
        </div>
	</div>
</body>
</html>