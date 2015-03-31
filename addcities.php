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
	
</head>
<body>
	<div id="login" data-role="page" data-title="YUG: update">
	<div data-role="header" data-position="fixed" data-id="header">
        	<h1>Update</h1>
        </div><!--login header-->
		<div data-role="content" style="width: 500px !important;" class="updatePage">
			
			<br/>
			<div>
			<form id="frmContact" method="POST" action="citiesconfig.php" 		
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
							<label for="href">Href: </label>
						</td>
						<td>
							<input type="text" name="href" 
							value="<?php echo (isset($gresult) ? $gresult["href"] :  ''); ?>" 
							 id="href" class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="idname">id Name: </label>
						</td>
						<td>
							<input type="text" name="idname" 
							value="<?php echo (isset($gresult) ? $gresult["idname"] :  ''); ?>" 
							 id="idname" class="txt-fld"/>
						</td>
					</tr>
				</table>
				<input type="hidden" name="action_type" value="<?php echo (isset($gresult) ? 'edit' :  'add');?>"/>
				<div style="text-align: center; padding-top: 30px;">
					<input class="btn" type="submit" name="save" id="save" value="Save" />
					<input data-ajax="false" onClick="document.location.href='citiesconfig.php'" class="btn" type="button" name="cancel"  id="cancel" value="Cancel" />
				</div>
			</form>
			</div>
		</div>
	</div>
</body>
</html>