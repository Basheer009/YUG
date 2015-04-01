<!DOCTYPE html>
<html>
<head>
	<title>YUG</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<link rel="stylesheet" href="css/jquerymobile.nativedroid.css" />

	<link rel="stylesheet" href="_/css/jquery.mobile-1.4.5.min.css" />
	<script src="_/js/jquery.js"></script>
	<script src="_/js/jquery.mobile-1.4.5.min.js"></script>

	<script src="_/js/myscript.js"></script>
	<link rel="stylesheet" href="_/css/mystyles.css" />
	
</head>
<body>
	<div id="login" data-role="page" data-theme="b" data-title="YUG: update">
	<div data-role="header" data-position="fixed" data-id="header">
        	<h1>Update</h1>
        </div><!--login header-->
		<div data-role="content" style="width: 500px !important;" class="updatePage">
			
			<br/>
			<div>
			<form id="frmContact" method="POST" data-ajax="false" action="usersconfig.php" 		
					>
				<input type="hidden" name="id" 
				value="<?php echo (isset($gresult) ? $gresult["id"] :  ''); ?>" />
				<table>
					<tr>
						<td>
							<label for="name">Name: </label>
						</td>
						<td>
							<input type="text" name="name" 
							value="<?php echo (isset($gresult) ? $gresult["name"] :  ''); ?>" 
							id="fname" class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="username">Usernsme: </label>
						</td>
						<td>
							<input type="text" name="username" 
							value="<?php echo (isset($gresult) ? $gresult["username"] :  ''); ?>" 
							 id="username" class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="email">Email: </label>
						</td>
						<td>
							<input type="text" name="email" 
							value="<?php echo (isset($gresult) ? $gresult["email"] :  ''); ?>" 
							 id="email" class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="password">Password: </label>
						</td>
						<td>
							<input type="text" name="password" 
							value="<?php echo (isset($gresult) ? $gresult["password"] :  ''); ?>" 
							 id="password" class="txt-fld"/>
						</td>
					</tr>
				</table>
				<input type="hidden" name="action_type" value="<?php echo (isset($gresult) ? 'edit' :  'add');?>"/>
				<div style="text-align: center; padding-top: 30px;">
					<input class="btn" type="submit" name="save" id="save" value="Save" />
					<input data-ajax="false" onClick="document.location.href='usersconfig.php'" class="btn" type="button" name="cancel"  id="cancel" value="Cancel" />
				</div>
			</form>
			</div>
		</div>
	</div>
    <script src="_/js/nativedroid.script.js"></script>
</body>
</html>